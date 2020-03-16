@section('title','Mantenimientos')
@extends('layout')
@section('content')
<h3 align="center">Reporte de mantenimientos</h3>

<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <form class="needs-validation" action="{{ route('mantenimientos.store')}}" method="POST">
        <div class="form-group">
            @include('mantenimientos._form')
            <button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
        </div>
    </form>
</div>
@endsection
