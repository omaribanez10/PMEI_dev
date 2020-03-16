@section('title','Tecnicos')
@extends('layout')
@section('content')
<h3 align="center">Registro de técnico</h3>
<div class="col-md-8 container mx-auto my-auto">
    <form class="needs-validation shadow rounded py-3 px-4" action="{{ route('tecnicos.store')}}" method="POST">
        <div class="form-group">
            @include('tecnicos._form')
            <button type="submit" class="btn btn-primary shadow"><i class="far fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
        </div>
    </form>
</div>

@endsection
