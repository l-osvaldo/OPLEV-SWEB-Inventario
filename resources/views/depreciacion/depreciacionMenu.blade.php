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
		    	<div class="col-md-9" align="right">
		    		<a style="background-color: #E71096; width: 10%; color: white" class="btn btn-secondary" id="btnGenerarPDF" onclick="generarPDFDepreciacion()">
				        <i class="fa fa-file-pdf-o"></i> 
				        Generar PDF        
				    </a>
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


    <!-- Modal depreciación -->
    <div class="modal fade bd-example-modal-sm" id="ModalDepreciacionPDF" tabindex="-1" role="dialog" aria-labelledby="ModalDepreciacionPDFLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="ModalDepreciacionPDFLabel"><b>Reporte de depreciación</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <!--Agregar Partida -->
          <div class="container-fluid">
            	<br>
              @csrf
              <div class="card">
              	<div class="card-body">
              		<div class="row">
              			<div class="col-md-12">
              				<label>1.- Seleccione la fecha</label>
              			</div>
              		</div>
              		<br>
              		<div class="row">
              			<div class="col-md-12">
              				<div style="overflow:hidden;">
							    <div class="form-group">
							        <div class="row">
							            <div class="col-md-12">
							                <div id="datetimepicker13"></div>
							            </div>
							        </div>
							    </div>							    
							</div>
              			</div>              			
              		</div>
              		<div class="row">
              			<div class="col-md-12" align="center">
              				<label id="fechaReporteDepreciacion" style="color: #E71096" ></label>
              			</div>
              		</div>
              	</div>             
	            <!--Fin Agregar Partida -->
	            <div class="card-footer">
	                <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
	                <button type="button" id="btnGenerarPDFDepreciacion" style="background-color: #E71096" class="btn btn-secondary float-right" onclick="generarReportePDFDepreciacion()">
	                    {{ __('Generar') }}
	                </button>
	            </div>
	          </div>
          </div>
        </div>
      </div>
    </div>

@endsection