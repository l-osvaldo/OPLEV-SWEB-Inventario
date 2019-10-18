@extends('layouts.admin')
@section('title', 'Catálogo Partidas')

@section('content')


<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogo de Partidas'])
<!-- /.navbar -->

@include('sweet::alert')

<div class="card">
  <div class="card-body" >
    <a href="#" style="background-color: #E71096" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Nueva Partida</a>         
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
                  <th style="text-align: center">Número de la Partida</th>
                  <th style="text-align: center">Descripción de la Partida</th>
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
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
            <div class="card card-default" style="margin-top: 5px">
              <div class="card-body" >
                <div class="row">
                  <div class="col-md-3">
                    
                    <div class="form-group {{ $errors->has('partida') ? 'has-error' : '' }}">
                        <label>Número de Partida</label>
                        <input type="text" maxlength="8" class="form-control validateData" data-myType="int" data-error= "1" data-validacion="1" id="partidaI" name="partidaI" onKeyPress="return SoloNumerosLetras(event,'numero');">
                        <span class="text-danger error1"></span>
                      </div>

                      <!-- -- !-->
                    <div class="form-group {{ $errors->has('linea') ? 'has-error' : '' }}">
                      <label>Número de Línea</label>
                      <input type="text" class="form-control " readonly  id="linea" name="linea" value="01" placeholder="01" tabindex="-1">
                        @if ($errors->has('linea'))
                      <small class="form-text text-danger">{{ $errors->first('linea') }}</small>
                        @endif
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group {{ $errors->has('sublinea') ? 'has-error' : '' }}">
                      <label>Número de Sublínea</label>
                      <input type="text" class="form-control" readonly id="sublinea" name="sublinea" value="01" placeholder="01" tabindex="-1">
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
                  <div class="col-md-9">
                    <div class="form-group {{ $errors->has('descpartida') ? 'has-error' : '' }}">
                      <label>Descripción de la Partida</label>
                      <input type="text" class="form-control validateData" data-myType="text" data-error= "2" data-validacion="1" id="descpartida" name="descpartida" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'partida');"
                      onkeyup="javascript:this.value=this.value.toUpperCase();">
                      <span class="text-danger error2"></span>
                    </div>
                          <!-- --  -->
                    <div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
                      <label>Descripción de la Línea</label>
                      <input type="text" class="form-control validateData" data-myType="text" data-error= "3" data-validacion="1" id="desclinea" name="desclinea" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'linea');"
                      onkeyup="javascript:this.value=this.value.toUpperCase();">
                      
                      <span class="text-danger error3"></span>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
                      <label>Descripción de la Sublínea</label>
                      <input type="text" class="form-control validateData" data-myType="text" data-error= "4" data-validacion="1" id="descsub" name="descsub" style="text-transform:uppercase;" onKeyPress="return SoloNumerosLetras(event,'sublinea');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                      <span class="text-danger error4"></span>
                    </div>
                    <!-- /.form-group -->     
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label style="margin-top: 10px;">¿Esta partida tendrá depreciación?</label>                      
                      <input type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="default" data-offstyle="dark" data-width="50" id="activarDepreciacion" name="activarDepreciacion">
                      <input type="hidden" name="hiddendepreciacion" id="hiddendepreciacion" value="false"> 
                    </div>                    
                  </div>
                  <div id="divDepreciacion" style="display: none;" class="col-md-9">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="margin-top: 10px;">% de valor residual:</label>
                          <input type="number" name="porcentajeDepreciacion" id="porcentajeDepreciacion" min="1" max="100" value="1" data-suffix="%" class="form-control" onKeyPress="return SoloNumerosLetras(event,'numero');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>                    
                      </div> 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="margin-top: 10px;">Años de vida:</label>
                          <input type="number" name="aniosVida" id="aniosVida" min="1" max="10" value="1" class="form-control" data-suffix="años" onKeyPress="return SoloNumerosLetras(event,'numero');" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>                    
                      </div> 
                    </div>
                  </div> 
                                
                </div>
              </div>
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