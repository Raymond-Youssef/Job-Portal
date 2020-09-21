@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ Auth::user()->name }}</h1>
            <form method="post" action="{{route('profile.update')}}">
                @csrf
                @method('PUT')

                {{-- Personal Information--}}
                <section id="personal-information">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="hero-info">
                                <h3 class="text-primary">Personal Information:</h3>
                                <ul>
                                    <li>E-mail:
                                        <input type="email" placeholder="{{Auth::user()->email}}">
                                    </li>
                                    @if($birth_date = Auth::user()->birth_date)
                                        <li><span>Date of Birth: </span>{{ $birth_date }}</li>
                                    @endif
                                    @if($address = Auth::user()->address)
                                        <li><span>Address: </span> {{ $address }}</li>
                                    @endif
                                    @if($phone = Auth::user()->phone)
                                        <li><span>Phone:  </span> {{ $phone }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

{{--                        --}}{{--Profile Image--}}
{{--                        <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">--}}
{{--                            @if($image)--}}
{{--                                <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="Profile Picture">--}}
{{--                            @else--}}
{{--                                <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid">--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                </section>

                <hr>

                @if($coverLetter = Auth::user()->cover_letter)
                    <section id="cover-letter">
                        <h3 class="text-primary">Cover Letter:</h3>
                        <blockquote class="blockquote">
                            <p>{{$coverLetter}}</p>
                        </blockquote>
                    </section>

                    <hr>
                @endif

                {{-- Resumes --}}
{{--                <section id="resumes">--}}
{{--                    <h3 class="text-primary">Resumes:</h3>--}}
{{--                    <ul>--}}
{{--                        @foreach($resumes as $resume)--}}
{{--                            <li>--}}
{{--                                {{$resume->name}}--}}
{{--                                @if($resume->default)--}}
{{--                                    <span class="text-info">(Default)</span>--}}
{{--                                @endif--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </section>--}}
            </form>
        </div>
    </div>
@endsection



{{-- -----------------------------------------------------------------------------------------------------------------}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form">
                    <h1 class="display-4">{{ __('Personal Info') }}</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="addrress" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone number" class="col-md-4 col-form-label text-md-right">{{ __('phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phone number" type="text" class="form-control @error('phone number') is-invalid @enderror" name="phone number" value="{{ old('phone number') }}" required autocomplete="phone number" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{-- Form --}}

        </div>
    </div>
    </div>
    </div>
@endsection
