@extends('layouts.admin')
@section('title', 'Depreciación de Artículos OPLE')

@section('content')
	@include('partials.header',['tituloEncabezado' => 'Depreciación '])

	<div class="card">
	  	<div class="card-body" >
	  		<div class="row">
		  		<div class="col-md-3">
		  			<label>1.- Seleccione una partida:</label>
		  		</div>
	  		</div>
	  		<div class="row">
		    	<div class="col-md-3">
		    		<select class="form-control select2" id="selectdepreciacionPartida" name="selectdepreciacionPartida" style="width: 90%;">
			    		<option value="0">Seleccione una partida</option>
			    		@foreach ($partidas as $partida)
			    			<option value="{{ $partida->partida }}"> {{ $partida->partida }} | {{ $partida->descpartida }}</option>
			    		@endforeach
			    	</select>
			    	
		    	</div>

		    </div>
		    <br>

			
		</div>
	</div>

	<div id="cargandoDepreciacion" style="display: none;">

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
	<div class="col-12" id="divRespuestaDepreciacion" style="display: none;">     
      <div class="center-block">
        <div class="card">

          <div class="card-body" >
            <div id="respuestaDepreciacion">
		
			</div>
          </div>
        </div>
      </div>
    </div>
@endsection