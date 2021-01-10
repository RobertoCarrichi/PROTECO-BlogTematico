@extends('layouts.admin')
@section('content')
<main class="main__index">
	<section class="card">
		<h1 class="card-header">Editar un artículo</h1>
		<div class="card-body">
			<form method="POST" action="{{route('AdminArticulos.update', $articulo->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="title">Nombre del artículo: </label>
					<input class="form-control" type="text" name="title" value="{{$articulo->title}}" required>
				</div>
				@if($articulo->img)
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="img">Imagen ingresada: </label>
					<a class="form-control text-center" href="{{asset("img/$articulo->img")}}" target="_blank">{{$articulo->img}}</a>
				</div>
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="img">Cambia la imagen de presentación: </label>
					<input class="form-control" type="file" name="img" enctype>
				</div>
				@else
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="img">Añade una imagen de presentación: </label>
					<input class="form-control" type="file" name="img" enctype>
				</div>
				@endif
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="category">Categoría: (Escribe "chicos" o "chicas" según sea el caso)</label>
					<input class="form-control" type="text" name="category" required value="{{$articulo->category}}">
				</div>
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="description">Descripción actual: </label>
					<textarea class="form-control" name="description" id="" cols="30" rows="10" required>{{$articulo->description}}</textarea>
				</div>		
				<input class="form-control d-none" name="author_id" value="{{Auth::user()->id}}">
				<input class="btn btn-primary" type="submit"></input>
			</form>
		</div>
	</section>
</main>
@endsection