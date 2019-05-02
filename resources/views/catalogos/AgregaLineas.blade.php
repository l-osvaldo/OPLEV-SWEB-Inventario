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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LINEAS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('lineas') }}">
                    @csrf
                        
            <div class="card card-default">
                <div class="card-header">
                <h3 class="card-title">Agregar Linea</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Partidas</label>
                            <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">No. paritda</option>
                            @foreach ($linea as $linea)
                            <option value="{{ $linea->partida }} {{ $linea->descpartida }}">{{ $linea->partida }} | {{ $linea->descpartida }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                            <label>Linea</label>
                            <input type="text" class="form-control" readonly id="linea" name="linea" value="01" placeholder="01">
                        </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                            <label>Sublinea</label>
                            <input type="text" class="form-control" readonly id="sublinea" name="sublinea" value="01" placeholder="01">
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
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar') }}
                            </button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
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
    </section>

    @endsection
