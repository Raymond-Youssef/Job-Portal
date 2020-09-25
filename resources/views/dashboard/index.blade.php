@extends('layouts.dashboard')

@section('main')
    <h1 class="display-1">Hello,</h1>
    <h2 class="display-3">Welcome To Your Dashboard!</h2>
    <h2 class="display-4">{{Auth::user()->name}}</h2>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>
@endsection
