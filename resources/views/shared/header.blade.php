<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ route('landing-page') }}">{{ config('app.name', 'Laravel') }}</a></h1>
        <nav class="main-nav d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{ route('landing-page') }}">Home</a></li>
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <li class="drop-down"><a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a></a>
                        <ul>

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    {{ __('Profile') }}
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
