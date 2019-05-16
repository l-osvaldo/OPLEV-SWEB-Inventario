@extends('layouts.admin')


@section('content')
 <!-- Navbar -->
 <nav class="navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
<ul class="navbar-nav">
<li class="nav-item">
  <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> 
</li>
</ul>
<div class="col-sm-8">
  <ol class="breadcrumb float-sm-left">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Líneas</li>
  </ol>
</div>

<ul class="navbar-nav ml-auto float-sm-right">   
    <li class="nav-item">
      <a class="nav-link" href="#"><h5 style="color:#EA0D94"><b>Dirección Ejecutiva de Administración</b></h5></a>
    </li>
</ul>
</nav>
  <!-- /.navbar -->

<section class="content" style="margin-top: 2vh;">
  <div class="card">
    <div class="card-body">
      <div class="col-12">
        <div class="card-body">
          <div class="row"> 
            <div class="col-md-10">
              <div class="form-group">
                <label>Sleccioné una Partida</label>
                <form method="POST" action="{{ route('show-lineas') }}">
                  @csrf  
                    <select id="Partidas" name="Partidas" class="form-control select2" style="width: 40%;">
                      <option selected="selected">No. partida</option>
                         @foreach ($lineas as $linea)
                      <option value="{{ $linea->partida }}">{{ $linea->partida }} | {{ $linea->descpartida }}</option>
                        @endforeach
                  	</select>
                  <input type="submit" style="background-color: #E71096" class="btn btn-secondary" value="Mostrar">
                  <div class="col-md-4 float-right">
                    @include('sweet::alert')
                      <div  class="btn-group ">
                        <a href="#" style="background-color: #E71096" class="btn btn-secondary float-right" data-toggle="modal" data-target="#exampleModalLinea"> Nueva Linea</a>
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

<section class="content">
  <div class="row">
    <div class="col-9">     
      <div class="center-block">
        <div class="card">
          <div class="card-header"> 
          	<h5>Partida:</h5>   
          </div>
          <div class="card-body">
              <table id="example1" name="example1" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>No. Línea</th>
                    <th>Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($linea3 as $linea2)
                    <tr>
                      <td>{{ $linea2->linea }}</td>
                      <td>{{ $linea2->desclinea }}</td>
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
  <div class="modal fade bd-example-modal-lg" id="exampleModalLinea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <form method="POST" action="{{ route('agregarLinea') }}">
                @csrf               
                <div class="card card-default">
                                            <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label>Partidas</label>
                          <select id="partida" name="partida" class="form-control select2 validateDataLi" data-myTypeLi="select" data-errorLi= "5" data-validacionLi="1" style="width: 100%;">
                            <option selected="selected">No. partida</option>
                              @foreach ($linea8 as $linea8)
                            <option value="{{ $linea8->partida }}"> {{ $linea8->partida }} | {{ $linea8->descpartida }}</option>
                              @endforeach         
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
												<div class="form-group">
													<label>Linea</label>
													<input type="text" class="form-control" readonly id="LineaMax" name="LineaMax" value="0">   
														@if ($errors->has('LineaMax'))
													<small class="form-text text-danger">{{ $errors->first('LineaMax') }}</small>
														@endif
												</div>
                                                <!-- /.form-group -->
												<div class="form-group">
													<label>Sublinea</label>
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
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
													<label>Descripción Linea</label>
													<input type="text" class="form-control validateDataLi" data-myTypeLi="text" data-errorLi= "3" data-validacionLi="1" id="desclinea" name="desclinea" style="text-transform:uppercase;" 
													onkeyup="javascript:this.value=this.value.toUpperCase();">
													<span class="text-danger error3"></span>
												</div>
											<!-- /.form-group -->
												<div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
													<label>Descripción Sublinea</label>
													<input type="text" class="form-control validateDataLi" data-myTypeLi="text" data-errorLi= "4" data-validacionLi="1" id="descsub" name="descsub" style="text-transform:uppercase;" 
													onkeyup="javascript:this.value=this.value.toUpperCase();">
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
                  <button type="reset" class="btn btn-danger" data-dismiss="modal"">Cancelar</button>
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