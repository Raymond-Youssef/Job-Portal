@extends('layouts.dashboard')

@section('main')
    <h2>Jobs</h2>
    
    @error('job_id')
    <div class="alert alert-danger container">
        {{ $message }}
    </div>
    @enderror

    @error('applicant_id')
    <div class="alert alert-danger container">
        {{ $message }}
    </div>
    @enderror

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Company Name</th>
            <th>Job Title</th>
            <th>Applicant Name</th>
            <th>Resume</th>
            <th>Status</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($applications as $application)
            <tr>
                <td>{{$application->job->company->name}}</td>
                <td>{{$application->job->title}}</td>
                <td>{{$application->applicant->name}}</td>
                <td>{{$application->resume->name}}</td>
                <td>{{$application->status}}</td>
                <td>
                    {{$application->updated_at}}
                </td>
                <td>
                    <form method="POST" action="{{route('dashboard.applications.delete')}}">
                        @csrf
                        <input type="hidden" value="{{$application->job_id}}" name="job_id">
                        <input type="hidden" value="{{$application->applicant_id}}" name="applicant_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mx-auto " style="width: 30rem;">
        {{ $applications->links() }}
    </div>

@endsection
