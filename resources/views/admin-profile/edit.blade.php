@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $admin->name }}</h1>


            {{-- Admin Information--}}
            <section id="admin-information">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="POST" action="{{route('admin-profile.update')}}">
                            @csrf
                            @method('PATCH')

                            <h3 class="text-primary">Admin Information:</h3>
                            <ul style="list-style:none;">

                                <li>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Admin Name:</label>
                                        <input type="text" name="name" class="form-control" value="{{$admin->name}}" placeholder="Great Person">
                                    </div>
                                </li>

                                <li>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Email:</label>
                                        <input type="email" name="email" class="form-control" value="{{$admin->email}}" placeholder="aaaaaa@bbbbb.ccc">
                                    </div>
                                </li>
                                <li>
                                    @error('creation_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Birth Date:</label>
                                        <input type="date" name="creation_date" class="form-control" value="{{$admin->birth_date}}">
                                    </div>
                                </li>

                                <li>
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>City:</label>
                                        <input type="text" name="city" class="form-control" value="{{$admin->city}}" placeholder="Toronto">
                                    </div>
                                </li>

                                <li>
                                    @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Country:</label>
                                        <input type="text" name="country" class="form-control" value="{{$admin->country}}" placeholder="Canada">
                                    </div>
                                </li>

                                <li>
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Phone Number:</label>
                                        <input type="tel" name="phone" class="form-control" pattern="[0-9]{11}" placeholder="01234567890" value="{{$admin->phone}}">
                                    </div>
                                </li>
                                <button type="submit" class="btn btn-dark">Save Profile</button>
                            </ul>
                        </form>

                        {{-- Password Update --}}
                        <form method="POST" action="{{route('admin-password.update')}}">
                            @csrf
                            @method('PATCH')
                            <h3 class="text-primary">Change Password:</h3>
                            <ul style="list-style:none;">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <li>
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Password:</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </li>

                                <li>
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Password Confirmation:</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password">
                                    </div>
                                </li>
                                <button type="submit" class="btn btn-danger">Update Password</button>
                            </ul>
                        </form>
                    </div>

                    {{--Profile Image--}}

                    <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                        <div>
                            @if($image = $admin->image)
                                <img id="profile_image" src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="" style="height: 18rem; width: auto;">
                            @else
                                <img id="profile_image" src="{{asset('assets/img/default_profile.png')}}"  class="img-thumbnail img-fluid" alt="" style="height: 18rem; width: auto;">
                            @endif
                        </div>
                        <div id="message"></div>
                        <form id="image-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image">
                            <button class="btn btn-secondary" type="submit">Change admin Image</button>
                        </form>

                        @include('shared.imageAJAX')

                    </div>
                </div>
            </section>

            <hr>


        </div>
    </div>
@endsection
