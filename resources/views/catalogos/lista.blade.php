@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>Listado de catalogos</b></h1>
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

      <li class="nav-item">
            <a href="{{ route('Tabla-Partida') }}" class="{!! Request::is('Tabla-Partida') ? 'nav-link active' : 'nav-link' !!}">     
              <p>
                <i class="nav-icon fa fa-th"></i>
                    Partidas
              </p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="{{ route('widgets') }}" class="{!! Request::is('widgets') ? 'nav-link active' : 'nav-link' !!}">
              <p>
                <i class="nav-icon fa fa-th"></i>
                    Linea
              </p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="{{ route('widgets') }}" class="{!! Request::is('widgets') ? 'nav-link active' : 'nav-link' !!}">
              <p>
                <i class="nav-icon fa fa-th"></i>
                    Sublinea
              </p>
            </a>
          </li>

@endsection