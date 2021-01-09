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
    <nav id="navbar">
      <a href="">Inicio</a>
      <a href="">Categoría 1</a>
      <a href="">Categoría 2</a>
      <!-- ESTAS DOS OPCIONES DEPENDERÁN SI EL USUARIO ESTÁ AUTENTICADO O SI NO. -->
      <a href="{{route('register')}}">Regístrate</a>
      <a href="">Inicia sesión</a>
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
