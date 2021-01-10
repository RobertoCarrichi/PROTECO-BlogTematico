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
	<img src="{{asset("avatars/$user->avatar")}}" alt="Avatar de {{$user->name}}">
</div>
<!-- CONTENEDOR QUE CONTENGA LA INFORMACIÓN RELEVANTE DE EL USUARIO (texto) -->
<div>
	<h3>Descripción: </h3>
	<p>
		{{$user->description}}
	</p>
</div>
@endsection