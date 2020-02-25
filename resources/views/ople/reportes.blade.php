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
	  			<label id="instruccion"></label>
	  		</div>
	  		<div class="col-md-3" id="terceraInstruccion" style="display: none;">
	  			<label id="instruccion02"></label>
	  		</div>
	  	</div>
	    <div class="row">
	    	<div class="col-md-3">
	    		<select class="form-control select2" id="selectReportes" style="width: 90%;">
	    			{{-- los valores del selector no estan ordenados por que se han ido agregando reportes --}}
		    		<option value="0">Seleccione un reporte</option>
		    		<option value="8">1.- Bienes de un área ordenado por empleado</option>
		    		<option value="1">2.- Bienes por partida</option>
		    		<option value="2">3.- Concentrado de importes por área</option>
		    		<option value="3">4.- Concentrado de importes por partida</option>
		    		<option value="7">5.- Importe de bienes calendarizados por año de adquisición</option>
		    		<option value="11">6.- Inventario de la bodega</option>
		    		<option value="10">7.- Inventario ordenado por año, partida y factura</option>
		    		<option value="4">8.- Inventario por área</option>
		    		<option value="5">9.- Inventario por orden alfabético</option>
		    		<option value="9">10.- Inventario por orden alfabético nuevo</option>		    		
		    		<option value="6">11.- Resguardo por empleado</option>		    		
		    		
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

	    		<div class="form-group" style="display: none; width: 100%" id="divAnioAdquisicion">
	    			<select class="form-control select2" id="selectAnioAdquisicion" style="width: 100%">
			    		<option value="0">Seleccione un año </option>	
			    		@for ($i = 0; $i <  (date ('Y') - 2004) ; $i++)
			    			<option value="{{ date ('Y') - $i}}"> {{ date ('Y') - $i}} </option>
			    		@endfor					    		
			    	</select>
	    		</div>  

	    		<div class="form-group" style="display: none; width: 100%" id="divAreaR8">
	    			<select class="form-control select2" id="selectAreaR8" style="width: 100%">
			    		<option value="0">Seleccione una área </option>
			    		@foreach ($areas as $area)
			    			<option value="{{ $area->idarea }}*{{ $area->nombrearea }}"> {{ $area->idarea }} | {{ $area->nombrearea }} </option>
			    		@endforeach
			    	</select>
	    		</div>
	    	</div>  

	    	<div class="col-md-3" id="seleccionSelect3">
	    		<div class="form-group" style="display: none; width: 100%" id="divPartida02">
	    			<select class="form-control select2" id="selectPartida02" style="width: 100%">
			    		<option value="0">Seleccione una partida </option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}*{{ $partida->descpartida }}"> {{ $partida->partida }} | {{ $partida->descpartida }} </option>
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

