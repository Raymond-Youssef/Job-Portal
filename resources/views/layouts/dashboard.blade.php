<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
@include('shared.head-content')
<!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{route('home')}}">Job Portal</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard')}}">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('applicant.index')}}">
                            <span data-feather="users"></span>
                            Applicants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="briefcase"></span>
                            Company
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span><span data-feather="bar-chart-2"></span> Statistics</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item nav-link">
                        <span data-feather="info"></span>
                        Applicants Number: {{count(\App\Models\Applicant::all())}}
                    </li>
                    <li class="nav-item nav-link">
                        <span data-feather="info"></span>
                        Companies Number: {{count(\App\Models\Company::all())}}
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="margin-top: 5rem;">
            @yield('main')
        </main>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>
