@extends('layouts.admin')
@section('title', 'Catálogo Empleados')
@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogo de Empleados'])
<!-- /.navbar -->

@include('sweet::alert')
<div class="card">
	<div  class="card-body">
		<a href="#" style="background-color: #E71096" class="btn btn-secondary " data-toggle="modal" data-target="#exampleModalEmpleado"> Agregar Empleado</a>
	</div> 
</div>	
<section class="content" style="margin-top: 2vh;">
  <div class="row ">
    <div class="col-12">     
      <div class="center-block">
        <div class="card">    
          <div class="card-body" >
            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>No. Empleado</th>
                  <th>Nombre</th>
                  <th>Área</th>
                  <th>cargo</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($empleado as $empleado)
                <tr>
                  <td>{{ $empleado->numemple}}</td>
									<td>{{ $empleado->nombre}}</td>
                  <td>{{ $empleado->nombredepto}}</td>
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
	<div class="modal fade bd-example-modal-lg" id="exampleModalEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<form method="POST" action="{{ route('agregarEmpleados') }}" id="form">
			{{ csrf_field()}}
				<div class="modal-dialog modal-lg" role="document">      
					<div class="modal-content">
						<div class="modal-header" style="background: #a90a6c; color:white">
							<h5 class="modal-title" id="exampleModalLabel"><b>Agregar Empleado</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
											<!--Agregar Linea -->
						<div class="container-fluid">
							<form method="POST" action="{{ route('agregarEmpleados') }}">
								@csrf               
								<div class="card card-default">
									<div class="card-body">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group">
                          <label>Área:</label>
                          <select id="clvdepto" name="clvdepto" class="form-control select2 validateDataEm" data-myTypeEm="select" data-errorEm= "5" data-validacionEm="1" style="width: 100%;">
                            <option value="0" selected="selected">Área</option>
                             @foreach ($area as $area)																 
                            <option value="{{ $area->clvdepto}}"> {{ $area->clvdepto }} | {{ $area->depto }} </option>
														@endforeach                                      
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
						<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}" style="width: 75%;">
							<label>No. Empleado:</label>
							<input type="text" maxlength="6" class="form-control validateDataEm" data-myTypeEm="int" data-errorEm= "11" data-validacionEm="1" id="numemple" name="numemple" onKeyPress="return SoloNumerosLetras(event,'numero');" > 
							<span class="text-danger error11"></span>  
						</div>
                      </div>
                            <!-- /.col -->
						<div class="col-md-9">
							<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
								<label>Nombre Completo:</label>
								<input type="text" class="form-control validateDataEm" data-myTypeEm="text" data-errorEm= "10" data-validacionEm="1" id="nombre" name="nombre" style="text-transform:uppercase;" onKeyPress="return soloLetras(event,'');"
								onkeyup="javascript:this.value=this.value.toUpperCase();">
								<span class="text-danger error10"></span>
							</div>
						</div>
						<!-- /.form-group -->
						<div class="col-md-9">
							<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
								<label>Cargo:</label>
								<input type="text" class="form-control validateDataEm" data-myTypeEm="text" data-errorEm= "9" data-validacionEm="1" id="cargo" name="cargo" style="text-transform:uppercase;" onKeyPress="return soloLetras(event,'cargo');"
								onkeyup="javascript:this.value=this.value.toUpperCase();">
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