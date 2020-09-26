@extends('layouts.app')
@section('content')
    <div class="container">

        @if(count($applications)!=0)
            @foreach($applications as $application)
                <div class="card w-75">
                    <div class="card-body">
                        <div class="job-text">
                            <div class="result-wrp row">
                                <div class="col-md-10 col-sm-8 col-xs-12 ">
                                    <blockquote class="blockquote">
                                        <p class="h4 text-primary">{{$application->job->title}}</p>
                                        <footer class="blockquote-footer">{{$application->job->city}}, {{$application->job->country}}</footer>
                                    </blockquote>

                                    <h6>Company:</h6>
                                    <footer class="h3">{{$application->job->company->name}}</footer>
                                    @if($application->job->company->email_verified_at)
                                        Verified Company <span data-feather="award"></span>
                                    @endif
                                    <hr>
                                    @if($application->status == 'Applied')<p class="h5 text-info">Applied</p>
                                    @elseif($application->status == 'Accepted')
                                        <p class="h5 text-success">Accepted</p>
                                    @else
                                        <p class="h5 text-danger">Rejected</p>
                                    @endif
                                </div>
                                <div class=" col-md-2  col-sm-4 col-xs-0">
                                    @if($image = $application->job->company->image)
                                        <img src="{{asset($image->path)}}" class="img-thumbnail" alt="..." >
                                    @else
                                        <img src="{{asset('assets/img/default_company_profile.png')}}" class="img-thumbnail" alt="...">
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        @endif
    </div>
    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection
