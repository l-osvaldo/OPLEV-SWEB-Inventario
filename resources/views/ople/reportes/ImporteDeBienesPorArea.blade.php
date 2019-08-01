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
				<td width="100%" align="right">
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
		                  <th style="text-align: center">Nombre del Área</th>
						  <th style="text-align: center">Importe en Bienes</th>
						  
		                </tr>
		              </thead>
		              	@foreach ($areaAndImporteTotal as $areaImporte)
			                <tr>
			                	<td>{{ mb_strtoupper( $nombreArea->where('idarea', $areaImporte->idarea)->first()->nombrearea  ) }} </td>
					          	<td>$ {{ $areaImporte->importetotal }}</td>              
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