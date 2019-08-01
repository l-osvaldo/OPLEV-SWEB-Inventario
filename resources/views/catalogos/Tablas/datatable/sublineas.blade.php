@extends('layouts.tables')
@section('content')

<section class="content" style="margin-top: 2vh;">
  <div class="row">
    <div class="col-12">     
      <div class="center-block">
        <div class="card">
          <div class="card-header">  
			    <div class="col-6">
                    <h5>Partida: {{ $partida }} </h5>
                  </div>
                  <div class="col-6">
                      <h5>Línea: {{ $linea }} </h5>
                  </div>
			</div>
			<div class="card-body">
			  	<table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
					<thead>
					  <tr>
					    <th style="text-align: center">Número de Sublínea</th>
                    	<th style="text-align: center">Descripción de la Sublínea</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($sublineas as $sublinea)    
		                  <tr>
		                    <td style="width: 353px;">{{ $sublinea->sublinea }}</td>
		                    <td>{{ $sublinea->descsub }}</td>
		                    
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