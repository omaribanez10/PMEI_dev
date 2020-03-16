@section('title','Registro de usuarios')
@extends('layout')
@section('content')
<h3 align="center">Registro de usuarios</h3>
<div class="col-md-8 container mx-auto my-auto">
    <form class="needs-validation shadow rounded py-3 px-4" method="POST" action="{{ route('register') }}">
        <div class="form-group">
            @include('auth._form_register')
            <button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Registrar</button>
        </div>
    </form>
</div>
@endsection
