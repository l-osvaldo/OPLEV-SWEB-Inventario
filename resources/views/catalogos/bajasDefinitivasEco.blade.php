@extends('layouts.admin')
@section('title', 'Catálogo de artículos OPLE')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Bienes Económicos en Bodega'])
<!-- /.navbar -->

@include('sweet::alert')
<div id="loader" class="o-hidden-loader d-none">
        <div class="cubes">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
<div class="card">
  <div class="card-body" style="text-align: right;">
    <!--a href="" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#altasModal">
        <i class="fa fa-plus"></i> 
        Alta del bien        
    </a!-->
    <label style="width: 100%;">No. De Movimiento: </label>
  </div>
</div>

<section class="content" style="margin-top: 2vh;">
    <div class="row ">
      <div class="col-12">     
        <div class="center-block">
          <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-12">
                      <label style="width: 100%;">Buscar artículo:</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" name="numeroinvArt" id="numeroinvArt" placeholder="Número de inventario:" class="form-control">
                      </div>
                      <div style="background-color: #E71096" class="btn btn-secondary" type="button" id="buscaArtDef" onclick="buscaArtEco();">
                        <i class="fa fa-search"></i> 
                          Buscar      
                      </div>
                    </div>
                </div> <!-- /.row -->
              </div>
                <br>
                <table id="tableBajasDef" name="tableBajasDef" class="table table-bordered table-striped display d-none" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; background-color: #bdbbbb;">Número de Inventario</th>
                                <th style="text-align: center; background-color: #bdbbbb;">Concepto</th>
                                <th style="text-align: center; background-color: #bdbbbb;">Factura</th>
                                <th style="text-align: center; background-color: #bdbbbb;">Fecha Compra</th>
                                <th style="text-align: center; background-color: #bdbbbb;">Importe </th>
                                <th style="text-align: center; background-color: #bdbbbb;">Eliminar </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br>

                <div class="row">
                  <div id="importeTotalArts" class="col-md-12 d-none" style="text-align: right;">
                        <label style="width: 100%;">Importe total: <span id="importeTotBajDef"></span></label>
                  </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" style="text-align: right;">
                        <button type="submit" id="btnEnvArtBajDef" style="background-color: #E71096" class="btn btn-secondary float-right d-none" onclick="enviaArtBajaDefinitEco();">
                      Enviar a Baja Definitiva
                  </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


    <!-- Modal altas -->
    <div class="modal fade bd-example-modal-lg" id="agregaArt" tabindex="-1" role="dialog" aria-labelledby="agregaArt" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="agregaArt"><b>Artículo</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--Agregar Partida -->
          <div class="container-fluid">
            
              @csrf
              <div class="card-body">
                
                <!--table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped display" style="width:100%"!-->
                <table id="tabArtBajDefModal" name="tabArtBajDefModal" class="table table-bordered table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; width:20px!important;" >Número de Inventario</th>
                                <th style="text-align: center; width:20px!important;" >Concepto</th>
                                <th style="text-align: center; width:10px!important;" >Factura</th>
                                <th style="text-align: center; width:10px!important;" >Fecha Compra</th>
                                <th style="text-align: center; width:15px!important;" >Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <tr >
                              <td id="numInvBdef">  </td>
                              <td id="concepBdef">  </td>
                              <td id="facturaBdef">  </td>
                              <td id="fechaCBdef">  </td>
                              <td id="importeBdef"> $ </td>
                            </tr>

                        </tbody>
                    </table>
                    <br>
                <div class="row">
                  <div class="col-md-6" style="text-align: left;">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                  </div>
                  <div class="col-md-6" style="text-align: right;">
                        <div type="button" id="btnAgregArtBajDef" style="background-color: #E71096" class="btn btn-secondary float-right" onclick="agregaArtBajDef();">
                      Agregar artículo
                  </div>
                  </div>
                  
                  
                </div>
              </div>
            
          </div>
        </div>
      </div>
    </div>

</section>


@endsection   