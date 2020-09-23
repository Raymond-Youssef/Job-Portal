@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $user->name }}</h1>


            {{-- Personal Information--}}
            <section id="personal-information">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="POST" action="{{route('profile.update')}}">
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
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Great Person">
                                    </div>
                                </li>

                                <li>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Email:</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="aaaaaa@bbbbb.ccc">
                                    </div>
                                </li>
                                <li>
                                    @error('birth_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Birth Date:</label>
                                        <input type="date" name="birth_date" class="form-control" value="{{$user->birth_date}}">
                                    </div>
                                </li>

                                <li>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Address:</label>
                                        <input type="text" name="address" class="form-control" value="{{$user->address}}" placeholder="90 Sherlock st, Mustafa Kamel WA Bolkli, First Al Raml, Alexandria">
                                    </div>
                                </li>

                                <li>
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Phone Number:</label>
                                        <input type="tel" name="phone" class="form-control" pattern="[0-9]{11}" placeholder="01234567890" value="{{$user->phone}}">
                                    </div>
                                </li>
                                <button type="submit" class="btn btn-dark">Save Profile</button>
                            </ul>
                        </form>
                        <form method="POST" action="{{route('password.update')}}">
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
                            @if($image = $user->image)
                                <img id="profile_image" src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="" style="height: 18rem; width: auto;">
                            @else
                                <img id="profile_image" src="{{asset('assets/img/default_profile.png')}}"  class="img-thumbnail img-fluid" alt="" style="height: 18rem; width: auto;">
                            @endif
                        </div>
                        <div id="message"></div>
                        <form id="image-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image">
                            <button class="btn btn-secondary" type="submit">Change Profile Picture</button>
                        </form>

                        <script>
                            $(document).ready(function (){
                                $('#image-form').on('submit', function (event){
                                    event.preventDefault();
                                    $.ajax({
                                        url:'{{route('image.store')}}',
                                        method: 'POST',
                                        data: new FormData(this),
                                        dataType: 'JSON',
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        success:function (data)
                                        {
                                            $('#message').css('display','block');
                                            $('#message').html(data.message);
                                            $('#message').attr('class',data.class_name);
                                            if(data.success) {
                                                $('#profile_image').attr('src', data.uploaded_image);
                                            }
                                        }
                                    })
                                });
                            });
                        </script>

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
            @endif

        </div>
    </div>
@endsection
