@extends('layouts.admin')
@section('title', 'Cancelación de resguardo')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Cancelación de Resguardo'])

	<div class="card">
	  	<div class="card-body" >
	  		<div class="row">
		  		<div class="col-md-3">
		  			<label>1.- Seleccione un empleado:</label>
		  		</div>
	  		</div>
	  		<div class="row">
		    	<div class="col-md-3">
		    		<select class="form-control select2" id="empleadoCR" name="empleadoCR" style="width: 90%;">
			    		<option value="0">Seleccione un empleado</option>
			    		@foreach ($empleados as $empleado)
			    			<option value="{{ $empleado->numemple }}*{{ $empleado->nombre }}"> {{ $empleado->nombre }}</option>
			    		@endforeach
			    	</select>			    	
		    	</div>
		    </div>
		    <br>			
		</div>
	</div>

	<div id="cargandoCR" style="display: none;">

		<div id="loader" class="hidden">
			<div class="cubes">
				<div class="sk-cube sk-cube1"></div>
				<div class="sk-cube sk-cube2"></div>
				<div class="sk-cube sk-cube3"></div>
				<div class="sk-cube sk-cube4"></div>
				<div class="sk-cube sk-cube5"></div>
				<div class="sk-cube sk-cube6"></div>
				<div class="sk-cube sk-cube7"></div>
				<div class="sk-cube sk-cube8"></div>
				<div class="sk-cube sk-cube9"></div>
			</div>
		</div>
	</div>
	<br>
	<div class="col-12" id="divRespuestaCR" style="display: none;">     
      <div class="center-block">
        <div class="card">

          <div class="card-body" >
            <div id="respuestaCR">
		
			</div>
          </div>
        </div>
      </div>
    </div>

@endsection