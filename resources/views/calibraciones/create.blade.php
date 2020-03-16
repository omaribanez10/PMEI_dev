@section('title','Equipos')
@extends('layout')
@section('content')
<h3 align="center">Registrar calibración</h3>
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
	<form class="needs-validation" action="{{route('calibraciones.store')}}" method="POST" enctype="multipart/form-data"
	>
	@csrf
	<input type="hidden" name="id_equipo" id="id_equipo" value="{{ $id_equipo }}">
	<div class="form-group">
		<div class="form-row">
			<div class="form-group col-md-8 mb-3">
				<div class="form-group">
					<label><span class="icon-desktop_windows"></span>&nbsp;&nbsp;&nbsp;Título</label>
					<input type="text" name="titulo" placeholder="Asunto" value="" class="form-control bg-light shadow-sm border-1  @error ('titulo') is-invalid
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
						</span>&nbsp;&nbsp;&nbsp;Observación
					</label>
					<textarea class="form-control bg-light shadow-sm border-1 @error ('observacion') is-invalid @enderror" id="observacion" name="observacion" rows="8">
					</textarea>
					@error ('observacion')
					<span class="invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
				<label><span class="icon-panorama"></span>&nbsp;&nbsp;&nbsp;Archivo</label>
				<input type="file" id="archivo" name="archivo" class="form-control-file bg-light shadow-sm border-1 @error ('archivo') is-invalid
				@enderror" value="">
				@error ('archivo')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }} </strong>
				</span>
				@enderror
			</div>
		</div>
		<button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
	</div>
</form>
</div>
@endsection
