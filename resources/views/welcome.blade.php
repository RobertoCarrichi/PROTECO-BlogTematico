<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{config('app.name')}} - {{config('app.main')}}</title>

  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Pacifico:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body id="page-top">
   <header>
      <nav id="mainNav" class="navbar navbar-expand bg-secondary text-uppercase fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('main')}}">Basketball</a>
            <div class="collapse navbar-collapse d-flex justify-content-end">
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto text-white">
                  <li class="nav-item mx-3 mx-lg-2">
                    <a id="a-varonil"  class="nav-link active py-3 px-2 px-lg-3 rounded js-scroll-trigger" href="{{route('index.varonil')}}">Varonil</a>
                  </li>
                  <li class="nav-item mx-3 mx-lg-2">
                    <a class="nav-link active py-3 px-2 px-lg-3 rounded js-scroll-trigger" href="{{route('index.femenil')}}">Femenil</a>
                  </li>
                  @guest
                  <li class="nav-item mx-3 mx-lg-2">
                    <a class="nav-link active py-3 px-2 px-lg-3 rounded js-scroll-trigger" href="{{route('login')}}">Iniciar sesión</a>
                  </li>
                  <li class="nav-item mx-3 mx-lg-2">
                    <a class="nav-link active py-3 px-2 px-lg-3 rounded js-scroll-trigger" href="{{route('register')}}">Regístrate</a>
                  </li>
                  @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active mx-3 mx-lg-2 py-3 px-2 px-lg-3 rounded js-scroll-trigger" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li class="mx-3 mx-lg-2">
                        <a class="dropdown-item py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('show.edit', Auth::user()->id)}}">Ver perfil</a>
                      </li>
                      @if(Auth::user()->admin)
                      <li class="mx-3 mx-lg-2"><a class="dropdown-item py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('AdminArticulos.index')}}">Administrador</a></li>
                      @endif
                      <li class="mx-3 mx-lg-2">
                        <a class="dropdown-item py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
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
        </div>
      </nav>
   </header>
   <main>
   <!-- AQUÍ VA UN CARROUSEL CON ALGUNAS FOTOS QUE ENTRAN EN LA TEMÁTICA DEL BLOG -->
    <section class="page-section">
       <div class="container d-flex align-items-center flex-column">
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
    </section>
    <h2 class="text-center"><strong>Artículos publicados recientemente</strong></h2>
    <!-- AQUÍ VA A IR UN FOREACH CON LOS POST RECIENTES -->
    <section class="portfolio d-flex mt-4 mb-4 flex-wrap justify-content-center">
        @foreach($recientes as $articulo)
        <div class="col-md-4 col-lg-3 my-2">
          <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <img src="{{asset("img/$articulo->img")}}" class="card-img-top" alt="reciente02">
              </div>
              <div class="card-body">
                <h5 class="card-title text-center" style="color: #ffff">{{$articulo->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted text-center">Escrito por: <a class="card-link" href="{{route('show.edit',$articulo->author_id)}}">{{$articulo->author_name}}</a></h6><br>
                <p class="card-text text-center" style="color: #ffff">{{$articulo->description}}</p>
                <h6 class="d-inline-block card-subtitle text-muted">Categoría:</h6>
                @if($articulo->category == "chicos")
                <a href="">Baloncesto masculino</a>
                @elseif($articulo->category == "chicas")
                <a href="">Baloncesto femenino</a>
                @else
                <a href="#">Sin categoría</a>
                @endif
                <a href="{{route('show.show', $articulo->id)}}" class="card-link">Ver completo</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </section>
   </main>

   <section class="page-section bg-primary text-white">
    <h2 class="text-uppercase text-center">Recopilaciones</h2><br>
    <div class="w-100 container d-flex justify-content-center">
      <!--Youtube-->
      <div class="row d-flex justify-content-between">
        <div class="col-12 col-md-5 text-center">
          <iframe width="430" height="315" src="https://www.youtube.com/embed/mjjksztJKbw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-12 col-md-6 text-center">
          <iframe width="430" height="315" src="https://www.youtube.com/embed/ASGHq_WtRho" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section" id="contact">
    <div class="container justify-content-center">
      <!--Twitter-->
      <div>
        <div class="row">
          <blockquote class="col-12 col-md-5 twitter-tweet ml-auto"><p lang="en" dir="ltr">Today’s conjunction of the planets is set for us to reach our highest vibration. ✨ If you can, today meditate and set intention for yourself and loved ones. Stay positive in your thoughts, words and actions. Ask for balance and love. ❤️✨</p>&mdash; LeBron James (@KingJames) <a href="https://twitter.com/KingJames/status/1341133976166047744?ref_src=twsrc%5Etfw">December 21, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          <blockquote class="col-12 col-md-5 twitter-tweet ml-auto"><p lang="en" dir="ltr">Onyeka Okongwu keeps the memory of his older brother Nnamdi alive through the bracelet he wears, his jersey number and most importantly his play on the court. On USC&#39;s star freshman: <a href="https://t.co/zjX7Aj2YHp">https://t.co/zjX7Aj2YHp</a> <a href="https://t.co/DK9HxcR8qO">pic.twitter.com/DK9HxcR8qO</a></p>&mdash; Thuc Nhi Nguyen (@thucnhi21) <a href="https://twitter.com/thucnhi21/status/1212458134456848384?ref_src=twsrc%5Etfw">January 1, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
      <footer class="text-center">
    </div>
  </section>
  <section>
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <!-- Footer Location-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"></h4>
            <p class="lead mb-0"><br /></p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <br><br><br>
            <h2 class="text-uppercase mb-4 mb-0">Síguenos en nuestras redes</h2>
            <br><br>
            <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/conicol"><i class="fab fa-fw fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/between_d_bars/"><i class="fab fa-fw fa-instagram"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/Conic_ol"><i class="fab fa-fw fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </footer>
  </section>

<script src="{{asset('js/app.js')}}"></script>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- iniciar form JS-->
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/iniciar_me.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
