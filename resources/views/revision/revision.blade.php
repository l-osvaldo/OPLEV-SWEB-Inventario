@extends('layouts.admin')
@section('title', 'Revisión de cancelaciones')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Revisión de cancelaciones de resguardo'])

	@include('sweet::alert')

	<section class="content" style="margin-top: 2vh;">

		<div class="row ">
			    <div class="col-12">     
			      <div class="center-block">	      	
			        <div class="card">
			          <div class="card-body" >
			            <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped" style="width:100%">
			              <thead>
			                <tr>
			                  <th style="text-align: center">Número de cancelación</th>
							  <th style="text-align: center">Nombre del empleado</th>
							  <th style="text-align: center">Área</th>
							  <th style="text-align: center">Número de artículos OPLE</th>
							  <th style="text-align: center">Número de artículos ECO</th>
							  <th style="text-align: center">Importe OPLE</th>
							  <th style="text-align: center">Importe ECO</th>
							  <th style="text-align: center">Acciones</th>
			                </tr>
			              </thead>
			              	@foreach ($cancelaciones as $cancelacion)
				                <tr>
				                	<td>{{ $cancelacion->Id }}</td>
						          	<td>{{ $cancelacion->nombreempleado }}</td>
						          	<td>{{ $cancelacion->nombrearea }}</td>
						          	<td>{{ $cancelacion->numArticulosOPLE}}</td>
						          	<td>{{ $cancelacion->numArticulosECO}}</td>
						          	<td>$ {{ $cancelacion->totalImporteOPLE}}</td>
						          	<td>$ {{ $cancelacion->totalImporteECO}} </td>    
						          	<td>
						          		<div class="btn-group">
										  <button class="btn btn-default btn-sm dropdown-toggle"
										          type="button" data-toggle="dropdown">
										    Acciones <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" role="menu">
										    <li><a href="#" style="margin-left: 10px; color: #EA0D94">Detalle OPLE</a></li>
										    <li><a href="#" style="margin-left: 10px; color: #EA0D94">Detalle ECO</a></li>
										    <li><a href="#" style="margin-left: 10px; color: #EA0D94">Reporte</a></li>
										    <li><a href="#" style="margin-left: 10px; color: #EA0D94">Reasignar</a></li>
										  </ul>
										</div>
						          	</td>          
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