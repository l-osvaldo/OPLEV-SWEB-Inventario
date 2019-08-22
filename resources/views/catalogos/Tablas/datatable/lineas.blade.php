@extends('layouts.tables')
@section('content')

<section class="content" style="margin-top: 2vh;">
  <div class="row">
    <div class="col-12">     
      <div class="center-block">
        <div class="card">
          <div class="card-header">  
			    <h5>Partida: 
			    	@foreach ($partida as $partidaD)
			    		{{ $partidaD->descpartida }}
			    	@endforeach 
			    </h5>
			</div>
			<div class="card-body">
			  	<table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
					<thead>
					  <tr>
					    <th style="text-align: center">Número de Línea</th>
					    <th style="text-align: center">Descripción de Línea</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($lineas as $linea) 
						<tr>
							<td> {{ $linea->linea }} </td>
							<td> {{ $linea->desclinea }} </td>
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