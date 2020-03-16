@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="modal-dialog text-center">
         <div class="col-sm-9 main-section">

           <div class="modal-content shadow">
           <div class="col-md-12">
		   
             <img class="imagen_login" src="{{asset('/images/login_profile.svg')}}" alt="">
           </div>
          <div class="col-md-12">
                      <form method="POST" action="{{ route('login') }}">
                          @csrf
                          <div class="form-group row">
                              <div class="col-md-12">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder=" Correo">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-12">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                    placeholder="Contraseña">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary btn-block shadow"><span class="icon-fingerprint"></span>&nbsp;&nbsp;&nbsp;Iniciar sesión</button>
                              </div>
                              <div class="col-md-12">
                                  @if (Route::has('password.request'))
                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                          ¿Olvidaste tu contraseña?
                                      </a>
                                  @endif
                              </div>
                          </div>
                      </form>
          </div>
        </div>
      </div>
     </div>
    </div>
</div>
@endsection
