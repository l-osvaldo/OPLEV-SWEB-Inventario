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
	    		<select class="form-control select2" id="selectReportes" style="width: 90%;">
		    		<option value="0">Seleccione reporte</option>
		    		<option value="1">Bienes por partida</option>
		    		<option value="2">Importe de bienes por área</option>
		    		<option value="3">Importe de bienes por partida</option>
		    		<option value="4">Inventario por área</option>
		    		<option value="5">Inventario por orden alfabético</option>
		    		<option value="6">Resguardo por empleado</option>
		    	</select>
	    	</div>
	    	<div class="col-md-3">
	    		<div class="form-group" style="display: none; width: 100%" id="divPartida">
	    			<select class="form-control select2" id="selectPartida" style="width: 100%">
			    		<option value="0">Seleccione partida </option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}*{{ $partida->descpartida }}"> {{ $partida->partida }} | {{ $partida->descpartida }} </option>
			    		@endforeach
			    	</select>
	    		</div>

	    		<div class="form-group" style="display: none; width: 100%" id="divArea">
	    			<select class="form-control select2" id="selectArea" style="width: 100%">
			    		<option value="0">Seleccione área </option>
			    		@foreach ($areas as $area)
			    			<option value="{{ $area->clvdepto }}*{{ $area->depto }}"> {{ $area->clvdepto }} | {{ $area->depto }} </option>
			    		@endforeach
			    	</select>
	    		</div>
	    		

		    	{{-- 
		    	<div style="display: none" id="divEmpleado">
		    		<select class="form-control select2" id="selectEmpleado" style="width: 30%; margin-left: 15px; display: none;">
			    		<option value="0">Seleccione empleado</option>
			    	</select>
		    	</div> --}}	  
	    	</div>
	    	<div class="col-md-2">
	    		<a href="" style="background-color: #E71096; margin-left: 15px; display: none; width: 60%" class="btn btn-secondary" id="btnGenerarPDF">
			        <i class="fa fa-file-pdf-o"></i> 
			        Generar PDF        
			    </a>
	    	</div>
	    	  	
	    	
	    </div>
	  </div>
	</div>

@endsection