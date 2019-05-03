@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Inventario</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content"> 
          <div class="col col-8">
              <div class="container-fluid">
                  <div class="card card-default">
                      <div class="card-header">
                          <h3 class="card-title"><b>Listado de Catalogoss</b></h3>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-10">
                                  <div class="form-group">
                                      
                    <li class="nav-item">
                          <a href="{{ route('Tabla-Partida') }}" class="{!! Request::is('Tabla-Partida') ? 'nav-link active' : 'nav-link' !!}">     
                            <p>
                              <i class="nav-icon fa fa-th"></i>
                                  Catalogo de Partidas
                            </p>
                          </a>
                        </li>     
                        
                        <hr>

                        <li class="nav-item">
                          <a href="{{ route('lineas') }}" class="{!! Request::is('lineas') ? 'nav-link active' : 'nav-link' !!}">
                            <p>
                              <i class="nav-icon fa fa-th"></i>
                              Catalogo de Lineas
                            </p>
                          </a>
                        </li> 
                        
                        <hr>
                        
                        <li class="nav-item">
                          <a href="{{ route('sublineas') }}" class="{!! Request::is('sublineas') ? 'nav-link active' : 'nav-link' !!}">
                            <p>
                              <i class="nav-icon fa fa-th"></i>
                              Catalogo de Sublineas
                            </p>
                          </a>
                        </li>
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