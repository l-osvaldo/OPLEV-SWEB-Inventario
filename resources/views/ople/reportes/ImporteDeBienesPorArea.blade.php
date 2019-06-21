@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<table width="100%">
		    <tr>
		      <td style="width: 100%" align="center" >
		          <h2>
		            <small>
		            <strong>ORGANISMO PÚBLICO LOCAL ELECTORAL </strong><small><br> <strong>DIRECCIÓN EJECUTIVA DE ADMINISTRACIÓN </strong> <small style="font-weight:lighter;"><br>Departamento de Recursos Materiales</small> </small></small><br> <small> Concentrado de Importes por Área </small>
		          </h2>   
		      </td>
		      
		    </tr>
		</table>
		<br>
		

		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="example2" name="example2" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th>Nombre del Área</th>
						  <th>Importe en Bienes</th>
						  
		                </tr>
		              </thead>
		              	@foreach ($areas as $area)
			                <tr>
			                	<td>{{ $area->depto }}</td>
					          	<td>$</td>              
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