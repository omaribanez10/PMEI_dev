@extends('layout')
@section('title','Mantenimiento | '.$mantenimiento->id)

@section('content')

<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">

      <form class="needs-validation" action="{{ route('mantenimientos.update', $mantenimiento)}}" method="POST">
          @method('PATCH')
          @include('mantenimientos._form')
          <a href="{{ route('home') }}" class="btn btn-primary shadow"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Volver</a>
          <button type="submit" class="btn btn-primary shadow"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
      </form><br>
</div>

@endsection
