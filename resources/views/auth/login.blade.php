@extends('layouts.home')
@section('title', 'Iniciar Sesión')

@section('content')
<div class="container-fluid">

  <div class="row topBar">
    <div class="col-sm-12 col-md-2 topLeftBar">
      <div class="subTopL"><img src="{{ asset('images/sicli3.png') }}" height="50" width="125" style="margin-right: 1.5rem;" /> FISCALIZACIÓN</div>
    </div>
    <div class="col-sm-12 col-md-10 topRightBar">
      <div class="subTopR" style="font-size: 18px;">Sistema Contable en Línea para las Asociaciones Políticas Estatales<br><span style="font-size: 15px; text-shadow: 2px 2px 2px #B9B9B9;">Unidad de Fiscalización</span></div>
    </div>
  </div>

  <div class="row contentLogin">

    <div class="col-10 col-md-3 contentForm">
      <h3 class="htext">Bienvenido(a)</h3>

      <form method="POST" action="{{ route('login') }}">
        @csrf                

        <div class="form-group">
          <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Nombre de Usuario">
          @if ($errors->has('username'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
          </span>
          @endif
        </div>


        <div class="form-group">
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
        <div class="row">
          <div class="col-12">
            <p>
              @isset($aviso)
              {{ $aviso }}
              @endisset
            </p>
            <button type="submit" class="btn btn-dark btn-block btnLogin">Entrar</button>
          </div>
        </div>

      </form>

    </div>

  </div>


  <div class="row bottomBar">
    <div class="col-sm-12 col-md-4 imgContent">
      <img src="{{ asset('images/logoople.png') }}" class="imgLogin">
    </div>
    <div class="col-sm-12 col-md-4 text-center footerText">
      Sistema Contable en Línea para las Asociaciones Políticas Estatales<br>UNIDAD DE FISCALIZACIÓN
    </div>
    <div class="col-sm-12 col-md-4">

    </div>
  </div>
</div>

@endsection