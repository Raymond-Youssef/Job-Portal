@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $user->name }}</h1>

            <form method="POST" action="{{route('profile.update')}}">
                @csrf
                @method('PATCH')

                {{-- Personal Information--}}
                <section id="personal-information">
                    <div class="row">
                        <div class="col-lg-8">

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

                                <li>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Password:</label>
                                        <input type="password" name="password" class="form-control" placeholder="**********">
                                    </div>
                                </li>

                                <li>
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <i class="ion-android-checkmark-circle"></i> <label>Password:</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="**********">
                                    </div>
                                </li>

                                <button type="submit" class="btn btn-dark">Edit</button>
                            </ul>


                        </div>

                        {{--Profile Image--}}
                        <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                            <div>
                                @if($image = $user->image)
                                    <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="">
                                @else
                                    <img src="{{asset('assets/img/default_profile.png')}}" alt="" class="img-thumbnail img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </form>



            {{--Profile Image--}}
{{--            <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">--}}
{{--                <div>--}}
{{--                    @if($image = $user->image)--}}
{{--                        <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="">--}}
{{--                    @else--}}
{{--                        <img src="{{asset('assets/img/default_profile.png')}}" alt="" class="img-thumbnail img-fluid">--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}

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
