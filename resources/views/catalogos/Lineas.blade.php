@extends('layouts.admin')

@section('content')

@include('sweet::alert')
      <div class="card">
        <div class="card-body">
          <a href="#" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#modalLineas"> Nueva Linea</a>
          
        </div>
      </div>


<!-- Content Header (Page header) -->
    
    <section class="content">
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h5 >Catálogo</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Partidas</label>

                                    <form method="POST" action="{{ route('show-lineas') }}">
                                            @csrf
                                            <select id="Partidas" name="Partidas" class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">No. partida</option>
                                                    @foreach ($linea as $linea)
                                                    <option value="{{ $linea->partida }}">{{ $linea->partida }} | {{ $linea->descpartida }}</option>
                                                    
                                                    @endforeach
                                            </select>
                                            <hr>
                                            <input type="submit" style="background-color: #E71096" class="btn btn-secondary" value="Ver">
                                    </form>    
                                </div>
                            </div>
                            
                        </div>
                       
                        </div>   

                    </div>
                </div>
            </div>
                                
                              <!-- Modal -->
                              <div class="modal fade bd-example-modal-lg" id="modalLineas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{ route('agregarLinea') }}" id="form">
                                            {{ csrf_field()}}
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header" style="background: #a90a6c; color:white">
                                          <h5 class="modal-title" id="exampleModalLabel"><b>Agregar Linea</b></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <!--Agregar Linea -->
                                        <div class="container-fluid">
                                                    
                                        <div class="card card-default">
                                            
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group {{ $errors->has('partida') ? 'has-error' : '' }}">
                                                        <label>Partidas</label>
                                                        <select id="partida" name="partida" class="form-control select2 validateDataDos" data-myTypeDos="select" data-errorDos= "6" data-validacionDos="1" style="width: 100%;">
                                                        <option selected="selected">No. partida</option>
                                                    @foreach ($linea2 as $linea2)
                                                        <option value="{{ $linea2->partida }}"> {{ $linea2->partida }} | {{ $linea2->descpartida }}</option>
                                                        
                                                    @endforeach
                                                    
                                                        </select>
                            
                                                        
                            
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label>Linea</label>
                                                        <input type="text" class="form-control" readonly id="LineaMax" name="LineaMax" value="0">   
                                                    </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                        <label>Sublinea</label>
                                                        <input type="text" class="form-control" readonly id="sublinea" name="sublinea" value="01" placeholder="01">
                                                       
                                                    </div>
                                                    <div class="form-group" style="display: none">
                                                            <label>Total</label>
                                                            <input type="text" class="form-control" readonly id="total" name="total" value="0">
                                                           
                                                        </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6">
                            
                                                    <div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
                                                        <label>Descripción Linea</label>
                                                        <input type="text" class="form-control validateDataDos" data-myTypeDos="text" data-errorDos= "7" data-validacionDos="1" id="desclinea" name="desclinea" style="text-transform:uppercase;" 
                                                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                            <span class="text-danger error7"></span>
                                                    </div>
                                                <!-- /.form-group -->
                                                <div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
                                                        <label>Descripción Sublinea</label>
                                                        <input type="text" class="form-control validateDataDos" data-myTypeDos="text" data-errorDos= "8" data-validacionDos="1" id="descsub" name="descsub" style="text-transform:uppercase;" 
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                        <span class="text-danger error8"></span>
                                                    </div>
                                                <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                            
                                            <div class="form-group">
                                                    <div class="col-lg-10 col-lg-offset-2">
                                                       
                                                    </div>
                                                </div>
                            
                                            <!-- /.row -->
                                            </div>
                                            <!-- /.card-body -->
                                           
                                        </div>
                                            </form>
                                            
                                    </div>
                                        <!--Fin Agregar Linea -->
                                          <div class="card-footer">
                                              
                                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                             <button type="submit" id="btn-submit" class="btnp btn-personalizado float-right" disabled>
                                                {{ __('Guardar') }}
                                            </button>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                <!--fin modal-->
          
   
   
                            </section>



@endsection