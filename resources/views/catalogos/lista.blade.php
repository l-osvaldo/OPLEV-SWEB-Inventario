@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              
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
                          <a href="{{ route('sublineas') }}" class="{!! Request::is('sublineas') ? 'nav-link active' : 'nav-link' !!}">
                            <p>
                              <i class="nav-icon fa fa-th"></i>
                              Sublíneas
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