@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                  <b>Listado de Partidas</b>
                  <a href="{{ route('partidas-create') }}" class="btn btn-primary float-right"> Agregar</a>
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

                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Partida</th>
                                            <th>Descripcion Partida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($partida as $partida)
                                        <tr>
                                            <th>{{ $partida->partida }}</th>
                                            <th>{{ $partida->descpartida }}</th>
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
    
        <script>
            $(function () {
              $("#table1").DataTable();
              $('#table2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
              });
            });
          </script>
@endsection