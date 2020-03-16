@section('title','Usuarios')
@extends('layout')
@section('content')
<div class="col-md-8 container mx-auto my-auto shadow rounded py-3 px-3">
    <div class="d-flex justify-content-between align-center mb-3">
        <h2 class="mg-0">
            <i class="">
            </i>
            Usuarios
        </h2>
        <form action="{{route('usuarios.showRegistrationForm')}}" class="needs-validation">
            @csrf
            <button class="btn btn-primary shadow" type="submit">
               <i class="fas fa-plus"></i>&nbsp;&nbsp;Registrar usuario
            </button>
        </form>
    </div>
    <table class="table shadow">
        <thead class="thead-dark">
            <tr>
                <th scope="col">
                    Nombre
                </th>
                <th scope="col">
                    Email
                </th>
                <th scope="col">
                    Rol
                </th>
                <th scope="col">
                    Creado
                </th>
            </tr>
        </thead>
        @forelse ($users as $user)
        <tbody>
            <tr>
                <th scope="row"><i class="far fa-user"></i>&nbsp;&nbsp;{{ $user->name }} {{ $user->nombre_2 }} {{ $user->apellido_1 }} {{ $user->apellido_2 }}
                </th>
                <td>
                    <i class="far fa-envelope-open"></i>&nbsp;&nbsp;{{ $user->email}}
                </td>
                <td>
                    {{ $user->nombre_rol}}
                </td>
                <td>
                    <i class="far fa-clock"></i>&nbsp;&nbsp;{{ $user->created_at}}
                </td>
            </tr>
        </tbody>
        @empty
        <li class="list-group-item border-0 mb-3 shadow sm">
            No hay usuarios para mostrar
        </li>
        @endforelse
    </table>
</div>
@endsection
