@extends('layout')
@section('title','Tecnico | '.$tecnico->nombre_login)
@section('content')
<h3 align="center">Edición de técnico</h3>
<div class="col-md-8 container mx-auto my-auto rounded ">
  <div class="shadow rounded py-3 px-4">

    <form class="needs-validation" action="{{ route('tecnicos.update', $tecnico)}}"
        method="POST">
        @method('PATCH')
        @include('tecnicos._form')
        <button type="submit" class="btn btn-primary shadow"><i class="far fa-save"></i></span>&nbsp;&nbsp;&nbsp;Guardar</button>

    </form>
    <form class="d-flex" action="{{ url('tecnicos') }}">
        @csrf
        <button class="btn btn-primary shadow"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;&nbsp;Volver</button>
    </form>
  </div>
</div>
@endsection
