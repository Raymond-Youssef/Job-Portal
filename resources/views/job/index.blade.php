@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/jobs/app.css')}}">
    <style>
        .articles-button{
            position: absolute;
            right: 2rem;
        }
    </style>
@endsection

@section('content')
    <div class="container contain">
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
                                        <hr>
                                        <p><span class="text-success h5">Last Updated At: </span>{{$job->updated_at}}</p>
                                    </div>
                                    <a href="{{route('job.edit',$job)}}" class="btn btn-success articles-button" style="top: 2rem;">Edit Job</a>
                                    <form action="{{route('job.destroy',$job)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger articles-button" onclick="return confirm('Are you sure you want to delete this job?')" style="bottom: 2rem;">Delete Job</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

            {{-- Pagination --}}
            <div class="mx-auto " style="width: 20rem;">
                {{$jobs->links()}}
            </div>

        </main>

        {{--Side Bar--}}
        <aside>
            <div class="sidebar-text">
                <h2>{{Auth::user()->name}}</h2>
                <h4>Number of Jobs: <span class="text-info">{{count($jobs)}}</span></h4>

                <section>
                    <a class="btn btn-primary" href="{{route('job.create')}}">Add a New Job</a>
                    <a class="btn btn-secondary" href="{{route('job.index')}}">Jobs List</a>
                </section>
            </div>
        </aside>


    </div>
@endsection
