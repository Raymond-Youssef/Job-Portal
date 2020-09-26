@extends('layouts.dashboard')

@section('main')

    <section id="personal-information">
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{route('company.update',$company)}}">
                    @csrf
                    @method('PATCH')

                    <h3 class="text-primary">Personal Information:</h3>
                    <ul style="list-style:none;">

                        <li>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Company Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$company->name}}" placeholder="Great Person">
                            </div>
                        </li>

                        <li>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Email:</label>
                                <input type="email" name="email" class="form-control" value="{{$company->email}}" placeholder="aaaaaa@bbbbb.ccc">
                            </div>
                        </li>

                        <li>
                            @error('creation_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Creation Date:</label>
                                <input type="date" name="creation_date" class="form-control" value="{{$company->birth_date}}">
                            </div>
                        </li>

                        <li>
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>City:</label>
                                <input type="text" name="city" class="form-control" value="{{$company->city}}" placeholder="Toronto">
                            </div>
                        </li>

                        <li>
                            @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Country:</label>
                                <input type="text" name="country" class="form-control" value="{{$company->country}}" placeholder="Canada">
                            </div>
                        </li>

                        <li>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <i class="ion-android-checkmark-circle"></i> <label>Phone Number:</label>
                                <input type="tel" name="phone" class="form-control" pattern="[0-9]{11}" placeholder="01234567890" value="{{$company->phone}}">
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




                        <button type="submit" class="btn btn-dark">Save Company</button>
                    </ul>


                </form>
            </div>

            {{--Profile Image--}}

            <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                <div>
                    @if($image = $company->image)
                        <img id="profile_image" src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="" style="height: 18rem; width: auto;">
                    @else
                        <img id="profile_image" src="{{asset('assets/img/default_profile.png')}}"  class="img-thumbnail img-fluid" alt="" style="height: 18rem; width: auto;">
                    @endif
                </div>
                <div id="message"></div>
                <form id="image-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <button class="btn btn-secondary" type="submit">Change Profile Picture</button>
                </form>

                @include('shared.imageAJAX')
            </div>
        </div>
    </section>
@endsection
