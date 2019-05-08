@extends('layouts.admin')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                  <b>Linea de partida </b>
                  <a href="{{ route('nuevaLinea') }}" class="btn btn-primary float-right"> Agregar Linea</a>
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

                                <table id="example2" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Linea</th>
                                            <th>Descripcion Linea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($linea as $linea)
                                        <tr>
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