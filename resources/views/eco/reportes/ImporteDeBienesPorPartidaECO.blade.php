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
			<tr>
				<td>
					<label><strong>CONCENTRADO DE IMPORTES POR PARTIDA</strong></label>
				</td>
				<td align="right">
					<label style="margin-right: 80px"> <strong>TOTAL DE IMPORTE: $  </strong> {{ $totalImporte }} </label>
				</td>
			</tr>
		</table>

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="tableReporte" name="tableReporte" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">Partida</th>
						  <th style="text-align: center">Clasificación del Bien</th>
						  <th style="text-align: center">Importe en Bienes</th>
		                </tr>
		              </thead>
		              	@foreach ($partidaAndImporteTotal as $partidaImporte)
			                <tr>
			                	<td>{{ $partidaImporte->partida }}</td>
			                	<td>{{ $partidaImporte->descripcionpartida }}</td>
					          	<td>$ {{ $partidaImporte->importetotal }}</td>              
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