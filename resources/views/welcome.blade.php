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
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class=" container-fluid">
            <a class="navbar-brand" href="#">Título principal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('main')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index.varonil')}}">Varonil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index.femenil')}}">Femenil</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Regístrate</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('show.edit', Auth::user()->id)}}">{{Auth::user()->name}}</a></li>
                            @if(Auth::user()->admin)
                            <li><a class="dropdown-item" href="{{route('AdminArticulos.index')}}">Entrar a vista de administrador</a></li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
      </nav>
   </header>
   <main>
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
    <h2><strong>Artículos publicados recientemente</strong></h2>
    <!-- AQUÍ VA A IR UN FOREACH CON LOS POST RECIENTES -->
    <section class="articulos">
        @foreach($recientes as $articulo)
        <div class="card articulo">
            <div class="content">
                <h4>{{$articulo->title}}</h4>
                <div class="c-img">
                    <img src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}">
                </div>
                <h4>Descripción:</h4>
                Categoría: 
                @if($articulo->category == "chicos")
                <a href="">Baloncesto masculino</a>
                @elseif($articulo->category == "chicas")
                <a href="">Baloncesto femenino</a>
                @else
                <a href="#">Sin categoría</a>
                @endif
                Escrito por: <a href="{{route('show.edit',$articulo->author_id)}}">{{$articulo->author_name}}</a>
                <div class="">
                    <a href="{{route('show.show', $articulo->id)}}"><button>Ver publicación completa</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </section>

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
