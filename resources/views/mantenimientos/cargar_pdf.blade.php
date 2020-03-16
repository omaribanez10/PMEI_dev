@section('title','Mantenimientos')
@extends('layout')
@section('content')
<h3 align="center">Cargar reportes antiguos</h3>

<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
	<form class="needs-validation" action="{{route('mantenimientos.cargarPDF_store')}}" method="POST" enctype="multipart/form-data"
	>
	@csrf
	<div class="form-group">
		<div class="form-row">
			<div class="form-group col-md-8 mb-3">
				<input type="hidden" name="id_equipo" value="{{$equipo_id}}">

				<div class="form-group">
					<label><span class="icon-desktop_windows"></span>&nbsp;&nbsp;&nbsp;Título reporte</label>
					<input type="text" name="titulo" placeholder="Titulo" value="" class="form-control bg-light shadow-sm border-1  @error ('titulo') is-invalid
					@enderror ">
					@error ('titulo')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="problema">
						<span class="icon-notes">
						</span>&nbsp;&nbsp;&nbsp;Descripción
					</label>
					<textarea class="form-control bg-light shadow-sm border-1 @error ('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">
					</textarea>
					@error ('descripcion')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
				<label><span class="icon-panorama"></span>&nbsp;&nbsp;&nbsp;Archivo</label>
				<input type="file" id="ruta" name="ruta" class="form-control-file bg-light shadow-sm border-1 @error ('ruta') is-invalid
				@enderror" value="">
				@error ('ruta')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }} </strong>
				</span>
				@enderror
			</div>
		</div>
		<button type="submit" class="btn btn-primary shadow"><i class="far fa-save"></i>&nbsp;&nbsp;&nbsp;Cargar</button>
	</div>
</form>
</div>
@endsection
