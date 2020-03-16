@section('title','Equipos')
@extends('layout')
@section('content')
<div class="col-md-9 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        @foreach( $equipos as $equipo)
	        <div style="margin-top: 10px; margin-right: 50px;">
	            {!! DNS1D::getBarcodeHTML($equipo->consecutivo."".$equipo->serie, "C128", 2, 100, true) !!}
	        </div>
        @endforeach
    </div>
    @endsection
</div>