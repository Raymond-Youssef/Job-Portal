@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $user->name }}</h1>


            {{-- Personal Information--}}
            <section id="personal-information">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="hero-info">
                            <h3 class="text-primary">Personal Information:</h3>
                            <ul>
                                <li><span>E-mail: </span> {{ $user->email }}</li>
                                @if($birth_date = $user->birth_date)
                                    <li><span>Date of Birth: </span>{{ $birth_date }}</li>
                                @endif
                                @if($address = $user->address)
                                    <li><span>Address: </span> {{ $address }}</li>
                                @endif
                                @if($phone = $user->phone)
                                    <li><span>Phone:  </span> {{ $phone }}</li>
                                @endif
                            </ul>
                        </div>
                        <div style="position: absolute; bottom: 2rem; right: 2rem;">
                            <a href="{{ route('profile.edit') }}"  class="btn btn-info" role="button">Edit Profile</a>
                        </div>
                    </div>

                    {{--Profile Image--}}
                    <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                        @if($image)
                            <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="Profile Picture" style="height: 18rem; width: auto;">
                        @else
                            <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid" style="height: 18rem; width: auto;">
                        @endif
                    </div>

                </div>
            </section> {{--End Personal Informations--}}

            <hr>

            {{--Cover Letter--}}
            @if($coverLetter = $user->cover_letter)
                <section id="cover-letter">
                    <h3 class="text-primary">Cover Letter:</h3>
                    <blockquote class="blockquote">
                        <p>{{$coverLetter}}</p>
                    </blockquote>
                </section>

                <hr>
            @endif
            {{--End Cover Letter --}}

            {{-- Resumes --}}
            <section id="resumes">
                <h3 class="text-primary">Resumes:</h3>
                <table class="table table-hover" id="resumes_list">
                    @if(count($resumes)>0)
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
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('resume.update', $resume->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <td><button class="btn btn-warning">Set Default</button></td>
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
                    <button class="btn btn-info" type="submit">Upload</button>
                </form>
            </section>

        </div>
    </div>
@endsection
