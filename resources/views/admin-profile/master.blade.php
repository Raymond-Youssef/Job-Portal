@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $admin->name }}</h1>


            {{-- admin Information--}}
            <section id="admin-information">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="hero-info">
                            <h3 class="text-primary">Admin Information:</h3>
                            <ul>
                                <li><span>E-mail: </span> {{ $admin->email }}</li>
                                @if($city = $admin->city)
                                    <li><span>City: </span> {{ $city }}</li>
                                @endif
                                @if($country = $admin->country)
                                    <li><span>Country: </span> {{ $country }}</li>
                                @endif
                                @if($phone = $admin->phone)
                                    <li><span>Phone:  </span> {{ $phone }}</li>
                                @endif
                                @if($birth_date = $admin->birth_date)
                                    <li><span>Birth Date: </span>{{ $birth_date }}</li>
                                @endif
                            </ul>
                        </div>
                        <div style="position: absolute; bottom: 2rem; right: 2rem;">
                            <a href="{{ route('admin-profile.edit') }}"  class="btn btn-info" role="button">Edit Admin Information</a>
                        </div>
                    </div>

                    {{-- Admin Profile Image--}}
                    <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                        @if($image)
                            <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="Admin Profile Picture" style="height: 18rem; width: auto;">
                        @else
                            <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid" alt="Admin Profile Picture" style="height: 18rem; width: auto;">
                        @endif
                    </div>

                </div>
            </section> {{--End Admin Informations--}}


        </div>
    </div>
@endsection
