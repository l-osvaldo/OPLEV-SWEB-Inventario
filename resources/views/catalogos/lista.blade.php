@extends('layouts.admin')
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> 
      </li>
    </ul>
      <div class="col-sm-11">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Catalogos</li>
        </ol>
      </div>
    
  </nav>
  <!-- /.navbar -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"> 
        <!--Texto Lista de Catalogos-->
      </div> 
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content"> 
  <div class="col col-8">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b>Catálogos</b></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <a href="{{ route('Tabla-Partida') }}" class="{!! Request::is('Tabla-Partida') ? 'nav-link active' : 'nav-link' !!}">    
                  <p>
                    <i class="nav-icon fa fa-th"></i>
                      Partidas
                  </p>
                </a>
                <hr>
                <a href="{{ route('show-lineas') }}" class="{!! Request::is('show-lineas') ? 'nav-link active' : 'nav-link' !!}">
                  <p>
                    <i class="nav-icon fa fa-th"></i>
                    Líneas
                  </p>
                </a>
                <hr>
                <a href="{{ route('show-sublineas') }}" class="{!! Request::is('show-sublineas') ? 'nav-link active' : 'nav-link' !!}">
                  <p>
                    <i class="nav-icon fa fa-th"></i>
                    Sublíneas
                  </p>
                </a>
                <hr>
                <!--Cambiar a areas -->
                <a href="{{ route('show-sublineas') }}" class="{!! Request::is('show-sublineas') ? 'nav-link active' : 'nav-link' !!}">
                  <p>
                    <i class="nav-icon fa fa-th"></i>
                    Areas
                  </p>
                </a>
                <hr>     
              </div>
            </div> 
          </div>
        </div>   
      </div>
    </div><!-- /.container-fluid -->
  </div>
</section>
@endsection