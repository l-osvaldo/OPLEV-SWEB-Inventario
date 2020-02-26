@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<div class="row justify-content-end" align="right">

			@for ($i = 0; $i < $numeroBotonGenerarPDF ; $i++)
				<div>
					<a style="background-color: #E71096; display: none; width: 100%;" class="btn btn-secondary botonDisplay" id="btnGenerarPDFECO{{ $i + 1 }}" href="../catalogos/reportes/inventarioDeLaBodegaPDFECO/{{ $i + 1 }}" target="_blank">
				        <i class="fa fa-file-pdf-o"></i> 
				        Generar PDF - parte {{ $i + 1 }}     
				    </a>
				</div>
				&nbsp;
			@endfor
		</div>
		<br>
		<table width="100%">
			<tr>
				<td>
					<label><strong>INVENTARIO DE LA BODEGA</strong></label>
				</td>
			</tr>
			<tr>
				<td width="50%">
					<label><strong>ÁREA:</strong></label> <label style="font-weight:lighter;"> <i> BODEGA </i></label>
				</td>
				<td width="50%" align="right">
					<label style="margin-right: 80px"> <strong>TOTAL DE IMPORTE: $ </strong> {{ $totalImporte }} </label>
				</td>
			</tr>			
		</table>
		
		<br>
		
		

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">Número de inventario</th>
						  <th style="text-align: center">Descripción del bien</th>
						  <th style="text-align: center">Número de <br> serie</th>
						  <th style="text-align: center">Marca</th>
						  <th style="text-align: center">Modelo</th>
						  <th style="text-align: center">Medidas</th>
						  <th style="text-align: center">Número de factura</th>
						  <th style="text-align: center">Importe de adquisición</th>
						  <th style="text-align: center">Estado del bien</th>
		                </tr>
		              </thead>
		              	@foreach ($articulos as $bien)
			                <tr>
			                	<td>{{ $bien->numeroinventario }}</td>
					          	<td>{{ $bien->concepto }}</td>
					          	<td>{{ $bien->numeroserie }}</td>
					          	<td>{{ $bien->marca }}</td>
					          	<td>{{ $bien->modelo }}</td>
					          	<td>{{ $bien->medidas }}</td>
					          	<td>{{ $bien->factura }}</td>
					          	<td>$ {{ $bien->importe }}</td>
					          	<td>{{ $bien->estado }}</td>               
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
	</section>


@endsection