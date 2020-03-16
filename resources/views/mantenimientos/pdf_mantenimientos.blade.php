<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- CSRF Token -->
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <!-- Scripts -->
    <script defer="" src="{{ asset('js/app.js') }}">
    </script>
    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title', "PMEI")
    </title>
</link>
</link>
</link>
</meta>
</meta>
</meta>
</head>
<body>
    @foreach($mantenimiento as $row)@endforeach()
    <div class="container-fluid">
        <div class="panel panel-success">
            <div class="panel-heading" style="border-width: thin; border-style: solid; border-color: gray; padding:10px;">
                <div class="row">
                    <div class="col-2">
                        <p align="left" style="font-size:60%; margin-right: 10px; margin-bottom: -5px;">
                            <b>
                                Fecha:
                            </b>
                            <?php
                            $time = time();
                            echo date("d/m/Y", $time);
                            ?>
                        </p>
                        <p align="left" style="font-size:60%; margin-right: 10px; margin-bottom: -5px;">
                            <b>
                                Hora:
                            </b>
                            <?php
                            $time = time();
                            echo date("H:i:s", $time);
                            ?>
                        </p>
                        <p align="left" style="font-size:60%; margin-right: 10px;">
                            <b>
                                Empresa:
                            </b>
                            {{$row->nombre_empresa}}
                        </p>
                    </div>
                    <div class="col-12">
                        <p align="center" style="font-size:75%; margin-right: 10px; ">
                            <b>
                                {{$row->nombre_equipo}} - {{ $row->serie}}
                            </b>
                        </p>
                    </div>
                    <div class="col-12">
                        <p align="right" style="margin-left:10px">
                            <img class="rounded float-right" src="https://i.ytimg.com/vi/UZurm3Cdl0c/maxresdefault.jpg" style="width:100; height:50px;">
                        </img>
                    </p>
                </div>
            </div>
        </div>
        <hr style="border: 10px; border-radius: 5px;">
        <div class="col-12">
            <div align="center">
                <img alt="" src="{{public_path(Storage::url($row->foto))}}" style="margin-top: 10px;" width="200px">
            </img>
        </div>
    </div>
    <div class="panel-body" style=" border-width: thin; border-style: solid; border-color: gray; padding:10px;">
        <table class="table table-bordered">
            <tbody>
                <tr style="font-size: 80%;">
                    <td>
                        <div>
                            <b>
                                Consecutivo
                            </b>
                        </div>
                        <div>
                            {{$row->consecutivo}}
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>
                                Equipo
                            </b>
                        </div>
                        <div>
                            {{$row->nombre_equipo}}
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>
                                Marca
                            </b>
                        </div>
                        <div>
                            {{$row->marca}}
                        </div>
                    </td>
                    <td>
                        <div>
                            <b>
                                Modelo
                            </b>
                        </div>
                        <div>
                            {{$row->modelo}}
                        </div>
                    </td>
                </tr>
                <tr style="font-size: 80%;">
                 <td>
                    <div>
                        <b>
                            Serie
                        </b>
                    </div>
                    <div>
                        {{$row->serie}}
                    </div>
                </td>
                <td>
                    <div>
                        <b>
                            Registro Invima
                        </b>
                    </div>
                    <div>
                        {{$row->registro_invima}}
                    </div>
                </td>
                <td>
                    <div>
                        <b>
                            Empresa
                        </b>
                    </div>
                    <div>
                        {{$row->nombre_empresa}}
                    </div>
                </td>
                <td>
                    <div>
                        <b>
                            Sede
                        </b>
                    </div>
                    <div>
                        {{$row->nombre_sede}}
                    </div>
                </td>
            </tr>
            <tr style="font-size: 80%;">
                <td colspan="2">
                    <div>
                        <b>
                            Fecha mantenimiento
                        </b>
                    </div>
                    <div>
                        {{$row->created_at}}
                    </div>
                </td>
                <td colspan="2">
                    <div>
                        <b>
                            Fecha aceptación
                        </b>
                    </div>
                    <div>
                        {{$row->fecha_aceptacion}}
                    </div>
                </td>
            </tr>
            <tr style="font-size: 80%;">
             <td colspan="1">
                <div>
                    <b>
                        Tipo mantenimiento
                    </b>
                </div>
                <div>
                    {{$row->tp_nombre}}
                </div>
            </td>
            <td colspan="3">
                <div>
                    <b>
                        Problema
                    </b>
                </div>
                <div>
                    {{strip_tags ($row->problema)}}
                </div>
            </td>

        </tr>
        <tr style="font-size: 80%;">
            <td colspan="2">
                <div>
                    <b>
                        Repuestos
                    </b>
                </div>
                <div>
                    {{strip_tags ($row->repuesto)}}
            </td>
            <td colspan="2">
                <div>
                    <b>
                      Observaciones
                  </b>
              </div>
              <div>
                {{strip_tags ($row->observacion)}}
            </div>
        </td>
    </tr>
    <tr style="font-size: 80%;">
        <td colspan="2">
            <div>
                <b>
                    Mantenimiento hecho por
                </b>
            </div>
            <div>
                {{$row->nombre1_tec}} {{ $row->nombre2_tec }} {{ $row->apellido1_tec }} {{ $row->apellido2_tec }}
            </div>
        </td>
        <td colspan="2">
            <div>
                <b>
                    Mantenimiento aceptado por
                </b>
            </div>
            <div>
                {{$row->nombre1_admin}} {{$row->nombre2_admin}} {{$row->apellido1_admin}} {{$row->apellido2_admin}}
            </div>
        </td>
    </tr>
</tbody>
</table>
</div>
</hr>
</div>
</div>
</body>
</html>