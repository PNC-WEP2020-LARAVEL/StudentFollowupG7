<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    <h3>Student Follow Up</h3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::user()->firstName}} {{Auth::user()->lastName}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (Auth::check())
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-2 bg-primary" id="sidebar">
                        <ul class="left-sidebar">
                            <li id="first-li"><a href="" class="text-center" >List of Student</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Admin <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                                    <a href="" class="dropdown-item">Add new user</a>
                                    <a href="" class="dropdown-item">Show all user</a>

                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-10">@yield('content')</div>
                </div>
            </div>
        @endif
        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
</body>
</html>
