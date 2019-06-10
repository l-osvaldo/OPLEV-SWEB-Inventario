@extends('layouts.admin')

@section('content')

<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogos de Bienes OPLE'])
<!-- /.navbar -->

<div class="card">
  <div class="card-body" >
    <a href="" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#altasModal"> 
        Altas 
        <i class="fa fa-arrow-up"></i> 
    </a>
  </div>
</div>

<section class="content" style="margin-top: 2vh;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="car-body">
                    <br>
                    <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No. Inventario</th>
                                <th>Concepto</th>
                                <th>Factura</th>
                                <th>F. Compra</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $articulo)
                                <tr>
                                    <td> {{ $articulo->numeroinv }} </td>
                                    <td> {{ $articulo->concepto }} </td>
                                    <td> {{ $articulo->factura }} </td>
                                    <td> {{ $articulo->fechacomp }} </td>
                                    <td> {{ $articulo->importe }} </td>
                                </tr>
                               
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detalle</h3>
                </div>
                <div class="car-body">
                        <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Area</th>
                                <th>Num. Serie</th>
                                <th>Estado</th>
                                <th>Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>empleaod</th>
                                <th>area</th>
                                <th>xxxxx</th>
                                <th>BUENO</th>
                                <th>////</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="altasModal" tabindex="-1" role="dialog" aria-labelledby="altasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: #a90a6c; color:white">
          <h5 class="modal-title" id="exampleModalLabel"><b>Agregar Partida</b></h5>
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
                      <input type="text" maxlength="8" class="form-control validateData" data-myType="int" data-error= "1" data-validacion="1" id="partidaI" name="partidaI" onKeyPress="return SoloNumerosLetras(event,'numero');">
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
                    <label>Descripción Partida</label>
                    <input type="text" class="form-control validateData" data-myType="text" data-error= "2" data-validacion="1" id="descpartida" name="descpartida" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'partida');"
                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <span class="text-danger error2"></span>
                  </div>
                        <!-- --  -->
                  <div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
                    <label>Descripción Línea</label>
                    <input type="text" class="form-control validateData" data-myType="text" data-error= "3" data-validacion="1" id="desclinea" name="desclinea" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'linea');"
                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                    
                    <span class="text-danger error3"></span>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
                    <label>Descripción Sublínea</label>
                    <input type="text" class="form-control validateData" data-myType="text" data-error= "4" data-validacion="1" id="descsub" name="descsub" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'sublinea');" onkeyup="javascript:this.value=this.value.toUpperCase();">
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