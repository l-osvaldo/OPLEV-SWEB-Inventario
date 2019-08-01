@extends('layouts.admin')
@section('title', 'Catálogo Líneas')


@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogo de Líneas'])
<!-- /.navbar -->

<section >
  <div class="card">
    <div class="card-body">
      <div class="col-12">
        <div class="card-body">
          <div class="row"> 
            <div class="col-md-10">
              <div class="form-group">
                <label>1.- Seleccione una Partida</label>
                <form method="POST" action="{{ route('show-lineas') }}">
                  @csrf  
                    <select id="PartidasL" name="PartidasL" class="form-control select2 validateDataBusquedaLinea" data-myTypeBusquedaLinea="select" data-errorBusquedaLinea="1" data-validacionBusquedaLinea="1" style="width: 40%;" required>
                      <option value="0" selected="selected">Número de partida</option>
                         @foreach ($lineas as $linea)
                      <option value="{{ $linea->partida }}">{{ $linea->partida }} | {{ $linea->descpartida }}</option>
                        @endforeach
                  	</select>
                  <div class="col-md-4 float-right">
                    @include('sweet::alert')
                      <div  class="btn-group ">
                        <a href="#" style="background-color: #E71096" class="btn btn-secondary float-right" data-toggle="modal" data-target="#exampleModalLinea">  <i class="fa fa-plus"></i> Nueva Línea</a>
                      </div> 
                  </div>
                </form>  
              </div>
            </div>
          </div>               
        </div> 
      </div>
    </div>
  </div>  
</section>
<!-- Content Header (Page header) -->
<div id="lineaRespuesta">
                
</div>



            <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModalLinea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <form method="POST" action="{{ route('agregarLinea') }}" id="form">
      {{ csrf_field()}}
        <div class="modal-dialog modal-lg" role="document">      
          <div class="modal-content">
            <div class="modal-header" style="background: #a90a6c; color:white">
              <h5 class="modal-title" id="exampleModalLabel"><b>Nueva Línea</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                                <!--Agregar Linea -->
            <div class="container-fluid">
              <form method="POST" action="{{ route('agregarLinea') }}">
                @csrf               
                <div class="card card-default">
                                            <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Seleccione una Partida:</label>
                          <select id="partida" name="partida" class="form-control select2 validateDataLi" data-myTypeLi="select" data-errorLi= "5" data-validacionLi="1" style="width: 100%;">
                            <option selected value="0">Número de partida</option>
                              @foreach ($linea8 as $linea8)
                            <option value="{{ $linea8->partida }}"> {{ $linea8->partida }} | {{ $linea8->descpartida }}</option>
                              @endforeach         
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
												<div class="form-group">
													<label>Número de Línea:</label>
													<input type="text" class="form-control" readonly id="LineaMax" name="LineaMax" value="0">   
														@if ($errors->has('LineaMax'))
													<small class="form-text text-danger">{{ $errors->first('LineaMax') }}</small>
														@endif
												</div>
                                                <!-- /.form-group -->
												<div class="form-group">
													<label>Número de Sublínea:</label>
													<input type="text" class="form-control" readonly id="sublinea" name="sublinea" value="01" placeholder="01">
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
                                                <!-- /.form-group -->
                      </div>
                                                <!-- /.col -->
											<div class="col-md-9">
												<div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
													<label>Descripción de la Línea:</label>
													<input type="text" class="form-control validateDataLi" data-myTypeLi="text" data-errorLi= "3" data-validacionLi="1" id="desclinea" name="desclinea" style="text-transform:uppercase;"	onkeyup="javascript:this.value=this.value.toUpperCase();" onKeyPress="return SoloNumerosLetras(event,'linea');">
													<span class="text-danger error3"></span>
												</div>
											<!-- /.form-group -->
												<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
													<label>Descripción de la Sublínea:</label>
													<input type="text" class="form-control validateDataLi" data-myTypeLi="text" data-errorLi= "4" data-validacionLi="1" id="descsub" name="descsub" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'sublinea');"
													onkeyup="javascript:this.value=this.value.toUpperCase();" >
													<span class="text-danger error4"></span>
												</div>
											<!-- /.form-group -->
											</div>
                    <!-- /.col -->
                    </div>
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">                                 
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->   
     						</div>
                    <!--Fin Agregar Linea -->
                <div class="card-footer">                                              
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="submit" id="btn-submit3" style="background-color: #E71096" class="btn btn-secondary float-right" disabled>
                    {{ __('Guardar') }}
                  </button>
                </div>
              </form>                        
            </div>
          </div>
        </div>
    </form>
  </div>
  
    <!--fin modal-->
</section>

@endsection