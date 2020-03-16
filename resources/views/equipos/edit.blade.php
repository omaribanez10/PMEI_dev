@extends('layout')
@section('title','Equipo | '.$equipo->nombre_equipo)

@section('content')
<h3 align="center">Edición de equipo</h3>
<div class="col-md-8 container mx-auto my-auto rounded py-3 px-3">

	<form class="needs-validation shadow rounded py-3 px-4" action="{{ route('equipos.update', $equipo)}} " enctype="multipart/form-data"
	method="POST">
	@method('PATCH')
	<div class="form-group">
		@include('equipos._form')
		<button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
		<a class="btn btn-primary shadow" href="{{ route('equipos.show',  $equipo) }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Volver</a>
	</div>
</form>
</div>
@endsection
