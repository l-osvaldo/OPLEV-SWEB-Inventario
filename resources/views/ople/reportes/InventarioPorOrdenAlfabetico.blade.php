@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		
		<table width="100%">
			<tr>
				<td>
					<label><strong>INVENTARIO POR ÁREA</strong></label>
				</td>
			</tr>
			<tr>
				<td width="50%">
					<label><strong>ÁREA:</strong></label> <label style="font-weight:lighter;"> <i> TODAS </i></label>
				</td>
				<td width="50%" align="right">
					<label style="margin-right: 80px"> <strong>TOTAL DE IMPORTE: $ </strong> {{ $totalImporte }} </label>
				</td>
			</tr>
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