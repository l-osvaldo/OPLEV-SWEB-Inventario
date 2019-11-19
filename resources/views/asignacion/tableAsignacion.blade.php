@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<div class="row ">
		    <div class="col-12">     
		      <div class="center-block">	      	
		        <div class="card">
		          <div class="card-body" >
		            <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped" style="width:100%">
		              <thead>
		                <tr>
		                  <th> <input type="checkbox" name="cbxTodos" value="todos"> Asignar</th>
		                  <th style="text-align: center">Número de inventario</th>
						  <th style="text-align: center">Descripción del bien</th>
						  <th style="text-align: center">Número de serie</th>
						  <th style="text-align: center">Importe</th>
		                </tr>
		              </thead>
		              	@foreach ($bienes as $bien)
			                <tr>
			                	<td align="center"><input type="checkbox" name="{{ $bien->numeroinventario }}" value="{{ $bien->numeroinventario }}"></td>
			                	<td>{{ $bien->numeroinventario }}</td>
					          	<td>{{ $bien->concepto }}</td>
					          	<td>{{ $bien->numserie }}</td>
					          	<td>$ {{ $bien->importe }}</td>             
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