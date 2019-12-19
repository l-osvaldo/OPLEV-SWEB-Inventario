@extends('layouts.admin')
@section('title', 'Catálogo Empleados')
@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogo de Empleados'])
<!-- /.navbar -->

@include('sweet::alert')
<div class="card">
	<div  class="card-body">
		<a href="#" style="background-color: #E71096" class="btn btn-secondary " data-toggle="modal" data-target="#exampleModalEmpleado"><i class="fa fa-plus"></i> Nuevo Empleado</a>
	</div> 
</div>	
<section class="content" style="margin-top: 2vh;">
  <div class="row ">
    <div class="col-12">     
      <div class="center-block">
        <div class="card">    
          <div class="card-body" >
            <table id="tableCatalogo" name="tableCatalogo" class="table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
                  <th style="text-align: center">Número de Empleado</th>
                  <th style="text-align: center">Nombre</th>
                  <th style="text-align: center">Área</th>
                  <th style="text-align: center">Cargo</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($empleado as $empleado)
                <tr>
                  <td>{{ $empleado->numemple}}</td>
				  <td>{{ $empleado->nombre}}</td>
                  <td>{{ $empleado->nombrearea}}</td>
                  <td>{{ $empleado->cargo}}</td>                  
                </tr>                 
								@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	</div>
	<!--Modal-->
	<div class="modal fade bd-example-modal-lg" id="exampleModalEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<form method="POST" action="{{ route('agregarEmpleados') }}" id="form">
			{{ csrf_field()}}
				<div class="modal-dialog modal-lg" role="document">      
					<div class="modal-content">
						<div class="modal-header" style="background: #a90a6c; color:white">
							<h5 class="modal-title" id="exampleModalLabel"><b>Nuevo Empleado</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
											<!--Agregar Linea -->
						<div class="container-fluid">
							<form method="POST" action="{{ route('agregarEmpleados') }}">
								@csrf               
								<div class="card card-default" style="margin-top: 5px">
									<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
								<label>1.- Número de Empleado:</label>
								<input type="text" maxlength="6" class="form-control validateDataEm" data-myTypeEm="int" data-errorEm= "11" data-validacionEm="1" id="numemple" name="numemple" onKeyPress="return SoloNumerosLetras(event,'numero');" >  
							</div>
	                    </div>
	                    <div class="col-md-7">
							<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}"> 
								<span class="text-danger error11"></span>  
							</div>
	                    </div>
					</div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>2.- Área:</label>
                          <select id="clvdepto" name="clvdepto" class="form-control select2 validateDataEm" data-myTypeEm="select" data-errorEm= "5" data-validacionEm="1" style="width: 100%;" disabled>
                            <option value="0">Área</option>
                             @foreach ($area as $area)																 
                            <option value="{{ $area->idarea}}"> {{ $area->idarea }} | {{ $area->nombrearea }} </option>
														@endforeach                                      
                          </select>
                        </div>
                      </div>
                      
                            <!-- /.col -->
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
								<label>3.- Nombre Completo:</label>
								<input type="text" class="form-control validateDataEm" data-myTypeEm="text" data-errorEm= "10" data-validacionEm="1" id="nombre" name="nombre" style="text-transform:uppercase;" onKeyPress="return soloLetras(event,'');"
								onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
								<span class="text-danger error10"></span>
							</div>
						</div>
						<!-- /.form-group -->
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
								<label>4.- Cargo:</label>
								<input type="text" class="form-control validateDataEm" data-myTypeEm="text" data-errorEm= "9" data-validacionEm="1" id="cargo" name="cargo" style="text-transform:uppercase;" onKeyPress="return soloLetras(event,'cargo');"
								onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
								<span class="text-danger error9"></span>
							</div>
						<!-- /.form-group -->
						</div>
                    <!-- /.col -->
                    </div>
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">                                 
                      </div>
                    </div>
                  </div>
								</div>
										<!--Fin Agregar Linea -->
								<div class="card-footer">                                              
									<button type="reset" id="btnLimpiar" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<button type="submit" id="btn-submitEm" style="background-color: #E71096" class="btn btn-secondary float-right" disabled>
										{{ __('Guardar') }}
									</button>
								</div>
							</form>                        
						</div>
					</div>
				</div>
		</form>
	</div>
	<!--fin modal-->

</section>

@endsection