@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>Partidas</b></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Advanced Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
          <div class="container-fluid">
              <form method="POST" action="{{ route('partidas') }}">
                  @csrf
                <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Partidas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Partida</label>
                            <input type="text" class="form-control" id="partida" name="partida">
                        </div>
                        <!-- -- !-->
                        <div class="form-group">
                                <label>Linea</label>
                                <input type="text" class="form-control" disabled="disabled" value="01" placeholder="01">
                            </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                            <label>Sublinea</label>
                            <input type="text" class="form-control" disabled="disabled" value="01" placeholder="01">
                        </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Ddescripción Partida</label>
                                <input type="text" class="form-control" id="descpartida" name="descpartida">
                            </div>
                            <!-- --  -->
                            <div class="form-group">
                                    <label>Ddescripción Linea</label>
                                    <input type="text" class="form-control">
                                </div>

                      <!-- /.form-group -->
                      <div class="form-group">
                            <label>Ddescripción Sublinea</label>
                            <input type="text" class="form-control">
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
          </div>
      </section>

@endsection