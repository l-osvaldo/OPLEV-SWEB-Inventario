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
			<tr>
				<td width="50%"><strong> ÁREA: </strong> </td>
				<td width="50%"><strong> No. DE EMPLEADO: </strong> </td>
			</tr>
			<tr>
				<td width="50%"><strong> NOMBRE DE EMPLEADO: </strong> </td>
				<td width="50%"><strong> TOTAL DE BIENES: </strong> </td>
			</tr>
		</table>
		

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            {{-- <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th>No. DE INVENTARIO</th>
						  <th>DESCRIPCIÓN DEL BIEN</th>
						  <th>NÚMERO DE SERIE</th>
						  <th>MARCA</th>
						  <th>MODELO</th>
						  <th>NOMBRE DEL RESPONSABLE</th>
						  <th>No. DE FACTURA</th>
						  <th>IMPORTE DE ADQUISICIÓN</th>
						  <th>ESTADO DEL BIEN</th>
		                </tr>
		              </thead>
		              	@foreach ($bienesAlfabetico as $bien)
			                <tr>
			                	<td>{{ $bien->numeroinv }}</td>
					          	<td>{{ $bien->concepto }}</td>
					          	<td>{{ $bien->numserie }}</td>
					          	<td>{{ $bien->marca }}</td>
					          	<td>{{ $bien->modelo }}</td>
					          	<td>{{ $bien->nombreemple }}</td>
					          	<td>{{ $bien->factura }}</td>
					          	<td>${{ $bien->importe }}</td>
					          	<td>{{ $bien->estado }}</td>               
			                </tr>
		                @endforeach
		              <tbody>
		                  
		              </tbody>
		            </table> --}}
		          </div>
		        </div>
		      </div>
		    </div>
		</div>
	</section>


@endsection