@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Lineas</b></h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content"> 
        <div class="col col-8">
            <div class="container-fluid">
                <form method="POST" action="{{ route('agregarLinea') }}">
                    @csrf
                        
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">Agregar Linea</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Partidas</label>
                                        <select id="partida" name="partida" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">No. partida</option>
                                    @foreach ($linea as $linea)
                                        <option value="{{ $linea->partida }}"> {{ $linea->partida }} | {{ $linea->descpartida }}</option>
                                        
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

                                            <div class="form-group">
                                                <label>Ddescripción Linea</label>
                                                <input type="text" class="form-control" id="desclinea" name="desclinea" style="text-transform:uppercase;" 
                                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                                <label>Ddescripción Sublinea</label>
                                                <input type="text" class="form-control" id="descsub" name="descsub" style="text-transform:uppercase;" 
                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>
                                        <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                            </div>

                                            <div class="form-group">
                                                    <div class="col-lg-10 col-lg-offset-2">
                                                        <button type="submit" style="background-color: #E71096" class="btn btn-secondary">
                                                            {{ __('Guardar') }}
                                                        </button>
                                                        <button type="reset" class="btn btn-danger" onClick="history.go(-1);">Cancelar</button>
                                                    </div>
                                                </div>

                                            <!-- /.row -->
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                                            the plugin.
                                            </div>
                                        </div>
                                            </form>
                                    </div><!-- /.container-fluid -->
    </div>
    </section>


    @endsection