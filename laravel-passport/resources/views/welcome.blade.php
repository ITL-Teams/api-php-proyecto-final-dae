<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><img src="BD-Bug.jpg" alt="dB" width="20px" height="20px"></label>
         @if (Route::has('login'))
            <ul>
                @auth
                    <li><a class="active" href="{{ url('/home') }}">Home</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @endauth
            </ul>
            @endif
    </nav>

    <section>
        <div class="content">
            <p style="font-size: 10px">Nota: Esta pagina esta en desarrollo
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
            <div class="title1 m-b-md">
                tecNet
            </div>
            <center><img src="{{asset('css/BD-Bug.jpg')}}" width="200px" height="250px"></center>
            <center>desarrollado por <b>Bug Developers</b></center>
            <br><br>
            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </section>

    </body>
</html>
