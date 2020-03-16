@csrf
<div class="container" style="margin-top: 40px;">
    <div class="form-row">
        <input type="hidden" name="id_equipo" id="id_equipo" value="{{$equipo->id}}">
        <input type="hidden" name="ind_estado_aceptado" id="ind_estado_aceptado" value="0">
    </div>
    <div class="form-row">
     <div class="form-group col-md-4 mb-3">
        <label>
            <span class="icon-extension">
            </span>
            Empresa
        </label>
        <select  class="form-control bg-light shadow-sm border-1 @error ('id_empresa') is-invalid @enderror" id="id_empresa" name="id_empresa">
            <option value="{{$empresa_equipo->id_empresa}}">{{$empresa_equipo->nombre}}</option>
        </select>
        @error ('id_empresa')
        <span class="invalid-feedback" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-4 mb-3">
        <label>
            <span class="icon-extension">
            </span>
            Sede
        </label>
        <select  class="form-control bg-light shadow-sm border-1 @error ('id_sede') is-invalid @enderror" id="id_sede" name="id_sede">
            <option value="{{$sede_equipo->id_sede}}">{{$sede_equipo->nombre}}</option>
        </select>
        @error ('id_sede')
        <span class="invalid-feedback" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-4 mb-3">
        <label>
            <span class="icon-desktop_windows">
            </span>
            Equipo
        </label>
        <select  class="form-control bg-light shadow-sm border-1 @error ('equipo') is-invalid @enderror" id="equipo" name="equipo">
            <option selected="">
                {{old('equipo', $equipo->nombre_equipo)}}
            </option>
        </select>
        @error ('equipo')
        <span class="invalid-feedback" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-row">
   <div class="form-group col-md-3 mb-3">
    <label>
        <span class="icon-settings">
        </span>
        Modelo
    </label>
    <select  class="form-control bg-light shadow-sm border-1 @error ('modelo') is-invalid @enderror" id="modelo" name="modelo">
        <option selected="">
            {{old('modelo', $equipo->modelo)}}
        </option>
    </select>
    @error ('modelo')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror
</div>
<div class="form-group col-md-3 mb-3">
    <label>
        <span class="icon-adjust">
        </span>
        Marca
    </label>
    <select  class="form-control bg-light shadow-sm border-1 @error ('marca') is-invalid @enderror" id="marca" name="marca">
        <option  selected="">
            {{old('marca', $equipo->marca)}}
        </option>
    </select>
    @error ('marca')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror
</div>
<div class="form-group col-md-3 mb-3">
    <label>
        <span class="icon-money">
        </span>
        Serie
    </label>
    <select  class="form-control bg-light shadow-sm border-1 @error ('serie') is-invalid @enderror" id="serie" name="serie">
        <option  selected="">
            {{old('serie', $equipo->serie)}}
        </option>

    </select>
    @error ('serie')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror
</div>
<div class="form-group col-md-3 mb-3">
    <label>
        <span class="icon-broken_image">
        </span>
        Tipo mantenimiento
    </label>
    <select class="form-control bg-light shadow-sm border-1 @error ('id_tipo_mantenimiento') is-invalid @enderror" id="id_tipo_mantenimiento" name="id_tipo_mantenimiento">
       <option value="">Seleccione</option>
       @foreach($tipos_mantenimientos as $tipo_mantenimiento)
       <option value="{{$tipo_mantenimiento->id}}" {{ old('id_tipo_mantenimiento') == $tipo_mantenimiento->id ? 'selected' : '' }} >{{$tipo_mantenimiento->nombre}}</option>
       @endforeach
   </select>
   @error ('id_tipo_mantenimiento')
   <span class="invalid-feedback" role="alert">
    <strong>
        {{ $message }}
    </strong>
</span>
@enderror
</div>
</div>
<br><br>
<div class="form-group">
    <label for="problema">
        <span class="icon-notes">
        </span>
        Descripción y/o problema reportado
    </label>
    <textarea class="form-control bg-light shadow-sm border-1 @error ('problema') is-invalid @enderror" id="problema" name="problema" rows="3">
        {{old('problema', $mantenimiento->problema)}}
    </textarea>
    @error ('problema')
    <span class="invalid-feedback" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror
</div>
<body>

<div style="margin-bottom: 40px; margin-top: 40px;" class="container">
    <div class="row">
        <div class="container">
            <div >
                <table cellspacing="0" cellpadding="0" border="0" class="table-sm " style="width: 100%; border: none;" >
                    <tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-dark" style="width: 100%; border: none; overflow:scroll;" >
                                <tr  style="width: 100%; padding-right: 25px;">
                                    <th style="width: 30%;" scope="col">General</th>
                                    @foreach ($estados_componente as $estate)
                                        <th style="width: 5%; text-align: center;"  scope="col">{{ $estate->nombre_corto}}</th>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div cellspacing="0" cellpadding="0" border="0" style="width:100%; height:200px; overflow:scroll;">
                                <table class="" style="width: 100%;">
                                    @foreach ($componente as $element)
                                        <tr style="width: 100%;">
                                           <td style="width: 28%;">{{ $element->nombre }}</td>
                                           @foreach ($estados_componente as $estate)
                                                <td style="width: 5%;  text-align: center;"><input value="{{$estate->id_estado_componente}}" type="radio" name="radios" id="radio1" /></td>
                                           @endforeach

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<div class="form-group">
    <label for="repuesto">
        <span class="icon-build">
        </span>
        Repuestos utilizados
    </label>
    <textarea class="form-control" id="repuesto" name="repuesto" rows="3">
        {{old('repuesto', $mantenimiento->repuesto)}}
    </textarea>
</div>
<div class="form-group">
    <label for="observacion">
        <span class="icon-description">
        </span>
        Observaciones
    </label>
    <textarea class="form-control" id="observacion" name="observacion" rows="4">
        {{old('observacion', $mantenimiento->observacion)}}
    </textarea>
</div>
<br>
<br>
<br>
<div align="center" class="row" style="margin-top: 8px; margin-bottom: 10px;">
    <div class="col" >
        <div>
            <select class="form-control bg-light shadow-sm border-1 @error ('id_usuario_recibe') is-invalid @enderror" id="id_usuario_recibe" name="id_usuario_recibe">
                <option value="">Seleccione</option>
                @foreach($administradores as $administrador)
                <?php
                $id = $administrador->id;
                $nombre_1 = $administrador->name;
                $nombre_2 = $administrador->nombre_2;
                $apellido_1 = $administrador->apellido_1;
                $apellido_2 = $administrador->apellido_2;
                ?>
                <option value="{{$id}}"{{ old('id_usuario_recibe') == $id ? 'selected' : ''}}>{{$nombre_1}}&nbsp;{{$nombre_2}}&nbsp;{{$apellido_1}}&nbsp;{{$apellido_2}}</option>
                @endforeach()
            </select>
            @error ('id_usuario_recibe')
            <span class="invalid-feedback" role="alert">
                <strong>
                    {{ $message }}
                </strong>
            </span>
            @enderror
        </div>
        <div>
            <hr>
        </div>
        <label for="">
            <span class="icon-person">

            </span>
            Responsable recibe
        </label>
    </div>
    <div align="center" class="col">
        <div>
            <?php
            $id_user = auth()->user()->id;
            $nombre_1 = auth()->user()->name;
            $nombre_2 = auth()->user()->nombre_2;
            $apellido_1 = auth()->user()->apellido_1;
            $apellido_2 = auth()->user()->apellido_2;
            ?>
            <select disabled="disabled" class="form-control bg-light shadow-sm border-1 @error ('id_usuario_crea') is-invalid @enderror" id="id_usuario_crea" name="id_usuario_crea">
                <option value="{{$id_user}}" selected="">
                    {{$nombre_1}} {{$nombre_2}} {{$apellido_1}} {{$apellido_2}}
                </option>
            </select>
            <input type="hidden" name="id_usuario_crea" id="id_usuario_crea" value="{{$id_user}}">
        </div>
        <div>
            <hr>
        </div>
        <label for="">
            <span class="icon-person">
            </span>
            Responsable realiza

        </label>
    </div>
</div>
</div>
