@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<div class="row">
			<div class="col-md-12" align="right">
	    		<a style="background-color: #E71096; margin-left: 15px; display: none; width: 10%;" class="btn btn-secondary" id="btnGenerarPDFECO" target="_blank">
			        <i class="fa fa-file-pdf-o"></i> 
			        Generar PDF        
			    </a>
	    	</div>
		</div>
		<br>
		<table width="100%">
			@foreach ($datosEmpleado as $dato)			
			<tr>
				<td width="50%"><strong> ÁREA: </strong> {{ $dato->nombredepto }} </td>
				<td width="20%"><strong> No. DE EMPLEADO: </strong> {{ $dato->numemple }} </td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="50%"><strong> NOMBRE DE EMPLEADO: </strong> {{ $dato->nombre }} </td>
				@foreach ($totalArticulos as $total)
					<td width="20%"><strong> TOTAL DE BIENES: </strong> {{ $total->total }} </td>
				@endforeach
				<td width="30%" align="right">
					<label style="margin-right: 50px"> <strong>TOTAL DE IMPORTE: $ </strong> {{ $totalImporte }} </label>
				</td>
			</tr>
			@endforeach
		</table>
		

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
						  <th style="text-align: center">Número de serie</th>
						  <th style="text-align: center">Importe</th>
		                </tr>
		              </thead>
		              	@foreach ($articulos as $bien)
			                <tr>
			                	<td>{{ $bien->numeroinventario }}</td>
					          	<td>{{ $bien->concepto }}</td>
					          	<td>{{ $bien->numeroserie }}</td>
					          	<td>$ {{ $bien->importe }}</td>               
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