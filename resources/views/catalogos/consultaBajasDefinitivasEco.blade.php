@extends('layouts.admin')
@section('title', 'Catálogo de artículos OPLE')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Bajas Definitivas por Movimientos'])
<!-- /.navbar -->

@include('sweet::alert')

<div class="card">
  <div class="card-body" >
    <!--a href="" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#altasModal">
        <i class="fa fa-plus"></i> 
        Alta del bien        
    </a!-->
    <!--a href="{{ route('bajasDefinitivas') }}" style="background-color: #E71096" class="btn btn-secondary" >
        <i class="fa fa-minus"></i> 
        Baja Definitiva        
    </a!-->
  </div>
</div>

<section class="content" style="margin-top: 2vh;">
    <div class="row ">
      <div class="col-12">     
        <div class="center-block">
          <div class="card">
            <div class="card-body" >
              <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped display" style="width:100%">
                <thead>
                  <tr>
                    <th style="text-align: center">Movimiento</th>
                    <th style="text-align: center">Artículos Del Movimiento</th>
                    <th style="text-align: center">Fecha y Hora de Baja</th>
                    <th style="text-align: center">Importe Total Del Movimiento</th>
                    <th style="text-align: center">Detalle</th>
                  </tr>
                  </thead>
                <tbody>
                  @foreach ($articulos as $articulo)
                  <tr data-toggle="tooltip" data-placement="top" title="Click para ver toda la información del movimiento: Número de inventario: 000{{ $articulo->movimiento }}, Total de artículos: {{ $articulo->total }} ">
                    <td style="text-align: center" > 000{{ $articulo->movimiento }} </td>
                    <td style="text-align: center" > {{ $articulo->total }} </td>
                    <td style="text-align: center" > {{ $articulo->fecha }}</td>
                    <td style="text-align: center" > $ {{ number_format($articulo->articulo,2) }} </td>
                    <td style="text-align: center"><a href="{{ route('bajasDefinitivasEcoPDF', $articulo->movimiento) }} " class="btn btn-secondary" style="background-color: #E71096; border-color: #E71096" target="_blank"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a></td>
                  </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal altas -->
    <div class="modal fade bd-example-modal-md" id="altasModal" tabindex="-1" role="dialog" aria-labelledby="altasModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="altasModalLabel"><b>Agregar Artículo(s) para baja definitiva</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--Agregar Partida -->
          <div class="container-fluid">
            <form method="POST" action="{{ route('GuardarArticulos') }}">

              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-12">
                      <label style="width: 100%;">Buscar artículo:</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" name="numeroinvArt" id="numeroinvArt" placeholder="Número de inventario:" class="form-control">
                      </div>
                      <div style="background-color: #E71096" class="btn btn-secondary" type="button" id="buscaArtDef" onclick="buscaArt()">
                        <i class="fa fa-search"></i> 
                          Buscar      
                      </div>
                    </div>
                </div> <!-- /.row -->
              </div>
                
                <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center">Número de Inventario</th>
                                <th style="text-align: center">Concepto</th>
                                <th style="text-align: center">Factura</th>
                                <th style="text-align: center">Fecha Compra</th>
                                <th style="text-align: center">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <tr >
                              <td>  </td>
                              <td>  </td>
                              <td>  </td>
                              <td>  </td>
                              <td> $ </td>
                            </tr>

                        </tbody>
                    </table>
                    <br>
                <div class="row">
                  <div class="col-md-6" style="text-align: left;">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                  </div>
                  <div class="col-md-6" style="text-align: right;">
                        <button type="submit" id="btnGuardarArticulo" style="background-color: #E71096" class="btn btn-secondary float-right" disabled>
                      Enviar
                  </button>
                  </div>
                  
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal editar -->
    <div class="modal fade bd-example-modal-lg" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="editarModalLabel"><b>Artículo </b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--editar Partida -->
          <div class="container-fluid">
            <form method="POST" action="{{ route('EditarArticulos') }}" id="formEditar">

              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="numeroInventario" id="numeroInventario" value="">
                        <label>Número de inventario: <strong id="editarNoInventario" style="background-color: #F694D0"></strong> </label> 
                        <hr>
                        <br>
                        <table width="100%" class="table">
                          <thead>
                            <th class="table-dark" style="padding: 5px" width="40%">
                              Número de Partida
                            </th>
                            <th class="table-dark" style="padding: 5px" width="60%">
                              Partida
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarPartida" > </label>
                            </td>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarPartidaN" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px">
                              Número de Línea
                            </th>
                            <th class="table-dark" style="padding: 5px">
                              Línea
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarLinea"> </label>
                            </td>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarLineaN" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px">
                              Número de Sublínea
                            </th>
                            <th class="table-dark" style="padding: 5px">
                              Sublínea
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarSublinea"> </label>
                            </td>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarSublineaN" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px" colspan="2">
                              Concepto
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px" colspan="2">
                              <label style="font-weight:lighter;" id="editarConcepto" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px" colspan="2">
                              Responsable                              
                            </th>                            
                          </thead>
                          <tbody>
                            <td style="padding: 2px" colspan="2">
                              <label style="font-weight:lighter;" id="editarResponsable" > </label>
                            </td>                            
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px" colspan="2">
                              Área                              
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px" colspan="2">
                              <label style="font-weight:lighter;" id="editarArea" > </label>
                            </td>
                          </tbody>                          
                        </table>                        
                                                 
                      </div>                                       
                  </div><!-- /.col -->
                </div> <!-- /.row -->
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" align="right">
                      <input type="checkbox" data-toggle="toggle" data-on="Desactivar edición" data-off="Activar edición" data-onstyle="default" data-offstyle="dark" data-width="170" id="activarEditar">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">

                        <table width="100%" class="table">
                          <thead>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">Factura</th>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">Precio Unitario</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <input type="text" name="editarFactura" id="editarFactura" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();" data-errorArticuloEditar="1" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0">
                                <span class="text-danger error1"></span>
                              </td>
                              <td>
                                <input type="text" name="editarImporte" id="editarImporte" style="width: 100%; text-align:right;" disabled placeholder="$ 0.0" class="form-control validateDataArticuloEditar" data-errorArticuloEditar="2" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" onKeyPress="return valorPrecio(event,this);">
                                <span class="text-danger error2"></span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table width="100%" class="table">
                          <thead>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Fecha de Compra
                            </th>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Marca
                            </th>
                          </thead>
                          <tbody>
                            <td>
                              <input type="date" name="editarDateFechaCompra" id="editarDateFechaCompra" class="form-control validateDataArticuloEditar" disabled data-errorArticuloEditar="7" data-myTypeArticuloEditar="date" data-validacionArticuloEditar="0">
                              <span class="text-danger error7"></span>
                            </td>
                            <td>
                              <input type="text" name="editarMarca" id="editarMarca" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" data-errorArticuloEditar="3" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                              <span class="text-danger error3"></span>
                            </td>
                          </tbody>
                        </table>
                        <table width="100%" class="table">
                          <thead>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Modelo
                            </th>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Número de Serie
                            </th>
                          </thead>
                          <tbody>
                            <td>
                              <input type="text" name="editarModelo" id="editarModelo" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" data-errorArticuloEditar="4" data-myTypeArticuloEditar="text" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'modelo');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                              <span class="text-danger error4"></span>
                            </td>
                            <td>
                              <input type="text" name="EditarNumSerie" id="EditarNumSerie" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" data-errorArticuloEditar="5" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'serie');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                              <span class="text-danger error5"></span>
                            </td>
                          </tbody>
                        </table>
                        <table width="100%" class="table">
                          <thead>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Color
                            </th>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Material
                            </th>
                          </thead>
                          <tbody>
                            <td>
                              <input type="text" name="editarColor" id="editarColor" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </td>
                            <td>
                              <input type="text" name="editarMaterial" id="editarMaterial" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </td>
                          </tbody>
                        </table>
                        <table width="100%" class="table">
                          <thead>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Medidas
                            </th>
                            <th style="background-color: #F694D0; padding: 5px" width="50%">
                              Estado
                            </th>
                          </thead>
                          <tbody>
                            <td>
                              <input type="text" name="editarMedidas" id="editarMedidas" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </td>
                            <td>
                              <select name="editarEstado" id="editarEstado" style="width: 100%;" disabled class="form-control">
                                  <option value="1" >Bueno</option>
                                  <option value="2" >Regular</option>
                                  <option value="3" >Obsoleto</option>
                                  <option value="4" >Inservible</option>
                                  <option value="6" >No localizado</option>
                              </select>
                            </td>
                          </tbody>
                        </table>            
                          

                      </div>                                         
                    </div>
                </div>
              </div>
              <!--Fin Editar Partida -->
              
              
              <div class="card-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                  <button type="submit" id="btnActualizarArticulo" style="background-color: #E71096; display: none" class="btn btn-secondary float-right" disabled>
                      {{ __('Actualizar') }}
                  </button>
                  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</section>


@endsection   