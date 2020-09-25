@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jobs/app.css')}}">
@endsection

@section('content')


    <div class="container contain">
        <main>
            <h1 class="text-secondary">Jobs:</h1>
            <article>
                <div class="card">
                    <div class="card-body">
                        <div class="job-text">
                            <div class="result-wrp row">
                                <div class="col-md-10 col-sm-8 col-xs-12 ">


                                    <!-- Card content -->
                                    <blockquote class="blockquote">
                                        <p class="h4 text-primary">{{$job->title}}</p>
                                        <footer class="blockquote-footer">{{$job->city}}, {{$job->country}}</footer>
                                    </blockquote>
                                    <div id="company">
                                        <h6 class="text-info h6">Company:</h6>
                                        <p class="h3">{{$job->company->name}}</p>
                                    </div>
                                    <hr>
                                    <div id="skill">
                                        <h6 class="text-info h6">Skills Required:</h6>
                                        <em>{{ str_replace('',',', str_replace(array('"','[',']'),'',$job->skills) )}}</em>
                                    </div>
                                    <hr>
                                    <div id="description">
                                        <h6 class="text-info h6">Job Description:</h6>
                                        <p>{{$job->description}}</p>
                                    </div>
                                </div>


                                <div class=" col-md-2  col-sm-4 col-xs-0">
                                    @if($image = $job->company->image)
                                        <img src="{{asset($image->path)}}" class="img-thumbnail" alt="..." >
                                    @else
                                        <img src="{{asset('assets/img/default_company_profile.png')}}" class="img-thumbnail" alt="...">
                                    @endif
                                    {{-- Button --}}
                                    <a href="#" class="btn btn-primary" style="position: absolute; right: 2rem; bottom: 2rem;">
                                        Apply
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <br>
        </main>


        {{--Side Bar--}}
        <aside>
            <div class="sidebar-text">
                <h2>Hello, {{Auth::user()->name}}</h2>
                <h1>Jobs Search</h1>
                <section>
                    <form action="{{route('search.jobs')}}" method="get">
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
                        <li><a href="{{route('search.companies')}}">Search For Companies</a></li>
                        <li><a href="{{route('search.applicants')}}">Search For Applicants</a></li>
                    </ul>
                </section>
            </div>
        </aside>
        {{--End Sidebar--}}
    </div>
@endsection
