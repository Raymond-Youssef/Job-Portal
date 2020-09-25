<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a></h1>


{{--        <form class="form-inline">--}}
{{--            <input class="form-control mr-sm-2" type="search" placeholder="Search.." aria-label="Search" style="">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
        <nav class="main-nav d-none d-lg-block">
            <ul>

                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                {{--Guest Rotues--}}
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else {{-- User Routes --}}
                @if(Auth::user()->role->title=='user')
                    <li>
                        <a href="{{ route('applications') }}">My Applications</a>
                    </li>
                @elseif(Auth::user()->role->title=='company')
                    <li>
                        <a href="{{ route('job.index') }}">My Jobs</a>
                    </li>
                @elseif(Auth::user()->role->title=='admin')
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @endif
                <li class="drop-down"><a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}</a>
                    <ul> {{-- Profiles depending on user types --}}
                        @if(Auth::user()->role->title=='user')
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    {{ __('Profile') }}
                                </a>
                            </li>
                        @elseif(Auth::user()->role->title=='company')
                            <li>
                                <a class="dropdown-item" href="{{ route('company-profile.index') }}">
                                    {{ __('Company Profile') }}
                                </a>
                            </li>
                        @elseif(Auth::user()->role->title=='admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('admin-profile.index') }}">
                                    {{ __('Admin Profile') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Log-out') }} <span data-feather="log-out"></span>
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endguest
        </nav>
    </div>
    <script src="{{asset('js/dashboard.js')}}"></script>
</header>
