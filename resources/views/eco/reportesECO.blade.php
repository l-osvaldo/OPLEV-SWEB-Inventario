@extends('layouts.admin')
@section('title', 'Reportes de Artículos OPLE')

@section('content')

	<!-- Navbar -->
	@include('partials.header',['tituloEncabezado' => 'Reportes de Artículos ECO'])
	<!-- /.navbar -->

	<div class="card">
	  <div class="card-body" >
	  	<div class="row">
	  		<div class="col-md-3">
	  			<label>1.- Seleccione un Reporte:</label>
	  		</div>
	  		<div class="col-md-3" id="segundaInstruccionECO" style="display: none;">
	  			<label id="instruccionECO">2.- Seleccione un Reporte:</label>
	  		</div>
	  	</div>
	    <div class="row">
	    	<div class="col-md-3">
	    		<select class="form-control select2" id="selectReportesECO" style="width: 90%;">
		    		<option value="0">Seleccione un reporte</option>
		    		<option value="1">Bienes por partida</option>
		    		<option value="2">Concentrado de importes por área</option>
		    		<option value="3">Concentrado de importes por partida</option>
		    		<option value="4">Inventario por área</option>
		    		<option value="5">Inventario por orden alfabético</option>
		    		<option value="6">Resguardo por empleado</option>
		    	</select>
	    	</div>
	    	<div class="col-md-3" id="seleccionSelectECO">
	    		<div class="form-group" style="display: none; width: 100%" id="divPartidaECO">
	    			<select class="form-control select2" id="selectPartidaECO" style="width: 100%">
			    		<option value="0">Seleccione una partida </option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}*{{ $partida->descpartida }}"> {{ $partida->partida }} | {{ $partida->descpartida }} </option>
			    		@endforeach
			    	</select>
	    		</div>

	    		<div class="form-group" style="display: none; width: 100%" id="divAreaECO">
	    			<select class="form-control select2" id="selectAreaECO" style="width: 100%">
			    		<option value="0">Seleccione una área </option>
			    		@foreach ($areas as $area)
			    			<option value="{{ $area->idarea }}*{{ $area->nombrearea }}"> {{ $area->idarea }} | {{ $area->nombrearea }} </option>
			    		@endforeach
			    	</select>
	    		</div>
	    		
	    		<div class="form-group" style="display: none; width: 100%" id="divEmpleadoECO">
	    			<select class="form-control select2" id="selectEmpleadoECO" style="width: 100%">
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

	<div id="cargandoECO" style="display: none;">
		
		<div class="d-flex justify-content-center" >
		  <div class="spinner-border" role="status">
		    <span class="sr-only">Loading...</span>
		  </div>
		</div>
	</div>
	<br>
	<div class="col-12" id="divRespuestaECO" style="display: none;">     
      <div class="center-block">
        <div class="card">

          <div class="card-body" >
            <div id="respuestaReporteECO">
		
			</div>
          </div>
        </div>
      </div>
    </div>


@endsection