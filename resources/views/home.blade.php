@extends('layout')
@section('title','Home')
@section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
  <div class="row">
    <div class="col-12 col-6">
      <h1 align="center" class="display-4">PMEI</h1>
      <br><br>
      <?php
      if (!is_null((auth()->user())) && auth()->user()->id_rol == 1){
        ?>
        <h4 align="center">Mantenimientos pendientes</h4>
        <br>
        <div>
          <table class="table shadow">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Equipo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Empresa</th>
                <th scope="col">Sede</th>
                <th scope="col">Técnico</th>
                <th scope="col">Creado hace</th>
              </tr>
            </thead>
            <tbody>
             @forelse ($mantenimientos_pendientes as $mantenimiento_pendiente)
             <tr>
               <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.mantenimientos_pendientes.show' , $mantenimiento_pendiente)  }}">
                {{$mantenimiento_pendiente->nombre_equipo}}
              </a></td>
              <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.mantenimientos_pendientes.show' , $mantenimiento_pendiente)  }}">
               {{$mantenimiento_pendiente->id_tipo_equipo}}
              </a></td>
              <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.mantenimientos_pendientes.show' , $mantenimiento_pendiente)  }}">
                {{$mantenimiento_pendiente->nombre_empresa}}
              </a>
            </td>
            <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.mantenimientos_pendientes.show' , $mantenimiento_pendiente)  }}">
              {{$mantenimiento_pendiente->nombre_sede}}
            </td>
            <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.mantenimientos_pendientes.show' , $mantenimiento_pendiente)  }}">
              {{$mantenimiento_pendiente->nombre1_tec}}&nbsp;{{$mantenimiento_pendiente->apellido1_tec}}
            </td>
            <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.mantenimientos_pendientes.show' , $mantenimiento_pendiente)  }}">
              {{$mantenimiento_pendiente->created_at->diffForHumans()}}
            </td>
            <td>
              <a data-method="PATCH" class="btn btn-success" href="{{route('mantenimientos_pendientes.accept', $mantenimiento_pendiente)}}"><i class="fas fa-check"></i></a>
              <a class="btn btn-danger" href=""><i class="fas fa-times"></i></a>
            </td>
          </tr>
          @empty
          <li class="list-group-item border-0 mb-3 shadow sm">
            No tienes mantenimientos para revisar
          </li>
          @endforelse
        </tbody>
      </table>
    </div>
    <?php
  }
  /** En el caso de ser un técnico se muestra esto**/
  else if(!is_null((auth()->user())) && auth()->user()->id_rol == 2){
    ?>
    <h4 align="center">Mantenimientos aceptados</h4>
    <br>
    <div>
      <table class="table shadow">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Equipo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Empresa</th>
            <th scope="col">Sede</th>
            <th scope="col">Usuario aceptó</th>
            <th scope="col">Aceptado</th>
          </tr>
        </thead>
        <tbody>
          @forelse($mantenimientos_tecnicos_aceptados as $acept)
          <tr>
           <td><a class="text-secondary d-flex justify-content-between align-items-center" >
            {{$acept->nombre_equipo}}
          </a></td>
          <td><a class="text-secondary d-flex justify-content-between align-items-center" >
             {{$acept->id_tipo_equipo}}
          </a></td>
          <td><a class="text-secondary d-flex justify-content-between align-items-center" >
            {{$acept->nombre_empresa}}
          </a>
        </td>
        <td><a class="text-secondary d-flex justify-content-between align-items-center" >
          {{$acept->nombre_sede}}
        </td>
        <td><a class="text-secondary d-flex justify-content-between align-items-center" >
          {{$acept->nombre1_admin}}&nbsp;{{$acept->apellido1_admin}}
        </td>
        <td><a class="text-secondary d-flex justify-content-between align-items-center" >
          {{$acept->fecha_aceptacion}}
        </td>
      </tr>
      @empty
      <li class="list-group-item border-0 mb-3 shadow sm">
        No hay mantenimientos aceptados
      </li>
      @endforelse
    </tbody>
  </table>
  {{ $mantenimientos_tecnicos_aceptados->links() }}
</div>
<br>
<h4 align="center">Mantenimientos pendientes</h4>
<br>
<div>
  <table class="table shadow">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Equipo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Empresa</th>
        <th scope="col">Sede</th>
        <th scope="col">Usuario debe aceptar</th>
      </tr>
    </thead>
    <tbody>
      @forelse($mantenimientos_tecnicos_pendientes as $pend)
      <tr>
       <td><a class="text-secondary d-flex justify-content-between align-items-center">
        {{$pend->nombre_equipo}}
      </a></td>
      <td><a class="text-secondary d-flex justify-content-between align-items-center">
       {{$pend->id_tipo_equipo}}
      </a></td>
      <td><a class="text-secondary d-flex justify-content-between align-items-center">
        {{$pend->nombre_empresa}}
      </a>
    </td>
    <td><a class="text-secondary d-flex justify-content-between align-items-center">
      {{$pend->nombre_sede}}
    </td>
    <td><a class="text-secondary d-flex justify-content-between align-items-center">
      {{$pend->nombre1_admin}}&nbsp;{{$pend->apellido1_admin}}
    </td>
  </tr>
  @empty
  <li class="list-group-item border-0 mb-3 shadow sm">
    No hay manteimientos pendiente para mostrar
  </li>
  @endforelse
</tbody>
</table>
{{ $mantenimientos_tecnicos_pendientes->links() }}
</div>
<br>
<h4 align="center">Mantenimientos rechazados</h4>
<br>
<div>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Equipo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Empresa</th>
        <th scope="col">Sede</th>
        <th scope="col">Usuario rechazó</th>
      </tr>
    </thead>
    <tbody>
      @forelse($mantenimientos_tecnicos_rechazados as $recha)
      <tr>
       <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.edit' , $recha)  }}">
        {{$recha->nombre_equipo}}
      </a></td>
      <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.edit' , $recha)  }}">
       {{$recha->id_tipo_equipo}}
      </a></td>
      <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.edit' , $recha)  }}">
        {{$recha->nombre_empresa}}
      </a>
    </td>
    <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.edit' , $recha)  }}">
      {{$recha->nombre_sede}}
    </td>
    <td><a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('mantenimientos.edit' , $recha)  }}">
      {{$recha->nombre1_admin}}&nbsp;{{$recha->apellido1_admin}}
    </td>
  </tr>
  @empty
  <li class="list-group-item border-0 mb-3 shadow sm">
    No hay mantenimientos rechazados
  </li>
  @endforelse
</tbody>
</table>
{{ $mantenimientos_tecnicos_rechazados->links() }}
</div>
<?php
}else{
  ?>
  <p class="lead text-secondary">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    It has survived not only five centuries, but also the leap into electronic typesetting,
    remaining essentially unchanged.
  </p>
</div>
<div class="col-12 col-6">
  <img class="img-fluid mb-4" src="{{asset('images/home.svg')}}" alt="">
</div>
<?php
}
?>
</div>
</div>
@endsection
