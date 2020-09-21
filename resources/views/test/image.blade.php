@extends('layouts.app')

@section('content')
    <div id="footer" class="section-bg">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form">

                            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="image" id="input-file">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
