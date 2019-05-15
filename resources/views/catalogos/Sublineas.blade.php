@extends('layouts.admin')

@section('content')

@include('sweet::alert')
      <div class="card">
        <div class="card-body">
          <a href="#" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"> Nueva Sublínea</a>
          
        </div>
      </div>

      <section class="content">
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5>Catálogo de Sublíneas</h5>
                        </div>
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
                                                        @foreach ($sublinea as $sublinea)
                                                        <option value="{{ $sublinea->partida }}">{{ $sublinea->partida }} | {{ $sublinea->descpartida }}</option>
                                                        
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
    
                        </div>
                    </div>
                </div>
                <!-- -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        @foreach ($sublineaAg as $sublineaAg)
                                        <option value="{{ $sublineaAg->partida}}">{{ $sublineaAg->partida }} | {{ $sublineaAg->descpartida }}</option>
                                        
                                        @endforeach
                                        </select>
                                        <label>Seleccioné una Línea</label>                 
                                        <select class="form-control dynamic" id="lineaA" name="lineaA" >
                                            <option value="0" disabled="true" selected="true">Linea</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                            
                                <!-- /.form-group -->
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
                                <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
            
                                    
                                <!-- /.form-group -->
                                <div class="form-group">
                                        <label>Ddescripción Sublinea</label>
                                        <input type="text" class="form-control" id="descsub" name="descsub" style="text-transform:uppercase;" 
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        @if ($errors->has('descsub'))
                                            <small class="form-text text-danger">{{ $errors->first('descsub') }}</small>
                                        @endif
                                    </div>
                                <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
            
                           
            
                            <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            
                        </div>
                            </form>
                    </div>

                        <!--Fin Agregar Sublinea-->
                          <div class="card-footer">
                              <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btn-submit2" class="btn btn-primary float-right">
                                {{ __('Guardar') }}
                            </button>
                          </div>
                      </div>
                    </div>
                  </div>
                                    <!--fin modal-->
        </section>


        

@endsection