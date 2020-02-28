@extends('layouts.admin')
@section('title', 'Gestor de usuarios')
@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Gestor de Usuarios'])
<!-- /.navbar -->

@include('sweet::alert')


<section class="content" style="margin-top: 2vh;">
  <div class="card">
    <div class="card-body">
      <a href="#" class="btnp" data-toggle="modal" data-target="#modalNuevoUsuario" style="background-color: #E71096; color: white;"> <i class="fa fa-plus"></i> Nuevo Usuario</a>
    </div>
  </div>
  <div class="card">
    <h5 class="card-header">Listado de Usuarios</h5>
    <div class="card-body">
      <table id="listadeusuarios" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Nombre Completo</th>
            <th>Usuario</th>
            <th>Área/Asociación</th>
            <th>Cargo</th>
            <th>Rol Asignado</th>
            <th>E-Mail</th>
            @if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('operativo'))
            <th>Status</th>
            <th>Acciones</th>
            @endif
          </tr>
        </thead>
        @foreach($listausuarios as $users)
        <tr>
          <td>{{ $users->nombre }} {{ $users->apePat }} {{ $users->apeMat }}</td>
          <td>{{ $users->username }}</td>
          <td>{{ $users->area }}</td>
          <td>{{ $users->cargo }}</td>
          <td>{{ $users->description }}</td>
          <td>{{ $users->email }}</td>
          <!--Status-->
          @if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('operativo'))
          <td>
            @if($users->user_id === Auth::user()->id)
            @else
            @if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('operativo'))
            <button class="btn {{ $users->status === 1 ? 'btn-success' : 'btn-red' }} btn-sm estatusBtn" data-idUsuario= "{{ $users->user_id }}" data-estadoUsuario="{{ $users->status }}">
              {{ $users->status === 1 ? 'Activado' : 'Desactivado' }}
            </button>
            @else
            <button class="btn {{ $users->status === 1 ? 'btn-success' : 'btn-red' }} btn-sm estatusBtn" data-idUsuario= "{{ $users->user_id }}" data-estadoUsuario="{{ $users->status }}" disabled="true">
              {{ $users->status === 1 ? 'Activado' : 'Desactivado' }}
            </button>
            @endif
            @endif
          </td> 
          <!--Status-->
          <td>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-reorder"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="btn-group" role="group" aria-label="Basic example">
                  @if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('admin'))
                  <a class="btn btn-pass2" data-toggle="tooltip" data-placement="top" title="Ver Cédula" href="{{ config('app.url')}}/reporte-usuario/{{ $users->user_id }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                  <button class="btn btn-success" 
                  data-id="{{ $users->user_id }}" 
                  data-area="{{ $users->area }}"
                  data-areaid="{{ $users->id_area }}" 
                  data-cargo="{{ $users->cargo }}"
                  data-rol="{{ $users->description }}"
                  data-rolid="{{ $users->role_id }}"
                  data-nombre="{{ $users->nombre }}"
                  data-ap="{{ $users->apePat }}"
                  data-am="{{ $users->apeMat }}"
                  data-email="{{ $users->email }}"
                  data-usuario="{{ $users->username }}"
                  data-toggle="modal" data-target="#editModal">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Editar" style="color: #fff;">
                    <i class="fa fa-pencil"></i>
                  </a>
                </button>
                <button class="btn btn-warning" data-toggle="modal" data-id="{{ $users->user_id }}" data-target="#passwordModal">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Cambiar Contraseña" style="color: #fff;">
                    <i class="fa fa-key"></i>
                  </a>
                </button>
                <button class="btn btn-danger deleteUser" data-id="{{ $users->user_id }}" data-name="{{ $users->nombre }} {{ $users->apePat }} {{ $users->apeMat }}">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Eliminar" style="color: #fff;">
                    <i class="fa fa-times"></i>
                  </a>
                </button>
                @else
                <a class="btn btn-pass2" data-toggle="tooltip" data-placement="top" title="Ver Cédula" href="{{ config('app.url')}}/reporte-usuario/{{ $users->user_id }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                @endif 
              </div>
            </div>
          </div>
        </td>
        @endif
      </tr>
      @endforeach 
    </table>
  </div>
</div>
</section>



@endsection
