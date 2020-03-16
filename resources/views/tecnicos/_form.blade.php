@csrf
<div class="form-row">
    <div class="form-group col-md-3 mb-3 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Primer Nombre</label>
        <input type="text" name="nombre_1" class="form-control bg-light shadow-sm border-1 @error ('nombre_1') is-invalid
          @enderror" placeholder="Primer Nombre" value="{{old('nombre_1', $tecnico->nombre_1)}}">
        @error ('nombre_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror

    </div>
    <div class="form-group col-md-3 mb-3">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Segundo Nombre </label>
        <input type="text" name="nombre_2" class="form-control bg-light shadow-sm border-1" placeholder="Segundo Nombre"
            value="{{old('nombre_2', $tecnico->nombre_2)}}">
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Primer Apellido </label>
        <input type="text" name="apellido_1" class="form-control bg-light shadow-sm border-1 @error ('apellido_1') is-invalid
          @enderror" placeholder="Primer Apellido" value="{{old('apellido_1', $tecnico->apellido_1)}}">
        @error ('apellido_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-3 mb-3">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Segundo Apellido </label>
        <input type="text" name="apellido_2" class="form-control bg-light shadow-sm border-1  @error ('apellido_2') is-invalid
          @enderror" placeholder="Segundo Apellido" value="{{old('apellido_2', $tecnico->apellido_2)}}">
        @error ('apellido_2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>

</div>
<div class="form-row">
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-archive"></span>&nbsp;&nbsp;&nbsp;Tipo Documento</label>
        <select id="tipo_documento" name="tipo_documento" class="form-control bg-light shadow-sm border-1  @error ('tipo_documento') is-invalid
          @enderror">
            <option></option>
            <option selected>{{old('tipo_documento', $tecnico->tipo_documento)}}</option>
            <option>CC</option>
            <option>TI</option>
            <option>RC</option>
        </select>
        @error ('tipo_documento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror

    </div>
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-looks_one"></span>&nbsp;&nbsp;&nbsp;Numero de documento</label>
        <input type="number" name="numero_documento" class="form-control bg-light shadow-sm border-1  @error ('numero_documento') is-invalid
          @enderror" placeholder="Numero de documento" value="{{old('numero_documento', $tecnico->numero_documento)}}">
        @error ('numero_documento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-label_important"></span>&nbsp;&nbsp;&nbsp;Sexo</label>
        <select id="sexo" name="sexo" class="form-control bg-light shadow-sm border-1 @error ('sexo') is-invalid
          @enderror">
            <option selected>{{old('sexo', $tecnico->sexo)}}</option>
            <option></option>
            <option>M</option>
            <option>F</option>
        </select>
        @error ('sexo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-contact_phone"></span>&nbsp;&nbsp;&nbsp;Telefono</label>
        <input type="number" name="telefono" class="form-control bg-light shadow-sm border-1"
            placeholder="Numero de telefono" value="{{old('telefono', $tecnico->telefono)}}">

    </div>
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-home_filled"></span>&nbsp;&nbsp;&nbsp;Dirección</label>
        <input type="text" name="direccion" class="form-control bg-light shadow-sm border-1" placeholder="Direccion"
            value="{{old('direccion', $tecnico->direccion)}}">

    </div>
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-face"></span>&nbsp;&nbsp;&nbsp;Nombre de usuario</label>
        <input type="text" name="nombre_login" class="form-control bg-light shadow-sm border-1  @error ('nombre_login') is-invalid
          @enderror" placeholder="Nombre de usuario" value="{{old('nombre_login', $tecnico->nombre_login)}}">
        @error ('nombre_login')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-fingerprint"></span>&nbsp;&nbsp;&nbsp;Contraseña</label>
        <input type="password" name="contrasena" class="form-control bg-light shadow-sm border-1 @error ('contrasena') is-invalid
        @enderror" placeholder="Contraseña" value="{{old('contrasena', $tecnico->contrasena)}}">
        @error ('contrasena')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-school"></span>&nbsp;&nbsp;&nbsp;Profesion</label>
        <input type="text" name="profesion" class="form-control bg-light shadow-sm border-1  @error ('profesion') is-invalid
        @enderror" placeholder="Profesion" value="{{old('profesion', $tecnico->profesion)}}">

    </div>
    <div class="form-group col-md-4 mb-3">
        <label><span class="icon-work_outline"></span>&nbsp;&nbsp;&nbsp;Cargo</label>
        <input type="text" name="cargo" class="form-control bg-light shadow-sm border-1 @error ('cargo') is-invalid
        @enderror" placeholder="Cargo" value="{{old('cargo', $tecnico->cargo)}}">

    </div>
</div>
