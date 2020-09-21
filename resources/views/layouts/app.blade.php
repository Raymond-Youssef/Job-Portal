<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('shared.head-content')
</head>

<body>
    <div id="app">
        {{-- Header Component --}}
        @include('shared.header')

        <main class="py-4" style="margin-top: 3.5rem;">
            @include('shared.flashMessages')
            {{--Here goes the main content--}}
            @yield('content')
        </main>


        <footer id="footer" class="blog-footer section-bg">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Job Portal</strong>. All Rights Reserved
                </div>
            </div>
        </footer>

    </div>

    {{-- Javascript --}}
    @include('shared.javascript')
</body>
</html>
