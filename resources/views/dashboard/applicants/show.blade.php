@extends('layouts.dashboard')

@section('main')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $applicant->name }}</h1>


            {{-- Personal Information--}}
            <section id="personal-information">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="hero-info">
                            <h3 class="text-primary">Personal Information:</h3>
                            <ul>
                                <li><span>E-mail: </span> {{ $applicant->email }}</li>
                                @if($job_title = $applicant->job_title)
                                    <li><span>Job Title: </span> {{ $job_title }}</li>
                                @endif
                                @if($city = $applicant->city)
                                    <li><span>City: </span> {{ $city }}</li>
                                @endif
                                @if($country = $applicant->country)
                                    <li><span>Country: </span> {{ $country }}</li>
                                @endif
                                @if($phone = $applicant->phone)
                                    <li><span>Phone:  </span> {{ $phone }}</li>
                                @endif
                                @if($birth_date = $applicant->birth_date)
                                    <li><span>Date of Birth: </span>{{ $birth_date }}</li>
                                @endif
                            </ul>
                            <form method="POST" action="{{route('applicant.verify',$applicant)}}">
                                @csrf
                                <button type="submit" class="btn btn-success" style="position: absolute; bottom: 2rem; right: 2rem;">Verify</button>
                            </form>
                        </div>
                    </div>

                    {{--Profile Image--}}
                    <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                        @if($applicant->image)
                            <img src="{{asset($applicant->image->path)}}" class="img-thumbnail img-fluid" alt="Profile Picture" style="height: 18rem; width: auto;">
                        @else
                            <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid" style="height: 18rem; width: auto;">
                        @endif
                    </div>

                </div>
            </section> {{--End Personal Informations--}}

            <hr>

            {{--Cover Letter--}}
                <section id="cover-letter">
                    <h3 class="text-primary">Cover Letter:</h3>
                    <blockquote class="blockquote">
                        <p>{{$applicant->cover_letter}}</p>
                    </blockquote>
                </section>

                <hr>
            {{--End Cover Letter --}}

            {{-- Resumes --}}
            <section id="resumes">
                <h3 class="text-primary">Resumes:</h3>
                <table class="table table-hover" id="resumes_list">
                    @if(count($applicant->resumes)>0)
                        @foreach($applicant->resumes as $resume)
                            <tr>
                                <td>
                                    {{$resume->name}}
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{$resume->path}}">Download</a>
                                </td>
                                <td>
                                    <form action="{{route('resume.destroy', $resume)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('resume.update', $resume->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-warning">Set Default</button>
                                    </form>
                                </td>
                                <td>
                                    @if($resume->default)
                                        <span class="text-info">(Default)</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h5 id="no_resumes">You don't have any resumes uploaded yet</h5>
                    @endif
                </table>
                {{-- Resumes Form --}}
                <h6 class="text-warning" role="button">Upload a Resume:</h6>
                <div id="message"></div>
                <form id="resume-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="resume">
                    <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                    <button class="btn btn-info" type="submit">Upload</button>
                </form>
                @include('shared.resumeAJAX')
            </section>

        </div>
    </div>
@endsection

