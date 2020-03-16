@section('title','Equipos')
@extends('layout')
@section('content')
<div class="col-md-9 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0 form-inline">
            <i class="fas fa-laptop-medical">
            </i>
            Equipos
        </h2>
        <form method="POST" action="{{route('equipos.create')}}" class="form-inline needs-validation">
            @csrf
            <button class="btn btn-primary shadow" type="submit">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar equipo
            </button>
        </form>
    </div>
        <form class="form-inline" method="GET" action="{{route('equipos.index')}}">
            <div class="form-row  col-md-12">
                <div class="form-group ">
                    <div class="form-group" >
                        <input type="search" name="search" class="form-control" id="search" placeholder="serie, modelo, nombre">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select id="tipo_equipo" name="tipo_equipo" class="form-control">
                        <option value="">Seleccione tipo equipo</option>
                        @foreach($tipos_equipos as $tipo_equipo)
                        <option value="{{$tipo_equipo->id_tipo_equipo}}" {{ old('tipo_equipo') == $tipo_equipo->id_tipo_equipo ? 'selected' : '' }} >{{$tipo_equipo->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <select id="sedes_disponibles" name="sedes_disponibles" class="form-control">
                        <option value="">Seleccione sede</option>
                        @foreach($sedes_disponibles as $sede_disponible)
                        <option value="{{$sede_disponible->id_sede}}" {{ old('sedes_disponibles') == $sede_disponible->id_sede ? 'selected' : '' }} >{{$sede_disponible->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary shadow"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <br><br>
        <table class="table shadow">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        Consecutivo
                    </th>
                    <th scope="col">
                        Equipo
                    </th>
                    <th scope="col">
                        Modelo
                    </th>
                    <th scope="col">
                        Empresa
                    </th>
                    <th scope="col">
                        Sede
                    </th>
                    <th scope="col">
                        Creado
                    </th>
                </tr>
            </thead>
            @forelse ($equipos as $equipo)
            <tbody>
                <tr>
                    <th scope="row">
                        {{ mb_strtoupper ($equipo->consecutivo)}}
                    </th>
                    <td>
                        <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('equipos.show' , $equipo)  }}">
                            {{ mb_strtoupper ($equipo->nombre_equipo)}}
                        </a>
                    </td>
                    <td>
                        <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('equipos.show' , $equipo)  }}">
                            {{mb_strtoupper ($equipo->modelo)}}
                        </a>
                    </td>
                    <td>
                        <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('equipos.show' , $equipo)  }}">
                            {{mb_strtoupper ($equipo->nombre_empresa)}}
                        </a>
                    </td>
                    <td>
                        <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('equipos.show' , $equipo)  }}">
                            {{mb_strtoupper ($equipo->nombre_sede)}}
                        </a>
                    </td>
                    <td>
                        <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('equipos.show' , $equipo)  }}">
                            {{$equipo->created_at->format('d/m/Y H:m:i') }}
                        </a>
                    </td>
                    <td>
                        <a data-toggle="tooltip" data-placement="top" title="Agregar mantenimiento" class="btn btn-success" href="{{route('mantenimientos.create', $equipo)}}" ><i class="fas fa-plus"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="Cargar mantenimiento antiguo" class="btn btn-primary" href="{{route('mantenimientos.cargarpdf', $equipo)}}" ><i class="fas fa-file-upload"></i></a>
                        @if($equipo->id_tipo_equipo == 2) <!-- Si el tipo de equipo es igual a biomedico, se muestra el boton de calibracion  -->
                        <a data-toggle="tooltip" data-placement="top" title="Agregar calibración" class="btn btn-danger" href="{{route('calibraciones.create', $equipo)}}" ><i class="fas fa-tools"></i></a>
                        @endif
                    </td>
                </tr>
            </tbody>
            @empty
            <li class="list-group-item border-0 mb-3 shadow sm">
                No hay equipos para mostrar
            </li>
            @endforelse
        </table>
        {{ $equipos->links() }}

    </div>
    @endsection
