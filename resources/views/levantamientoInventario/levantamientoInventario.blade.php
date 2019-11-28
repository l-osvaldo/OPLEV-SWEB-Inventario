@extends('layouts.admin')
@section('title', 'Levantamiento de inventario')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Levantamiento de inventario'])

	@include('sweet::alert')

	<section class="content" style="margin-top: 2vh;">
	  	<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body">
		          	<div align="center">
		          		<button class="btn" onclick="actualizar()" style="background: #EA0D94">
		          			<i class="fa fa-refresh" aria-hidden="true" style="color: white"></i>
		          			<label style="color: white">Actualizar Información</label>		          			 
		          		</button>
		          	</div>
		          	<div id="lotesRespues">
		          		<table id="tableLevantamiento" name="tableLevantamiento" class="table table-bordered table-striped" style="width:100%">
			              <thead>
			                <tr>
			                  <th style="text-align: center">ID</th>
							  <th style="text-align: center">Fecha del levantamiento</th>
							  <th style="text-align: center">Estatus</th>
							  <th style="text-align: center">Detalle</th>
							  <th style="text-align: center">Área</th>
							  <th style="text-align: center">Nombre del lote</th>
							  <th style="text-align: center">Total de bienes OPLE</th>
							  <th style="text-align: center">Total de bienes ECO</th>
							  
			                </tr>
			              </thead>		              	
			              <tbody>
			                  @foreach ($lotes as $lote)
			                  	@if ($lote->descripcion === null)
			                  		<tr>
			                  	@else
			                  		<tr data-toggle="tooltip" data-placement="top" title="{{ $lote->descripcion }} ">
			                  	@endif
				                  
				                  	<td> {{ $lote->Id }} </td>
				                  	<td align="center"> {{ $lote->fecha }} </td>
				                  	@if ( $lote->estado === 'Abierto')
				                  		<td align="center"> <span class="badge badge-success">{{ $lote->estado }}</span> </td> 
				                  	@else
				                  		<td align="center"> <span class="badge badge-info" style="background: #f44611" >{{ $lote->estado }}</span> </td> 
				                  	@endif
				                  	<td align="center">
				                  		<button type="button" class="btn btn-secondary btn-sm" onclick="verDetalleLote( {{ $lote->Id }}, {{ $lote->totalOPLE }}, {{ $lote->totalECO }}, '{{ $lote->nombre }}', '{{ $lote->tipoLote }}' , '{{ $lote->estado }}' )">
										    Ver
										</button>
				                  	</td>
				                  	<td> {{ $lote->area }}</td>
				                  	<td> {{ $lote->nombre }}</td>
				                  	<td align="center"> {{ $lote->totalOPLE }}</td>
				                  	<td align="center"> {{ $lote->totalECO }}</td>
				                  	
				                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
		          	</div>		          	
		          </div>
		        </div>
		      </div>
		    </div>
		</div>


		<!-- Modal detalle Lote específico -->
	    <div class="modal fade bd-example-modal-lg" id="detalleLoteEspecifico" tabindex="-1" role="dialog" aria-labelledby="detalleLoteModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	      <div class="modal-dialog" style="max-width: 1100px!important;" role="document">
	        <div class="modal-content">
	          <div class="modal-header" style="background: #a90a6c; color:white">
	            <h5 class="modal-title" id="detalleLoteModal"><b>Detalle de Lote específico</b></h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="container-fluid">
	              @csrf
	              <div class="card-body">
	                <div class="row">
	                  <div class="col-md-4">
	                      <div class="form-group">
	                      	<div class="col-md-12">
	                      		<label><small> Nombre del empleado:  </small></label>
	                      	</div>
	                      	<div class="col-md-12">
	                      		<u><strong id="nombreEmpleadoDetalleLote">  </strong> </u>
	                      	</div>	                      	         
	                      </div>                                       
	                  </div>
	                  <div class="col-md-4" align="center">
	                  	<div class="col-md-12">
	                  		<label> <small>Estado del lote: </small> </label>
	                  	</div>
	                  	<div class="col-md-12">
	                  		<span id="detalleEstadoEsp"></span>
	                  	</div>
	                  </div>
	                  <div class="col-md-4" align="right">
	                  	<a style="background-color: #E71096; width: 50%;" class="btn btn-secondary" id="btnDetalleEspPDF" target="_blank">
					        <i class="fa fa-file-pdf-o"></i> 
					        Generar PDF        
					    </a>
	                  </div>
	                </div> <!-- /.row -->
	                <div class="row">
	                	<div class="col-md-2">
	                		<label><small>Total de Bienes OPLE: </small> <strong id="totalOpleDetalleEsp"></strong></label>
	                	</div>
	                	<div class="col-md-2">
	                		<label><small>Total de Bienes ECO: </small><strong id="totalEcoDetalleEsp"></strong></label>
	                	</div>
	                	<div class="col-md-8" align="right" id="divSelectAllOPLEECO">
	                		<div class="form-check">
							  <label class="form-check-label">
							    <input type="checkbox" class="form-check-input" value="todos" id="selectAllOPLEECO">Seleccionar todos (OPLE y ECO)
							  </label>
							</div>
	                	</div>
	                </div>
	                <br>
	                <form method="POST" action="{{ route('confirmacionAsignacionL') }}">
	                	@csrf
	                	<input type="hidden" name="hiddenNumeroEmpleado" id="hiddenNumeroEmpleado">
	                	<nav>
						  <div class="nav nav-tabs" id="nav-tab" role="tablist">
						    <a class="nav-item nav-link active" id="nav-OPLE-tab" data-toggle="tab" href="#nav-OPLE" role="tab" aria-controls="nav-OPLE" aria-selected="true" style="color: #e600ac;">Bienes OPLE</a>
						    <a class="nav-item nav-link" id="nav-ECO-tab" data-toggle="tab" href="#nav-ECO" role="tab" aria-controls="nav-ECO" aria-selected="false" style="color: #e600ac;">Bienes ECO</a>
						  </div>
						</nav>
		                <div class="tab-content" id="nav-tabContent">
				  			<div class="tab-pane fade show active" id="nav-OPLE" role="tabpanel" aria-labelledby="nav-OPLE-tab">
				                <div class="row">
				                	<div class="col-md-12">
				                		<div class="center-block">	      	
									        <div class="card">
									          <div class="card-body" >
						                		<div class="form-group">
						                			<table id="detalleLote02" name="detalleLote02" class="table table-bordered table-striped" style="width:100%">
										              <thead>
										                <tr>
										                  <th style="text-align: center">Tipo del bien</th>
														  <th style="text-align: center">Número de inventario</th>
														  <th style="text-align: center">Concepto</th>
														  <th style="text-align: center">Conciliación</th>
														  <th style="text-align: center">Asignado a</th>
														  <th style="text-align: center">Fecha de captura</th>
														  <th style="text-align: center">Asignar</th>
														  <th style="text-align: center">Eliminar</th>
										                </tr>
										              </thead>
										              <tbody>
										                  
										              </tbody>
										            </table>
						                		</div>
						                		<div class="row" id="infoAsignacion" style="display: none;">
										        	<div class="col-md-12" align="right">
										        		<label style="background: #17a2b8; border-radius: 15px"> <strong style="margin-left: 5px;margin-right: 5px; font-size: 13px" id="infoAsignacionMSJ"></strong></label>
										        	</div>
										        </div>
						                	   </div>
						                	</div>
						               	</div>	                		
				                	</div>
				                </div>
				            </div>
				            <div class="tab-pane fade" id="nav-ECO" role="tabpanel" aria-labelledby="nav-ECO-tab">
				            	<div class="row">
				                	<div class="col-md-12">
				                		<div class="center-block">	      	
									        <div class="card">
									          <div class="card-body" >
						                		<div class="form-group">
						                			<table id="detalleLote02ECO" name="detalleLote02ECO" class="table table-bordered table-striped" style="width:100%">
										              <thead>
										                <tr>
										                  <th style="text-align: center">Tipo del bien</th>
														  <th style="text-align: center">Número de inventario</th>
														  <th style="text-align: center">Concepto</th>
														  <th style="text-align: center">Conciliación</th>
														  <th style="text-align: center">Asignado a</th>
														  <th style="text-align: center">Fecha de captura</th>
														  <th style="text-align: center">Asignar</th>
														  <th style="text-align: center">Eliminar</th>
										                </tr>
										              </thead>
										              <tbody>
										                  
										              </tbody>
										            </table>
						                		</div>
						                		<div class="row" id="infoAsignacion2" style="display: none;">
										        	<div class="col-md-12" align="right">
										        		<label style="background: #17a2b8; border-radius: 15px"> <strong style="margin-left: 5px;margin-right: 5px; font-size: 13px" id="infoAsignacionMSJ2">
										        			
										        		</strong></b></label>
										        	</div>
										        </div>
						                	   </div>						                	   
						                	</div>
						               	</div>	                		
				                	</div>
				                </div>
				        	</div>
				          </div>
				        </div>
				        
				        <div class="card-footer" id="opcionesAsignarLevantamiento" style="display: none;">
			                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
			                <button type="submit" id="btnAsignarArticulosL" style="background-color: #E71096" class="btn btn-secondary float-right">
			                    {{ __('Asignar') }}
			                </button>
			            </div>
	                </form>
	                
		          </div>
		        </div>
		      </div>
		    </div>
		</div>

		<!-- Modal detalle Lote general -->
	    <div class="modal fade bd-example-modal-lg" id="detalleLoteGeneral" tabindex="-1" role="dialog" aria-labelledby="detalleLoteGModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	      <div class="modal-dialog" style="max-width: 1100px!important;" role="document">
	        <div class="modal-content">
	          <div class="modal-header" style="background: #a90a6c; color:white">
	            <h5 class="modal-title" id="detalleLoteGModal"><b>Detalle de Lote general</b></h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="container-fluid">
	              @csrf
	              <div class="card-body">
	                <div class="row">
	                  <div class="col-md-4">
	                      <div class="form-group">
	                      	<div class="col-md-12">
	                      		<label><small> Nombre del lote:  </small>  </label>
	                      	</div>
	                      	<div>
	                      		<u><strong id="nombreDetalleLote">  </strong> </u>
	                      	</div>     
	                      </div>                                       
	                  </div>
	                  <div class="col-md-4" align="center">
	                  	<div class="col-md-12">
	                  		<label> <small>Estado del lote</small>  </label>
	                  	</div>
	                  	<div class="col-md-12">
	                  		<span id="detalleEstadoGral"></span>
	                  	</div>	                  	
	                  </div>
	                  <div class="col-md-4" align="right">
	                  	<a style="background-color: #E71096; width: 50%;" class="btn btn-secondary" id="btnDetalleGralPDF" target="_blank">
					        <i class="fa fa-file-pdf-o"></i> 
					        Generar PDF        
					    </a>
	                  </div>
	                </div> <!-- /.row -->
	                <div class="row">
	                	<div class="col-md-2">
	                		<label><small>Total de Bienes OPLE: </small> <strong id="totalOpleDetalleGral"></strong></label>
	                	</div>
	                	<div class="col-md-2">
	                		<label><small>Total de Bienes ECO: </small><strong id="totalEcoDetalleGral"></strong></label>
	                	</div>
	                </div>
	                <br>

	                <nav>
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					    <a class="nav-item nav-link active" id="nav-OPLEG-tab" data-toggle="tab" href="#nav-OPLEG" role="tab" aria-controls="nav-OPLEG" aria-selected="true" style="color: #e600ac;">Bienes OPLE</a>
					    <a class="nav-item nav-link" id="nav-ECOG-tab" data-toggle="tab" href="#nav-ECOG" role="tab" aria-controls="nav-ECOG" aria-selected="false" style="color: #e600ac;">Bienes ECO</a>
					  </div>
					</nav>
	                <div class="tab-content" id="nav-tabContent">
			  			<div class="tab-pane fade show active" id="nav-OPLEG" role="tabpanel" aria-labelledby="nav-OPLE-tab">
			                <div class="row">
			                	<div class="col-md-12">
			                		<div class="center-block">	      	
								        <div class="card">
								          <div class="card-body" >
					                		<div class="form-group">
					                			
					                			<table id="detalleLote03" name="detalleLote03" class="table table-bordered table-striped" style="width:100%">
									              <thead>
									                <tr>
									                  <th style="text-align: center">Tipo del bien</th>
													  <th style="text-align: center">Número de inventario</th>
													  <th style="text-align: center">Concepto</th>
													  <th style="text-align: center">Asignado a</th>
													  <th style="text-align: center">Fecha de captura</th>
													  <th style="text-align: center">Eliminar</th>
									                </tr>
									              </thead>
									              <tbody>
									                  
									              </tbody>
									            </table>
					                		</div>	
					                	   </div>
					                	</div>
					                </div>                		
			                	</div>
			                </div>
			            </div>
			            <div class="tab-pane fade" id="nav-ECOG" role="tabpanel" aria-labelledby="nav-ECO-tab">
			            	<div class="row">
			                	<div class="col-md-12">
			                		<div class="center-block">	      	
								        <div class="card">
								          <div class="card-body" >
					                		<div class="form-group">
					                			
					                			<table id="detalleLote03ECO" name="detalleLote03ECO" class="table table-bordered table-striped" style="width:100%">
									              <thead>
									                <tr>
									                  <th style="text-align: center">Tipo del bien</th>
													  <th style="text-align: center">Número de inventario</th>
													  <th style="text-align: center">Concepto</th>
													  <th style="text-align: center">Asignado a</th>
													  <th style="text-align: center">Fecha de captura</th>
													  <th style="text-align: center">Eliminar</th>
									                </tr>
									              </thead>
									              <tbody>
									                  
									              </tbody>
									            </table>
					                		</div>	
					                	   </div>
					                	</div>
					                </div>                		
			                	</div>
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