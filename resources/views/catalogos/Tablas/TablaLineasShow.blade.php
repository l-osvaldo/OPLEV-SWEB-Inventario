@extends('layouts.admin')
@section('title', 'Catálogo Líneas')


@section('content')
<!-- Navbar -->
@include('partials.header',['tituloEncabezado' => 'Catálogo de Líneas'])
<!-- /.navbar -->
<section>
    <div class="card">
        <div class="card-body">
            <div class="col-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>
                                    1.- Seleccione una Partida
                                </label>
                                <form action="{{ route('show-lineas') }}" method="POST">
                                    @csrf
                                    <select class="form-control select2 validateDataBusquedaLinea" data-errorbusquedalinea="1" data-mytypebusquedalinea="select" data-validacionbusquedalinea="1" id="PartidasL" name="PartidasL" required="" style="width: 40%;">
                                        <option selected="selected" value="0">
                                            Número de partida
                                        </option>
                                        @foreach ($lineas as $linea)
                                        <option value="{{ $linea->partida }}">
                                            {{ $linea->partida }} | {{ $linea->descpartida }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-3 float-right">
                                    @include('sweet::alert')
                                    <div class="btn-group" style="margin-top: 15px;">
                                        <a class="btn btn-secondary float-right" data-target="#exampleModalLinea" data-toggle="modal" href="#" style="background-color: #E71096; ">
                                            <i class="fa fa-plus">
                                            </i>
                                            Nueva Línea
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content Header (Page header) -->
<div id="lineaRespuesta">
</div>
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" id="exampleModalLinea" role="dialog" tabindex="-1">
    <form action="{{ route('agregarLinea') }}" id="form" method="POST">
        {{ csrf_field()}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #a90a6c; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>
                            Nueva Línea
                        </b>
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <!--Agregar Linea -->
                <div class="container-fluid">
                    <form action="{{ route('agregarLinea') }}" method="POST">
                        @csrf
                        <div class="card card-default" style="margin-top: 5px">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                Seleccione una Partida:
                                            </label>
                                            <select class="form-control select2 validateDataLi" data-errorli="5" data-mytypeli="select" data-validacionli="1" id="partida" name="partida" style="width: 100%;">
                                                <option selected="" value="0">
                                                    Número de partida
                                                </option>
                                                @foreach ($linea8 as $linea8)
                                                <option value="{{ $linea8->partida }}">
                                                    {{ $linea8->partida }} | {{ $linea8->descpartida }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>
                                                Número de Línea:
                                            </label>
                                            <input class="form-control" id="LineaMax" name="LineaMax" readonly="" type="text" value="0">
                                                @if ($errors->has('LineaMax'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('LineaMax') }}
                                                </small>
                                                @endif
                                            </input>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>
                                                Número de Sublínea:
                                            </label>
                                            <input class="form-control" id="sublinea" name="sublinea" placeholder="01" readonly="" type="text" value="01">
                                                @if ($errors->has('sublinea'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('sublinea') }}
                                                </small>
                                                @endif
                                            </input>
                                        </div>
                                        <div class="form-group" style="display: none">
                                            <label>
                                                Total
                                            </label>
                                            <input class="form-control" id="total" name="total" readonly="" type="text" value="0">
                                                @if ($errors->has('total'))
                                                <small class="form-text text-danger">
                                                    {{ $errors->first('total') }}
                                                </small>
                                                @endif
                                            </input>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-9">
                                        <div class="form-group {{ $errors->has('desclinea') ? 'has-error' : '' }}">
                                            <label>
                                                Descripción de la Línea:
                                            </label>
                                            <input class="form-control validateDataLi" data-errorli="3" data-mytypeli="text" data-validacionli="1" id="desclinea" name="desclinea" onkeypress="return SoloNumerosLetras(event,'linea');" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" type="text">
                                                <span class="text-danger error3">
                                                </span>
                                            </input>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group {{ $errors->has('descsub') ? 'has-error' : '' }}">
                                            <label>
                                                Descripción de la Sublínea:
                                            </label>
                                            <input class="form-control validateDataLi" data-errorli="4" data-mytypeli="text" data-validacionli="1" id="descsub" name="descsub" onkeypress="return SoloNumerosLetras(event,'sublinea');" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" type="text">
                                                <span class="text-danger error4">
                                                </span>
                                            </input>
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
                            <button class="btn btn-danger" data-dismiss="modal" type="button">
                                Cancelar
                            </button>
                            <button class="btn btn-secondary float-right" disabled="" id="btn-submit3" style="background-color: #E71096" type="submit">
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
@endsection
