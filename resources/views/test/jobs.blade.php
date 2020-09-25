@extends('layouts.app')


@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form">
                    <h2 class="display-4">{{ __('Job Announcement') }}</h2>
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job title') }}</label>

                            <div class="col-md-6">
                                <input id="job-title" type="text" class="form-control @error('job-title') is-invalid @enderror" name="job-tile" value="{{ old('job-title') }}" required autocomplete="job-title" autofocus>

                                @error('job-title')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job_description" class="col-md-4 col-form-label text-md-right">{{ __('Job description') }}</label>

                            <div class="col-md-6">
                                <textarea id="job-description" class="form-control @error('job-description') is-invalid @enderror" name="job-description" value="{{ old('job-decription') }}" required autocomplete="job-description" autofocus>
                                </textarea>

                                @error('job-description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

                            <div class="col-md-6">
                                <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') }}" required autocomplete="skills" autofocus>

                                @error('skills')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Announce') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{-- Form --}}

        </div>
    </div>
@endsection
