@extends('layouts.admin')
@section('title', 'Catálogo Sublineas')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogos de Sublíneas'])
<!-- /.navbar -->

@include('sweet::alert')
<div class="card">
	<div class="card-body">
    <div class="card-body col-md-12">
      <div class="row">          
        <div class="col-md-3">
          <div class="form-group">
            <form method="POST" action="{{route('show-sublineas')}}">
              @csrf
              <div class="col-md-12">
                <label>1.- Seleccione una Partida:</label>
                <select id="Partidas" name="Partidas" class="form-control select2">    
                  <option selected="selected">Número de Partida</option>
                  @foreach ($sublineaSe as $sublineaSe)
                    <option value="{{ $sublineaSe->partida }}">{{ $sublineaSe->partida }} | {{ $sublineaSe->descpartida }}</option>   
                  @endforeach
                </select>
              </div>
          </div>
        </div>   
                
        <div class="col-md-3">
          <div class="form-group">
            <div class="col-md-12">
              <div class="form-group">                   
                <label>2.- Seleccione una Línea:</label>
                <select class="form-control select2" id="Linea" name="Linea" disabled >
                  <option value="0">Número de Línea</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        </form>

        <div class="col-md-4" align="right">
          <a href="#" style="background-color: #E71096; margin-top: 30px;" class="btn btn-secondary " data-toggle="modal" data-target="#exampleModalTb"><i class="fa fa-plus"></i> Nueva Sublínea</a>
        </div>
            
      </div>  
      <!---->
    </div>
	</div>
</div>

<div id="sublineaRespuesta">
                
</div>

<section class="content" style="margin-top: 2vh;">
  
  <!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="exampleModalTb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <form method="POST" action="{{ route('AgregarSub') }}" id="form">
          {{ csrf_field()}}
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background: #a90a6c; color:white">
            <h5 class="modal-title" id="exampleModalLabel"><b>Nueva Sublínea</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
                        <!--Agregar Sublinea-->
            <div class="container-fluid">
              <form method="POST" action="{{ route('AgregarSub') }}">
                    @csrf                
                <div class="card card-default" style="margin-top: 5px">
                  
                            <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Seleccione una Partida:</label>
                          <select id="partidaA" name="partidaA" class="form-control select2 validateDataDos" data-myTypeDos="select" data-errorDos= "8" data-validacionDos="1" style="width: 100%;">
                            <option  value="0">Número de partida</option>
                              @foreach ($sublineaAgt as $sublineaAgt)
                            <option value="{{ $sublineaAgt->partida}}">{{ $sublineaAgt->partida }} | {{ $sublineaAgt->descpartida }}</option>
                              @endforeach
                          </select>
                          <label>Seleccione una Línea:</label>                 
                            <select class="form-control select2 validateDataDos" data-myTypeDos="select" data-errorDos= "8" data-validacionDos="1" id="lineaA" name="lineaA" style="width: 100%;" disabled>
                              <option value="0">Número de línea</option>
                            </select>
                      </div>
                    </div>      
                    <div class="col-md-3"> 
                    	<div class="form-group">
                        <label>Número de Sublínea:</label>
                        <input type="text" class="form-control" readonly id="sublineaA" name="sublineaA" value="0">
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
                    <div class="col-md-9">
                      <div class="form-group{{ $errors->has('descsub') ? 'has-error' : '' }}">
                        <label>Descripción de Sublínea:</label>
                          <input type="text" class="form-control validateDataDos" data-myTypeDos="text" data-errorDos= "8" data-validacionDos="1" id="descsub" name="descsub" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'sublinea');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        <span class="text-danger error8"></span>
                      </div>
                    </div>
                  </div>
                </div>      
                </div>
              </form>
        		</div>
            <div class="card-footer">
              <button id="btnCerrar"  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               <button type="submit" id="btn-submit" style="background-color: #E71096" class="btn btn-secondary float-right"  disabled>
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