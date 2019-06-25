@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<table width="100%">
		    <tr>
		      <td style="width: 100%" align="center" >
		          <h2>
		            <small>
		            <strong>ORGANISMO PÚBLICO LOCAL ELECTORAL </strong><small><br> <strong>DIRECCIÓN EJECUTIVA DE ADMINISTRACIÓN </strong> <small style="font-weight:lighter;"><br>Departamento de Recursos Materiales</small> <br> <strong> RESGUARDO DE BIENES </strong>
		          </h2>   
		      </td>
		      
		    </tr>
		</table>
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
		                  <th>No. DE INVENTARIO</th>
						  <th>DESCRIPCIÓN DEL BIEN</th>
						  <th>NÚMERO DE SERIE</th>
						  <th>IMPORTE</th>
		                </tr>
		              </thead>
		              	@foreach ($articulos as $bien)
			                <tr>
			                	<td>{{ $bien->numeroinv }}</td>
					          	<td>{{ $bien->concepto }}</td>
					          	<td>{{ $bien->numserie }}</td>
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