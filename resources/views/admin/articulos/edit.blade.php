@extends('layouts.admin')
@section('content')
<main class="main__index">
	<h1>Agregar un artículo</h1>
	<section class="crear">
		<form method="POST" action="{{route('AdminArticulos.update', $articulo->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<label for="title">Nombre del artículo: </label>
			<input type="text" name="title" value="{{$articulo->title}}" required>
			<label for="img">Imagen: </label>
			@if($articulo->img)
			<div class="form-group">
				<label for="img">Imagen de presentación ingresada: </label>
				<a href="{{asset("img/$articulo->img")}}" target="_blank">{{$articulo->img}}</a>
			</div>
			<div class="form-group">
				<label for="img">Cambia la imagen de presentación: </label>
				<input type="file" name="img" enctype>
			</div>
			@else
			<label for="img">Añade una imagen de presentación: </label>
			<input type="file" name="img" enctype>
			@endif			
			<label for="description">Descripción: </label>
			<textarea name="description" id="" cols="30" rows="10" required>{{$articulo->description}}</textarea>
			<input name="author_id" value="{{Auth::user()->id}}" class="d-none">
			<input type="submit"></input>
		</form>
	</section>
</main>
@endsection