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
                            <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="Profile Picture">
                        @else
                            <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid">
                        @endif
                    </div>
                </div>
            </section>

            <hr>

            @if($coverLetter = $user->cover_letter)
                <section id="cover-letter">
                    <h3 class="text-primary">Cover Letter:</h3>
                    <blockquote class="blockquote">
                        <p>{{$coverLetter}}</p>
                    </blockquote>
                </section>

                <hr>
            @endif

            {{-- Resumes --}}
            <section id="resumes">
                <h3 class="text-primary">Resumes:</h3>
                <ul>
                    @foreach($resumes as $resume)
                        <li>
                            {{$resume->name}}
                            @if($resume->default)
                                <span class="text-info">(Default)</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </section>

        </div>
    </div>
@endsection
