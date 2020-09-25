@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form">
                    <h1 class="display-4">{{ __('Register') }}</h1>
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


                        {{-- Radio Buttons --}}
                        <fieldset class="form-group">
                            <div class="form-group row">
                                <label for="role" class="col-md-4 text-md-right">{{ __('Account Type:') }}</label>
                                <div class="col-md-6 text-md-right">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="applicant-radio" name="role" class="custom-control-input" value="user">
                                        <label class="custom-control-label" for="applicant-radio">Applicant</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="company-radio" name="role" class="custom-control-input" value="company">
                                        <label class="custom-control-label" for="company-radio">Company</label>
                                    </div>
                                </div>
                            </div>
                            @error('role')
                            <div class="alert alert-danger alert-block container">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </fieldset>
                        {{-- End Radio Buttons --}}



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{-- Form --}}
            <div class="col-md-6 intro-img order-md-last order-first aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('assets/img/intro-img.svg')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
@endsection
