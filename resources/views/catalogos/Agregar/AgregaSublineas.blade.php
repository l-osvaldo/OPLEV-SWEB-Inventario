@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content"> 
        <div class="col col-8">
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
                            @foreach ($sublinea as $sublinea)
                            <option value="{{ $sublinea->partida}}">{{ $sublinea->partida }} | {{ $sublinea->descpartida }}</option>
                            
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
                        </div>
                        <div class="form-group" style="display: none">
                                <label>Total</label>
                                <input type="text" class="form-control" readonly id="total" name="total" value="0">
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
                        </div>
                    <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar') }}
                            </button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>

                <!-- /.row -->
                </div>
                <!-- /.card-body -->
                
            </div>
                </form>
        </div><!-- /.container-fluid -->
    </div>
    </section>

    @endsection
