@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jobs/app.css')}}">
@endsection

@section('content')


    <div class="container contain">
        <main>
            <h1 class="text-secondary">Applicants:</h1>
            <article>
                <div class="card">
                    <div class="card-body">
                        <div class="job-text">
                            <div class="result-wrp row">
                                <div class="col-md-10 col-sm-8 col-xs-12 ">


                                    <!-- Card content -->
                                    <blockquote class="blockquote">
                                        <p class="h4 text-primary">{{$applicant->name}}</p>
                                        <footer class="blockquote-footer">{{$applicant->job_title}}</footer>
                                    </blockquote>
                                    <div id="location">
                                        <h6 class="text-info h6">Location:</h6>
                                        <p class="h3">{{$applicant->city}}, {{$applicant->country}}</p>
                                    </div>
                                    <hr>
                                    <div id="email">
                                        <h6 class="text-info h6">Email:</h6>
                                        <p class="h3">{{$applicant->email}}</p>
                                    </div>
                                    <hr>
                                    @if($creationDate = $applicant->birth_date)
                                        <div id="creation-date">
                                            <h6 class="text-info h6">Birth Date:</h6>
                                            <em>{{ $creationDate }}</em>
                                        </div>
                                    @endif

                                </div>


                                <div class=" col-md-2  col-sm-4 col-xs-0">
                                    @if($image = $applicant->image)
                                        <img src="{{asset($image->path)}}" class="img-thumbnail" alt="..." >
                                    @else
                                        <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail" alt="...">
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <br>
        </main>



        {{-- Side Bar --}}
        <aside>
            <div class="sidebar-text">
                <h2>Hello, {{Auth::user()->name}}</h2>
                <h1>applicants Search</h1>
                <section>
                    <form action="{{route('search.applicants')}}" method="get">
                        @csrf
                        @method('get')
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="search" class="form-control" placeholder="Search..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    <ul>
                        <li><a href="{{route('search.jobs')}}">Search For Jobs</a></li>
                        <li><a href="{{route('search.companies')}}">Search For Companies</a></li>
                    </ul>
                </section>
            </div>
        </aside>
        {{--End Sidebar--}}
    </div>
@endsection
