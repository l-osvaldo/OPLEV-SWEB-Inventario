@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		@if ($validarBtnCancelacion == 1)		
			<div class="row">			
				<div class="col-md-12" align="right">
		    		<a style="background-color: #E71096; width: 15%;color: white;" class="btn btn-secondary" id="btnCancelarResguardo" onclick="confirmacionCancelacion()">
				        <i class="fa fa fa-ban"></i> 
				        Cancelar Resguardo        
				    </a>
		    	</div>
			</div>
		@endif
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-OPLE-tab" data-toggle="tab" href="#nav-OPLE" role="tab" aria-controls="nav-OPLE" aria-selected="true" style="color: #e600ac;">Bienes OPLE</a>
		    <a class="nav-item nav-link" id="nav-ECO-tab" data-toggle="tab" href="#nav-ECO" role="tab" aria-controls="nav-ECO" aria-selected="false" style="color: #e600ac;">Bienes ECO</a>
		  </div>
		</nav>

		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-OPLE" role="tabpanel" aria-labelledby="nav-OPLE-tab">
		  	<div class="row ">
			    <div class="col-12">     
			      <div class="center-block">	      	
			        <div class="card">
			          <div class="card-body" >
			            <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped" style="width:100%">
			              <thead>
			                <tr>
			                  <th style="text-align: center">Número de inventario</th>
							  <th style="text-align: center">Descripción del bien</th>
							  <th style="text-align: center">Número de serie</th>
							  <th style="text-align: center">Importe de adquisición</th>
			                </tr>
			              </thead>
			              	@foreach ($bienesOPLE as $bien)
				                <tr>
				                	<td>{{ $bien->numeroinv }}</td>
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
		  </div>
		  <div class="tab-pane fade" id="nav-ECO" role="tabpanel" aria-labelledby="nav-ECO-tab">
				<div class="row ">
				    <div class="col-12">     
				      <div class="center-block">	      	
				        <div class="card">
				          <div class="card-body" >
				            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
				              <thead>
				                <tr>
				                  <th style="text-align: center">Número de inventario</th>
								  <th style="text-align: center">Descripción del bien</th>
								  <th style="text-align: center">Número de serie</th>
								  <th style="text-align: center">Importe de adquisición</th>
				                </tr>
				              </thead>
				              	@foreach ($bienesECO as $bienE)
					                <tr>
					                	<td>{{ $bienE->numeroinventario }}</td>
							          	<td>{{ $bienE->concepto }}</td>
							          	<td>{{ $bienE->numeroserie }}</td>
							          	<td>$ {{ $bienE->importe }}</td>             
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
			</div>
		</div>
		

	</section>

@endsection