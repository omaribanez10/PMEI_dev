<nav style="margin-bottom: 0px;" class="navbar navbar-expand-lg navbar-light shadow-sm ">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @auth

        <li class="nav-item "> <a class=" nav-link {{ setActive('home')}}" href="{{ url('') }}"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Inicio</a></li>
        @if (auth()->user()->id_rol === 1)
       <!-- <li class="nav-item "> <a class="nav-link {{ setActive('mantenimientos*')}}" href="{{ url('mantenimientos') }}"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;&nbsp;Mantenimientos</a></li> !-->
        <li class="nav-item "> <a class=" nav-link {{ setActive('usuarios*')}}" href="{{ url('usuarios') }}"><i class="fas fa-user-lock"></i>&nbsp;&nbsp;&nbsp;Usuarios</a></li>
        <li class="nav-item "> <a class=" nav-link {{ setActive('codigos_barra*')}}" href="{{ url('codigos_barra') }}"><i class="fas fa-qrcode"></i>&nbsp;&nbsp;&nbsp;Códigos</a></li>
         <li class="nav-item "> <a class=" nav-link {{ setActive('reportes*')}}" href="{{ url('reportes') }}"><i class="fas fa-file-invoice"></i>&nbsp;&nbsp;&nbsp;Reportes</a></li>
        @endif
        <li class="nav-item"> <a class="nav-link {{ setActive('equipos*')}}" href="{{ url('equipos') }}"><i class="fas fa-tv"></i>&nbsp;&nbsp;&nbsp;Equipos</a></li>
        @endauth
        @guest
        <li class="nav-item {{ setActive('login*')}}"> <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp;Iniciar sesión</a></li>
        @else
        <li  class="nav-item {{ setActive('logout*')}}">
          <a class="nav-link" href="#" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" ><i class="fas fa-power-off"></i>&nbsp;&nbsp;&nbsp;Cerrar sesión</a>
        </li>
        @endguest
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
    </div>
  </div>
</nav>
