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
	    		<select class="form-control select2" id="selectReportesECO" style="width: 90%;">
		    		<option value="0">Seleccione reporte</option>
		    		<option value="1">Bienes por partida</option>
		    		<option value="2">Importe de bienes por área</option>
		    		<option value="3">Importe de bienes por partida</option>
		    		<option value="4">Inventario por área</option>
		    		<option value="5">Inventario por orden alfabético</option>
		    		<option value="6">Resguardo por empleado</option>
		    	</select>
	    	</div>
	    	<div class="col-md-3" id="seleccionSelectECO">
	    		<div class="form-group" style="display: none; width: 100%" id="divPartidaECO">
	    			<select class="form-control select2" id="selectPartidaECO" style="width: 100%">
			    		<option value="0">Seleccione partida </option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}*{{ $partida->descpartida }}"> {{ $partida->partida }} | {{ $partida->descpartida }} </option>
			    		@endforeach
			    	</select>
	    		</div>

	    		<div class="form-group" style="display: none; width: 100%" id="divAreaECO">
	    			<select class="form-control select2" id="selectAreaECO" style="width: 100%">
			    		<option value="0">Seleccione área </option>
			    		@foreach ($areas as $area)
			    			<option value="{{ $area->clvdepto }}*{{ $area->depto }}"> {{ $area->clvdepto }} | {{ $area->depto }} </option>
			    		@endforeach
			    	</select>
	    		</div>
	    		
	    		<div class="form-group" style="display: none; width: 100%" id="divEmpleadoECO">
	    			<select class="form-control select2" id="selectEmpleadoECO" style="width: 100%">
			    		<option value="0">Seleccione empleado </option>
			    		@foreach ($empleados as $empleado)
			    			<option value="{{ $empleado->numemple }}*{{ $empleado->nombre }}"> {{ $empleado->nombre }} </option>
			    		@endforeach
			    	</select>
	    		</div>	  
	    	</div>
	    	<div class="col-md-2">
	    		<a style="background-color: #E71096; margin-left: 15px; display: none; width: 60%;" class="btn btn-secondary" id="btnGenerarPDFECO" target="_blank">
			        <i class="fa fa-file-pdf-o"></i> 
			        Generar PDF        
			    </a>
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