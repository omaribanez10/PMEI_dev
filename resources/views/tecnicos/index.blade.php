@section('title','Tecnicos')
@extends('layout')
@section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0"><i class="fas fa-id-card"></i>&nbsp;Técnicos</h2>
        <form class="needs-validation" action="{{route('tecnicos.create')}}">
            @csrf
            <button type="submit" class="btn btn-primary shadow"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Registrar
                técnico</button>
        </form>
    </div>

    <ul class="list-group">
        @forelse ($tecnicos as $tecnico)
        <li class="list-group-item border-0 mb-3 shadow sm">
            <a class="text-secondary d-flex justify-content-between align-items-center"
                href="{{ route('tecnicos.show' , $tecnico)  }}"><span class="icon-more"></span>
                <span class="text-secondary font-weight-bold">
                    {{ $tecnico->nombre_1}}&nbsp;&nbsp;{{ $tecnico->nombre_2}}
                </span>
                <span class="text-secondary font-weight-bold">
                  {{ $tecnico->apellido_1}}&nbsp;&nbsp;{{ $tecnico->apellido_2}}
                </span>
                <span class="text-black-50">
                    {{ $tecnico->created_at->format('d/m/Y') }}
                </span>
            </a>
        </li>


        @empty
        <li class="list-group-item border-0 mb-3 shadow sm">No hay equipos para mostrar</li>
    </ul>
    @endforelse
</div>
@endsection
