@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $company->name }}</h1>


            {{-- Company Information--}}
            <section id="company-information">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="hero-info">
                            <h3 class="text-primary">Company Information:</h3>
                            <ul>
                                @if($company->email_verified_at)
                                    <li>
                                        Verified Company <span data-feather="award"></span>
                                    </li>
                                @endif
                                <li><span>E-mail: </span> {{ $company->email }}</li>
                                @if($city = $company->city)
                                    <li><span>City: </span> {{ $city }}</li>
                                @endif
                                @if($country = $company->country)
                                    <li><span>Country: </span> {{ $country }}</li>
                                @endif
                                @if($phone = $company->phone)
                                    <li><span>Phone:  </span> {{ $phone }}</li>
                                @endif
                                @if($creation_date = $company->birth_date)
                                    <li><span>Creation Date: </span>{{ $creation_date }}</li>
                                @endif
                            </ul>
                        </div>
                        <div style="position: absolute; bottom: 2rem; right: 2rem;">
                            <a href="{{ route('company-profile.edit') }}"  class="btn btn-info" role="button">Edit Company Information</a>
                        </div>
                    </div>

                    {{-- Company Profile Image--}}
                    <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                        @if($image)
                            <img src="{{asset($image->path)}}" class="img-thumbnail img-fluid" alt="Company Profile Picture" style="height: 18rem; width: auto;">
                        @else
                            <img src="{{asset('assets/img/default_company_profile.png')}}" class="img-thumbnail img-fluid" alt="Company Profile Picture" style="height: 18rem; width: auto;">
                        @endif
                    </div>

                </div>
            </section> {{--End Company Informations--}}


        </div>
    </div>

    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection
