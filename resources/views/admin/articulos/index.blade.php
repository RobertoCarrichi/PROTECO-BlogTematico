@extends('layouts.admin')
@section('content')
	<main class="main__index">
		<h2>Artículos del blog</h2>
		<a href="{{route('AdminArticulos.create')}}">
			<button class="verde">Agregar un artículo</button>
		</a>
		<section class="articulos">
			@foreach($articulos as $articulo)
			<div class="card">
				<div class="content">
					<h3>{{$articulo->title}}</h3>
					<div class="c-img">
						<img src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}">
					</div>
					<h4><strong>Descripción:</strong></h4>
					<p>{{$articulo->description}}</p>
					<div class="">
						Categoría: 
						@if($articulo->category == "chicos")
						<a href="{{route('index.varonil')}}">Baloncesto masculino</a>
						@elseif($articulo->category == "chicas")
						<a href="{{route('index.femenil')}}">Baloncesto femenino</a>
						@else
						Sin categoría
						@endif
						Escrito por: <a href="{{route('show.edit',$articulo->author_id)}}">{{$articulo->author_name}}</a>
					</div>
					<a href="{{route('show.show', $articulo->id)}}"><button>Ver publicación completa</button></a>
					<a href="{{route('AdminArticulos.edit', $articulo->id)}}"><button>Editar</button></a>
					<form class="d-inline-block" method="POST" action="{{route('AdminArticulos.destroy',$articulo->id)}}">
						@csrf
						@method('DELETE')
						<button class="rojo" type="submit">
							Eliminar
						</button>
					</form>
				</div>
			</div>
			@endforeach
		</section>
	</main>
@endsection