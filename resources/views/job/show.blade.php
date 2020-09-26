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


            {{-- Applications --}}
            <h1 class="">Applications On This Job:</h1>
            @foreach($applications as $application)
                <article>
                    <div class="card">
                        <div class="card-body">
                            <div class="job-text">
                                <div class="result-wrp row">
                                    <div class="col-md-8 ">
                                        <blockquote class="blockquote">
                                            <p class="h4 text-primary">{{$application->applicant->name}}</p>
                                            <footer class="blockquote-footer">Job Title: {{$application->applicant->job_title}}</footer>
                                        </blockquote>
                                        @if($application->applicant->email_verified_at)
                                            <p class="text-success">Verified Applicant <span data-feather="award"></span></p>
                                        @endif
                                        <hr>
                                        <div id="email">
                                            <h6 class="text-info h6">Email:</h6>
                                            <em>{{$application->applicant->email}}</em>
                                        </div>
                                        <hr>
                                        <div id="cover-letter">
                                            <h6 class="text-info h6">Cover Letter:</h6>
                                            <p>{{$application->applicant->cover_letter}}</p>
                                        </div>
                                        <hr>
                                        <div id="resume">
                                            <h6 class="text-info h6">Resume:</h6>
                                            <p>{{$application->resume->name}}</p>
                                            <p class="text-right"><a class="btn btn-info" href="{{asset($application->resume->path)}}">Download Resume</a></p>
                                        </div>
                                        <hr>
                                        <p><span class="text-success h5">Applied At: </span>{{$application->updated_at}}</p>
                                    </div>
                                    <div class=" col-md-4">
                                        @if($image = $application->applicant->image)
                                            <img src="{{asset($image->path)}}" class="img-thumbnail" alt="..." >
                                        @else
                                            <img src="{{asset('assets/img/default_profile.png')}}" class="img-thumbnail" alt="...">
                                        @endif
                                    </div>
                                    <div style="position: absolute; bottom: 2rem; right:15rem;">
                                        @if($application->status == 'Applied')
                                            <p class="h5 text-info">Applied</p>
                                        @elseif($application->status == 'Accepted')
                                            <p class="h5 text-success">Accepted</p>
                                        @else
                                            <p class="h5 text-danger">Rejected</p>
                                        @endif
                                    </div>
                                </div>
                                <div class=" result-wrp row">
                                    <form method="POST" action="{{route('application.updateStatus')}}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="applicant_id" value="{{$application->applicant_id}}">
                                        <input type="hidden" name="job_id" value="{{$job->id}}">
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="status-radio-1" name="status" class="custom-control-input" value="Accepted">
                                                <label class="custom-control-label" for="status-radio-1">Accepted</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="status-radio-2" name="status" class="custom-control-input" value="Rejected">
                                                <label class="custom-control-label" for="status-radio-2">Rejected</label>
                                            </div>
                                            @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success articles-button"  style="bottom: 2rem;">Change Status</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

            {{--Pagination--}}
            <div class="mx-auto " style="width: 20rem;">
                {{$applications->links()}}
            </div>

        </main>

        {{--Side Bar--}}
        <aside>
            <div class="sidebar-text">
                <h2>{{Auth::user()->name}}</h2>

                <section>
                    <a class="btn btn-primary" href="{{route('job.create')}}">Add a New Job</a>
                    <a class="btn btn-secondary" href="{{route('job.index')}}">Jobs List</a>
                </section>
            </div>
        </aside>


        <script src="{{asset('js/dashboard.js')}}"></script>
    </div>
@endsection
