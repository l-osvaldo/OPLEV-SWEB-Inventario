@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		
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
		                  <th>Nombre del Área</th>
						  <th>Importe en Bienes</th>
						  
		                </tr>
		              </thead>
		              	@foreach ($areaAndImporteTotal as $areaImporte)
			                <tr>
			                	<td>{{ mb_strtoupper( $nombreArea->where('clvdepto', $areaImporte->clvarea)->first()->depto  ) }} </td>
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