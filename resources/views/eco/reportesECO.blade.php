@extends('layouts.admin')
@section('title', 'Reportes de Artículos ECO')

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
	  		<div class="col-md-3" id="terceraInstruccionECO" style="display: none;">
	  			<label id="instruccion02ECO"></label>
	  		</div>
	  	</div>
	    <div class="row">
	    	<div class="col-md-3">
	    		<select class="form-control select2" id="selectReportesECO" style="width: 90%;">
		    		<option value="0">Seleccione un reporte</option>
		    		<option value="7">1.- Bienes de un área ordenado por empleado</option>
		    		<option value="1">2.- Bienes por partida</option>		    		
		    		<option value="2">3.- Concentrado de importes por área</option>
		    		<option value="3">4.- Concentrado de importes por partida</option>
		    		<option value="8">5.- Importe de bienes calendarizado por año de adquisición</option>
		    		<option value="9">6.- Inventario de la bodega</option>
		    		<option value="10">7.- Inventario ordenado por año, partida y factura</option>
		    		<option value="4">8.- Inventario por área</option>
		    		{{-- <option value="5">Inventario por orden alfabético</option> --}}
		    		<option value="6">9.- Resguardo por empleado</option>
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

	    		<div class="form-group" style="display: none; width: 100%" id="divAnioAdquisicionECO">
	    			<select class="form-control select2" id="selectAnioAdquisicionECO" style="width: 100%">
			    		<option value="0">Seleccione un año </option>	
			    		@for ($i = 0; $i <  (date ('Y') - 2004) ; $i++)
			    			<option value="{{ date ('Y') - $i}}"> {{ date ('Y') - $i}} </option>
			    		@endfor					    		
			    	</select>
	    		</div>   

	    		<div class="form-group" style="display: none; width: 100%" id="divAreaR7ECO">
	    			<select class="form-control select2" id="selectAreaR7ECO" style="width: 100%">
			    		<option value="0">Seleccione una área </option>
			    		@foreach ($areas as $area)
			    			<option value="{{ $area->idarea }}*{{ $area->nombrearea }}"> {{ $area->idarea }} | {{ $area->nombrearea }} </option>
			    		@endforeach
			    	</select>
	    		</div>

	    	</div>    

	    	<div class="col-md-3" id="seleccionSelect3ECO">
	    		<div class="form-group" style="display: none; width: 100%" id="divPartida02ECO">
	    			<select class="form-control select2" id="selectPartida02ECO" style="width: 100%">
			    		<option value="0">Seleccione una partida </option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}*{{ $partida->descpartida }}"> {{ $partida->partida }} | {{ $partida->descpartida }} </option>
			    		@endforeach
			    	</select>
	    		</div>

	    		<div class="form-group" style="display: none; width: 100%" id="divLineaECO">
	    			<select class="form-control select2" id="selectLinea02ECO" style="width: 100%">
			    		<option value="0">Seleccione una línea </option>
			    	</select>
	    		</div>
	    	</div>		  	
	    	
	    </div>
	  </div>
	</div>

	<div id="cargandoECO" style="display: none;">
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
