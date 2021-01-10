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
	<h4>Descripción:</h4>
	<div id="c-texto">
		<p>{{$articulo->description}}</p>
	</div>
	<div id="c-autor">
		<h4>Autor: <a href="">{{$autor->name}}</a></h4>
	</div>
</div>
<!-- Contenedor de la seción de comentarios -->
<h4>Comentarios:</h4>
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
				<!-- <form method="GET" action="{{route('profile')}}">
					@csrf
					<input name="user_id" value="{{$comentario->user_id}}" class="d-none">
					<input type="submit" value="{{$comentario->user_name}}"></input>
				</form> -->
			</div>
		</div>
		@endif
	@endforeach
</div>
<div>
	@guest
	<h3>¡Inicia sesión para que puedas comentar este artículo!</h3>
	@else
	<!-- Este es el formulario que se llena para añadir un comentario-->
	<form method="POST" action="{{route('comment.store')}}">
		@csrf
		<textarea name="comment" id="" cols="30" rows="10" placeholder="Escribe un comentario..."></textarea>
		<input name="article_id" value="{{$articulo->id}}" class="d-none">
		<input type="submit" value="Enviar"></input>
	</form>
	@endguest
</div>
@endsection