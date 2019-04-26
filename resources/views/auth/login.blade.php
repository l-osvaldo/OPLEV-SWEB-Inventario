@extends('layouts.home')
@section('title', 'Iniciar Sesión')

@section('content')
  <div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">
      <div class="col-lg-8 col-md-11 col-12">
        <div class="row align-items-center justify-content-md-center h-p100" data-overlay-light="9">
          <div class="col-lg-5 col-md-6 col-12">
            <div class="p-40 text-center content-bottom">
              <img src="{{ asset('images/logoople.png') }}" class="logologin">
            </div>
          </div>
          <div class="col-lg-7 col-md-6 col-12">
            <div class="p-20 content-bottom">
              <div class="content-top-agile"> 
                <h2>
                <strong>O</strong>ficialía de <strong>P</strong>artes <br>
                <strong>S</strong>istema de <strong>C</strong>ontrol de <strong>R</strong>ecepción de <strong>C</strong>orrespondencia
                <br /><br />
                <h3>Bienvenido(a)</h3>
                
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf                
               
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Nombre de Usuario">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark border-dark"><i class="ti-user"></i></span>
                    </div>
                    @if ($errors->has('username'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>


                <div class="form-group">
                  <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark border-dark"><i class="ti-lock"></i></span>
                    </div>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->

                  <!-- /.col -->
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-dark btn-block margin-top-10">Entrar</button>
                  </div>
                  <!-- /.col -->
                  </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection