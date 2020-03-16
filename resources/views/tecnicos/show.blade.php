@extends('layout')
@section('title','Técnico | '.$tecnico->nombre_login)
@section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0">{{ $tecnico->nombre_login}}</h2>
    </div>

    <ul class="list-group list-group-item border-0 mb-3 sm">

        <div class="card" style="width: 18rem;">
            <img src="/images/profile.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$tecnico->profesion}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nombres:</b>&nbsp;&nbsp;{{$tecnico->nombre_1}}&nbsp;&nbsp;{{$tecnico->nombre_2}}</li>
                <li class="list-group-item"><b>Apellidos:</b>&nbsp;&nbsp;{{ $tecnico->apellido_1}}&nbsp;&nbsp;{{ $tecnico->apellido_2}}</li>
                <li class="list-group-item"><b>Tipo documento:</b>&nbsp;&nbsp;{{ $tecnico->tipo_documento }}</li>
                <li class="list-group-item"><b>Numero documento:</b>&nbsp;&nbsp;{{ $tecnico->numero_documento }}</li>
                <li class="list-group-item"><b>Sexo:</b>&nbsp;&nbsp;{{ $tecnico->sexo}}</li>
                <li class="list-group-item"><b>Telefono:</b>&nbsp;&nbsp;{{ $tecnico->telefono}}</li>
                <li class="list-group-item"><b>Dirección:</b>&nbsp;&nbsp;{{ $tecnico->direccion}}</li>
                <li class="list-group-item"><b>Profesión:</b>&nbsp;&nbsp;{{ $tecnico->profesion}}</li>
                <li class="list-group-item"><b>Cargo:</b>&nbsp;&nbsp;{{ $tecnico->cargo}}</li>
                <li class="list-group-item"><b>Agregado:</b>&nbsp;&nbsp;{{ $tecnico->created_at->format('d/M/Y') }}</li>
            </ul>
            <div class="card-body">
                <div class="d-flex  justify-content-between">

                    <div class="form-group mr-3">
                        <form action="{{ route('tecnicos.edit' , $tecnico) }}">
                            @csrf
                            <button class="btn btn-primary btn-sm shadow"><i class="fas fa-edit"></i>&nbsp;&nbsp;&nbsp;Editar</button>
                        </form>
                    </div>
                    <div class="form-group">
                        <form method="POST" action="{{route('tecnicos.destroy', $tecnico)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm shadow"><i class="fas fa-minus-square"></i>&nbsp;&nbsp;&nbsp;Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </ul>
    <form action="{{ url('tecnicos') }}">
        @csrf
        <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;&nbsp;Volver</button>
    </form>

</div>
@endsection
