@extends('layouts.dashboard')

@section('main')
    <h2>Companies</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
            <tr>
                <td><a href="{{route('company.show',$company)}}">{{$company->id}}</a></td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>
                    <a href="{{route('company.edit', $company)}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mx-auto " style="width: 30rem;">
        {{ $companies->links() }}
    </div>

@endsection
