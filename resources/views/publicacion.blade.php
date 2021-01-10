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
<!-- ESTA VISTA MOSTRARÁ DE FORMA DETALLADA UNA PUBLICACIÓN DEL BLOG TEMÁTICO -->
<h1>Título del post</h1>
<!-- Contenedor de la imagen principal -->
<div id="c-publicacion-img">
	<img src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}>
</div>
<!-- Contenedor del contenido del texto -->
<div id="c-publicacion-texto">
	<h5>Descripción:</h5>
	<div id="c-texto">
		<p>{{$articulo->description}}</p>
	</div>
	<div id="c-autor">
		<h5>Autor: <a href="">{{$autor->name}}</a></h5>
	</div>
</div>
<!-- Contenedor de la seción de comentarios -->
<h5>Comentarios:</h5>
<div id="contenedor-comentarios">
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
</div>
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