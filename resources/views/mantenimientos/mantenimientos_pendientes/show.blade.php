@extends('layout') @section('title','Mantenimientos pendientes | '.$mantenimientos_pendientes_det->id) @section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <div>
                    <img src="{{ Storage::url($mantenimientos_pendientes_det->foto)
                    }}" class="card-img-top" alt="">
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
    <br>
    <div align="center" class="container">
        <div class="row">
            <div class="col-md-10 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Problema</b></span>
                    </div>
                    <textarea disabled="disabled" class="form-control" id="" rows="2">{{strip_tags($mantenimientos_pendientes_det->problema)}}</textarea>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-10 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Repuestos</b></span>
                    </div>
                    <textarea disabled="disabled" class="form-control" id="" rows="2">{{strip_tags($mantenimientos_pendientes_det->repuesto)}}</textarea>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-10 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Observación</b></span>
                    </div>
                    <textarea disabled="disabled" class="form-control" id="" rows="2">{{strip_tags($mantenimientos_pendientes_det->observacion)}}</textarea>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Empresa</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{ $mantenimientos_pendientes_det->nombre_empresa}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Sede</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{ $mantenimientos_pendientes_det->nombre_sede}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Equipo</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{$mantenimientos_pendientes_det->nombre_equipo}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Marca</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{ $mantenimientos_pendientes_det->marca}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Serie</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{ $mantenimientos_pendientes_det->serie }}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Modelo</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{ $mantenimientos_pendientes_det->modelo }}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Registro Invima</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{ $mantenimientos_pendientes_det->registro_invima}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Tipo mantenimiento</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{ $mantenimientos_pendientes_det->tipo_mantenimiento}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Técnico</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{$mantenimientos_pendientes_det->nombre1_tec}} {{ $mantenimientos_pendientes_det->nombre2_tec }} {{ $mantenimientos_pendientes_det->apellido1_tec }} {{ $mantenimientos_pendientes_det->apellido2_tec }}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Fecha mantenimiento</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{$mantenimientos_pendientes_det->created_at}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b></b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="d-flex  justify-content-between">
            <div class="form-group mr-3">
                <table>
                    <tr>
                        <td>
                            <form method="POST" action="{{route('mantenimientos_pendientes.accept', $mantenimientos_pendientes_det)}}">
                                @csrf @method('PATCH')
                                <button class="btn btn-success btn-sm shadow"><i aria-hidden="true" class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Aceptar</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('mantenimientos_pendientes.refuse', $mantenimientos_pendientes_det)}}">
                                @csrf @method('PATCH')
                                <button class="btn btn-danger btn-sm shadow"><i aria-hidden="true" class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Rechazar</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <form action="{{ url('') }}">
            @csrf
            <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;&nbsp;Volver</button>
        </form>

    </div>
</div>
@endsection