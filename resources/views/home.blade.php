@extends('layouts.app')
@section('content')
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
@endsection
