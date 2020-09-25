@extends('layouts.app')

@section('content')

</style>
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
                                    @error('job_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Job Title:</label>
                                        <input type="text" name="job_title" class="form-control" value="{{$user->job_title}}" placeholder="Software Engineer">
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
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>City:</label>
                                        <input type="text" name="city" class="form-control" value="{{$user->city}}" placeholder="Toronto">
                                    </div>
                                </li>

                                <li>
                                    @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Country:</label>
                                        <input type="text" name="country" class="form-control" value="{{$user->country}}" placeholder="Canada">
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

                            </ul>
                            <h3 class="text-primary">Cover Letter:</h3>
                            @error('cover_letter')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <ul>
                                    <textarea class="form-control" id="cover-letter" name="cover_letter" rows="3"></textarea>
                                    <label for="cover-letter" class="text-muted">Cover letters should be between 150 and 500 characters</label>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-dark">Save Profile</button>
                        </form>
<<<<<<< HEAD

                        @if($coverLetter = $user->cover_letter)
                <section id="cover-letter">
               
                
                <form method="POST" action="{{route('profile.update')}}">
                
                <h3 class="text-primary">Cover Letter:</h3>  
                <div class="form-row">
                <div class="col-11"> 
                 <textarea class="form-control"  rows="3" style="margin-left:40px;">{{$coverLetter}}</textarea>
                 </div>
  </div>
                 <br><button type="submit" class="btn btn-dark"  style="margin-left:40px;">Edit Cover Letter</button><br>
  
</form>
                    
                </section>
            @endif
=======
                        <hr>
>>>>>>> 123deba6a3b94fd38cf48a9ab01d004591716ba4
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

                        @include('shared.imageAJAX')
                    </div>
                </div>
            </section>

            <hr>

<<<<<<< HEAD
            
=======

>>>>>>> 123deba6a3b94fd38cf48a9ab01d004591716ba4

        </div>
    </div>
@endsection
