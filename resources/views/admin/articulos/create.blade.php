@extends('layouts.admin')
@section('content')
	<main class="main__index">
		<h1>Agregar un artículo</h1>
		<section class="crear">
			<form method="POST" action="{{route('AdminArticulos.store')}}" enctype="multipart/form-data">
				@csrf
				<label for="">Nombre del artículo: </label>
				<input type="text" name="title" required>
				<label for="">Imagen: </label>
				<input type="file" name="img" enctype required>
				<label for="">Descripción: </label>
				<textarea name="description" id="" cols="30" rows="10" required placeholder="Escribe aquí el contenido que quieres que lean!"></textarea>
				<input name="author_id" value="{{Auth::user()->id}}" class="d-none">
				<input type="submit"></input>
			</form>
		</section>
	</main>
@endsection