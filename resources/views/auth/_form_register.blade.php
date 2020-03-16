@csrf
<div class="form_register form-row">
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Primer nombre*</label>
        <input id="name" type="text"
        class=" form-control  bg-light shadow-sm border-1 @error('name') is-invalid @enderror" name="name"
        value="{{ old('name') }}"  autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="  form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Segundo Nombre</label>
        <input type="text" name="nombre_2" class=" form-control bg-light shadow-sm border-1 @error ('nombre_2') is-invalid
        @enderror" value="{{ old('nombre_2') }}">
        @error ('nombre_2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>

    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Primer Apellido*</label>
        <input type="text" name="apellido_1" class=" form-control bg-light shadow-sm border-1 @error ('apellido_1') is-invalid
        @enderror" value="{{ old('apellido_1') }}">
        @error ('apellido_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>

    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Segundo Apellido*</label>
        <input type="text" name="apellido_2" class=" form-control bg-light shadow-sm border-1 @error ('apellido_2') is-invalid
        @enderror" value="{{ old('apellido_2') }}">
        @error ('apellido_2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }} </strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Correo*</label>
        <input id="email" type="email"
        class=" form-control bg-light shadow-sm border-1 @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}"  autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Nombre usuario*</label>
        <input id="nombre_login" type="text"
        class=" form-control bg-light shadow-sm border-1 @error('nombre_login') is-invalid @enderror"
        name="nombre_login" value="{{ old('nombre_login') }}"  autocomplete="nombre_login">

        @error('nombre_login')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Contraseña*</label>
        <input id="password" type="password"
        class=" form-control bg-light shadow-sm border-1 @error('password') is-invalid @enderror" name="password"
        autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Confirmar contraseña</label>
        <input id="password-confirm" type="password" class=" form-control bg-light shadow-sm border-1" name="password_confirmation"
        autocomplete="new-password">
    </div>
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Dirección</label>
        <input id="direccion" type="text"
        class=" form-control bg-light shadow-sm border-1 @error('direccion') is-invalid @enderror" name="direccion"
        value="{{ old('direccion') }}">
        @error('direccion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Telefono Fijo</label>
        <input id="telefono_1" type="text"
        class=" form-control bg-light shadow-sm border-1 @error('telefono_1') is-invalid @enderror" name="telefono_1"
        value="{{ old('telefono_1') }}">
        @error('telefono_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Telefono celular*</label>
        <input id="telefono_2" type="text"
        class=" form-control bg-light shadow-sm border-1 @error('telefono_2') is-invalid @enderror" name="telefono_2"
        value="{{ old('telefono_2') }}">
        @error('telefono_2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4 ">
        <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Fecha nacimiento*</label>
        <input id="fecha_nacimiento" type="date"
        class=" form-control bg-light shadow-sm border-1 @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento"
        value="{{ old('fecha_nacimiento') }}">
        @error('fecha_nacimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class=" form-group col-md-4 mb-4">
        <label><span class="icon-label_important"></span>&nbsp;&nbsp;&nbsp;Género*</label>
        <select id="genero" name="genero" class=" form-control bg-light shadow-sm border-1 @error ('genero') is-invalid
        @enderror"   value="{{ old('genero') }}">
        <option>Seleccione genero</option>

        <option>M</option>
        <option>F</option>
    </select>
    @error ('genero')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }} </strong>
    </span>
    @enderror
</div>
<div class=" form-group col-md-4 mb-4">
    <label><span class="icon-label_important"></span>&nbsp;&nbsp;&nbsp;Tipo documento*</label>
    <select id="tipo_documento" name="tipo_documento" class=" form-control bg-light shadow-sm border-1 @error ('tipo_documento') is-invalid
    @enderror"
    value="{{ old('tipo_documento') }}">
    <option value="">Seleccione</option>
    @foreach($tipos_documentos as $documento)
     <option value="{{$documento->id}}" {{ old('tipo_documento') == $documento->id ? 'selected' : '' }} >{{$documento->nombre}}</option>
    @endforeach
</select>
@error ('tipo_documento')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }} </strong>
</span>
@enderror
</div>
<div class=" form-group col-md-4 mb-4 ">
    <label><span class="icon-switch_account"></span>&nbsp;&nbsp;&nbsp;Número documento*</label>
    <input id="numero_documento" type="text"
    class=" form-control bg-light shadow-sm border-1 @error('numero_documento') is-invalid @enderror" name="numero_documento"
    value="{{ old('numero_documento') }}">
    @error('numero_documento')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class=" form-group col-md-4 mb-4">
    <label><span class="icon-label_important"></span>&nbsp;&nbsp;&nbsp;Tipo usuario*</label>
    <select id="id_rol" name="id_rol" class=" form-control bg-light shadow-sm border-1 @error ('id_rol') is-invalid
    @enderror"
    value="{{ old('id_rol') }}">
    <option value="">Seleccione</option>
    @foreach($roles as $rol)
    <option value="{{$rol->id_rol}}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }} >{{$rol->nombre}}</option>
    @endforeach
</select>
@error ('id_rol')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }} </strong>
</span>
@enderror
</div>
</div>
