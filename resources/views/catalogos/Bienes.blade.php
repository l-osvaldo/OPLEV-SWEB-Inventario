@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                <b>Sistema de Inventario</b>
                    <button class="btn btn-primary">Nuevo +</button> 
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Catalogos de Bienes OPLE</h3>
                    </div>
                    <div class="car-body">
                        <table id="table1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No. Inventario</th>
                                    <th>Concepto</th>
                                    <th>Factura</th>
                                    <th>F. Compra</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>IEV-/////</th>
                                    <th>Nombre del concepto</th>
                                    <th>///</th>
                                    <th>00/00/0000</th>
                                    <th>00.00</th>
                                </tr>
                                <tr>
                                    <th>IEV-/////</th>
                                    <th>Nombre del concepto</th>
                                    <th>///</th>
                                    <th>00/00/0000</th>
                                    <th>00.00</th>
                                </tr>
                                <tr>
                                    <th>IEV-/////</th>
                                    <th>Nombre del concepto</th>
                                    <th>///</th>
                                    <th>00/00/0000</th>
                                    <th>00.00</th>
                                </tr>
                                <tr>
                                    <th>IEV-/////</th>
                                    <th>Nombre del concepto</th>
                                    <th>///</th>
                                    <th>00/00/0000</th>
                                    <th>00.00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalle</h3>
                        </div>
                        <div class="car-body">
                            <table id="table1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Empleado</th>
                                        <th>Area</th>
                                        <th>Num. Serie</th>
                                        <th>Estado</th>
                                        <th>Modelo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>empleaod</th>
                                        <th>area</th>
                                        <th>xxxxx</th>
                                        <th>BUENO</th>
                                        <th>////</th>
                                    </tr>
                                </tbody>
                            </table>
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