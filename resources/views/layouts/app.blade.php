<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Colegio Los Soñadores</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- <script src="/resources/js/jquery/dev_jquery-3.7.1.js"></script> --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md" style="background-color: #9ee6bd">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Colegio Los Soñadores
                </a>

            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
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
                        {{-- datos del usuario --}}
                        <li class="nav-item dropdown" style="list-style: none">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ 'S.r@ ' . Auth::user()->name . ' ' . Auth::user()->surname }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('settings') }}"><i class="fas fa-cog"></i>
                                    Ajustes</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
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
    </nav>

    {{-- boton de navbar lateral --}}
    <div class="m-3 mt-2">
        <a class="btn btn-success" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                Menu
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item mb-3" style="list-style: none;">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item mb-3" style="list-style: none;">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                {{-- funcion para agregar los tutores --}}
                <li class="nav-item dropdown mb-3" style="list-style: none;">
                    <div class="dropdown-center">
                        <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Agregar padres
                        </button>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="{{ route('agregar_class_tutor') }}">clasificacion de
                                    padres</a></li>
                            <li><a class="dropdown-item" href="{{ route('ver') }}">agregar padres </a>
                            </li>
                        </ul>
                </li>

                {{-- agregar a las asignarturas --}}
                <li class="nav-item dropdown mb-3" style="list-style: none;">
                    <div class="dropdown-center">
                        <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Agregar maestro
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('subjects') }}">agregar asignatura</a></li>
                            <li><a class="dropdown-item" href="{{ route('teachers') }}">agregar maestro </a></li>
                        </ul>
                </li>

                {{-- agregar estudiantes --}}
                <li class="nav-item dropdown mb-3" style="list-style: none;">
                    <div class="dropdown-center">
                        <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Agregar estudiantes
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('students') }}">alumno</a></li>
                            <li><a class="dropdown-item" href="{{ route('period') }}">semestre</a></li>
                        </ul>
                </li>
            @endguest
        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
