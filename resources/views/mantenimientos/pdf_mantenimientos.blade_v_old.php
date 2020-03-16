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
        <div class="container" >
            <div class="row">
                <div class="col-md-auto">
                    1
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <img alt="" src="{{public_path(Storage::url($row->foto))}}" width="100px">
                    </img>
                </div>
            </div>
        </div>
    </body>
</html>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Fecha mantenimiento
            </th>
            <th scope="col">
                Empresa
            </th>
            <th scope="col">
                Sede
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{$row->created_at->format('d/M/Y H:i:s')}}
            </td>
            <td class="td_reducido">
                {{$row->nombre_empresa}}
            </td>
            <td class="td_reducido">
                {{$row->nombre_sede}}
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Equipo
            </th>
            <th scope="col">
                Modelo
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{$row->nombre_equipo}}
            </td>
            <td class="td_reducido">
                {{$row->modelo}}
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Marca
            </th>
            <th scope="col">
                Reg. Invima
            </th>
            <th scope="col">
                Mantenimiento
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{$row->marca}}
            </td>
            <td class="td_reducido">
                {{ $row->registro_invima}}
            </td>
            <td class="td_reducido">
                Preventivo
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Problema
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{strip_tags ($row->problema)}}
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Repuestos
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{strip_tags ($row->repuesto)}}
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Observacion
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{strip_tags ($row->observacion)}}
            </td>
        </tr>
    </tbody>
</table>
<table class="table table-bordered paginated modal_table" style="width: 800px; margin: auto;">
    <thead>
        <tr class="headegrid">
            <th scope="col">
                Realizó mantenimiento
            </th>
            <th scope="col">
                Recibió mantenimiento
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="celdagrid" id="" onclick="">
            <td class="td_reducido">
                {{$row->nombre1_tec}} {{ $row->nombre2_tec }} {{ $row->apellido1_tec }} {{ $row->apellido2_tec }}
            </td>
            <td class="td_reducido">
                {{$row->nombre1_admin}} {{ $row->nombre2_admin }} {{ $row->apellido1_admin }} {{ $row->apellido2_admin }}
            </td>
        </tr>
    </tbody>
</table>
