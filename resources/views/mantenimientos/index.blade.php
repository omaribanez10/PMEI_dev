@section('title','Mantenimientos')
@extends('layout')
@section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0">
            <i class="fas fa-scroll">
            </i>
            Mantenimientos
        </h2>

    </div>

      <form class="form-inline" method="GET" action="{{route('mantenimientos.index')}}">
        <div class="form-row  col-md-12">
            <div class="form-group ">
                <div class="form-group" >
                    <input type="search" name="search" class="form-control col-md-12" id="search" placeholder="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary shadow"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <br>
    <ul class="list-group">
        @forelse ($mantenimientos as $mantenimiento)
        <li class="list-group-item border-0 mb-3 shadow sm">
            <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.show' , $mantenimiento)  }}">
                <span class="icon-more">
                </span>
                <span class="text-secondary font-weight-bold">
                    {{ $mantenimiento->nombre_sede}}
                </span>
                <span class="text-secondary font-weight-bold">
                    {{ $mantenimiento->nombre_equipo}}
                </span>
                <span class="text-secondary font-weight-bold">
                    {{ $mantenimiento->serie}}
                </span>
                <span class="text-black-50">
                    {{ $mantenimiento->created_at->format('d/m/Y') }}
                </span>
            </a>
        </li>
        @empty
        <li class="list-group-item border-0 mb-3 shadow sm">
            No hay mantenimientos para mostrar
        </li>
    </ul>
    @endforelse
</div>
@endsection
