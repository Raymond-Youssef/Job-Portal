@extends('dashboard.layout')


@section('main')

    <section id="personal-information">
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{route('applicant.update',$applicant)}}">
                    @csrf
                    @method('PATCH')

                    <h3 class="text-primary">Personal Information:</h3>
                    <ul style="list-style:none;">

                        <li>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Full Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$applicant->name}}" placeholder="Great Person">
                            </div>
                        </li>

                        <li>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Email:</label>
                                <input type="email" name="email" class="form-control" value="{{$applicant->email}}" placeholder="aaaaaa@bbbbb.ccc">
                            </div>
                        </li>

                        <li>
                            @error('job_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Job Title:</label>
                                <input type="text" name="job_title" class="form-control" value="{{$applicant->job_title}}" placeholder="Software Engineer">
                            </div>
                        </li>

                        <li>
                            @error('birth_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Birth Date:</label>
                                <input type="date" name="birth_date" class="form-control" value="{{$applicant->birth_date}}">
                            </div>
                        </li>

                        <li>
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>City:</label>
                                <input type="text" name="city" class="form-control" value="{{$applicant->city}}" placeholder="Toronto">
                            </div>
                        </li>

                        <li>
                            @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Country:</label>
                                <input type="text" name="country" class="form-control" value="{{$applicant->country}}" placeholder="Canada">
                            </div>
                        </li>

                        <li>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Phone Number:</label>
                                <input type="tel" name="phone" class="form-control" pattern="[0-9]{11}" placeholder="01234567890" value="{{$applicant->phone}}">
                            </div>
                        </li>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <li>
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </li>

                        <li>
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Password Confirmation:</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                        </li>

                        <button type="submit" class="btn btn-dark">Save Applicant</button>
                    </ul>
                </form>
            </div>
        </div>
    </section>
@endsection
