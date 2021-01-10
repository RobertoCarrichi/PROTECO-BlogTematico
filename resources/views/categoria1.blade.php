@extends('layouts.app')
@section('content')
<!-- VA A TENER UN FOR EACH QUE MUESTRE DE FORMA RESUMIDA TODAS LAS PUBLICACIONES -->
<!-- QUE ENTREN EN UNA MISMA CATEGORÍA -->
<h1>BALONCESTO MASCULINO</h1>
<p>
	En esta categoría podrás encontrar las últimas noticias y artículos interesantes de lo que pasa en el mundo
	del baloncesto a nivel mundial y nacional.
</p>
<section class="articulos">
	@foreach($articulos as $articulo)
		@if($articulo->category == "chicos")
		<div class="card articulo">
			<div class="content">
				<h3>{{$articulo->title}}</h3>
				<div class="c-img">
					<img src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}">
				</div>
				<h4><strong>Descripción:</strong></h4>
				<p>{{$articulo->description}}</p>
				Escrito por: <a href="{{route('show.edit',$articulo->author_id)}}">{{$articulo->author_name}}</a>
				<div class="">
					<a href="{{route('show.show', $articulo->id)}}"><button>Ver publicación completa</button></a>
					@if(Auth::user()->admin)
					<a href="{{route('AdminArticulos.edit', $articulo->id)}}"><button>Editar</button></a>
					<form class="d-inline-block" method="POST" action="{{route('AdminArticulos.destroy',$articulo->id)}}">
						@csrf
						@method('DELETE')
						<button class="rojo" type="submit">
							Eliminar
						</button>
					</form>
					@endif
				</div>
			</div>
		</div>
		@endif
	@endforeach
</section>
@endsection