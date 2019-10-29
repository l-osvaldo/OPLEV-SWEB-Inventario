@extends('layouts.admin')
@section('title', 'Reportes de Artículos OPLE')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Reportes de Artículos OPLE'])
	<!-- /.navbar -->

	<div class="card">
	  <div class="card-body" >
	  	<div class="row">
	  		<div class="col-md-3">
	  			<label>1.- Seleccione un Reporte:</label>
	  		</div>
	  		<div class="col-md-3" id="segundaInstruccion" style="display: none;">
	  			<label id="instruccion">2.- Seleccione un Reporte:</label>
	  		</div>
	  	</div>
	    <div class="row">
	    	<div class="col-md-3">
	    		<select class="form-control select2" id="selectReportes" style="width: 90%;">
		    		<option value="0">Seleccione un reporte</option>
		    		<option value="1">Bienes por partida</option>
		    		<option value="2">Concentrado de importes por área</option>
		    		<option value="3">Concentrado de importes por partida</option>
		    		<option value="4">Inventario por área</option>
		    		<option value="5">Inventario por orden alfabético</option>
		    		<option value="6">Resguardo por empleado</option>
		    		<option value="7">Importe de bienes calendarizados por año de adquisición</option>
		    		<option value="8">Bienes de un área ordenado por empleado</option>
		    	</select>
	    	</div>
	    	<div class="col-md-3" id="seleccionSelect">
	    		<div class="form-group" style="display: none; width: 100%" id="divPartida">
	    			<select class="form-control select2" id="selectPartida" style="width: 100%">
			    		<option value="0">Seleccione una partida </option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}*{{ $partida->descpartida }}"> {{ $partida->partida }} | {{ $partida->descpartida }} </option>
			    		@endforeach
			    	</select>
	    		</div>

	    		<div class="form-group" style="display: none; width: 100%" id="divArea">
	    			<select class="form-control select2" id="selectArea" style="width: 100%">
			    		<option value="0">Seleccione una área </option>
			    		@foreach ($areas as $area)
			    			<option value="{{ $area->idarea }}*{{ $area->nombrearea }}"> {{ $area->idarea }} | {{ $area->nombrearea }} </option>
			    		@endforeach
			    	</select>
	    		</div>
	    		
	    		<div class="form-group" style="display: none; width: 100%" id="divEmpleado">
	    			<select class="form-control select2" id="selectEmpleado" style="width: 100%">
			    		<option value="0">Seleccione un empleado </option>
			    		@foreach ($empleados as $empleado)
			    			<option value="{{ $empleado->numemple }}*{{ $empleado->nombre }}"> {{ $empleado->nombre }} </option>
			    		@endforeach
			    	</select>
	    		</div>	  
	    	</div>    	  	
	    	
	    </div>
	  </div>
	</div>

	<div id="cargando" style="display: none;">

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
	<div class="col-12" id="divRespuesta" style="display: none;">     
      <div class="center-block">
        <div class="card">

          <div class="card-body" >
            <div id="respuestaReporte">
		
			</div>
          </div>
        </div>
      </div>
    </div>


@endsection

