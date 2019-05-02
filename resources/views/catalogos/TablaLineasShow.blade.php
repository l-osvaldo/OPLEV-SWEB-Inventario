@extends('layouts.admin')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                  <b>Listado de Partidas</b>
                  <a href="{{ route('AgregaLineas') }}" class="btn btn-primary float-right"> Agregar Linea</a>
                </h1>
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
            <div class="row">
                <div class="col-8">     
                    <div class="center-block">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Catalogo de Partidas</h3> 
                            </div>
                            <div class="car-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Partida</th>
                                            <th>Descripcion Partida</th>
                                            <th>Linea</th>
                                            <th>Descripcion Linea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($linea as $linea)
                                        <tr>
                                            <td>{{ $linea->partida }}</td>
                                            <td>{{ $linea->descpartida }}</td>
                                            <td>{{ $linea->linea }}</td>
                                            <td>{{ $linea->desclinea }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </section>

@endsection