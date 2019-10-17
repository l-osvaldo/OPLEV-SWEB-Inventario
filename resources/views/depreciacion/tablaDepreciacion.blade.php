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
			<tr>
				<td width="70%"> 
					<label><strong>AÑOS DE VIDA:</strong></label> <label style="font-weight:lighter;"> <i> {{ $partida->numPartida }} </i></label>
				</td>
			</tr>
			<tr>
				<td width="70%"> 
					<label><strong>% DE VALOR RESIDUAL:</strong></label> <label style="font-weight:lighter;"> <i> {{ $partida->numPartida }} </i></label>
				</td>
			</tr>
		</table>

		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="color: #e600ac;">Artículos con su depreciación</a>
		    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="color: #e600ac;">Artículos sin fecha de compra</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

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

		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		  	<div class="row ">
			    <div class="col-12">     
			      <div class="center-block">	      	
			        <div class="card">
			          <div class="card-body" >
			            <table id="example2" name="example2" class="table table-bordered table-striped" style="width:100%">
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

		  </div>
		</div>	

		<br>
		<br>

		
	</section>

@endsection