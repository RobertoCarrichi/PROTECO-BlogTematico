@extends('layouts.app')
@section('content')
@if(Auth::user()->admin)
<div id="c-accionesAdmin">
	<!-- Ya que es un administrador, tiene derecho a eliminar algún artículo del blog -->
	<a href="{{route('AdminArticulos.edit', $articulo->id)}}"><button>Editar</button></a>
	<form method="POST" action="{{route('AdminArticulos.destroy',$articulo->id)}}">
		@csrf
		@method('DELETE')
			<button class="rojo" type="submit">Eliminar</button>
	</form>
</div>
@endif

<section class="articulos">
	<div class="card articulo">
		<div class="content">
			<h3>{{$articulo->title}}</h3>
			<div class="c-img">
				<img src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}">
			</div>
			<h4><strong>Descripción:</strong></h4>
			<p>{{$articulo->description}}</p>
			Categoría: 
			@if($articulo->category == "chicos")
			<a href="">Baloncesto masculino</a>
			@elseif($articulo->category == "chicas")
			<a href="">Baloncesto femenino</a>
			@else
			<a href="#">Sin categoría</a>
			@endif
			Escrito por: <a href="{{route('show.edit',$articulo->author_id)}}">{{$articulo->author_name}}</a>
		</div>
	</div>
</section>

<!-- Contenedor de la seción de comentarios -->
<section class="comentarios">
	<h5>Comentarios:</h5>
	<!-- 
		Aquí abrá un FOREACH que muestre los comentarios que se han realizado de la publicación
	-->
	@foreach($comentarios as $comentario)
		@if($articulo->id == $comentario->article_id)
		<div class="c-comentario">
			<div class="c-comentario-texto">
				<p>
					<!-- Aquí va lo que haya escrito de comentario el usuario. -->
					{{$comentario->comment}}
				</p>
			</div>
			<div class="c-comentario-autor">
				Por:
				<a href="{{route('show.edit',$comentario->user_id)}}">{{$comentario->user_name}}</a>
			</div>
			@if(Auth::user()->admin)
			<form method="POST" action="{{route('comment.destroy',$comentario->id)}}">
				@csrf
				@method('DELETE')
				<button class="danger" type="submit">
					Eliminar comentario.
				</button>
			</form>
			@endif
		</div>
		@endif
	@endforeach
</section>
<div>
	@guest
	<h3>¡Inicia sesión para que puedas comentar este artículo!</h3>
	@else
	<!-- Este es el formulario que se llena para añadir un comentario-->
	<h5>¿Quieres comentar este artículo?</h5>
	<form method="POST" action="{{route('comment.store')}}">
		@csrf
		<input name="article_id" value="{{$articulo->id}}" class="d-none">
		<textarea name="comment" id="" cols="30" rows="10" placeholder="Escribe un comentario..."></textarea>
		<input type="submit" value="Enviar"></input>
	</form>
	@endguest
</div>
@endsection