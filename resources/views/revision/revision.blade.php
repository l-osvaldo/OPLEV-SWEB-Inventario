@extends('layouts.admin')
@section('title', 'Revisión de cancelaciones')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Revisión de cancelaciones de resguardo'])

	@include('sweet::alert')

	<section class="content" style="margin-top: 2vh;">

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">Número de cancelación</th>
						  <th style="text-align: center">Nombre del empleado</th>
						  <th style="text-align: center">Área</th>
						  <th style="text-align: center">Número de artículos OPLE</th>
						  <th style="text-align: center">Importe OPLE</th>
						  <th style="text-align: center">Número de artículos ECO</th>
						  <th style="text-align: center">Importe ECO</th>
						  <th style="text-align: center">Acciones</th>
		                </tr>
		              </thead>
		              	@foreach ($cancelaciones as $cancelacion)
			                <tr>
			                	<td>{{ $cancelacion->Id }}</td>
					          	<td>{{ $cancelacion->nombreempleado }}</td>
					          	<td>{{ $cancelacion->nombrearea }}</td>
					          	<td>{{ $cancelacion->numArticulosOPLE}}</td>
					          	<td>$ {{ $cancelacion->totalImporteOPLE}}</td>
					          	<td>{{ $cancelacion->numArticulosECO}}</td>
					          	<td>$ {{ $cancelacion->totalImporteECO}} </td>    
					          	<td>
									<div class="btn-group dropleft">
									  <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Accciones
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" onclick="detalleOPLE({{ $cancelacion->Id }}, '{{ $cancelacion->nombreempleado }}');">Detalle OPLE</a>
									    <a class="dropdown-item" onclick="detalleECO({{ $cancelacion->Id }}, '{{ $cancelacion->nombreempleado }}');">Detalle ECO</a>
									     <div class="dropdown-divider"></div>
									    <a class="dropdown-item" href="../catalogos/reportes/cancelacionResguardoPDF/{{ $cancelacion->Id }}" target="_black">Reporte</a>
									     <div class="dropdown-divider"></div>
									    <a class="dropdown-item" onclick="articulosAsignables({{ $cancelacion->Id }});">Reasignar bienes</a>
									  </div>
									</div>
					          	</td>          
			                </tr>
		                @endforeach
		              <tbody>
		                  
		              </tbody>
		            </table>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>


		<!-- Modal detalle OPLE -->
	    <div class="modal fade bd-example-modal-lg" id="detalleOPLE" tabindex="-1" role="dialog" aria-labelledby="detalleOPLEModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	      <div class="modal-dialog" style="max-width: 1100px!important;" role="document">
	        <div class="modal-content">
	          <div class="modal-header" style="background: #a90a6c; color:white">
	            <h5 class="modal-title" id="detalleOPLEModal"><b>Detalle de artículos OPLE</b></h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="container-fluid">
	              @csrf
	              <div class="card-body">
	                <div class="row">
	                  <div class="col-md-12">
	                      <div class="form-group">
	                      	<label><small> Cancelación de resguardo del empleado: </small> <u><strong id="nombreEmpleadoDOPLE">  </strong> </u> </label>         
	                      </div>                                       
	                  </div>
	                </div> <!-- /.row -->
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
	                			<table id="detalles" name="detalles" class="table table-bordered table-striped" style="width:100%">
					              <thead>
					                <tr>
					                  <th style="text-align: center">Número de inventario</th>
									  <th style="text-align: center">Descripción del bien</th>
									  <th style="text-align: center">Número de serie</th>
									  <th style="text-align: center">Importe de adquisición</th>
									  <th style="text-align: center">Asignado a</th>
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


		<!-- Modal detalle ECO -->
	    <div class="modal fade bd-example-modal-lg" id="detalleECO" tabindex="-1" role="dialog" aria-labelledby="detalleECOModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	      <div class="modal-dialog" style="max-width: 1100px!important;" role="document">
	        <div class="modal-content">
	          <div class="modal-header" style="background: #a90a6c; color:white">
	            <h5 class="modal-title" id="detalleECOModal"><b>Detalle de artículos ECO</b></h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="container-fluid">
	              @csrf
	              <div class="card-body">
	                <div class="row">
	                  <div class="col-md-12">
	                      <div class="form-group">
	                      	<label><small> Cancelación de resguardo del empleado: </small> <u><strong id="nombreEmpleadoDECO">  </strong> </u> </label>         
	                      </div>                                       
	                  </div>
	                </div> <!-- /.row -->
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
	                			<table id="detallesE" name="detallesE" class="table table-bordered table-striped" style="width:100%">
					              <thead>
					                <tr>
					                  <th style="text-align: center">Número de inventario</th>
									  <th style="text-align: center">Descripción del bien</th>
									  <th style="text-align: center">Número de serie</th>
									  <th style="text-align: center">Importe de adquisición</th>
									  <th style="text-align: center">Asignado a</th>
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

		<!-- Modal asignación -->
	    <div class="modal fade bd-example-modal-lg" id="modalAsignación" tabindex="-1" role="dialog" aria-labelledby="AsignacionModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	      <div class="modal-dialog" style="max-width: 1150px!important;" role="document">
	        <div class="modal-content">
	          <div class="modal-header" style="background: #a90a6c; color:white">
	            <h5 class="modal-title" id="AsignacionModal"><b>Asignación de artículos</b></h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="container-fluid">
	              @csrf
	              <div class="card-body">
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
	                			<table id="detallesAsignacion" name="detallesAsignacion" class="table table-bordered table-striped" style="width:100%">
					              <thead>
					                <tr>
					                  <th style="text-align: center">
					                  	<div class="form-check">
										  <label class="form-check-label">
										    <input type="checkbox" class="form-check-input" value="todos">Asignación
										  </label>
										</div>
					                  </th>
					                  <th style="text-align: center">Número de inventario</th>
									  <th style="text-align: center">Descripción del bien</th>
									  <th style="text-align: center">Número de serie</th>
									  <th style="text-align: center">Importe de adquisición</th>
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
	</section>

@endsection