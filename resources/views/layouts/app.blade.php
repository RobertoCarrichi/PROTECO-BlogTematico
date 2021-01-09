<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} - {{config('app.main')}}</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
</head>
<body class="body__welcome">
    <header>
        <nav>
            <a href="{{route('home')}}">
                PROTECO
            </a>
            @guest
            <a href="{{route('login')}}">Iniciar sesión</a>
            <a href="{{route('register')}}">Registrarse</a>
            @else
            <a href="{{route('home')}}">Inicio</a>
            <a href="{{route('cart.index')}}">Carrito</a>
            <div class="dropdown">
                <a href="#">{{Auth::user()->name}}
                    <i class="material-icons">arrow_drop_down</i>
                </a>
                <div class="dropdown-content">
                    @if(Auth::user()->admin)
                    <a href="{{route('AdminCursos.index')}}">Administrador</a>
                    @endif
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
            </div>
            @endguest
        </nav>
    </header>
    @yield('content')
</body>
</html>