@extends('layouts.admin')
@section('content')
	<main class="main__index mt-5">
		<section>
			<h2 class="pl-5">Artículos del blog</h2>
			<div class="d-flex justify-content pl-5">
				<a href="{{route('AdminArticulos.create')}}">
					<button type="button" class="btn btn-warning">Agregar un artículo</button>
				</a>
			</div>
		</section>
		<section class="portfolio d-flex mt-4 mb-4 flex-wrap justify-content-center">
        @foreach($articulos as $articulo)
        <div class="col-md-4 col-lg-3">
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
                @if($articulo->category == "varonil")
                <a href="">Baloncesto masculino</a>
                @elseif($articulo->category == "femenil")
                <a href="">Baloncesto femenino</a>
                @else
                <a href="#">Sin categoría</a>
                @endif
                <a href="{{route('show.show', $articulo->id)}}" class="card-link">Ver completo</a>
              </div>
              <div class="card-body d-flex justify-content-center">
                <a class="ml-3 mr-3" href="{{route('AdminArticulos.edit', $articulo->id)}}"><button class="btn btn-light" type="button">Editar</button></a>
      					<form class="d-inline-block" method="POST" action="{{route('AdminArticulos.destroy',$articulo->id)}}">
      						@csrf
      						@method('DELETE')
      						<button class="card-link btn btn-danger" type="submit">
      							Eliminar
      						</button>
      					</form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </section>
	</main>
@endsection