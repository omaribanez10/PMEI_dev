<div>
    <input type="hidden" name="id_usuario_crea" id="id_usuario_crea" value="{{ auth()->user()->id}}">
    <input type="hidden" name="id_equipo" id="id_equipo" @if(!empty($equipo_det[0])) value="{{ $equipo_det[0]->id}}" @endif>
</div>

<div style="flex-direction: row;
justify-content: center; margin-top: 25px;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><b>Consecutivo*</b></label>
        <input type="text" name="consecutivo" id="consecutivo" class="form-control bg-light shadow-sm border-1" placeholder="Consecutivo" @if(!empty($equipo_det[0]))
        value="{{old('consecutivo', $equipo_det[0]->consecutivo)}}" @endif>

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Equipo*</b></label>
        <input type="text" name="nombre_equipo" id="nombre_equipo" class="form-control bg-light shadow-sm border-1 " placeholder="Nombre equipo" @if(!empty($equipo_det[0]))
        value="{{old('nombre_equipo', $equipo_det[0]->nombre_equipo)}}" @endif>

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Serie</b></label>
        <input type="text" name="serie" id="serie" class="form-control bg-light shadow-sm border-1" placeholder="Serie " @if(!empty($equipo_det[0])) 
        value="{{old('serie' , $equipo_det[0]->serie)}}" @endif>
    </div>
</div>
<div style="flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-9 mb-3">
        <label for="descripcion">
            <b>Descripción</b>
        </label>
        <textarea class="form-control bg-light shadow-sm border-1" id="descripcion" name="descripcion" rows="3">{{isset($equipo_det[0]->descripcion) ? $equipo_det[0]->descripcion : old('descripcion')}}
        </textarea>
    </div>
</div>
<div style="flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><b>Marca*</b></label>
        <input type="text" name="marca" id="marca" class="form-control bg-light shadow-sm border-1" placeholder="Marca" @if(!empty($equipo_det[0])) 
        value="{{old('marca', $equipo_det[0]->marca)}}" @endif>

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Modelo</b></label>
        <input type="text" name="modelo" id="modelo" class="form-control bg-light shadow-sm border-1" placeholder="Modelo " @if(!empty($equipo_det[0]))
        value="{{old('modelo' , $equipo_det[0]->modelo)}}" @endif>

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Empresa*</b></label>
        <select id="id_empresa" name="id_empresa" onchange="seleccionar_sede();" class="form-control bg-light shadow-sm border-1">
           
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_empresa}}" {{ old('id_empresa') == $equipo_det[0]->id_empresa ? 'selected' : '' }}>{{$equipo_det[0]->empresa}}</option>
            @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($empresas as $empresa)
            <option value="{{$empresa->id_empresa}}" {{ old('id_empresa') == $empresa->id_empresa ? 'selected' : '' }}>{{$empresa->nombre}}</option>
            @endforeach
        </select>
    </div>

</div>
<div style="  flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><b>Sede*</b></label>
        <select id="id_sede" name="id_sede" class="form-control bg-light shadow-sm border-1">
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_sede}}" {{ old('id_sede') == $equipo_det[0]->id_sede ? 'selected' : '' }}>{{$equipo_det[0]->sede}}</option>
            @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($sedes as $sede)
                <option value="{{$sede->id_sede}}" {{ old('id_sede') == $sede->id_sede ? 'selected' : '' }}>{{$sede->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Ubicación*</b></label>
        <select id="id_ubicacion" name="id_ubicacion" class="form-control bg-light shadow-sm border-1">
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_ubicacion}}" {{ old('id_ubicacion') == $equipo_det[0]->id_ubicacion ? 'selected' : '' }}>{{$equipo_det[0]->ubicacion}}</option>
            @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($ubicaciones as $ubicacion)
                <option value="{{$ubicacion->id_ubicacion}}" {{ old('id_ubicacion') == $ubicacion->id_ubicacion ? 'selected' : '' }}>{{$ubicacion->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Tipo de equipo*</b></label>
        <select id="id_tipo_equipo" name="id_tipo_equipo" class="form-control bg-light shadow-sm border-1">
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_tipo_equipo}}" {{ old('id_tipo_equipo') == $equipo_det[0]->id_tipo_equipo ? 'selected' : '' }}>{{$equipo_det[0]->tipo_equipo}}</option>
            @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($tipos_equipos as $tipo_equipo)
                <option value="{{$tipo_equipo->id_tipo_equipo}}" {{ old('id_tipo_equipo') == $tipo_equipo->id_tipo_equipo ? 'selected' : '' }}>{{$tipo_equipo->nombre}}</option>
            @endforeach
        </select>
    </div>

</div>
<div style="  flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-3 mb-3">
        <label><b>Proveedor*</b></label>
        <select id="id_proveedor" name="id_proveedor" class="form-control bg-light shadow-sm border-1">
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_proveedor}}" {{ old('id_proveedor') == $equipo_det[0]->id_proveedor ? 'selected' : '' }}>{{$equipo_det[0]->proveedor}}</option>
             @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($proveedores as $proveedor)
                <option value="{{$proveedor->id_proveedor}}" {{ old('id_proveedor') == $proveedor->id_proveedor ? 'selected' : '' }}>{{ $proveedor->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Estado*</b></label>
        <select id="id_estado_equipo" name="id_estado_equipo" class="form-control bg-light shadow-sm border-1 @error ('id_estado_equipo') is-invalid
    @enderror">
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_estado_equipo}}" {{ old('id_estado_equipo') == $equipo_det[0]->id_estado_equipo ? 'selected' : '' }}>{{$equipo_det[0]->estado_equipo}}</option>
            @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($estados as $estado)
            <option value="{{$estado->id_estado_equipo}}" {{ old('id_estado_equipo') == $estado->id_estado_equipo ? 'selected' : '' }}>{{ $estado->nombre}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Registro Invima</b></label>
        <input type="text" name="registro_invima" id="registro_invima" class="form-control bg-light shadow-sm border-1" placeholder="Registro Invima" @if(!empty($equipo_det[0])) 
        value="{{old('registro_invima', $equipo_det[0]->registro_invima)}}" @endif>

    </div>
</div>
<div style="flex-direction: row;
justify-content: center;" class="form-row">
    <div class="form-group col-md-6 mb-3">
        <label><b>Foto</b></label>
        <input type="file" class="form-control-file bg-light shadow-sm border-1" id="foto" name="foto" @if(!empty($equipo_det[0])) 
        value="{{ old('foto', $equipo_det[0]->foto) }}" @endif>
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><b>Riesgo*</b></label>
        <select id="id_riesgo" name="id_riesgo" class="form-control bg-light shadow-sm border-1">
            @if (!empty($equipo_det[0]))
                <option value="{{$equipo_det[0]->id_riesgo}}" {{ old('id_riesgo') == $equipo_det[0]->id_riesgo ? 'selected' : '' }}>{{$equipo_det[0]->riesgo}}</option>
            @else
                <option value="">Seleccione---</option>
            @endif
            @foreach($riesgos as $riesgo)
                <option value="{{$riesgo->id_riesgo}}" {{ old('id_riesgo') == $riesgo->id_riesgo ? 'selected' : '' }}>{{ $riesgo->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div style="flex-direction: row; margin-top: 30px; margin-bottom: 20px;
justify-content: center;" class="form-row">
    @if(empty($equipo_det[0]->id))
        <div class="form-group col-md-2 mb-2">
            <button type="button" class="btn btn-primary" id="guardar_equipo"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
        </div>
        @else 
        <div class="form-group col-md-3 mb-3">
            <button type="button" class="btn btn-primary shadow" id="guardar_equipo"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Guardar editar</button>
            <a class="btn btn-primary shadow" href="{{ route('equipos.show',  $equipo_det[0]) }}"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;Volver</a>
        </div>
        @endif
        
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