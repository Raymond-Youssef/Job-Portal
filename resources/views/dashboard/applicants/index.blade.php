@extends('layouts.dashboard')

@section('main')
    <h2>Applicants</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Email</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($applicants as $applicant)
            <tr>
                <td><a href="{{route('applicant.show',$applicant)}}">{{$applicant->id}}</a></td>
                <td>{{$applicant->name}}</td>
                <td>{{$applicant->job_title}}</td>
                <td>{{$applicant->email}}</td>
                <td>
                    <a href="{{route('applicant.edit', $applicant)}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mx-auto " style="width: 30rem;">
        {{ $applicants->links() }}
    </div>

@endsection
