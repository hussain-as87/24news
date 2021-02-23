<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .d3 {
            background-color: #eee;
            width: 300px;
            height: 100px;
            border: 1px dotted black;
            overflow-x: hidden;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('class.create')}}">Create
                            Classification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('class.show')}}">Show Classification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('news.create')}}">Create News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('news.show')}}">Show News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('details.create')}}">Create Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('details.show')}}">Show Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('contact.show')}}">Show Contacts</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4 bg">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success container mt-2 mb-2" role="alert"
                     style="width: 730px; text-align: center">
                    <strong>successfully
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill py-2"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger container mt-2 mb-2 py-2" style="width: 730px; text-align: center">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                </div>
            @endif
        </div>
        @yield('content')
    </main>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
