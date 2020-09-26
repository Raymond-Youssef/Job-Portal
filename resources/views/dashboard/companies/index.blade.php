@extends('layouts.dashboard')

@section('main')
    <h2>Companies</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Info</th>
            <th>Edit</th>
            <th>Verified</th>
            <th>Blocked</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td><a class="btn btn-primary" href="{{route('company.show',$company)}}">Show</a></td>
                <td>
                    <a href="{{route('company.edit', $company)}}" class="btn btn-secondary">Edit</a>
                </td>
                <td>
                    @if($company->email_verified_at)
                        <span data-feather="award"></span>
                    @endif
                </td>
                <td>
                    @if($company->blocked_at)
                        <span data-feather="slash"></span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="mx-auto " style="width: 30rem;">
        {{ $companies->links() }}
    </div>

@endsection
