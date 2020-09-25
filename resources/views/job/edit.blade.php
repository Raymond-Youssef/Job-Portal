@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="form">
            <h2 class="display-4">Edit Job: {{ $job->title }}</h2>
            <form method="POST" action="{{route('job.update',$job)}}">
                @csrf
                @method('PATCH')

                <div class="form-group row">
                    <label for="job-title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>
                    <div class="col-md-6">
                        <input id="job-title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $job->title }}" required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="job-description" class="col-md-4 col-form-label text-md-right">{{ __('Job Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="job-description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $job->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

                    <div class="col-md-6">
                        <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ str_replace('',',', str_replace(array('"','[',']'),'',$job->skills) )}}" autocomplete="skills" autofocus>
                        <small class="form-text text-muted">Enter skills separated by commas ","</small>
                        @error('skills')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label  text-md-right">{{ __('City') }}</label>

                    <div class="col-md-2">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $job->city }}" required autocomplete="city" autofocus>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="country" class="row-cols-sm-5  col-form-label text-md-right">{{ __('Country') }}</label>
                    <div class="col-md-2">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $job->country }}" required autocomplete="country" autofocus>
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-lg btn-primary">
                            {{ __('Edit Job') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> {{-- Form --}}
@endsection

