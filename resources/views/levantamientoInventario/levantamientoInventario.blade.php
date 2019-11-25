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
		          <div class="card-body" >
		            <table id="tableLevantamiento" name="tableLevantamiento" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">ID</th>
						  <th style="text-align: center">Fecha del levantamiento</th>
						  <th style="text-align: center">Área</th>
						  <th style="text-align: center">Nombre del lote</th>
						  <th style="text-align: center">Total de bienes OPLE</th>
						  <th style="text-align: center">Total de bienes ECO</th>
						  <th style="text-align: center">Detalle</th>
		                </tr>
		              </thead>		              	
		              <tbody>
		                  @foreach ($lotes as $lote)
			                  <tr>
			                  	<td> {{ $lote->Id }} </td>
			                  	<td> {{ $lote->created_at }} </td>
			                  	<td> {{ $lote->area }}</td>
			                  	<td> {{ $lote->nombre }}</td>
			                  	<td align="center"> {{ $lote->totalOPLE }}</td>
			                  	<td align="center"> {{ $lote->totalECO }}</td>
			                  	<td align="center">
			                  		<button type="button" class="btn btn-secondary btn-sm" onclick="verDetalleLote( {{ $lote->Id }}, {{ $lote->totalOPLE }}, {{ $lote->totalECO }}, '{{ $lote->nombre }}', '{{ $lote->tipoLote }}' )">
									    Ver
									</button>
			                  	</td>
			                  </tr>
		                  @endforeach
		              </tbody>
		            </table>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>


		<!-- Modal detalle Lote -->
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
	                  <div class="col-md-12">
	                      <div class="form-group">
	                      	<label><small> Nombre del empleado:  </small> <u><strong id="nombreEmpleadoDetalleLote">  </strong> </u> </label>         
	                      </div>                                       
	                  </div>
	                </div> <!-- /.row -->
	                <div class="row">
	                	<div class="col-md-12">
	                		<div class="form-group">
	                			<table id="detalleLote02" name="detalleLote02" class="table table-bordered table-striped" style="width:100%">
					              <thead>
					                <tr>
					                  <th style="text-align: center">Tipo del bien</th>
									  <th style="text-align: center">Nùmero de inventario</th>
									  <th style="text-align: center">Concepto</th>
									  <th style="text-align: center">Semaforo</th>
									  <th style="text-align: center">Asignado</th>
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