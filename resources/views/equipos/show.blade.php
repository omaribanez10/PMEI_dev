@foreach ($equipo as $row)
@extends('layout') @section('title','Equipo | '.mb_strtoupper($row->nombre_equipo)) @section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">

    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <div>
                    <img src="{{ Storage::url($row->foto)
                    }}" class="card-img-top" alt="">
                    <br>
                    <br>
                    <h4 align="center" class="card-nombre-equipo">{{ mb_strtoupper($row->nombre_equipo)}}</h4>
                </div>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Consecutivo</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->consecutivo)}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Tipo equipo</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->tipo_equipo)}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Marca</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->marca)}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Serie</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->serie)}}">
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
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->empresa)}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Sede</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->sede)}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Ubicación</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->ubicacion)}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Modelo</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->modelo)}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Descripción</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{strip_tags (mb_strtoupper($row->descripcion))}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Riesgo equipo</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->riesgo)}}">
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
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->registro_invima)}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Proveedor</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->proveedor)}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Estado</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->estado_equipo)}}" aria-describedby="">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Fecha registro</b></span>
                    </div>
                    <input disabled type="text" class="form-control" aria-describedby="" value="{{mb_strtoupper($row->created_at->format('d/M/Y'))}}">
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-10 mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><b>Registrado por</b></span>
                    </div>
                    <input disabled type="text" class="form-control" id="" value="{{mb_strtoupper($row->name)}} {{mb_strtoupper($row->nombre_2)}} {{mb_strtoupper($row->apellido_1)}} {{mb_strtoupper($row->apellido_2)}}" aria-describedby="">
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
                            <form action="{{ route('equipos.edit' , $row) }}">
                                @csrf
                                <button class="btn btn-primary btn-sm shadow"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;&nbsp;Modificar</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm shadow" onclick="abrirModal()"><i class="fas fa-ban"></i>&nbsp;&nbsp;&nbsp;Dar baja</button>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div>
            <h5 align="center">MANTENIMIENTOS</h5>
            <br>
            <table class="table shadow">
                <tbody>
                    @forelse ($mantenimientos_equipo as $mantenimiento_equipo)
                    <tr>
                        <?php
                        $id_mantenimiento = $mantenimiento_equipo->id;
                        ?>
                        <td>{{strip_tags(trim ($mantenimiento_equipo->problema))}}</td>
                        <td>{{$mantenimiento_equipo->created_at->format('d/M/Y')}}</td>
                        <td><a class="btn btn-danger" target="_blank" href="{{route('mantenimientos.ver_pdf_mantenimiento',$id_mantenimiento)}}"><i class="fas fa-file-pdf"></i></a>
                            <a class="btn btn-success" target="_blank" href="{{route('mantenimientos.descargar_excel_mantenimiento',$id_mantenimiento)}}"><i class="fas fa-file-excel"></i></a>
                        </td>
                    </tr>
                    @empty
                    <li class="list-group-item border-0 mb-3 shadow sm">
                        Este equipo no tiene mantenimientos
                    </li>
                    @endforelse
                </tbody>

            </table>
            {{ $mantenimientos_equipo->links() }}

        </div>
        <div>
            <h5 align="center">MANTENIMIENTOS ESCÁNEADOS</h5>
            <br>
            <table class="table shadow">
                <tbody>
                    @forelse ($reportesAntiguos as $reporte_antiguo)
                    <tr>
                        @if(is_null($reporte_antiguo->titulo))
                        <td>{{$reporte_antiguo->ruta}}</td>
                        @else
                        <td>{{strip_tags ($reporte_antiguo->titulo)}}</td>
                        @endif
                        <td>{{$reporte_antiguo->created_at->format('d/M/Y')}}</td>
                        <td><a class="btn btn-danger" target="_blank" href="{{ Storage::url($reporte_antiguo->ruta)
                        }}"><i class="fas fa-file-pdf"></i></a>
                    </td>
                </tr>
                @empty
                <li class="list-group-item border-0 mb-3 shadow sm">
                    Este equipo no tiene mantenimientos antiguos
                </li>
                @endforelse
            </tbody>
        </table>
        {{ $reportesAntiguos->links() }}
    </div>
    <?php
    if($row->id_tipo_equipo == 2){
        ?>
        <div>
            <h5 align="center">CALIBRACIONES</h5>
            <br>
            <table class="table shadow">
                <tbody>
                    @forelse ($calibraciones_equipo as $calibracion_equipo)
                    <tr>
                        @if(is_null($calibracion_equipo->titulo))
                        <td>{{$calibracion_equipo->archivo}}</td>
                        @else
                        <td>{{strip_tags ($calibracion_equipo->titulo)}}</td>
                        @endif
                        <td>{{$calibracion_equipo->created_at->format('d/M/Y')}}</td>
                        <td><a class="btn btn-danger" target="_blank" href="{{ Storage::url($calibracion_equipo->archivo)
                        }}"><i class="fas fa-file-pdf"></i></a>
                    </td>
                </tr>
                @empty
                <li class="list-group-item border-0 mb-3 shadow sm">
                    Este equipo no tiene mantenimientos antiguos
                </li>
                @endforelse
            </tbody>
        </table>
        {{ $calibraciones_equipo->links() }}
    </div>
    <?php
}
?>

</div>

<form action="{{ url('equipos') }}">
    @csrf
    <button class="btn btn-primary"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Volver</button>
</form>

</div>

<!--  MODAL PARA DAR DE BAJA A EQUIPO  -->

<div class="modal fade" id="modal_dar_baja_equipo" name = "modal_dar_baja_equipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form class="needs-validation" action="{{ route('equipos.destroy' , $row) }}" method="POST" enctype="multipart/form-data"
        >
        @csrf
        @method('PATCH')
        <input type="hidden" name="id_usuario" id="id_usuario" value="{{ auth()->user()->id }}">
        <input type="hidden" name="id_equipo" id="id_equipo" value="{{ $row->id }}">
        <div class="form-group">
            <div class="form-row">
                <div class="form-group col-md-12 mb-3">
                    <div class="form-group">
                        <label><span class="icon-desktop_windows"></span>&nbsp;&nbsp;&nbsp;Motivo</label>
                        <input type="text" name="motivo" placeholder="Motivo" value="" class="form-control bg-light shadow-sm border-1  @error ('motivo') is-invalid
                        @enderror ">
                        @error ('motivo')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="observacion">
                            <span class="icon-notes">
                            </span>&nbsp;&nbsp;&nbsp;Observación
                        </label>
                        <textarea class="form-control bg-light shadow-sm border-1 @error ('observacion') is-invalid @enderror" id="observacion" name="observacion" rows="10">
                        </textarea>
                        @error ('observacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm shadow"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Aceptar</button>
            <button type="button" class="btn btn-danger btn-sm shadow" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Cerrar</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
@endforeach