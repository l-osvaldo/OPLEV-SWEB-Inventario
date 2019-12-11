@extends('layouts.tables')
@section('content')


	<section class="content" style="margin-top: 2vh;">
		<div class="row">
			<div class="col-md-6">
				<label> {{ $numPartida }} </label>
			</div>
			<div class="col-md-6">
				<label> {{ $nombrePartida }} </label>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-6">
				<label> {{ $numLinea }} </label>
			</div>
			<div class="col-md-6">
				<label> {{ $nombreLinea }} </label>
			</div>				
		</div>

	  <div class="row ">
	    <div class="col-12">     
	      <div class="center-block">
	        <div class="card">
	          <div class="card-body" >
	            <table id="tableCatalogoECO" name="tableCatalogoECO" class="table table-bordered table-striped display" style="width:100%">
	              <thead>
	                <tr>
	                    <th style="text-align: center">Número de Inventario</th>
	                    <th style="text-align: center">Concepto</th>
	                    <th style="text-align: center">Factura</th>
	                    <th style="text-align: center">Fecha Compra</th>
	                    <th style="text-align: center">Importe</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@foreach ($articulos as $articulo)
	              		<tr data-toggle="tooltip" data-placement="top" title="Click para ver toda la información del artículo: {{ $articulo->concepto }}, Número de inventario: {{ $articulo->numeroinventario }} " onclick="abrirModalEditarECO('{{ $articulo->numeroinventario }}');">
	                      <td> {{ $articulo->numeroinventario }} </td>
	                      <td> {{ $articulo->concepto }} </td>
	                      <td> {{ $articulo->factura }} </td>
	                      <td> {{ $articulo->fechacompra }} </td>
	                      <td> $ {{ $articulo->importe }} </td>
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