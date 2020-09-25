@extends('layouts.app')
@section('head')
    <style>
        .search-field{
            height:50px;
            padding:10px;
            border:none;
            outline:none;
        }
        .job{
            width:300px;

        }
    </style>
@endsection

@section('content')
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Find Your Dream Job From Top-Class Companies</h2>
                    <div>
                        <form action="{{route('search.jobs')}}" method="GET">
                            @csrf
                            @method('GET')
                            <input type="search" class="search-field job" placeholder="Explore Jobs.." name="search">
                            <button class="btn btn-get-started" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{asset('assets/img/features-1.svg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">


                <div class="col">
                    <a href="{{route('search.jobs')}}">
                        <div class="box">
                            <div class="icon" style="background: #fceef3;"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
                            <h4 class="title">Search For Opportunities</h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="{{route('search.companies')}}">
                        <div class="box">
                            <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
                            <h4 class="title">Search For Companies</h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="{{route('search.applicants')}}">
                        <div class="box">
                            <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                            <h4 class="title">Search For Applicants</h4>
                        </div>
                    </a>
                </div>
                @auth
                    @if(Auth::user()->role->title=='user')
                        <div class="col">
                            <form method="GET" action="{{route('search.jobs')}}">
                                <input type="hidden" name="search" value="{{Auth::user()->job_title}}">
                                <button style="background: transparent; border-style: none; outline: none;">
                                    <div class="box">
                                        <div class="icon" style="background: #eafde7;"><i class="fa fa-map-marker" style="font-size:36px"></i></div>
                                        <h4 class="title">Recommended Jobs For You</h4>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </section><!-- End Services Section -->

@endsection
