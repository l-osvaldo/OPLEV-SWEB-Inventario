@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<div class="row">
			<div class="col-md-12" align="right">
	    		<a style="background-color: #E71096; display: none; width: 10%;" class="btn btn-secondary" id="btnGenerarPDF" target="_blank">
			        <i class="fa fa-file-pdf-o"></i> 
			        Generar PDF        
			    </a>
	    	</div>
		</div>
		<br>
		<table width="100%">
			<tr>
				<td>
					<label><strong>INVENTARIO POR ORDEN ALFABÉTICO NUEVO</strong></label>
				</td>
			</tr>
			<tr>
				<td width="50%">
					<label><strong>ÁREA:</strong></label> <label style="font-weight:lighter;"> <i> TODAS </i></label>
				</td>
				{{-- <td width="50%" align="right">
					<label style="margin-right: 80px"> <strong>TOTAL DE IMPORTE: $ </strong> {{ $totalImporte }} </label>
				</td> --}}
			</tr>
		</table>
		
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				@foreach ($partidas as $partida)
					@if ($loop->index == 0)				
						<a class="nav-item nav-link active" id="nav-{{ $partida->partida }}-tab" data-toggle="tab" href="#{{ $partida->partida }}" role="tab" aria-controls="{{ $partida->partida }}" aria-selected="true" style="color: #e600ac;" data-toggle="tooltip" data-placement="top" title="{{ $partida->descpartida }}"> {{ $partida->partida }} </a>
					@else
						<a class="nav-item nav-link" id="nav-{{ $partida->partida }}-tab" data-toggle="tab" href="#{{ $partida->partida }}" role="tab" aria-controls="{{ $partida->partida }}" aria-selected="false" style="color: #e600ac;" data-toggle="tooltip" data-placement="top" title="{{ $partida->descpartida }}">{{ $partida->partida }}</a>
					@endif				
				@endforeach
			</div>
		  
		</nav>
		<div class="tab-content" id="nav-tabContent">
			@foreach ($partidas as $partida)
				@if ($loop->index == 0)
					<div class="tab-pane fade show active" id="{{ $partida->partida }}" role="tabpanel" aria-labelledby="nav-{{ $partida->partida }}-tab">
						<div class="row ">
						    <div class="col-12">     
						      <div class="center-block">	      	
						        <div class="card">
						          <div class="card-body" >
						          	<label style="margin-right: 50px"> <strong>TOTAL DE IMPORTE POR PARTIDA: $ </strong> {{ $partida->totalImportePartida }} </label>
						            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
						              <thead>
						                <tr>
						                  <th style="text-align: center">Número de inventario</th>
										  <th style="text-align: center">Descripción del bien</th>
										  <th style="text-align: center">Número de serie</th>
										  <th style="text-align: center">Marca</th>
										  <th style="text-align: center">Modelo</th>
										  <th style="text-align: center">Número de factura</th>
										  <th style="text-align: center">Importe de adquisición</th>
						                </tr>
						              </thead>
						              	@foreach ($partida->articulos as $art)
							                <tr>
							                	<td>{{ $art->numeroinv }}</td>
									          	<td>{{ $art->concepto }}</td>
									          	<td>{{ $art->numserie }}</td>
									          	<td>{{ $art->marca }}</td>
									          	<td>{{ $art->modelo }}</td>
									          	<td>{{ $art->factura }}</td>
									          	<td>$ {{ $art->importe }}</td>               
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
					</div>
				@else
					<div class="tab-pane fade" id="{{ $partida->partida }}" role="tabpanel" aria-labelledby="nav-{{ $partida->partida }}-tab">
						<div class="row ">
						    <div class="col-12">     
						      <div class="center-block">	      	
						        <div class="card">
						          <div class="card-body" >
						          	<label style="margin-right: 50px"> <strong>TOTAL DE IMPORTE POR PARTIDA: $ </strong> {{ $partida->totalImportePartida }} </label>
						            <table id="tableR9" name="tableR9" class="table table-bordered table-striped tableR9" style="width:100%">
						              <thead>
						                <tr>
						                  <th style="text-align: center">Número de inventario</th>
										  <th style="text-align: center">Descripción del bien</th>
										  <th style="text-align: center">Número de serie</th>
										  <th style="text-align: center">Marca</th>
										  <th style="text-align: center">Modelo</th>
										  <th style="text-align: center">Número de factura</th>
										  <th style="text-align: center">Importe de adquisición</th>
						                </tr>
						              </thead>
						              	@foreach ($partida->articulos as $art)
							                <tr>
							                	<td>{{ $art->numeroinv }}</td>
									          	<td>{{ $art->concepto }}</td>
									          	<td>{{ $art->numserie }}</td>
									          	<td>{{ $art->marca }}</td>
									          	<td>{{ $art->modelo }}</td>
									          	<td>{{ $art->factura }}</td>
									          	<td>$ {{ $art->importe }}</td>               
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
					</div>
				@endif
			@endforeach
		</div>
	</section>


@endsection