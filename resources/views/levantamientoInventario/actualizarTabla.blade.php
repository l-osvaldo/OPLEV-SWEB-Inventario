@extends('layouts.tables')
@section('content')

		          	
		            <table id="tableLevantamiento" name="tableLevantamiento" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th style="text-align: center">ID</th>
						  <th style="text-align: center">Fecha del levantamiento</th>
						  <th style="text-align: center">Estatus</th>
						  <th style="text-align: center">Detalle</th>
						  <th style="text-align: center">Área</th>
						  <th style="text-align: center">Nombre del lote</th>
						  <th style="text-align: center">Total de bienes OPLE</th>
						  <th style="text-align: center">Total de bienes ECO</th>
						  
		                </tr>
		              </thead>		              	
		              <tbody>
		                  @foreach ($lotes as $lote)
		                  	@if ($lote->descripcion === null)
		                  		<tr>
		                  	@else
		                  		<tr data-toggle="tooltip" data-placement="top" title="{{ $lote->descripcion }} ">
		                  	@endif
			                  
			                  	<td> {{ $lote->Id }} </td>
			                  	<td align="center"> {{ $lote->fecha }} </td>
			                  	@if ( $lote->estado === 'Abierto')
			                  		<td align="center"> <span class="badge badge-success">{{ $lote->estado }}</span> </td> 
			                  	@else
			                  		<td align="center"> <span class="badge badge-info" style="background: #f44611">{{ $lote->estado }}</span> </td>
			                  	@endif
			                  	
			                  	<td align="center">
			                  		<button type="button" class="btn btn-secondary btn-sm" onclick="verDetalleLote( {{ $lote->Id }}, {{ $lote->totalOPLE }}, {{ $lote->totalECO }}, '{{ $lote->nombre }}', '{{ $lote->tipoLote }}' , '{{ $lote->estado }}' )">
									    Ver
									</button>
			                  	</td>
			                  	<td> {{ $lote->area }}</td>
			                  	<td> {{ $lote->nombre }}</td>
			                  	<td align="center"> {{ $lote->totalOPLE }}</td>
			                  	<td align="center"> {{ $lote->totalECO }}</td>
			                  	
			                  </tr>
		                  @endforeach
		              </tbody>
		            </table>

@endsection