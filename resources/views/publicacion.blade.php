@extends('layouts.app')
@section('content')
<!-- ESTA VISTA MOSTRARÁ DE FORMA DETALLADA UNA PUBLICACIÓN DEL BLOG TEMÁTICO -->
<h1>Título del post</h1>
<!-- Contenedor de la imagen principal -->
<div id="c-publicacion-img">
	<img src="" alt="">
</div>
<!-- Contenedor del contenido del texto -->
<div id="c-publicacion-texto">
	<div id="c-texto">
		<p>
			<!-- AQUÍ VA EL TEXTO DE LA PUBLICACIÓN -->
		</p>
	</div>
	<div id="c-autor">
		<a href="">
			<!-- Aquí va el nombre del autor (Está en forma de enlace para que pueda
				 acceder a su perfil)-->
		</a>
	</div>
</div>
<!-- Contenedor de la seción de comentarios -->
<h1>Comentarios</h1>
<div id="c-comentarios">
	<!-- Aquí abrá un FOREACH que muestre los comentarios que se han realizado de 
	     la publicación -->
	<div id="c-comentario">
		<div id="c-comentario-texto">
			<p>
				<!-- Aquí va lo que haya escrito de comentario el usuario. -->
			</p>
		</div>
		<div id="c-comentario-autor">
			<a href="">
				<!-- Aquí va el nombre del usuario que realizó el comentario. -->
				<!-- Es un enlace para ver el perfil del usuario. -->
			</a>				
		</div>
	</div>
</div>
<!-- Contenedor de la sección donde se puede ingresar un comentario -->
<!-- 
	1. Puede tomarse la opción que si el usuario se encuentra autenticado se muestre
	   esta sección.
	2. La otra opción es que se muestre esta sección esté autenticado o no, pero al momento
	   de publicar se verifique si está autenticado.
 -->
<div>
	<section>
		<!-- Este es el formulario que se llena -->
		<form action="">
			<textarea name="" id="" cols="30" rows="10">
				
			</textarea>
		</form>
		<button>Enviar</button>
	</section>
</div>
@endsection