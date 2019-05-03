@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                <b>Lineas</b>
                <a href="{{ route('AgregaLineas') }}" class="btn btn-primary float-right"> Nueva Linea</a>
            </h1>
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
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Listado de lineas</h3>
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
                                            <input type="submit" class="btn btn-info" value="Ver">

                                    </form>
                                    
                                    
                                        
                                </div>
                            </div>
                            
                        </div>
                       
                        </div>   

                    </div>
                </div>
            </div>
    </section>


@endsection