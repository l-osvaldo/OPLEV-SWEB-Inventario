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
      <a href="#" class="btnp" data-toggle="modal" data-target="#modalCrearUsuario" style="background-color: #E71096; color: white;"> <i class="fa fa-plus"></i> Nuevo Usuario</a>
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
            <th>Área</th>
            <th>Cargo</th>
            <th>E-Mail</th>
            <th>Status</th>
            <th>Acciones</th>
          </tr>
        </thead>
        @foreach($listaUsuarios as $users)
        <tr>
          <td>{{ $users->nombre }} {{ $users->apePat }} {{ $users->apeMat }}</td>
          <td>{{ $users->username }}</td>
          <td>{{ $users->area }}</td>
          <td>{{ $users->cargo }}</td>
          <td>{{ $users->email }}</td> 
          <!--Status-->
          <td align="center">
            <button class="btn {{ $users->status === 1 ? 'btn-success' : 'btn-danger' }} btn-sm" style="border-radius: 0 !important; font-size: 0.780rem !important;" data-idUsuario= "{{ $users->user_id }}" data-estadoUsuario="{{ $users->status }}">
              {{ $users->status === 1 ? 'Activado' : 'Desactivado' }}
            </button>
          </td> 
          <!--Status-->
          <td>
            <div class="dropdown">
              <button class="btn btn-secondary2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-reorder"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="btn-group" role="group" aria-label="Basic example">
                  
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
              </div>
            </div>
          </div>
        </td> 
      </tr>
      @endforeach 
    </table>
  </div>
</div>
</section>


<div class="modal fade bd-example-modal-lg" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="modalCrearUsuarioLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <form method="POST" action="{{ route('registroUsuario') }}" id="form">
        {{ csrf_field()}}
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
              <h5 class="modal-title" id="modalCrearUsuarioLabel"><b>Registro de Usuarios</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
          </div>
          <div class="modal-body">
              <div class="row">
                <div class="col">
                 <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label for="nombre"><b>{{ __('Nombre/s') }}</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
                        <input class="form-control form-control-sm validateDataUsuario" data-myTypeUsuario="text" data-errorUsuario= "12" data-validacionUsuario="1" type="text" id="nombre" name="nombre" onKeyPress="return soloLetras(event,'');">
                    </div>
                    <span class="text-danger error12"></span>
                 </div>
                </div>
                <div class="col">
                 <div class="form-group {{ $errors->has('apePat') ? ' is-invalid' : '' }}">
                    <label for="apePat"><b>{{ __('Apellido Paterno') }}</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
                        <input class="form-control form-control-sm validateDataUsuario" data-myTypeUsuario="text" data-errorUsuario= "13" data-validacionUsuario="1" type="text" id="apePat" name="apePat" onKeyPress="return soloLetras(event,'');">
                    </div>
                    <span class="text-danger error13"></span>
                 </div>
                </div>
                <div class="col">
                 <div class="form-group {{ $errors->has('apeMat') ? ' is-invalid' : '' }}">
                    <label for="apeMat"><b>{{ __('Apellido Materno') }}</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
                        <input class="form-control form-control-sm validateDataUsuario" data-myTypeUsuario="text" data-errorUsuario= "14" data-validacionUsuario="1" type="text" id="apeMat" name="apeMat" onKeyPress="return soloLetras(event,'');">
                    </div>
                    <span class="text-danger error14"></span>
                 </div>
                </div>
               </div>
                <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <label for="correo"><b>{{ __('E-mail') }}</b></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-at"></i></span>    
                        <input class="form-control form-control-sm validateDataUsuario" data-myTypeUsuario="email" data-errorUsuario= "15" data-validacionUsuario="1" type="email" id="correo" name="correo">
                    </div>
                    <span class="text-danger error15"></span>
               </div>
               <div class="row">
                  <div class="col">
                    <div class="form-group {{ $errors->has('username') ? ' is-invalid' : '' }}">
                        <label for="usuario"><b>{{ __('Usuario/a') }}</b></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>    
                            <input class="form-control form-control-sm validateDataUsuario" type="text" data-validacionUsuario="1" id="usuario" name="usuario" readonly>
                        </div>
                        <span class="text-danger error17"></span>
                    </div>
                  </div>   
                 <div class="col">
                    <div class="form-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                        <label for="contraseña"><b>{{ __('Generar Contraseña') }}</b></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>    
                            <input class="form-control form-control-sm validateDataUsuario" data-myTypeUsuario="password" data-errorUsuario= "16" data-validacionUsuario="1" type="password" id="contPass" name="contPass" readonly>
                            <div class="btn-group" role="group">
                              <a class="btnsm btn-pass2" id="passwordGenerate" name="passwordGenerate"><i class="fa fa-key" style="color: #FFFFFF;"></i></a>
                              <a class="btnsm btn-danger" id="showPass" name="showPass"><i class="fa fa-eye" style="color: #FFFFFF;"></i></a>
                              <a class="btnsm btn-warning" id="passCopi" name="passCopi"><i class="fa fa-clipboard" style="color: #FFFFFF;"></i></a>
                         </div>
                        </div>
                        <span class="text-danger error16"></span>
                    </div>
                </div>  
              </div>     
           </form>  
          </div>
            <div class="card-footer">
              <button type="button" class="btnp btn-salir" data-dismiss="modal">Salir</button>  
              <button type="submit" id="btnCrearUsuario" class="btnp btn-personalizado float-right" disabled>Guardar</button>   
            </div>   
        </div>
      </div>
    </div>



@endsection
