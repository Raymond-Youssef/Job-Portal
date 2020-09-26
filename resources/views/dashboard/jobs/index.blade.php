@extends('layouts.dashboard')

@section('main')
    <h2>Jobs</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Skills</th>
            <th>City</th>
            <th>Country</th>
            <th>Company</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td>{{$job->title}}</td>
                <td><em>{{str_replace('',',', str_replace(array('"','[',']'),'',$job->skills))}}</em></td>
                <td>{{$job->city}}</td>
                <td>{{$job->country}}</td>
                <td>
                    {{$job->company->name}}
                </td>
                <td>
                    <form method="POST" action="{{route('dashboard.jobs.delete', $job)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mx-auto " style="width: 30rem;">
        {{ $jobs->links() }}
    </div>

@endsection
