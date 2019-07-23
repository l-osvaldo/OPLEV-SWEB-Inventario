@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<table width="100%">
		    <tr>
		      <td style="width: 100%" align="center" >
		          <h2>
		            <small>
		            <strong>ORGANISMO PÚBLICO LOCAL ELECTORAL </strong><small><br> <strong>DIRECCIÓN EJECUTIVA DE ADMINISTRACIÓN </strong> <small style="font-weight:lighter;"><br>Departamento de Recursos Materiales</small> </small></small><br> <small> Concentrado de Importes por Partida </small>
		          </h2>   
		      </td>
		      
		    </tr>
		</table>
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
		            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th>Partida</th>
						  <th>Clasificación del Bien</th>
						  <th>Importe en Bienes</th>
		                </tr>
		              </thead>
		              	@foreach ($partidaAndImporteTotal as $partidaImporte)
			                <tr>
			                	<td>{{ $partidaImporte->partida }}</td>
			                	<td>{{ $partidaImporte->descpartida }}</td>
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