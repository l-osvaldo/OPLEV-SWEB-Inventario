@extends('layouts.admin')

@section('content')
 <!-- Navbar -->
	<nav class=" navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars float-sm-left"></i></a> 
			</li>   
		</ul>
			<div class="col-sm-8">
				<ol class="breadcrumb float-sm-left">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Areas</li>
				</ol>
			</div> 

			<ul class="navbar-nav ml-auto float-sm-right">   
					<li class="nav-item">
						<a class="nav-link" href="#"><h5 style="color:#EA0D94"><b>Dirección Ejecutiva de Administración</b></h5></a>
					</li>
			</ul>    
	</nav>
	<!-- /.navbar -->
	<section class="content" style="margin-top: 2vh;">
		<div class="row ">
				<div class="col-9">     
					<div class="center-block">
						<div class="card">
							<h5 class="card-header">Catálogo de Partidas</h5>       
							<div class="card-body" >
								<table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
									<thead>
										<tr>
											<th>Clave</th>
											<th>Nombre</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($area as $area)												
										<tr>
											<td>{{ $area->clvdepto }}</td>
											<td>{{ $area->depto }}</td>
											<td><div class="btn-group">

													<button class="btn btn-success" 
														data-areaid="{{ $area->clvdepto }}"
														data-area="{{ $area->depto }}" 
														
														data-toggle="modal" data-target="#editModal">
														<a href="#" data-toggle="tooltip" data-placement="top" title="Editar" style="color: #fff;">
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
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background: #a90a6c; color:white">
				<h5 class="modal-title" id="exampleModalLabel">Editar Area</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form>
				<div class="modal-body">
					<div class="row">

						<div class="col">
							<div class="form-group">
								<label for="clave"><b>Clave</b></label>
								<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-list-alt"></i></span>    
										<input class="form-control form-control-sm" readonly type="text" id="editClave" name="editClave">
								</div>
							</div>
						</div>

						<div class="col">
								<div class="form-group {{ $errors->has('depto') ? 'has-error' : '' }}">
										<label for="nombre"><b>Nombre</b></label>
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-building"></i></span>    
											<input class="form-control form-control validateDataLi" data-myTypeLi="text" data-errorLi= "9" data-validacionLi="1" type="text" id="depto" name="depto" style="text-transform:uppercase;" 
											onkeyup="javascript:this.value=this.value.toUpperCase();">
											<input class="form-control form-control validateDataLi" data-myTypeLi="text" data-errorLi= "9" data-validacionLi="1" type="hidden" id="nombredepto" name="nombredepto" style="text-transform:uppercase;" 
											onkeyup="javascript:this.value=this.value.toUpperCase();">
											
											<span class="text-danger error9"></span>
									</div>
								</div>
						</div>

					</div>
				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" id="editBtn">Actualizar</button>
					<input type="hidden" name="Area" id="actualizarArea"> 
					
					
				</div>
			</form>

		</div>
	</div>
</div>
<!--Modal-->



@endsection