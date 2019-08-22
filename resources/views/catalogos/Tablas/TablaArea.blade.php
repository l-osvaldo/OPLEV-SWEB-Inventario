@extends('layouts.admin')
@section('title', 'Catálogo Áreas')

@section('content')
	
 	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Catálogo de Áreas'])
	<!-- /.navbar -->
	
	<section class="content" style="margin-top: 2vh;">
		<div class="row ">
				<div class="col-12">     
					<div class="center-block">
						<div class="card">      
							<div class="card-body" >
								<table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
									<thead>
										<tr>
											<th style="text-align: center">Número de área</th>
											<th style="text-align: center">Nombre</th>
											<th style="text-align: center">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($area as $area)												
										<tr>
											<td>{{ $area->idarea }}</td>
											<td>{{ $area->nombrearea }}</td>
											<td><div class="btn-group">

													<button class="btn" style="background-color:  #EA0D94" 
														data-areaid="{{ $area->idarea }}"
														data-area="{{ $area->nombrearea }}" 
														
														data-toggle="modal" data-target="#editModal">
														<a  data-toggle="tooltip" data-placement="top" title="Editar" style="color: #fff;">
															<i class="fa fa-pencil"></i>
														</a>
													</button>
													

												</div></td>
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
<!--Modal-->
<!-- Modal editar usuarios -->
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background: #a90a6c; color:white">
				<h5 class="modal-title" id="exampleModalLabel">Editar Area</h5>
				<button type="button" onClick="cerrar();" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form>
			<div class="card card-default" style="margin-top: 5px">
				<div class="modal-body">
					<div class="row">

						<div class="col-sm-3">
							<div class="form-group">
								<label for="clave"><b>Número del área</b></label>
								<div class="input-group-prepend">  
										<input class="form-control form-control" readonly type="text" id="editClave" name="editClave">
								</div>
							</div>
						</div>
						<div class="col-sm-9">
								<div class="form-group {{ $errors->has('nombrearea') ? 'has-error' : '' }}">
										<label for="nombre"><b>Nombre del área</b></label>
										<div class="input-group-prepend">   
											<input class="form-control form-control validateDataArea" data-myTypeArea="text" data-errorArea= "1" data-validacionArea="1" type="text" id="depto" name="depto" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'area');" onkeyup="javascript:this.value=this.value.toUpperCase();">		
											
									</div>
									<span class="text-danger error1"></span>
								</div>
						</div>

					</div>
				</div>
			</div>
				<div class="modal-footer">
					<button style="background-color: #E71096" class="btn btn-secondary float-right" id="editBtn" disabled>Actualizar</button>
					<input type="hidden" name="Area" id="actualizarArea"> 
					
					
				</div>

			</form>

		</div>
	</div>
</div>
<!--Modal-->



@endsection