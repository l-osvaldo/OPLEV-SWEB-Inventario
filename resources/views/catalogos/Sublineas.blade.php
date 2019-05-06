@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><b>SubLineas</b></h1>
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
            <div class="col-md-6">
                <div class="container-fluid">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Sublineas</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Partidas</label>
                                        <form method="POST" action="">
                                                @csrf
                                                <div class="col-md-10">
                                                <div class="form-group">
                                                <select id="Partidas" name="Partidas" class="form-control select2 dynamic" style="width: 100%;" onchange="linea()">
                                       
                                                        <option selected="selected">No. partida</option>
                                                        @foreach ($sublinea as $sublinea)
                                                        <option value="{{ $sublinea->partida }}">{{ $sublinea->partida }} | {{ $sublinea->descpartida }}</option>
                                                        
                                                        @endforeach
                                                </select>

                                                </div>
                                                </div>
                                                <div class="col-md-10">
                                                <div class="form-group">
                                                  
                                                  
                                                    <select class="form-control dynamic" id="Linea" name="Linea">
                                                        <option value="0" disabled="true" selected="true">Linea</option>
                                                    </select>
                                                </div>
                                                </div>
                                                <hr>
                                                <!--
                                                <select id="Lineas" name="Lineas" class="form-control select2" style="width: 100%;">
                                       
                                                        <option selected="selected">No. Linea</option>
                                                         ($sublinea2 as $sublinea2)
                                                        <option value=" $sublinea2->linea }}"> $sublinea2->linea }} | $sublinea2->desclinea }}</option>
                                                        
                                                    
                                                </select> 
                                            -->
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

        <script>
              function linea(){

                $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
                var data = {partida : $('#Partidas').val(),_token: '{!! csrf_token() !!}'};
                $.ajax({
                  type:'POST',
                  url:'/ajaxRequest',
                  data:data,
                  success:function(data){                    
                    for (let i = 0; i < data.length; i++) {
                      console.log(data[i]["desclinea"]);
                      $('#Linea').append('<option value="'+data[i]["desclinea"]+'">'+ data[i]["linea"]+' | '+ data[i]["desclinea"]+'</option>'); 
                    }
                  }
                });
              }
        </script>
        

@endsection