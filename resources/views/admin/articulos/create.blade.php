@extends('layouts.admin')
@section('content')
	<main class="main__index">
		<section class="card">
			<h1 class="card-header">Agregar un artículo</h1>
			<div class="card-body">
				<form method="POST" action="{{route('AdminArticulos.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="col-md-4 col-form-label text-md-right" for="title">Nombre del artículo: </label>
						<input class="form-control" type="text" name="title" required>
					</div>
					<div class="form-group">
						<label for="img" class="col-md-4 col-form-label text-md-right">Imagen: </label>
						<input class="form-control" type="file" name="img" enctype required>
					</div>
					<div class="form-group">
						<label class="col-md-4 col-form-label text-md-right" for="category">Categoría: (Escribe "chicos" o "chicas" según sea el caso)</label>
						<input class="form-control" type="text" name="category" required>
					</div>
					<div class="form-group">
						<label class="col-md-4 col-form-label text-md-right" for="description">Descripción: </label>
						<textarea class="form-control" name="description" required placeholder="Escribe aquí el contenido que quieres que lean!"></textarea>
					</div>
					<input name="author_id" value="{{Auth::user()->id}}" class="d-none">
					<input class="btn btn-primary" type="submit"></input>
				</form>
			</div>
		</section>
	</main>
@endsection