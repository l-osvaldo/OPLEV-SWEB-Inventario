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
				<td width="70%"> 
					<label><strong>ÁREA:</strong></label> <label style="font-weight:lighter;"> <i>  {{ $nombrearea }} </i></label>
				</td>
			</tr>
		</table>	

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="tableR8" name="tableR8" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">Número de Inventario</th>
						  <th style="text-align: center">Descripción del bien</th>
						  <th style="text-align: center">Número de serie</th>
						  <th style="text-align: center">Marca</th>
						  <th style="text-align: center">Modelo</th>
						  <th style="text-align: center">Nombre del responsable</th>
						  <th style="text-align: center">Número de factura</th>
						  <th style="text-align: center">Importe de adquisición</th>
						  <th style="text-align: center">Estado del bien</th>
		                </tr>
		              </thead>
		              <tbody>
		                  @foreach ($articulos as $bien)
			                <tr>
			                	<td>{{ $bien->numeroinv }}</td>
					          	<td>{{ $bien->concepto }}</td>
					          	<td>{{ $bien->numserie }}</td>
					          	<td>{{ $bien->marca }}</td>
					          	<td>{{ $bien->modelo }}</td>
					          	<td>{{ $bien->nombreemple }}</td>
					          	<td>{{ $bien->factura }}</td>
					          	<td>$ {{ $bien->importe }}</td>
					          	<td>{{ $bien->estado }}</td>               
			                </tr>
		                  @endforeach
		              </tbody>
		            </table>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>
	</section>
@endsection