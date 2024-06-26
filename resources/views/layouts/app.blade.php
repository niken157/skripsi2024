<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset ('logi/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('logi/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('logi/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('logi/css/style.css')}}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('logi/css/style.css')}}">
   <!-- Scripts -->
   <script src="{{ asset('logi/js/jquery.min.js')}}"></script>
   <script src="{{ asset('logi/js/popper.js')}}"></script>
   <script src="{{ asset('logi/js/bootstrap.min.js')}}"></script>
   <script src="{{ asset('logi/js/main.js')}}"></script>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Login</title>
  </head>
  <body>
    <style>
        body {
            background-color: rgb(199, 135, 75);
        }
        .height {
        height: 480px;
    }
        /* .container {background-color: rgb(166, 197, 218);} */
    </style>
  <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SIUSEK') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main>
            @yield('content')
        </main>
    </div>
  </body>
</html>
<script src="{{ asset('logi/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('logi/js/popper.min.js')}}"></script>
    <script src="{{ asset('logi/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('logi/js/main.js')}}"></script>
