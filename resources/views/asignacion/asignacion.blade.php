@extends('layouts.admin')
@section('title', 'Asignación de resguardo')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Asignación de Resguardo'])

	@include('sweet::alert')

	<div class="card">
	  	<div class="card-body" >
	  		<div class="row">
		  		<div class="col-md-3">
		  			<label>1.- Seleccione un empleado:</label>
		  		</div>
	  		</div>
	  		<div class="row">
		    	<div class="col-md-3">
		    		<select class="form-control select2" id="empleadoAsignacion" name="empleadoAsignacion" style="width: 90%;">
			    		<option value="0">Seleccione un empleado</option>
			    		@foreach ($cancelaciones as $cancelacion)
			    			<option value="{{ $cancelacion->Id }}*{{ $cancelacion->nombreempleado }}"> {{ $cancelacion->nombreempleado }}</option>
			    		@endforeach
			    	</select>			    	
		    	</div>
		    </div>
		    <br>			
		</div>
	</div>

	<div id="cargandoAsignacion" style="display: none;">

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
	<div class="col-12" id="divRespuestaAsignacion" style="display: none;">     
      <div class="center-block">
        <div class="card">

          <div class="card-body" >
            <div id="respuestaAsignacion">
		
			</div>
          </div>
        </div>
      </div>
    </div>

@endsection