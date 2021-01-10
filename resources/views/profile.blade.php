@extends('layouts.app')
@section('content')
<!-- ESTA VISTA MOSTRARÁ LA INFORMACIÓN DEL PERFIL DE UN USUARIO, SEA ESCRITOR O UN USUARIO 
	 REGULAR -->
<h1>
	<!-- AQUÍ VA EL NOMBRE DE USUARIO -->
	{{$user->name}}
</h1>
<!-- CONTENEDOR DE LA IMAGEN DE PERFIL (AVATAR) -->
<div id="c-img">
	<img src="" alt="">
</div>
<!-- CONTENEDOR QUE CONTENGA LA INFORMACIÓN RELEVANTE DE EL USUARIO (texto) -->
<div>
	<p>
		{{$user->description}}
	</p>
</div>
@endsection