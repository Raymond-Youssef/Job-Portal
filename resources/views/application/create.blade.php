@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="form">
            <h2 class="display-4"></span>{{ __('Applicant Information') }}</h2>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Applicant Name:') }}</h5>
                        <div class="col-md-6">
                            <h4>{{$applicant->name}}</h4>
                        </div>
                    </div>


                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Applicant Email:') }}</h5>
                        <div class="col-md-6">
                            <h4>{{$applicant->email}}</h4>
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Applicant Job Title:') }}</h5>
                        <div class="col-md-6">
                            @if($jobTitle = $applicant->job_title)
                                <h4>{{$jobTitle}}</h4>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Applicant Birth Date:') }}</h5>
                        <div class="col-md-6">
                            @if($birthDate = $applicant->birth_date)
                                <h4>{{$birthDate}}</h4>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('City:') }}</h5>
                        <div class="col-md-6">
                            @if($city = $applicant->city)
                                <h4>{{$city}}</h4>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Country:') }}</h5>
                        <div class="col-md-6">
                            @if($country = $applicant->country)
                                <h4>{{$country}}</h4>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Cover Letter:') }}</h5>
                        <div class="col-md-6">
                            @if($coverLetter = $applicant->cover_letter)
                                <h6>{{$coverLetter}}</h6>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>





                    {{-- Job Information --}}
                    <h2 class="display-4"></span>{{ __('Job Information') }}</h2>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Job Title:') }}</h5>
                        <div class="col-md-6">
                            <h4>{{$job->title}}</h4>
                        </div>
                    </div> {{-- Job Title --}}



                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Company Email:') }}</h5>
                        <div class="col-md-6">
                            <h4>{{$job->company->email}}</h4>
                        </div>
                    </div> {{-- Email --}}


                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('City:') }}</h5>
                        <div class="col-md-6">
                            @if($city = $job->city)
                                <h4>{{$city}}</h4>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Country:') }}</h5>
                        <div class="col-md-6">
                            @if($country = $job->country)
                                <h4>{{$country}}</h4>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <h5 class="col-md-4 text-md-right text-info">{{ __('Job Description:') }}</h5>
                        <div class="col-md-6">
                            @if($jobDescription = $job->description)
                                <h6>{{$jobDescription}}</h6>
                            @else
                                <h4>{{'Not Set'}}</h4>
                            @endif
                        </div>
                    </div>

                    @include('shared.resumeAJAX')

                    <section id="resumes">
                        <h3 class="text-info">Choose a Resume:</h3>
                        @error('resume')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <table class="table table-hover" id="resumes_list">
                            @if(count($resumes = $applicant->resumes)>0)
                                @foreach($resumes as $resume)
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
                                        <td>
                                            <label>
                                                <input type="radio" value="{{$resume->id}}" name="resume_id"
                                                       @if($resume->default)
                                                       checked
                                                    @endif
                                                >
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 id="no_resumes">You don't have any resumes uploaded yet</h5>
                            @endif
                        </table>
                        {{-- Resumes Form --}}
                        <h6 class="text-warning">Upload a Resume:</h6>
                        <div id="message"></div>
                        <form id="resume-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="resume">
                            <button class="btn btn-info" type="submit">Upload</button>
                        </form>
                    </section>
                </div>


                <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                    @if($image = $applicant->image)
                        <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="Profile Picture" style="height: 18rem; width: auto;">
                    @else
                        <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid" alt="Profile Picture" style="height: 18rem; width: auto;">
                    @endif {{-- Image --}}

                    <div id="buttons">
                        <a type="submit" href="{{route('profile.edit')}}" class="btn btn-lg btn-secondary" style="position: absolute; bottom: 7rem; right:2rem;">
                            {{ __('Edit Profile') }}
                        </a>
                        <form method="POST" id="application-form" action="{{route('application.store')}}">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="resume-store" name="resume" value="">
                            <input type="hidden" id="job-id" name="job_id" value="{{$job->id}}">
                            <button type="submit" class="btn btn-lg btn-primary" style="position: absolute; bottom: 2rem; right:2rem;">
                                {{ __('Send Application') }}
                            </button>
                        </form>
                        <script>
                            $(document).ready(function (){
                                $('#application-form').on('submit', function (){
                                    $('#resume-store').val($('input[name="resume_id"]:checked').val());
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div> {{-- Form --}}
@endsection

