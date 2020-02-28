@extends('layouts.admin')
@section('content')
@if(!Auth::user()->hasRole('consulta'))
<!-- Sweet Alert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/dist/sweetalert2.css') }}">
<script src="{{ asset('/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@if (Session::has('sweet_alert.alert'))
<script>
  Swal.fire({
    text: "{!! Session::get('sweet_alert.text') !!}",
    title: "{!! Session::get('sweet_alert.title') !!}",
    type: "{!! Session::get('sweet_alert.type') !!}"
  });
</script>
@endif
<!-- /.content-header -->
<!-- Main content -->
<section class="content" style="margin-top: 2vh;">
  <div class="card">
    <div class="card-body">
      @if($tipo == 'OPLE')
      <a href="#" class="btnp btn-danger" data-toggle="modal" data-target="#exampleModal">Nuevo Usuario</a>
      @else
      @if(Auth::user()->hasRole('supervisor'))
      <a href="#" class="btnp btn-danger" data-toggle="modal" data-target="#modalAPES" id="btnModalApes">Nuevo Usuario</a>
      @endif
      @endif
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

@if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('admin'))
<!-- Modal cambiar contraseña-->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #a90a6c; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Generar Nueva Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
          <div class="form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-key"></i></span>    
              <input class="form-control form-control-sm valEditPassword" type="text" id="contPassEdit" name="contPassEdit" data-myType="password" data-error="1" data-validacion="1">
              <input type="hidden" id="editPassword" name="editPassword">
              <div class="btn-group" role="group">
                <a class="btnsm btn-pass2" id="passwordGenerateEdit" name="passwordGenerateEdit"><i class="fa fa-key" style="color: #FFFFFF;"></i></a><a class="btnsm btn-danger" id="showPassEdit" name="showPassEdit"><i class="fa fa-eye" style="color: #FFFFFF;"></i></a><a class="btnsm btn-warning" id="passCopiEdit" name="passCopiEdit"><i class="fa fa-clipboard" style="color: #FFFFFF;"></i></a>
              </div>
            </div>
            <span class="text-danger errorEditPassword1" id="errorPassEdit"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <form method="POST" id="formDelete">
          @csrf <!-- {{ csrf_field() }} -->
          <button type="submit" id="passwordBtn" class="btnp btn-personalizado float-right">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

@if(Auth::user()->hasRole('supervisor') || Auth::user()->hasRole('admin'))
<!-- Modal editar usuarios -->
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #a90a6c; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="row">
            <div class="col">
             <div class="form-group">
              <label for="nombre"><b>Nombre/s</b></label>
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
                <input class="form-control form-control-sm valEdit" type="text" id="editNombre" name="editNombre" data-myType="text" data-error= "1" data-validacion="0">
              </div>
              <span class="text-danger errorEdit1"></span>
            </div>
          </div>
          <div class="col">
           <div class="form-group">
            <label for="apePat"><b>Apellido Paterno</b></label>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
              <input class="form-control form-control-sm valEdit" type="text" id="editAp" name="editAp" data-myType="text" data-error="2" data-validacion="0">
            </div>
            <span class="text-danger errorEdit2"></span>
          </div>
        </div>
        <div class="col">
         <div class="form-group">
          <label for="apeMat"><b>Apellido Materno</b></label>
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
            <input class="form-control form-control-sm valEdit" type="text" id="editAm" name="editAm" name="editAp" data-myType="text" data-error="3" data-validacion="0">
          </div>
          <span class="text-danger errorEdit3"></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="correo"><b>E-mail</b></label>
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-at"></i></span>    
        <input class="form-control form-control-sm valEdit" type="text" id="editEmail" name="editEmail" name="editAp" data-myType="email" data-error="4" data-validacion="0">
      </div>
      <span class="text-danger errorEdit4"></span>
    </div>
  </div>

  <div class="modal-footer">
    <button type="submit" id="editBtn" class="btnp btn-personalizado float-right">Actualizar</button>
    <input type="hidden" name="userId" id="actualizarUser">
  </div>
</form>
</div>
</div>
</div>
@endif

@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('operativo'))
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #a90a6c; color:white">
        <h5 class="modal-title" id="exampleModalLabel"><b>Nuevo Usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div align="center"><b>¿Qué tipo de usuario desea agregar?<b></div>
        </div>
        <div class="card-footer">
          <button type="button" class="btnp btn-opledos" data-dismiss="modal" data-toggle="modal" data-target="#modalAPES">APES</button>
          <button type="button" class="btnp btn-opledos float-right" data-dismiss="modal" data-toggle="modal" data-target="#modalOPLE"> OPLE</button>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if($tipo == 'OPLE')
  @include('partials.createople')
  @include('partials.createape')
  @else
  @include('partials.createape')
  @endif
  @else
  <script type="text/javascript">
    window.location = "{{ url('/inicio-ople') }}";//here double curly bracket
  </script>
  @endif
  @endsection
