@extends('layouts.admin')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogos de Bienes OPLE'])
<!-- /.navbar -->

@include('sweet::alert')

<div class="card">
  <div class="card-body" >
    <a href="" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#altasModal">
        <i class="fa fa-arrow-up"></i> 
        Altas         
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
                                <th>No. Inventario</th>
                                <th>Concepto</th>
                                <th>Factura</th>
                                <th>F. Compra</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($articulos as $articulo)
                            <tr data-toggle="tooltip" data-placement="top" title="Click para ver toda la información del artículo: {{ $articulo->concepto }}, Número de inventario: {{ $articulo->numeroinv }} " onclick="abrirModalEditar(' {{ $articulo->numeroinv }} ');">
                              <td> {{ $articulo->numeroinv }} </td>
                              <td> {{ $articulo->concepto }} </td>
                              <td> {{ $articulo->factura }} </td>
                              <td> {{ $articulo->fechacomp }} </td>
                              <td> {{ $articulo->importe }} </td>
                            </tr>
                             
                          @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal altas -->
    <div class="modal fade bd-example-modal-lg" id="altasModal" tabindex="-1" role="dialog" aria-labelledby="altasModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="altasModalLabel"><b>Alta de Artículo(s)</b></h5>
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
                              <option  value="0" selected="selected">No. partida</option>
                              @foreach ($partidas as $partida)
                                  <option value="{{ $partida->partida }}*{{ $partida->descpartida }}" > {{ $partida->partida }} | {{ $partida->descpartida }} </option>
                              @endforeach  
                          </select>
                          <label>Seleccione una Línea:</label>                 
                          <select class="form-control select2" id="lineaAltaArticulo" name="lineaAltaArticulo" style="width: 95%;" disabled>
                              <option value="0" disabled="true" selected="true">Línea</option>
                          </select>
                          <label>Seleccione una Sublinea:</label>                 
                          <select class="form-control select2" id="sublineaAltaArticulo" name="sublineaAltaArticulo" style="width: 95%;" disabled>
                              <option value="0" disabled="true" selected="true">Sublinea</option>
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label style="width: 100%; margin-top: 10px;">Concepto:</label>
                        <input type="text" name="txtConcepto" id="txtConcepto" style="width: 100%;" disabled class="form-control">
                        <input type="hidden" name="txtConceptoEnv" id="txtConceptoEnv">

                        <label style="width: 100%">Factura:</label>
                        <input type="text" name="txtFactura" id="txtFactura" style="width: 100%;" disabled class="form-control validateDataArticulo" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();" data-errorArticulo="1" data-myTypeArticulo="text" data-validacionArticulo="1">
                        <span class="text-danger error1"></span>                     
                          

                      </div>                                         
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label style="width: 100%;margin-top: 10px;">Precio Unitario:</label>
                        <input type="text" name="txtImporte" id="txtImporte" style="width: 100%; text-align:right;" disabled placeholder="$ 0.0" class="form-control validateDataArticulo" data-errorArticulo="2" data-myTypeArticulo="text" data-validacionArticulo="1" onKeyPress="return valorPrecio(event,this);">
                        <span class="text-danger error2"></span>

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
    <div class="modal fade bd-example-modal-lg" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="altasModalLabel"><b>Artículo </b></h5>
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
                  <div class="col-md-12">
                      <div class="form-group">

                          <table width="100%" class="table">
                            <tr>
                              <td width="15%" class="table-info" >
                                No. Partida:
                              </td>
                              <td width="20%">
                                <label style="margin-top: 10px;" id="editarPartida" > </label>
                              </td>
                              <td width="15%" class="table-info">
                                Partida:
                              </td>
                              <td width="50%">
                                <label style="margin-top: 10px;" id="editarPartidaN" > </label>
                              </td>
                            </tr>
                            <tr>
                              <td class="table-info">
                                No. Línea:
                              </td>
                              <td>
                                <label style="margin-top: 10px;" id="editarLinea"> </label>
                              </td>
                              <td class="table-info">
                                Línea:
                              </td>
                              <td>
                                <label style="margin-top: 10px;" id="editarLineaN" > </label>
                              </td>
                            </tr>
                            <tr>
                              <td class="table-info">
                                No. Sublinea:
                              </td>
                              <td>
                                <label style="margin-top: 10px;" id="editarSublinea"> </label>
                              </td>
                              <td class="table-info">
                                Sublinea:
                              </td>
                              <td>
                                <label style="margin-top: 10px;" id="editarSublineaN" > </label>
                              </td>
                            </tr>
                            
                          </table>

                          <table width="100%" class="table">
                            
                            
                          </table>
                                 
                                                 
                      </div>                                       
                  </div><!-- /.col -->
                </div> <!-- /.row -->
                <div class="row bordediv2">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label style="width: 100%; margin-top: 10px;">Concepto:</label>
                        <input type="text" name="txtConcepto" id="txtConcepto" style="width: 100%;" disabled class="form-control">
                        <input type="hidden" name="txtConceptoEnv" id="txtConceptoEnv">

                        <label style="width: 100%">Factura:</label>
                        <input type="text" name="txtFactura" id="txtFactura" style="width: 100%;" disabled class="form-control validateDataArticulo" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'factura');" onkeyup="javascript:this.value=this.value.toUpperCase();" data-errorArticulo="1" data-myTypeArticulo="text" data-validacionArticulo="1">
                        <span class="text-danger error1"></span>                     
                          

                      </div>                                         
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label style="width: 100%;margin-top: 10px;">Precio Unitario:</label>
                        <input type="text" name="txtImporte" id="txtImporte" style="width: 100%; text-align:right;" disabled placeholder="$ 0.0" class="form-control validateDataArticulo" data-errorArticulo="2" data-myTypeArticulo="text" data-validacionArticulo="1" onKeyPress="return valorPrecio(event,this);">
                        <span class="text-danger error2"></span>

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

</section>


@endsection   