@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                <b>Lineas</b>
                <a href="{{ route('AgregaLineas') }}" class="btn btn-primary float-right"> Nueva Linea</a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LINEAS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Linea</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Partidas</label>
                                    <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">No. paritda</option>
                                    @foreach ($linea as $linea)
                                    <option>{{ $linea->partida }} | {{ $linea->descpartida }}</option>
                                    
                                    @endforeach
                                    </select>
                                        <hr>
                                     <a class="btn btn-info" href="{{ route('show-lineas',$linea->partida) }}">ver</a> 
                                </div>
                            </div>
                            <!--Tabla para mostrar datos de lineas y sublineas -->
                           
                            
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        
    </section>

@endsection