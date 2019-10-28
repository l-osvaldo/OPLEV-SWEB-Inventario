@extends('layouts.tables')
@section('content')

	<section class="content" style="margin-top: 2vh;">
		<table width="100%">
			<tr>
				<td width="70%"> 
					<label><strong>NÚMERO DE LA PARTIDA:</strong></label> <label style="font-weight:lighter;"> <i> {{ $partida->numPartida }} </i></label>
				</td>
			</tr>
			@foreach ($datosPartida as $element)
				
			
				<tr>
					<td width="70%"> 
						<label><strong>DESCRIPCIÓN DE LA PARTIDA: </strong></label> <label style="font-weight:lighter;"> <i> {{ $element->descpartida }} </i></label>
					</td>
				</tr>
				<tr>
					<td width="70%"> 
						<label><strong>AÑOS DE VIDA: </strong></label> <label style="font-weight:lighter;"> <i> {{ $element->aniosvida }} </i></label>
					</td>
				</tr>
				<tr>
					<td width="70%"> 
						<label><strong>% DE VALOR RESIDUAL: </strong></label> <label style="font-weight:lighter;"> <i> {{ $element->porcentajeDepreciacion }} </i></label>
					</td>
				</tr>
				<tr>
					<td width="70%"> 
						<label><strong>AÑO: </strong></label> <label style="font-weight:lighter;"> <i> {{ $anioActual }} </i></label>
					</td>
				</tr>
			@endforeach
		</table>

		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="color: #e600ac;">Artículos con su depreciación</a>
		    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="color: #e600ac;">Artículos sin fecha de compra</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

		  	<div class="row ">
			    <div class="col-12">     
			      <div class="center-block">	      	
			        <div class="card">
			          <div class="card-body" >
			            <table id="example1" name="example1" class="display responsive nowrap" style="width:100%">
			              <thead>
			                <tr>
			                  <th style="text-align: center">Número de Inventario</th>
							  <th style="text-align: center">Concepto</th>
							  <th style="text-align: center">Fecha de compra</th>
							  <th style="text-align: center">Valor del bien</th>
							  <th style="text-align: center">Valor residual</th>
							  <th style="text-align: center">Valor del bien menos valor residual</th>

							  <th style="text-align: center">Saldo en libros al 31 de diciembre de {{ $anioAnterior }}  </th>
							  <th style="text-align: center">Depreciación mensual</th> 
							  <th style="text-align: center">Depreciacion anual</th>

							  <th style="text-align: center">Depreciación Enero</th> 
							  <th style="text-align: center">Saldo al 31 de Enero de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Febrero</th> 
							  <th style="text-align: center">Saldo al 28 de febrero de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Marzo</th> 
							  <th style="text-align: center"> Saldo al 31 de Marzo de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Abril</th>
							  <th style="text-align: center"> Saldo al 30 de Abril de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Mayo</th> 
							  <th style="text-align: center">Saldo al 31 de Mayo de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Junio</th> 
							  <th style="text-align: center">Saldo al 30 de Junio de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Julio</th> 
							  <th style="text-align: center"> Saldo al 31 de Julio de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Agosto</th>
							  <th style="text-align: center"> Saldo al 31 de Agosto de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Septiembre</th> 
							  <th style="text-align: center">Saldo al 30 de Septiembre de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Octubre</th> 
							  <th style="text-align: center">Saldo al 31 de Octubre de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Noviembre</th> 
							  <th style="text-align: center"> Saldo al 30 de Noviembre de {{ $anioActual }} </th>

							  <th style="text-align: center">Depreciación Diciembre</th>
							  <th style="text-align: center"> Saldo al 31 de Diciembre de {{ $anioActual }} </th>   

			                </tr>
			              </thead>
			              <tbody>
			                  @foreach ($articulos as $articulo)
				                <tr>
				                	<td>{{ $articulo->numeroinv }}</td>
						          	<td>{{ $articulo->concepto }}</td>
						          	<td>{{ $articulo->fechacomp }}</td>
						          	<td>$ {{ $articulo->importe }}</td>
						          	<td>$ {{ $articulo->valorresidual }}</td>
						          	<td>$ {{ $articulo->bienmenosresidual }}</td>  
						          	<td>$ {{ $articulo->saldo }} </td>
						          	<td>$ {{ $articulo->depreciacionMensual }} </td>
						          	<td>$ {{ $articulo->depreciacionAnual }} </td>

						          	<td>$ {{ $articulo->eneroD }} </td>
						          	<td>$ {{ $articulo->eneroSaldo }} </td>

						          	<td>$ {{ $articulo->febreroD }} </td>
						          	<td>$ {{ $articulo->febreroSaldo }} </td>

						          	<td>$ {{ $articulo->marzoD }} </td>
						          	<td>$ {{ $articulo->marzoSaldo }} </td>

						          	<td>$ {{ $articulo->abrilD }} </td>
						          	<td>$ {{ $articulo->abrilSaldo }} </td>

						          	<td>$ {{ $articulo->mayoD }} </td>
						          	<td>$ {{ $articulo->mayoSaldo }} </td>

						          	<td>$ {{ $articulo->junioD }} </td>
						          	<td>$ {{ $articulo->junioSaldo }} </td>

						          	<td>$ {{ $articulo->julioD }} </td>
						          	<td>$ {{ $articulo->julioSaldo }} </td>

						          	<td>$ {{ $articulo->agostoD }} </td>
						          	<td>$ {{ $articulo->agostoSaldo }} </td>

						          	<td>$ {{ $articulo->septiembreD }} </td>
						          	<td>$ {{ $articulo->septiembreSaldo }} </td>

						          	<td>$ {{ $articulo->octubreD }} </td>
						          	<td>$ {{ $articulo->octubreSaldo }} </td>

						          	<td>$ {{ $articulo->noviembreD }} </td>
						          	<td>$ {{ $articulo->noviembreSaldo }} </td>

						          	<td>$ {{ $articulo->diciembreD }} </td>
						          	<td>$ {{ $articulo->diciembreSaldo }} </td>
				                </tr>
			                  @endforeach
			              </tbody>
			            </table>
			          </div>
			        </div>
			      </div>
			    </div>
			</div>

		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		  	<div class="row ">
			    <div class="col-12">     
			      <div class="center-block">	      	
			        <div class="card">
			          <div class="card-body" >
			            <table id="example2" name="example2" class="table table-bordered table-striped" style="width:100%">
			              <thead>
			                <tr>
			                  <th style="text-align: center">Número de Inventario</th>
							  <th style="text-align: center">Concepto</th>
							  <th style="text-align: center">Fecha de compra</th>
							  <th style="text-align: center">Valor del bien</th>
			                </tr>
			              </thead>
			              <tbody>
			                  @foreach ($noDepreciacion as $art)
				                <tr>
				                	<td>{{ $art->numeroinv }}</td>
						          	<td>{{ $art->concepto }}</td>
						          	<td> Sin fecha </td>
						          	<td>{{ $art->importe }}</td>               
				                </tr>
			                  @endforeach
			              </tbody>
			            </table>
			          </div>
			        </div>
			      </div>
			    </div>
			</div>

		  </div>
		</div>	

		<br>
		<br>


		<!-- Modal Historial Depreciación -->
	    <div class="modal fade bd-example-modal-lg" id="historialDepreciacionModal" tabindex="-1" role="dialog" aria-labelledby="historialDepreciacionModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	      <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	          <div class="modal-header" style="background: #a90a6c; color:white">
	            <h5 class="modal-title" id="historialDepreciacionModalLabel"><b> </b></h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	              <!--editar Partida -->
	          <div class="container-fluid">
	              @csrf
	              <div class="card-body">
	                <div class="row">
	                  <div class="col-md-12">
	                      <div class="form-group">
	                        <input type="hidden" name="numeroInventarioD" id="numeroInventarioD" value="">
	                        <label>Concepto:  <strong id="DepreciacionConcepto" style="background-color: #F694D0"></strong> </label> 	                                                 
	                      </div>                                       
	                  </div><!-- /.col -->
	                </div> <!-- /.row -->
	                <hr>
	                <div class="row">
	                    <div class="col-md-4">
	                      <div class="form-group">
	                      	<label>Fecha de Compra:  <strong id="DepreciacionFecha"></strong> </label> 
	                      </div>                                         
	                    </div>
	                    <div class="col-md-4">
	                      <div class="form-group">
	                      	<label>Valor del bien:  <strong id="DepreciacionValorBien"></strong> </label>
	                      </div>                                         
	                    </div>
	                    <div class="col-md-4">
	                      <div class="form-group">
	                      	<label>Valor residual:  <strong id="DepreciacionValorResidual"></strong> </label>
	                      </div>                                         
	                    </div>
	                </div>
	                <hr>
	                <div class="row">
	                    <div class="col-md-6">
	                      <div class="form-group">
	                      	<label>Valor del bien menos valor residual:  <strong id="DepreciacionBienMenosResidual"></strong> </label> 
	                      </div>                                         
	                    </div>
	                    <div class="col-md-6">
	                      <div class="form-group">
	                      	<label>Saldo en libros al 31 de diciembre de {{ $anioAnterior }}:  <strong id="DepreciacionSaldoAnioAnterior"></strong> </label>
	                      </div>                                         
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-6">
	                      <div class="form-group">
	                      	<label>Depreciación mensual:  <strong id="DepreciacionMensual"></strong> </label> 
	                      </div>                                         
	                    </div>
	                    <div class="col-md-6">
	                      <div class="form-group">
	                      	<label>Depreciación anual:  <strong id="DepreciacionAnual"></strong> </label>
	                      </div>                                         
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-6">
	                      <div class="form-group">
	                      	<label>Depreciación mensual:  <strong id="DepreciacionMesActual"></strong> </label> 
	                      </div>                                         
	                    </div>
	                </div>
	                
	              </div>
	           </div>
	              <!--Fin Editar Partida -->
	              
	              
	              <div class="card-footer">
	                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>	                  
	              </div>
	          </div>
	        </div>
	      </div>
	    </div>

		
	</section>

@endsection

