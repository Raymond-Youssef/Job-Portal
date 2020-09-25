<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('shared.head-content')
    @yield('head')
</head>

<body>
<div id="app" >
    {{-- Header Component --}}
    @include('shared.header')

    <main class="py-4" style="margin-top: 5rem; background: #f5f8fd;">
        {{-- Flash Messages --}}
        @include('shared.flashMessages')
        {{--Here goes the main content--}}
        @yield('content')
    </main>


    <footer id="footer" class="blog-footer section-bg">

            <div class="copyright">
                &copy; Copyright <strong>Job Portal</strong>. All Rights Reserved
            </div>
    </footer>

</div>

{{-- Javascript --}}
@include('shared.javascript')
@yield('JS')
</body>
</html>
