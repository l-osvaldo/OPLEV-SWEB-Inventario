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
            <a class="btnp" data-target="#modalCrearUsuario" data-toggle="modal" href="#" style="background-color: #E71096; color: white;">
                <i class="fa fa-plus">
                </i>
                Nuevo Usuario
            </a>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">
            Listado de Usuarios
        </h5>
        <div class="card-body">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="listadeusuarios" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            Nombre Completo
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Área
                        </th>
                        <th>
                            E-Mail
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                @foreach($listaUsuarios as $users)
                <tr>
                    <td>
                        {{ $users->nombre }} {{ $users->apePat }} {{ $users->apeMat }}
                    </td>
                    <td>
                        {{ $users->username }}
                    </td>
                    <td>
                        {{ $users->area }}
                    </td>
                    <td>
                        {{ $users->email }}
                    </td>
                    <!--Status-->
                    <td align="center">
                        <button class="btn {{ $users->status === 1 ? 'btn-success' : 'btn-danger' }} btn-sm estatusBtn" data-estadousuario="{{ $users->status }}" data-idusuario="{{ $users->id }}" style="border-radius: 0 !important; font-size: 0.780rem !important;">
                            {{ $users->status === 1 ? 'Activado' : 'Desactivado' }}
                        </button>
                    </td>
                    <!--Status-->
                    <td align="center">
                        <div class="dropdown">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary2 dropdown-toggle btnPersonalizado" data-toggle="dropdown" id="dropdownMenuButton" type="button">
                                <i class="fa fa-reorder">
                                </i>
                            </button>
                            <div aria-labelledby="dropdownMenuButton" class="dropdown-menu dropmenuPersonalizado">
                                <div aria-label="Basic example" class="btn-group" role="group">
                                    <button class="btn btn-success btnPersonalizado2" data-am="{{ $users->apeMat }}" data-ap="{{ $users->apePat }}" data-area="{{ $users->area }}" data-areaid="{{ $users->id_area }}" data-email="{{ $users->email }}" data-id="{{ $users->id }}" data-nombre="{{ $users->nombre }}" data-target="#editModalUsuario" data-toggle="modal" data-usuario="{{ $users->username }}">
                                        <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Editar">
                                            <i class="fa fa-pencil">
                                            </i>
                                        </a>
                                    </button>
                                    <button class="btn btn-warning btnPersonalizado2" data-id="{{ $users->id }}" data-target="#passwordModalUsuario" data-toggle="modal">
                                        <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Cambiar Contraseña">
                                            <i class="fa fa-key">
                                            </i>
                                        </a>
                                    </button>
                                    <button class="btn btn-danger deleteUser btnPersonalizado2" data-id="{{ $users->id }}" data-name="{{ $users->nombre }} {{ $users->apePat }} {{ $users->apeMat }}">
                                        <a data-placement="top" data-toggle="tooltip" href="#" style="color: #fff;" title="Eliminar">
                                            <i class="fa fa-times">
                                            </i>
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
{{--  modal para crear un usuario --}}
<div aria-hidden="true" aria-labelledby="modalCrearUsuarioLabel" class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" id="modalCrearUsuario" role="dialog" tabindex="-1">
    <form action="{{ route('registroUsuario') }}" id="form" method="POST">
        {{ csrf_field()}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #a90a6c; color:white">
                    <h5 class="modal-title" id="modalCrearUsuarioLabel">
                        <b>
                            Registro de Usuarios
                        </b>
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                <label for="nombre">
                                    <b>
                                        {{ __('Nombre/s') }}
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm validateDataUsuario" data-errorusuario="12" data-mytypeusuario="text" data-validacionusuario="1" id="nombre" name="nombre" onkeypress="return soloLetras(event,'');" type="text">
                                    </input>
                                </div>
                                <span class="text-danger error12">
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group {{ $errors->has('apePat') ? ' is-invalid' : '' }}">
                                <label for="apePat">
                                    <b>
                                        {{ __('Apellido Paterno') }}
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm validateDataUsuario" data-errorusuario="13" data-mytypeusuario="text" data-validacionusuario="1" id="apePat" name="apePat" onkeypress="return soloLetras(event,'');" type="text">
                                    </input>
                                </div>
                                <span class="text-danger error13">
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group {{ $errors->has('apeMat') ? ' is-invalid' : '' }}">
                                <label for="apeMat">
                                    <b>
                                        {{ __('Apellido Materno') }}
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm validateDataUsuario" data-errorusuario="14" data-mytypeusuario="text" data-validacionusuario="1" id="apeMat" name="apeMat" onkeypress="return soloLetras(event,'');" type="text">
                                    </input>
                                </div>
                                <span class="text-danger error14">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                        <label for="correo">
                            <b>
                                {{ __('E-mail') }}
                            </b>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-at">
                                </i>
                            </span>
                            <input class="form-control form-control-sm validateDataUsuario" data-errorusuario="15" data-mytypeusuario="email" data-validacionusuario="1" id="correo" name="correo" type="email">
                            </input>
                        </div>
                        <span class="text-danger error15">
                        </span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group {{ $errors->has('username') ? ' is-invalid' : '' }}">
                                <label for="usuario">
                                    <b>
                                        {{ __('Usuario/a') }}
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm validateDataUsuario" data-validacionusuario="1" id="usuario" name="usuario" readonly="" type="text">
                                    </input>
                                </div>
                                <span class="text-danger error17">
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                <label for="contraseña">
                                    <b>
                                        {{ __('Generar Contraseña') }}
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-key">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm validateDataUsuario" data-errorusuario="16" data-mytypeusuario="password" data-validacionusuario="1" id="contPass" name="contPass" readonly="" type="password">
                                        <div class="btn-group" role="group">
                                            <a class="btnsm btn-pass2" id="passwordGenerate" name="passwordGenerate">
                                                <i class="fa fa-key" style="color: #FFFFFF;">
                                                </i>
                                            </a>
                                            <a class="btnsm btn-danger" id="showPass" name="showPass">
                                                <i class="fa fa-eye" style="color: #FFFFFF;">
                                                </i>
                                            </a>
                                            <a class="btnsm btn-warning" id="passCopi" name="passCopi">
                                                <i class="fa fa-clipboard" style="color: #FFFFFF;">
                                                </i>
                                            </a>
                                        </div>
                                    </input>
                                </div>
                                <span class="text-danger error16">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btnp btn-salir" data-dismiss="modal" type="button">
                            Salir
                        </button>
                        <button class="btnp btn-personalizado float-right" disabled="" id="btnCrearUsuario" type="submit">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- modal para editar usuario --}}
<div aria-hidden="true" aria-labelledby="ediatarUsuarioLabel" class="modal fade bd-example-modal-lg" data-backdrop="static" id="editModalUsuario" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #a90a6c; color:white">
                <h5 class="modal-title" id="ediatarUsuarioLabel">
                    Editar Usuario
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">
                                    <b>
                                        Nombre/s
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm valEdit" data-error="1" data-mytype="text" data-validacion="0" id="editNombreUsuario" name="editNombreUsuario" onkeypress="return soloLetras(event,'');" type="text">
                                    </input>
                                </div>
                                <span class="text-danger errorEdit1">
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="apePat">
                                    <b>
                                        Apellido Paterno
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm valEdit" data-error="2" data-mytype="text" data-validacion="0" id="editApUsuario" name="editApUsuario" onkeypress="return soloLetras(event,'');" type="text">
                                    </input>
                                </div>
                                <span class="text-danger errorEdit2">
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="apeMat">
                                    <b>
                                        Apellido Materno
                                    </b>
                                </label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book">
                                        </i>
                                    </span>
                                    <input class="form-control form-control-sm valEdit" data-error="3" data-mytype="text" data-validacion="0" id="editAmUsuario" name="editAp" onkeypress="return soloLetras(event,'');" type="text">
                                    </input>
                                </div>
                                <span class="text-danger errorEdit3">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">
                            <b>
                                E-mail
                            </b>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-at">
                                </i>
                            </span>
                            <input class="form-control form-control-sm valEdit" data-error="4" data-mytype="email" data-validacion="0" id="editEmailUsuario" name="editAp" type="text">
                            </input>
                        </div>
                        <span class="text-danger errorEdit4">
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btnp btn-personalizado float-right" id="editBtnUsuario" type="submit">
                        Actualizar
                    </button>
                    <input id="actualizarUsuario" name="userId" type="hidden">
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal cambiar contraseña-->
<div aria-hidden="true" aria-labelledby="LabelPassUsuario" class="modal fade" data-backdrop="static" id="passwordModalUsuario" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #a90a6c; color:white">
                <h5 class="modal-title" id="LabelPassUsuario">
                    Generar Nueva Contraseña
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-key">
                                </i>
                            </span>
                            <input class="form-control form-control-sm valEditPassword" data-error="1" data-mytype="password" data-validacion="1" id="contPassEditUsuario" name="contPassEditUsuario" readonly="" type="text">
                                <input id="editPasswordUsuario" name="editPasswordUsuario" type="hidden">
                                    <div class="btn-group" role="group">
                                        <a class="btnsm btn-pass2" id="passwordGenerateEditUsuario" name="passwordGenerateEditUsuario">
                                            <i class="fa fa-key" style="color: #FFFFFF;">
                                            </i>
                                        </a>
                                        <a class="btnsm btn-danger" id="showPassEditUsuario" name="showPassEditUsuario">
                                            <i class="fa fa-eye" style="color: #FFFFFF;">
                                            </i>
                                        </a>
                                        <a class="btnsm btn-warning" id="passCopiEditUsuario" name="passCopiEditUsuario">
                                            <i class="fa fa-clipboard" style="color: #FFFFFF;">
                                            </i>
                                        </a>
                                    </div>
                                </input>
                            </input>
                        </div>
                        <span class="text-danger errorEditPassword1" id="errorPassEditUsuario">
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form id="formDelete" method="POST">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <button class="btnp btn-personalizado float-right" id="passwordBtnUsuario" type="submit">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
