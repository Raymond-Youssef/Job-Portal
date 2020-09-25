@extends('layouts.app')

@section('head')
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans">--}}
    <link rel="stylesheet" href="{{asset('css/jobs/app.css')}}">
@endsection


@section('content')
    <div class="container">
        <main>
            @foreach($jobs as $job)
                <article>
                    <div class="card">
                        <div class="card-body">
                            <div class="job-text">
                                <div class="result-wrp row">
                                    <div class="col-md-10 col-sm-8 ">
                                        <blockquote class="blockquote">
                                            <p class="h4 text-primary">{{$job->title}}</p>
                                            <footer class="blockquote-footer">{{$job->city}}, {{$job->country}}</footer>
                                        </blockquote>
                                        <p>{{$job->description}}</p>


                                        <p class="text-success"><h6 class="text-success">Last updated at:</h6>{{$job->updated_at}}</p>
                                    </div>
                                    <div class=" col-md-2  col-sm-4 col-xs-0">
                                        <a href="{{route('job.edit',$job)}}" class="btn btn-success">Edit</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            <div class="mx-auto " style="width: 20rem;">
                {{$jobs->links()}}
            </div>
        </main>

        <aside>
            <div class="sidebar-text">
                <h2>{{Auth::user()->name}}</h2>
                <h4>Number of Jobs: <span class="text-info">{{count($jobs)}}</span></h4>

                <section>
                    <a class="btn btn-primary" href="{{route('job.create')}}">Add a New Job</a>
                </section>
            </div>
        </aside>
    </div>
@endsection
