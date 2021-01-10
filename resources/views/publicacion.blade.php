@extends('layouts.app')
@section('content')
<!-- ESTA VISTA MOSTRARÁ DE FORMA DETALLADA UNA PUBLICACIÓN DEL BLOG TEMÁTICO -->
<h1>Título del post</h1>
<!-- Contenedor de la imagen principal -->
<div id="c-publicacion-img">
	<img src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}>
</div>
<!-- Contenedor del contenido del texto -->
<div id="c-publicacion-texto">
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
				<a href="{{route('showController.profile',$comentario->user_id)}}">
					Autor: {{$comentario->user_id}}
					<!-- Aquí va el nombre del usuario que realizó el comentario. -->
					<!-- Es un enlace para ver el perfil del usuario. -->
				</a>				
			</div>
		</div>
		@endif
	@endforeach
</div>
<!-- Contenedor de la sección donde se puede ingresar un comentario -->
<!-- 
	1. Puede tomarse la opción que si el usuario se encuentra autenticado se muestre
	   esta sección.
	2. La otra opción es que se muestre esta sección esté autenticado o no, pero al momento
	   de publicar se verifique si está autenticado.
 -->
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