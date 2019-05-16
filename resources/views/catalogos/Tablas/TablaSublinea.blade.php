@extends('layouts.admin')
 <!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
      	<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> 
      </li>
    </ul>
    <div class="col-sm-11">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Sublineas</li>
        </ol>
    </div>
        
</nav>
      <!-- /.navbar -->
@section('content')


@include('sweet::alert')
<div class="card">
	<div class="card-body">
      <a href="#" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalTb"> Nueva Sublínea</a>
          <!---->
      			<div class="card-body">
                <div class="row">
                    <div class="col-md-8">
           							<div class="form-group">
                            <label>Seleccioné una Partida</label>
																<form method="POST" action="{{route('show-sublineas')}}">
																						@csrf
																						<div class="col-md-10">
																									<div class="form-group">
																											<select id="Partidas" name="Partidas" class="form-control select2 dynamic" style="width: 100%;">
																						
																															<option selected="selected">No. partida</option>
																														@foreach ($sublineaSe as $sublineaSe)
																															<option value="{{ $sublineaSe->partida }}">{{ $sublineaSe->partida }} | {{ $sublineaSe->descpartida }}</option>
																															
																														@endforeach
																											</select>

																									</div>
																						</div>
																						<label>Seleccioné una Línea</label>
																							<div class="col-md-10">
																									<div class="form-group">
																											<select class="form-control dynamic" id="Linea" name="Linea">
																													<option value="0" disabled="true" selected="true">Línea</option>
																											</select>
																									</div>
																							</div>																	
																		<input type="submit" style="background-color: #E71096" class="btn btn-secondary" value="Ver">		
																</form>
                        </div>
                    </div>
                    
                </div>
            </div>  
        <!---->
	</div>
</div>

<section class="content">
  <div class="row">
  	<div class="col-8">     
    	<div class="center-block">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Catálogo de Sublíneas</h3> 
            </div>
              <div class="car-body">
                <table id="example1" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>No. Sublínea</th>
                      <th>Descripcion</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sublineas as $sublineas)    
                    <tr>
                      <th>{{ $sublineas->sublinea }}</th>
                      <th>{{ $sublineas->descsub }}</th>
                    </tr>
                   	@endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
  </div>

	<div class="modal fade bd-example-modal-lg" id="exampleModalTb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('AgregarSub') }}" id="form">
          {{ csrf_field()}}
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="exampleModalLabel"><b>Nuevo Usuario</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
                        <!--Agregar Sublinea-->
            <div class="container-fluid">
              <form method="POST" action="{{ route('AgregarSub') }}">
                    @csrf                
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Agregar Sublinea</h3>
                  </div>
                            <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Partidas</label>
                          <select id="partidaA" name="partidaA" class="form-control select2 dynamic" style="width: 100%;">
                            <option selected="selected">No. partida</option>
                              @foreach ($sublineaAgt as $sublineaAgt)
                            <option value="{{ $sublineaAgt->partida}}">{{ $sublineaAgt->partida }} | {{ $sublineaAgt->descpartida }}</option>
                              @endforeach
                          </select>
                          <label>Seleccioné una Línea</label>                 
                            <select class="form-control dynamic" id="lineaA" name="lineaA" >
                              <option value="0" disabled="true" selected="true">Linea</option>
                            </select>
                      </div>
                    </div>      
                    <div class="col-md-6"> 
                    	<div class="form-group">
                        <label>Sublinea</label>
                        <input type="text" class="form-control" readonly id="sublinea" name="sublinea" value="0">
                          @if ($errors->has('sublinea'))
                        <small class="form-text text-danger">{{ $errors->first('sublinea') }}</small>
                          @endif
                      </div>
                      <div class="form-group" style="display: none">
                        <label>Total</label>
                        <input type="text" class="form-control" readonly id="total" name="total" value="0">
                        	@if ($errors->has('total'))
                        <small class="form-text text-danger">{{ $errors->first('total') }}</small>
                          @endif
                      </div>
                  	</div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('descsub') ? 'has-error' : '' }}">
                        <label>Ddescripción Sublinea</label>
                          <input type="text" class="form-control validateDataDos" data-myTypeDos="text" data-errorDos= "8" data-validacionDos="1" id="descsub" name="descsub" style="text-transform:uppercase;" 
                          onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <span class="text-danger error8"></span>
                      </div>
                    </div>
                  </div>
                </div>      
                </div>
              </form>
        		</div>
            <div class="card-footer">
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               <button type="submit" id="btn-submit" class="btn btn-primary float-right" disabled>
                  {{ __('Guardar') }}
              </button>
            </div>
        </div>
      </div>
    </form>
	</div>
                  <!--fin modal-->
</section>
    
@endsection