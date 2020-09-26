@extends('layouts.dashboard')

@section('main')
    <h2>Applicants</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Job Title</th>
            <th>Email</th>
            <th>Info</th>
            <th>Edit</th>
            <th>Verified</th>
            <th>Blocked</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($applicants as $applicant)
            <tr>
                <td>{{$applicant->name}}</td>
                <td>{{$applicant->job_title}}</td>
                <td>{{$applicant->email}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('applicant.show',$applicant)}}">Show</a>
                </td>
                <td>
                    <a href="{{route('applicant.edit', $applicant)}}" class="btn btn-secondary">Edit</a>
                </td>
                <td>
                    @if($applicant->email_verified_at)
                        <span data-feather="award"></span>
                    @endif
                </td>
                <td>
                    @if($applicant->blocked_at)
                        <span data-feather="slash"></span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mx-auto " style="width: 30rem;">
        {{ $applicants->links() }}
    </div>

@endsection
