@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<table width="100%">
			<tr>
				<td width="70%"> 
					<label><strong>NÚMERO DE LA PARTIDA:</strong></label> <label style="font-weight:lighter;"> <i> {{ $partida->numPartida }} </i></label>
				</td>
			</tr>
			<tr>
				<td width="70%"> 
					<label><strong>DESCRIPCIÓN DE LA PARTIDA:</strong></label> <label style="font-weight:lighter;"> <i> {{ $partida->numPartida }} </i></label>
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
		                  <th style="text-align: center">Número de Inventario</th>
						  <th style="text-align: center">Concepto</th>
						  <th style="text-align: center">Fecha de compra</th>
						  <th style="text-align: center">Valor del bien</th>
		                </tr>
		              </thead>
		              <tbody>
		                  @foreach ($articulos as $articulo)
			                <tr>
			                	<td>{{ $articulo->numeroinv }}</td>
					          	<td>{{ $articulo->concepto }}</td>
					          	<td>{{ $articulo->fechacomp }}</td>
					          	<td>{{ $articulo->importe }}</td>               
			                </tr>
		                  @endforeach
		              </tbody>
		            </table>
		          </div>
		        </div>
		      </div>
		    </div>
		</div>


		<br>
		<br>

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">Número de Inventario</th>
						  <th style="text-align: center">Concepto</th>
						  <th style="text-align: center">Fecha de compra</th>
						  <th style="text-align: center">Valor del bien</th>
		                </tr>
		              </thead>
		              <tbody>
		                  @foreach ($noDepreciacion as $art)
			                <tr>
			                	<td>{{ $art->numeroinv }}</td>
					          	<td>{{ $art->concepto }}</td>
					          	<td> Sin fecha </td>
					          	<td>{{ $art->importe }}</td>               
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