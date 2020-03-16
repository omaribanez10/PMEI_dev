@section('title','Equipos')
@extends('layout')
@section('content')
<div class="col-md-9 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0 form-inline">
            <i class="fas fa-barcode">
            </i>&nbsp;&nbsp;Generar código de barras
        </h2>
    </div>
    <form action="{{route('codigos_barra.index')}}" class="form-inline" method="GET">
        <div class="form-row col-md-12">
            <div style="">
                <div class="form-group" style = "float: left;">
                    <select class="form-control" id="empresa" name="empresa">
                        <option value="">Seleccione Empresa</option>
                        @foreach ($empresas as $row)
                        <option value="{{$row->id_empresa}}">{{$row->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary shadow" type="submit">
                        <i class="fas fa-search">
                        </i>
                    </button>
                </div>
            </div>
        </form>
        <div class="form-group" style="margin-left: 65%;">
            <form action="{{route('codigos_barra.create')}}" class="form-inline" method="POST">
                <button class="btn btn-primary shadow" type="submit">
                    <i class="fas fa-qrcode"></i>&nbsp;&nbsp;&nbsp;Generar QR
                </button>
            </form>
        </div>
    </div>
    <div style="margin-top: 30px;">
        @if(is_null($equipos))
        @elseif(count($equipos) == 0)
        <h4 align="center">No existen equipos para esta empresa</h4>
        @else
        <table class="table shadow table-bordered">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Equipo</th>
                  <th scope="col">Serie</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Empresa</th>
                  <th scope="col">Estado</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($equipos as $row)
            <tr>
              <th scope="row">{{$row->nombre_equipo}}</th>
              <td>{{$row->serie}}</td>
              <td>{{$row->modelo}}</td>
              <td>{{$row->empresa}}</td>
              <td>{{$row->estado_equipo}}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
  @endif
</div>
</div>
@endsection
