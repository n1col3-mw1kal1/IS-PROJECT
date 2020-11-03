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
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-table-master/dist/bootstrap-table.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/jquery/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/jquery/jquery.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/jquery/fontawesome.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-table-master/dist/bootstrap-table.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
         
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <div class="d-inline-flex">
                        <a href="{{URL::to('create/farmer')}}" class="nav-link">Create</a>
                        <a href="{{URL::to('/')}}" class="nav-link">Users</a>
                        <a href="{{URL::to('farmers')}}" class="nav-link">Farmers</a>
                        <a href="{{URL::to('vets')}}" class="nav-link">VETs</a>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @can('is_admin', Auth::user())
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endcan

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
