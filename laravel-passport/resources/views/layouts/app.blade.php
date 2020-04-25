<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico?v=2') }}">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css' )}}">
    </head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/brand-logo-head.png') }}" alt="brand-logo" height="40px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @guest
                    @else
                         @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Soporte</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Servicio
                                    </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Configurar un dispositivo</a>
                                    <a class="dropdown-item" href="#">Panel de dispositivos</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Mi cuenta</a>
                                </div>
                    </li>
                            @endauth
                        @endif
                    @endguest
                </ul>
                <ul class="navbar-nav">
                    @guest
                         @if (Route::has('login'))
                            @auth
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endauth
                        @endif
                    @else
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                <label class="text-light" for="logout" style="padding-right: 1em;">
                                    @csrf

                                    Hola {{ Auth::user()->name }}
                                </label>
                                <input name="logout" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Cerrar Sesión">
                            </form>                            
                        </li>
                    @endguest
                <ul>
            </div>
        </nav>

        <section>
            @yield('content')
        </section>
</body>
</html>
