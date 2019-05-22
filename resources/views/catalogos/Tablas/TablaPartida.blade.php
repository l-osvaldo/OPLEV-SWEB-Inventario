@extends('layouts.admin')

@section('content')
 <!-- Navbar -->
    <nav class=" navbar navbar-expand col-sm-12 bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars float-sm-left"></i></a> 
        </li>   
      </ul>
        <div class="">
          <ol class="breadcrumb float-sm-left">
         <!--   <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Partidas</li> -->
            <h5>Catálogo de Partidas</h5> 
          </ol>
        </div> 
  
        <ul class="navbar-nav ml-auto float-sm-right">   
            <li class="nav-item">
              <a class="nav-link" href="#"><h5 style="color:#EA0D94"><b>Dirección Ejecutiva de Administración</b></h5></a>
            </li>
        </ul>    
    </nav>
    <!-- /.navbar -->
@include('sweet::alert')

      <div class="card">
        <div class="card-body" >
          <a href="#" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"> Agregar Partida</a>         
        </div>
      </div> 
<section class="content" style="margin-top: 2vh;">
  <div class="row ">
    <div class="col-12">     
      <div class="center-block">
        <div class="card">
               
          <div class="card-body" >
            <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>No. Partida</th>
                  <th>Descripción</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($partida as $partida)
                <tr>
                  <td>{{ $partida->partida }}</td>
                  <td>{{ $partida->descpartida }}</td>
                  
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
          <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #a90a6c; color:white">
          <h5 class="modal-title" id="exampleModalLabel"><b>Nueva Partida</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <!--Agregar Partida -->
        <div class="container-fluid">
          <form method="POST" action="{{ route('partidas') }}">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group {{ $errors->has('partida') ? 'has-error' : '' }}">
                    <label>Partida</label>
                    <input type="text" maxlength="8" class="form-control form-control-sm validateData" data-myType="int" data-error= "1" data-validacion="1" id="partida" name="partida" >
                    <span class="text-danger error1"></span>
                  </div>
                    <!-- -- !-->
                  <div class="form-group {{ $errors->has('linea') ? 'has-error' : '' }}">
                    <label>Línea</label>
                    <input type="text" class="form-control " readonly  id="linea" name="linea" value="01" placeholder="01" >
                      @if ($errors->has('linea'))
                    <small class="form-text text-danger">{{ $errors->first('linea') }}</small>
                      @endif
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group {{ $errors->has('sublinea') ? 'has-error' : '' }}">
                    <label>Sublínea</label>
                    <input type="text" class="form-control" readonly id="sublinea" name="sublinea" value="01" placeholder="01" >
                      @if ($errors->has('sublinea'))
                    <small class="form-text text-danger">{{ $errors->first('sublinea') }}</small>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}" style="display: none">
                      <label>Total</label>
                      <input type="text" class="form-control"  readonly id="total" name="total" value="0">
                        @if ($errors->has('total'))
                      <small class="form-text text-danger">{{ $errors->first('total') }}</small>
                      @endif
                    </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-10">
                  <div class="form-group {{ $errors->has('descpartida') ? 'has-error' : '' }}">
                    <label>Ddescripción Partida</label>
                    <input type="text" class="form-control validateData" data-myType="text" data-error= "2" data-validacion="2" id="descpartida" name="descpartida" style="text-transform:uppercase;"
                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <span class="text-danger error2"></span>
                  </div>
                        <!-- --  -->
                  <div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
                    <label>Ddescripción Línea</label>
                    <input type="text" class="form-control validateData" data-myType="text" data-error= "3" data-validacion="3" id="desclinea" name="desclinea" style="text-transform:uppercase;" 
                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <span class="text-danger error3"></span>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
                    <label>Ddescripción Sublínea</label>
                    <input type="text" class="form-control validateData" data-myType="text" data-error= "4" data-validacion="4" id="descsub" name="descsub" style="text-transform:uppercase;" 
                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <span class="text-danger error4"></span>
                  </div>
                  <!-- /.form-group -->     
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!--Fin Agregar Partida -->
            <div class="card-footer">
              <button type="reset" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
              <button type="submit" id="btn-submit2" style="background-color: #E71096" class="btn btn-secondary float-right" disabled>
                  {{ __('Guardar') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection