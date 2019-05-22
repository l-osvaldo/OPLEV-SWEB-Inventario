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
              <!--
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Catalogos</li>
              -->
              <h5>Catálogos de Bienes OPLE</h5>
            </ol>
          </div>
          <ul class="navbar-nav ml-auto float-sm-right">   
              <li class="nav-item">
                <a class="nav-link" href="#"><h5 style="color:#EA0D94"><b>Dirección Ejecutiva de Administración</b></h5></a>
              </li>
          </ul>
    </nav>
    <!-- /.navbar -->



    <section class="content" style="margin-top: 2vh;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="car-body">
                            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
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
                                <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
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


@endsection   