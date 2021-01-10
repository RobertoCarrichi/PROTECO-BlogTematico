<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{config('app.name')}} - {{config('app.main')}}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <link rel="stylesheet" href="{{asset('css/mediaqueries.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-nav">
            <a href="{{route('main')}}">INICIO</a>
            <a href="">Chicos</a>
            <a href="">Chicas</a>
            @guest  
            <a href="{{route('login')}}">Iniciar sesión</a>
            <a href="{{route('register')}}">Registrarse</a>
            @else
            <div class="dropdown">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{route('show.index',Auth::user()->id)}}">{{Auth::user()->name}}</a>    
                        @if(Auth::user()->admin)
                        <a href="{{route('AdminArticulos.index')}}">Administrador</a>
                        @endif
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                </div>
            </div>
            @endguest
        </nav>
    </header>
<main>
    <h1>Viajes</h1>
    <!-- AQUÍ VA UN CARROUSEL CON ALGUNAS FOTOS QUE ENTRAN EN LA TEMÁTICA DEL BLOG -->
    <div id="c-carousel-principal">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('img/carousel-welcome-1.jpg')}}" class="d-block w-100" alt="Foto 1">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/carousel-welcome-2.jpg')}}" class="d-block w-100" alt="Foto 2">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/carousel-welcome-3.jpg')}}" class="d-block w-100" alt="Foto 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </a>
</div>
</div>
<h1>Posts Recientes</h1>
<!-- AQUÍ VA A IR UN FOREACH CON LOS POST RECIENTES -->
<div class="publicacion">

</div>

<!-- GOOGLE MAPS -->
<div id="c-maps">

</div>

<!-- YOUTUBE -->
<div id="c-youtube">

</div>

<!-- FACEBOOK -->
<div id="c-facebook">

</div>
</main>
<footer>

</footer>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
