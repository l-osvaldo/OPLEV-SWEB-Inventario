@extends('layouts.admin')
 
@section('content')
  <!-- Navbar -->
  <nav class=" navbar navbar-expand col-sm-12 bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> 
        </li>
      </ul>
        <div class="">
          <ol class="breadcrumb float-sm-left">
            
            <h5>Catálogos</h5>
          </ol>
        </div>
        <ul class="navbar-nav ml-auto float-sm-right">   
            <li class="nav-item">
              <a class="nav-link" href="#"><h5 style="color:#EA0D94"><b>Dirección Ejecutiva de Administración</b></h5></a>
            </li>
        </ul>
  </nav>
  <!-- /.navbar -->

  <section class="content "> 
    <div class="col col-8 ">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
          </div>
          <div class=" card-body">
            <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                  <a href="{{ route('Tabla-Partida') }}" class="{!! Request::is('Tabla-Partida') ? 'nav-link active' : 'nav-link' !!}">    
                    <p>
                      <i class="fa fa-table"></i>
                        Partidas
                    </p>
                  </a>
                  <hr>
                  <a href="{{ route('show-lineas') }}" class="{!! Request::is('show-lineas') ? 'nav-link active' : 'nav-link' !!}">
                    <p>
                      <i class="fa fa-table"></i>
                      Líneas
                    </p>
                  </a>
                  <hr>
                  <a href="{{ route('show-sublineas') }}" class="{!! Request::is('show-sublineas') ? 'nav-link active' : 'nav-link' !!}">
                    <p>
                      <i class="fa fa-table"></i>
                      Sublíneas
                    </p>
                  </a>
                  <hr>
                  <!--Cambiar a areas -->
                  <a href="{{ route('Tabla-Areas') }}" class="{!! Request::is('Tabla-Areas') ? 'nav-link active' : 'nav-link' !!}">
                    <p>
                      <i class="fa fa-building"></i>
                      Áreas
                    </p>
                  </a>
                  <hr> 
                  <a href="{{ route('show-Empleados') }}" class="{!! Request::is('show-Empleados') ? 'nav-link active' : 'nav-link' !!}">
                    <p>
                      <i class="fa fa-id-card"></i>
                      Empleados
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
