@extends('layouts.admin')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogos de Bienes ECO'])
<!-- /.navbar -->

@include('sweet::alert')

<div class="card">
  <div class="card-body" >
    <a href="" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#altasECOModal">
        <i class="fa fa-plus"></i> 
        Alta del bien          
    </a>
  </div>
</div>

<section class="content" style="margin-top: 2vh;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="car-body">
                    <br>
                    <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
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
                          @foreach ($articulosecos as $articulo)
                            <tr data-toggle="tooltip" data-placement="top" title="Click para ver toda la información del artículo: {{ $articulo->concepto }}, Número de inventario: {{ $articulo->numeroinv }} " onclick="abrirModalEditarECO('{{ $articulo->numeroinventario }}');">
                              <td> {{ $articulo->numeroinventario }} </td>
                              <td> {{ $articulo->concepto }} </td>
                              <td> {{ $articulo->factura }} </td>
                              <td> {{ $articulo->fechacompra }} </td>
                              <td> $ {{ $articulo->importe }} </td>
                            </tr>
                             
                          @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal altas eco-->
    <div class="modal fade bd-example-modal-lg" id="altasECOModal" tabindex="-1" role="dialog" aria-labelledby="altasECOModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="altasECOModalLabel"><b>Alta de Artículo(s) ECO</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--Agregar Partida -->
          <div class="container-fluid">
            <form method="POST" action="{{ route('GuardarArticulosECO') }}">

              @csrf
              <div class="card-body">
                <div class="row bordediv">
                  <div class="col-md-7">
                      <div class="form-group">
                          <label style="margin-top: 10px;">Seleccione una Partida:</label>
                          <select id="partidaAltaArticuloECO" name="partidaAltaArticuloECO" class="form-control select2 " style="width: 95%;">
                              <option  value="0" selected="selected">Número de partida</option>
                              @foreach ($partidas as $partida)
                                  <option value="{{ $partida->partida }}*{{ $partida->descpartida }}" > {{ $partida->partida }} | {{ $partida->descpartida }} </option>
                              @endforeach  
                          </select>
                          <label>Seleccione una Línea:</label>                 
                          <select class="form-control select2" id="lineaAltaArticuloECO" name="lineaAltaArticuloECO" style="width: 95%;" disabled>
                              <option value="0" disabled="true" selected="true">Número de Línea</option>
                          </select>
                          <label>Seleccione una Sublinea:</label>                 
                          <select class="form-control select2" id="sublineaAltaArticuloECO" name="sublineaAltaArticuloECO" style="width: 95%;" disabled>
                              <option value="0" disabled="true" selected="true">Número de Sublinea</option>
                          </select>                        
                      </div>                                       
                  </div>
                  <div class="col-md-5">
                      <div class="form-group">
                          <label style="margin-top: 10px;">Cantidad de Bienes:</label>
                          <input type="number" name="numberNumBienesECO" id="numberNumBienesECO" min="1" value="1" class="form-control" onKeyPress="return SoloNumerosLetras(event,'numero');" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                          <input type="hidden" name="txtConsecutivoECO" id="txtConsecutivoECO">
                          <input type="hidden" name="txtArregloNumInvECO" id="txtArregloNumInvECO">

                          <label id="lblNumInvECO">Número de Inventario</label>
                          <textarea id="txtaNumInvECO" class="form-control" disabled rows="3"></textarea>
                      </div> 
                  </div> <!-- /.col -->
                </div> <!-- /.row -->
                <div class="row bordediv2">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label style="width: 100%; margin-top: 10px;">Concepto:</label>
                        <input type="text" name="txtConceptoECO" id="txtConceptoECO" style="width: 100%;" disabled class="form-control">
                        <input type="hidden" name="txtConceptoEnvECO" id="txtConceptoEnvECO">
                      </div>                                         
                    </div>
                  </div>
                  <div class="row bordediv2">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label style="width: 100%">Factura:</label>
                        <input type="text" name="txtFacturaECO" id="txtFacturaECO" style="width: 100%;" disabled class="form-control validateDataArticulo" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();" data-errorArticulo="1" data-myTypeArticulo="text" data-validacionArticulo="1">
                        <span class="text-danger error1"></span>  
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label style="width: 100%;">Precio Unitario:</label>
                        <input type="text" name="txtImporteECO" id="txtImporteECO" style="width: 100%; text-align:right;" disabled placeholder="$ 0.0" class="form-control validateDataArticulo" data-errorArticulo="2" data-myTypeArticulo="text" data-validacionArticulo="1" onKeyPress="return valorPrecio(event,this);">
                        <span class="text-danger error2"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label style="width: 100%">Fecha de Compra:</label>                        
                        <input type="date" name="dateFechaCompraECO" id="dateFechaCompraECO" class="form-control validateDataArticulo" disabled data-errorArticulo="7" data-myTypeArticulo="date" data-validacionArticulo="1">
                        <span class="text-danger error7"></span>
                      </div>
                    </div>
                  </div>
                    

                <div class="row bordediv2">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Responsable:</label>
                          <input type="text" name="txtResponsableECO" id="txtResponsableECO" style="width: 100%;" disabled value="Bodega" class="form-control">
                          <input type="hidden" name="txtResponsableNumEmpleadoECO" id="txtResponsableNumEmpleadoECO" value="999">
                          <input type="hidden" name="txtResponsableNombreECO" id="txtResponsableNombreECO" value="BODEGA">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Área:</label>
                          <input type="text" name="txtAreaECO" id="txtAreaECO" style="width: 100%;" disabled value="Bodega" class="form-control">
                          <input type="hidden" name="txtAreaClaveECO" id="txtAreaClaveECO" value="15">
                          <input type="hidden" name="txtAreaNombreECO" id="txtAreaNombreECO" value="BODEGA">
                        </div>
                    </div>
                </div>
                <div class="row bordediv2">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Marca:</label>
                          <input type="text" name="txtMarcaECO" id="txtMarcaECO" style="width: 100%;" disabled class="form-control validateDataArticulo" data-errorArticulo="3" data-myTypeArticulo="text" data-validacionArticulo="1" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <span class="text-danger error3"></span>

                          <label style="width: 100%;">Modelo:</label>
                          <input type="text" name="txtModeloECO" id="txtModeloECO" style="width: 100%;" disabled class="form-control validateDataArticulo" data-errorArticulo="4" data-myTypeArticulo="text" data-myTypeArticulo="text" data-validacionArticulo="1" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'modelo');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <span class="text-danger error4"></span>

                          <label style="width: 100%;">Número de Serie:</label>
                          <input type="text" name="txtNumSerieECO" id="txtNumSerieECO" style="width: 100%;" disabled class="form-control validateDataArticulo" data-errorArticulo="5" data-myTypeArticulo="text" data-validacionArticulo="1" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'serie');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <span class="text-danger error5"></span>

                          <label style="width: 100%;">Color:</label>
                          <input type="text" name="txtColorECO" id="txtColorECO" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                      </div>                    
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Material:</label>
                          <input type="text" name="txtMaterialECO" id="txtMaterialECO" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <label style="width: 100%;">Medidas:</label>
                          <input type="text" name="txtMedidasECO" id="txtMedidasECO" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <label style="width: 100%;">Estado:</label>
                          <select name="txtEstadoECO" id="txtEstadoECO" style="width: 100%;" disabled class="form-control">
                              <option value="0" selected >Bueno</option>
                          </select>
                          <input type="hidden" name="txtEstadoClaveECO" id="txtEstadoClaveECO" value="1">
                          <input type="hidden" name="txtEstadoNombreECO" id="txtEstadoNombreECO" value="BUENO">
                      </div>                    
                  </div>                  
                </div>
              </div>
              <!--Fin Agregar Partida -->
              <div class="card-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                <button type="submit" id="btnGuardarArticuloECO" style="background-color: #E71096" class="btn btn-secondary float-right" disabled>
                    {{ __('Guardar') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal editar ECO-->
    <div class="modal fade bd-example-modal-lg" id="editarECOModal" tabindex="-1" role="dialog" aria-labelledby="editarECOModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="editarECOModalLabel"><b>Artículo ECO </b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--editar Partida -->
          <div class="container-fluid">
            <form method="POST" action="{{ route('EditarArticulosECO') }}" id="formEditarECO">

              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="numeroInventarioECO" id="numeroInventarioECO" value="">
                        <label>Número de inventario: <strong id="editarNoInventarioECO" style="background-color: #F694D0"></strong> </label> 
                        <hr>
                        <br>
                        <table width="100%" class="table">
                          <thead>
                            <th class="table-dark" style="padding: 5px" width="40%">
                              No. Partida
                            </th>
                            <th class="table-dark" style="padding: 5px" width="60%">
                              Partida
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarPartidaECO" > </label>
                            </td>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarPartidaNECO" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px">
                              No. Línea
                            </th>
                            <th class="table-dark" style="padding: 5px">
                              Línea
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarLineaECO"> </label>
                            </td>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarLineaNECO" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px">
                              No. Sublínea
                            </th>
                            <th class="table-dark" style="padding: 5px">
                              Sublínea
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarSublineaECO"> </label>
                            </td>
                            <td style="padding: 2px">
                              <label style="font-weight:lighter;" id="editarSublineaNECO" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px" colspan="2">
                              Concepto
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px" colspan="2">
                              <label style="font-weight:lighter;" id="editarConceptoECO" > </label>
                            </td>
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px" colspan="2">
                              Responsable                              
                            </th>
                          </thead>
                          <tbody>
                            <td style="padding: 2px" colspan="2">
                              <label style="font-weight:lighter;" id="editarResponsableECO" > </label>
                            </td>                            
                          </tbody>
                          <thead>
                            <th class="table-dark" style="padding: 5px" colspan="2">
                              Área                              
                            </th>                            
                          </thead>
                          <tbody>
                            <td style="padding: 2px" colspan="2">
                              <label style="font-weight:lighter;" id="editarAreaECO" > </label>
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
                      <input type="checkbox" data-toggle="toggle" data-on="Visualizar" data-off="Edición" data-onstyle="default" data-offstyle="dark" data-width="100" id="activarEditarECO">
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
                                <input type="text" name="editarFacturaECO" id="editarFacturaECO" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();" data-errorArticuloEditar="1" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0">
                                <span class="text-danger error1"></span>
                              </td>
                              <td>
                                <input type="text" name="editarImporteECO" id="editarImporteECO" style="width: 100%; text-align:right;" disabled placeholder="$ 0.0" class="form-control validateDataArticuloEditar" data-errorArticuloEditar="2" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" onKeyPress="return valorPrecio(event,this);">
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
                              <input type="date" name="editarDateFechaCompraECO" id="editarDateFechaCompraECO" class="form-control validateDataArticuloEditar" disabled data-errorArticuloEditar="7" data-myTypeArticuloEditar="date" data-validacionArticuloEditar="0">
                              <span class="text-danger error7"></span>
                            </td>
                            <td>
                              <input type="text" name="editarMarcaECO" id="editarMarcaECO" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" data-errorArticuloEditar="3" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
                              <input type="text" name="editarModeloECO" id="editarModeloECO" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" data-errorArticuloEditar="4" data-myTypeArticuloEditar="text" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'modelo');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                              <span class="text-danger error4"></span>
                            </td>
                            <td>
                              <input type="text" name="EditarNumSerieECO" id="EditarNumSerieECO" style="width: 100%;" disabled class="form-control validateDataArticuloEditar" data-errorArticuloEditar="5" data-myTypeArticuloEditar="text" data-validacionArticuloEditar="0" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'serie');" onkeyup="javascript:this.value=this.value.toUpperCase();">
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
                              <input type="text" name="editarColorECO" id="editarColorECO" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </td>
                            <td>
                              <input type="text" name="editarMaterialECO" id="editarMaterialECO" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
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
                              <input type="text" name="editarMedidasECO" id="editarMedidasECO" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </td>
                            <td>
                              <select name="editarEstadoECO" id="editarEstadoECO" style="width: 100%;" disabled class="form-control">
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
                  <button type="submit" id="btnActualizarArticuloECO" style="background-color: #E71096; display: none" class="btn btn-secondary float-right" disabled>
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