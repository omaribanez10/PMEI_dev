@extends('layout')
@section('title','Mantenimientos | '.$mantenimiento->equipo)

@section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0">{{ $mantenimiento->equipo}}</h2>

    </div>
    <ul class="list-group list-group-item border-0 mb-3 sm">
        <div class="card" style="width: 18rem;">
            <img src="/images/profile.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$mantenimiento->ubicacion}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Modelo:</b>&nbsp;&nbsp;{{$mantenimiento->modelo}}</li>
                <li class="list-group-item"><b>Marca:</b>&nbsp;&nbsp;{{$mantenimiento->marca }}</li>
                <li class="list-group-item"><b>Tipo mantenimiento:</b>&nbsp;&nbsp;{{$mantenimiento->mantenimiento}}</li>
                <li class="list-group-item"><b>Problema:</b>&nbsp;&nbsp;{{strip_tags($mantenimiento->problema)}}</li>
                <li class="list-group-item"><b>Repuestos:</b>&nbsp;&nbsp;{{strip_tags($mantenimiento->repuesto)}}</li>
                <li class="list-group-item"><b>Observación:</b>&nbsp;&nbsp;{{strip_tags($mantenimiento->observacion)}}</li>
                <li class="list-group-item"><b>Agregado:</b>&nbsp;&nbsp;{{$mantenimiento->created_at->format('d/M/Y') }}</li>
            </ul>
            <div class="card-body">
                <div class="d-flex  justify-content-between">

                    <div class="form-group mr-3">
                        <form action="{{ route('mantenimientos.edit' , $mantenimiento) }}">
                            @csrf
                            <button class="btn btn-primary btn-sm shadow"><i class="fas fa-edit"></i>&nbsp;&nbsp;&nbsp;Editar</button>
                        </form>
                    </div>
                    <div class="form-group">
                        <form method="POST" action="{{route('mantenimientos.destroy', $mantenimiento)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm shadow"><i class="fas fa-minus-square"></i>&nbsp;&nbsp;&nbsp;Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </ul>
    <form action="{{route('mantenimientos.index')}}">
        @csrf
        <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;&nbsp;Volver</button>
    </form>

</div>

@endsection
