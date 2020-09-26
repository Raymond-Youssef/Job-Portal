@extends('layouts.dashboard')

@section('main')
    <div class="container">
        <div class="col-xl-10 offset-xl-1">
            <h1 class="display-4 text-center">{{ $company->name }}</h1>


            {{-- Personal Information--}}
            <section id="personal-information">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="hero-info">
                            <h3 class="text-primary">Personal Information:</h3>
                            <ul>
                                <li><span>E-mail: </span> {{ $company->email }}</li>
                                @if($job_title = $company->job_title)
                                    <li><span>Job Title: </span> {{ $job_title }}</li>
                                @endif
                                @if($city = $company->city)
                                    <li><span>City: </span> {{ $city }}</li>
                                @endif
                                @if($country = $company->country)
                                    <li><span>Country: </span> {{ $country }}</li>
                                @endif
                                @if($phone = $company->phone)
                                    <li><span>Phone:  </span> {{ $phone }}</li>
                                @endif
                                @if($birth_date = $company->birth_date)
                                    <li><span>Creation Date: </span>{{ $birth_date }}</li>
                                @endif
                            </ul>
                            <form method="POST" action="{{route('company.block', $company)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="position: absolute; bottom: 2rem; right: 7rem;">Block</button>
                            </form>
                            <form method="POST" action="{{route('company.verify',$company)}}">
                                @csrf
                                <button type="submit" class="btn btn-success" style="position: absolute; bottom: 2rem; right: 2rem;">Verify</button>
                            </form>
                        </div>
                    </div>

                    {{--Profile Image--}}
                    <div class="col-md-4 intro-img order-last aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                        @if($company->image)
                            <img src="{{asset($company->image->path)}}" class="img-thumbnail img-fluid" alt="Profile Picture" style="height: 18rem; width: auto;">
                        @else
                            <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail img-fluid" style="height: 18rem; width: auto;">
                        @endif
                    </div>

                </div>
            </section> {{--End Personal Informations--}}

            <hr>
        </div>
    </div>
@endsection

