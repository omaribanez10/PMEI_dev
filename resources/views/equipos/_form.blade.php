<div>
    <input type="hidden" name="id_usuario_crea" id="id_usuario_crea" value="{{ auth()->user()->id}}">
</div>
<div style="flex-direction: row;
justify-content: center; margin-top: 25px;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Consecutivo*</b></label>
        <input type="text" name="consecutivo" id="consecutivo" class="form-control bg-light shadow-sm border-1" placeholder="Consecutivo" value="{{old('consecutivo', $equipo->consecutivo)}}">

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Equipo*</b></label>
        <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control bg-light shadow-sm border-1 " placeholder="Nombre equipo" value="{{old('nombre_equipo', $equipo->nombre_equipo)}}">

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Serie</b></label>
        <input type="text" name="serie" id="serie" class="form-control bg-light shadow-sm border-1" placeholder="Serie " value="{{old('serie' , $equipo->serie)}}">
    </div>
</div>
<div style="  flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-9 mb-3">
        <label for="descripcion">
            <i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Descripción</b>
        </label>
        <textarea class="form-control bg-light shadow-sm border-1" id="descripcion" name="descripcion" rows="3">{{isset($equipo->descripcion) ? $equipo->descripcion : old('descripcion')}}
        </textarea>
    </div>
</div>
<div style="  flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Marca*</b></label>
        <input type="text" name="marca" id="marca" class="form-control bg-light shadow-sm border-1" placeholder="Marca " value="{{old('marca', $equipo->marca)}}">

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Modelo</b></label>
        <input type="text" name="modelo" id="modelo" class="form-control bg-light shadow-sm border-1" placeholder="Modelo " value="{{old('modelo' , $equipo->modelo)}}">

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Empresa*</b></label>
        <select id="id_empresa" name="id_empresa" onchange="seleccionar_sede();" class="form-control bg-light shadow-sm border-1">
            <option value="">Seleccione---</option>
            @foreach($empresas as $empresa)
            <option value="{{$empresa->id_empresa}}" {{ old('id_empresa') == $empresa->id_empresa ? 'selected' : '' }}>{{$empresa->nombre}}</option>
            @endforeach
        </select>
    </div>

</div>
<div style="  flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Sede*</b></label>
        <select id="id_sede" name="id_sede" class="form-control bg-light shadow-sm border-1">
            <option value="">Seleccione---</option>
            @foreach($sedes as $sede)
            <option value="{{$sede->id_sede}}" {{ old('id_sede') == $sede->id_sede ? 'selected' : '' }}>{{$sede->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Ubicación*</b></label>
        <select id="id_ubicacion" name="id_ubicacion" class="form-control bg-light shadow-sm border-1">
            <option value="">Seleccione---</option>
            @foreach($ubicaciones as $ubicacion)
            <option value="{{$ubicacion->id_ubicacion}}" {{ old('id_ubicacion') == $ubicacion->id_ubicacion ? 'selected' : '' }}>{{$ubicacion->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Tipo de equipo*</b></label>
        <select id="id_tipo_equipo" name="id_tipo_equipo" class="form-control bg-light shadow-sm border-1">
            <option value="">Seleccione---</option>
            @foreach($tipos_equipos as $tipo_equipo)
            <option value="{{$tipo_equipo->id_tipo_equipo}}" {{ old('id_tipo_equipo') == $tipo_equipo->id_tipo_equipo ? 'selected' : '' }}>{{$tipo_equipo->nombre}}</option>
            @endforeach
        </select>
    </div>

</div>
<div style="  flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Proveedor*</b></label>
        <select id="id_proveedor" name="id_proveedor" class="form-control bg-light shadow-sm border-1">
            <option value="">Seleccione---</option>
            @foreach($proveedores as $proveedor)
            <option value="{{$proveedor->id_proveedor}}" {{ old('id_proveedor') == $proveedor->id_proveedor ? 'selected' : '' }}>{{ $proveedor->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Estado*</b></label>
        <select id="id_estado_equipo" name="id_estado_equipo" class="form-control bg-light shadow-sm border-1 @error ('id_estado_equipo') is-invalid
    @enderror">
            <option value="">Seleccione---</option>
            @foreach($estados as $estado)
            <option value="{{$estado->id_estado_equipo}}" {{ old('id_estado_equipo') == $estado->id_estado_equipo ? 'selected' : '' }}>{{ $estado->nombre}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Registro Invima</b></label>
        <input type="text" name="registro_invima" id="registro_invima" class="form-control bg-light shadow-sm border-1" placeholder="Registro Invima" value="{{old('registro_invima', $equipo->registro_invima)}}">

    </div>
</div>
<div style="flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-6 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Foto</b></label>
        <input type="file" class="form-control-file bg-light shadow-sm border-1" id="foto" name="foto" value="{{ old('foto', $equipo->foto) }}">
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><i class="fas fa-circle-notch fa-xs"></i>&nbsp;&nbsp;&nbsp;<b>Riesgo*</b></label>
        <select id="id_riesgo" name="id_riesgo" class="form-control bg-light shadow-sm border-1">
            <option value="">Seleccione---</option>
            @foreach($riesgos as $riesgo)
            <option value="{{$riesgo->id_riesgo}}" {{ old('id_riesgo') == $riesgo->id_riesgo ? 'selected' : '' }}>{{ $riesgo->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

<!-- En esta sección, se traen los componentes que se van a guardar relacionados al equipo-->
<div>
    @if (!empty($componentes))
    <?php
    $contador = 1;
    ?>
    @foreach($componentes as $componente)
    <input type="hidden" name="id_componente_{{$contador}}" id="id_componente_{{$contador}}" value="{{$componente->id_componente}}">
    <?php
    $contador = $contador + 1;
    ?>
    @endforeach
    @endif

</div>