@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content" style="margin-top: 2vh;">
    <div class="card">
                <div class="card-body">
                    <a href="{{ route('partidas-create') }}" style="background-color: #E71096" class="btn btn-secondary"> Nueva Partida</a>
                </div>
            </div>  
      </section>
      <section class="content">
            <div class="row">
                <div class="col-8">     
                    <div class="center-block">
                        <div class="card">
                            <div class="card-header">
                              <!--  <h3 class="card-title">Catalogo de Partidas</h3>  -->
                              <h5>Catálogo Partidas</h5>
                            </div>
                            <div class="car-body">

                                <table id="example1" name="example1" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No. Partida</th>
                                            <th>Descripcion</th>
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
    
        </section>
@endsection