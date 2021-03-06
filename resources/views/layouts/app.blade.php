<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<body class="body__welcome">
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
        @yield('content')
    </main>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>