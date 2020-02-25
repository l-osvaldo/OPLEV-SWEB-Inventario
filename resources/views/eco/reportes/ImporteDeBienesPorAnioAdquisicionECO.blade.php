@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<div class="row">
			<div class="col-md-12" align="right">
	    		<a style="background-color: #E71096; display: none; width: 10%;" class="btn btn-secondary" id="btnGenerarPDFECO" target="_blank">
			        <i class="fa fa-file-pdf-o"></i> 
			        Generar PDF        
			    </a>
	    	</div>
		</div>
		<br>
		<table width="100%">
			<tr>
				<td> <label><strong>Importe de bienes calendarizados por año de adquisición</strong></label> </td>
			</tr>
			<tr>
				<td width="70%"> 
					<label><strong>Año de adquisición: </strong></label> <label style="font-weight:lighter;"> <i> {{ $anioAdquisicion->anioAdquisicion }} </i></label>
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
		                  <th style="text-align: center">Partida</th>
						  <th style="text-align: center">Clasificación del bien</th>
						  <th style="text-align: center">Ene</th>
						  <th style="text-align: center">Feb</th>
						  <th style="text-align: center">Mar</th>
						  <th style="text-align: center">Abr</th>
						  <th style="text-align: center">May</th>
						  <th style="text-align: center">Jun</th>
						  <th style="text-align: center">Jul</th>
						  <th style="text-align: center">Ago</th>
						  <th style="text-align: center">Sep</th>
						  <th style="text-align: center">Oct</th>
						  <th style="text-align: center">Nov</th>
						  <th style="text-align: center">Dic</th>
						  <th style="text-align: center">Totales</th>
		                </tr>
		              </thead>
		              <tbody>
		              		@foreach ($partidas as $partida)
		              			<tr>
				                	<td>{{ $partida->partida }}</td>
						          	<td>{{ $partida->descpartida }}</td>
						          	<td>{{ $partida->meses[0] }}</td>
						          	<td>{{ $partida->meses[1] }}</td>
						          	<td>{{ $partida->meses[2] }}</td>
						          	<td>{{ $partida->meses[3] }}</td>
						          	<td>{{ $partida->meses[4] }}</td>
						          	<td>{{ $partida->meses[5] }}</td>
						          	<td>{{ $partida->meses[6] }}</td>
						          	<td>{{ $partida->meses[7] }}</td>
						          	<td>{{ $partida->meses[8] }}</td>
						          	<td>{{ $partida->meses[9] }}</td>
						          	<td>{{ $partida->meses[10] }}</td>
						          	<td>{{ $partida->meses[11] }}</td>
						          	<td>{{ $partida->total }}</td>               
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