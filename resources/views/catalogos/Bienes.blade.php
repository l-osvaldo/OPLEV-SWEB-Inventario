@extends('layouts.admin')
@section('title', 'Catálogo de artículos OPLE')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogos de Bienes OPLE'])
<!-- /.navbar -->

@include('sweet::alert')

<div class="card">
  <div class="card-body" >
    <a href="" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#altasModal">
        <i class="fa fa-plus"></i> 
        Alta del bien        
    </a>
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
                                <th style="text-align: center">Número de Inventario</th>
                                <th style="text-align: center">Concepto</th>
                                <th style="text-align: center">Factura</th>
                                <th style="text-align: center">Fecha Compra</th>
                                <th style="text-align: center">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($articulos as $articulo)
                            <tr data-toggle="tooltip" data-placement="top" title="Click para ver toda la información del artículo: {{ $articulo->concepto }}, Número de inventario: {{ $articulo->numeroinv }} " onclick="abrirModalEditar('{{ $articulo->numeroinv }}');">
                              <td> {{ $articulo->numeroinv }} </td>
                              <td> {{ $articulo->concepto }} </td>
                              <td> {{ $articulo->factura }} </td>
                              <td> {{ $articulo->fechacomp }} </td>
                              <td> $ {{ number_format($articulo->importe,2) }} </td>
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
    <div class="modal fade bd-example-modal-lg" id="altasModal" tabindex="-1" role="dialog" aria-labelledby="altasModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="altasModalLabel"><b>Nuevo Artículo(s)</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--Agregar Partida -->
          <div class="container-fluid">
            <form method="POST" action="{{ route('GuardarArticulos') }}">

              @csrf
              <div class="card-body">
                <div class="row bordediv">
                  <div class="col-md-7">
                      <div class="form-group">
                          <label style="margin-top: 10px;">Seleccione una Partida:</label>
                          <select id="partidaAltaArticulo" name="partidaAltaArticulo" class="form-control select2 " style="width: 95%;">
                              <option  value="0" selected="selected">Número de partida</option>
                              @foreach ($partidas as $partida)
                                  <option value="{{ $partida->partida }}*{{ $partida->descpartida }}" > {{ $partida->partida }} | {{ $partida->descpartida }} </option>
                              @endforeach  
                          </select>
                          <label>Seleccione una Línea:</label>                 
                          <select class="form-control select2" id="lineaAltaArticulo" name="lineaAltaArticulo" style="width: 95%;" disabled>
                              <option value="0" disabled="true" selected="true">Número de Línea</option>
                          </select>
                          <label>Seleccione una Sublinea:</label>                 
                          <select class="form-control select2" id="sublineaAltaArticulo" name="sublineaAltaArticulo" style="width: 95%;" disabled>
                              <option value="0" disabled="true" selected="true">Número de Sublinea</option>
                          </select>                        
                      </div>                                       
                  </div>
                  <div class="col-md-5">
                      <div class="form-group">
                          <label style="margin-top: 10px;">Cantidad de Bienes:</label>
                          <input type="number" name="numberNumBienes" id="numberNumBienes" min="1" value="1" class="form-control" onKeyPress="return SoloNumerosLetras(event,'numero');" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                          <input type="hidden" name="txtConsecutivo" id="txtConsecutivo">
                          <input type="hidden" name="txtArregloNumInv" id="txtArregloNumInv">

                          <label id="lblNumInv">Número de Inventario</label>
                          <textarea id="txtaNumInv" class="form-control" disabled rows="3"></textarea>
                      </div> 
                  </div> <!-- /.col -->
                </div> <!-- /.row -->
                <div class="row bordediv2">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label style="width: 100%; margin-top: 10px;">Concepto:</label>
                        <input type="text" name="txtConcepto" id="txtConcepto" style="width: 100%;" disabled class="form-control">
                        <input type="hidden" name="txtConceptoEnv" id="txtConceptoEnv">
                      </div>                                         
                    </div>
                </div>
                <div class="row bordediv2">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label style="width: 100%;">Factura:</label>
                      <input type="text" name="txtFactura" id="txtFactura" style="width: 100%;" disabled class="form-control validateDataArticulo" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();" data-errorArticulo="1" data-myTypeArticulo="text" data-validacionArticulo="1">
                      <span class="text-danger error1"></span>
                    </div>
                  </div> 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label style="width: 100%;">Precio Unitario:</label>
                      <input type="text" name="txtImporte" id="txtImporte" style="width: 100%; text-align:right;" disabled placeholder="MXN$ 0.0" class="form-control validateDataArticulo" data-errorArticulo="2" data-myTypeArticulo="text" data-validacionArticulo="1" onKeyPress="return valorPrecio(event,this);">
                      <span class="text-danger error2"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label style="width: 100%">Fecha de Compra:</label>                        
                      <input type="date" name="dateFechaCompra" id="dateFechaCompra" class="form-control validateDataArticulo" disabled data-errorArticulo="7" data-myTypeArticulo="date" data-validacionArticulo="1">
                      <span class="text-danger error7"></span>
                    </div>
                  </div>
                </div>
                     
                
                <div class="row bordediv2">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Responsable:</label>
                          <input type="text" name="txtResponsable" id="txtResponsable" style="width: 100%;" disabled value="Bodega" class="form-control">
                          <input type="hidden" name="txtResponsableNumEmpleado" id="txtResponsableNumEmpleado" value="999">
                          <input type="hidden" name="txtResponsableNombre" id="txtResponsableNombre" value="BODEGA">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Área:</label>
                          <input type="text" name="txtArea" id="txtArea" style="width: 100%;" disabled value="Bodega" class="form-control">
                          <input type="hidden" name="txtAreaClave" id="txtAreaClave" value="15">
                          <input type="hidden" name="txtAreaNombre" id="txtAreaNombre" value="BODEGA">
                        </div>
                    </div>
                </div>
                <div class="row bordediv2">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Marca:</label>
                          <input type="text" name="txtMarca" id="txtMarca" style="width: 100%;" disabled class="form-control validateDataArticulo" data-errorArticulo="3" data-myTypeArticulo="text" data-validacionArticulo="1" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <span class="text-danger error3"></span>

                          <label style="width: 100%;">Modelo:</label>
                          <input type="text" name="txtModelo" id="txtModelo" style="width: 100%;" disabled class="form-control validateDataArticulo" data-errorArticulo="4" data-myTypeArticulo="text" data-myTypeArticulo="text" data-validacionArticulo="1" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'modelo');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <span class="text-danger error4"></span>

                          <label style="width: 100%;">Número de Serie:</label>
                          <input type="text" name="txtNumSerie" id="txtNumSerie" style="width: 100%;" disabled class="form-control validateDataArticulo" data-errorArticulo="5" data-myTypeArticulo="text" data-validacionArticulo="1" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'serie');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <span class="text-danger error5"></span>

                          <label style="width: 100%;">Color:</label>
                          <input type="text" name="txtColor" id="txtColor" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                      </div>                    
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label style="width: 100%; margin-top: 10px;">Material:</label>
                          <input type="text" name="txtMaterial" id="txtMaterial" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <label style="width: 100%;">Medidas:</label>
                          <input type="text" name="txtMedidas" id="txtMedidas" style="width: 100%;" disabled class="form-control" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                          <label style="width: 100%;">Estado:</label>
                          <select name="txtEstado" id="txtEstado" style="width: 100%;" disabled class="form-control">
                              <option value="0" selected >Bueno</option>
                          </select>
                          <input type="hidden" name="txtEstadoClave" id="txtEstadoClave" value="1">
                          <input type="hidden" name="txtEstadoNombre" id="txtEstadoNombre" value="BUENO">
                      </div>                    
                  </div>                  
                </div>
              </div>
              <!--Fin Agregar Partida -->
              <div class="card-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                <button type="submit" id="btnGuardarArticulo" style="background-color: #E71096" class="btn btn-secondary float-right" disabled>
                    {{ __('Guardar') }}
                </button>
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
                        <!--input type="hidden" name="numeroInventario" id="numeroInventario" value=""-->
                        <div class="row">
                          <div class="col-md-6" style="text-align: left;">
                            <label>Número de inventario: <strong id="editarNoInventario" style="background-color: #F694D0"></strong> </label>
                          </div>
                          <div class="col-md-6" style="text-align: right;" id="btnBajaArt">
                            <div style="background-color: #E71096" class="btn btn-secondary" type="button"  onclick="confirmBajaArt()">
                                <i class="fa fa-minus"></i> 
                                Dar de Baja       
                            </div>
                          </div>
                        </div>
            
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



    <!--div class="modal fade bd-example-modal-lg" id="bajasModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="editarModalLabel"><b>Confirmar Baja de Artículo(s) </b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              
          <div class="container-fluid">
            <form method="POST" action="{{ route('EditarArticulos') }}" id="formEditar">

              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                       
                        <div class="row">
                          <div class="col-md-6" style="text-align: left;">
                            <label>Número de inventario: <strong id="editarNoInventario" style="background-color: #F694D0"></strong> </label>
                          </div>
                        </div>
                                               
                                                
                      </div>                                       
                  </div><!- /.col ->
                </div> <!- /.row ->

                <div class="row">
                    <div class="col-md-12">
                                                               
                    </div>
                </div>
              </div>
              <!-Fin Editar Partida ->
              
              
              <div class="card-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                  <button type="submit" id="btnBajaArticulo" style="background-color: #E71096; display: auto" class="btn btn-secondary float-right">
                      {{ __('Dar De Baja') }}
                  </button>
                  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div!-->

</section>


@endsection   