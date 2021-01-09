<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} - {{config('app.main')}}</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
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
            <div class="dropdown">
                <a href="{{route('profile')}}">{{Auth::user()->name}}
                    <i class="material-icons">arrow_drop_down</i>
                </a>
                <div class="dropdown-content">
                    @if(Auth::user()->admin)
                    <a href="">Administrador</a>
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
    <main>
        @yield('content')
    </main>
    <footer>
        
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>