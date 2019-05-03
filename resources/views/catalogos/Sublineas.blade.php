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
                                        <form method="POST" action="{{ route('show-lineas') }}">
                                                @csrf
                                                <div class="col-md-10">
                                                <div class="form-group">
                                                <select id="Partidas" name="Partidas" class="form-control select2" style="width: 100%;">
                                       
                                                        <option selected="selected">No. partida</option>
                                                        @foreach ($sublinea as $sublinea)
                                                        <option value="{{ $sublinea->partida }}">{{ $sublinea->partida }} | {{ $sublinea->descpartida }}</option>
                                                        
                                                        @endforeach
                                                </select>
                                                </div>
                                                </div>
                                                <div class="col-md-10">
                                                <div class="form-group">
                                                <select name="Linea" id="Linea" class="form-control select2" style="width: 100%;" name="" id="">
                                                    <option selected="selected" value="">No. Linea</option>
                                                    <option></option>
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
                $(document).ready(function(){
                  $("#Partidas").change(function(){
                    var sublinea = $(this).val();
                    $.get('sublineas/'+sublinea, function(data){
              //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
                      console.log(data);
                        var Linea_select = '<option value="">No. partida</option>'
                          for (var i=0; i<data.length;i++)
                          Linea_select+='<option value="'+data[i].partida+'">'+data[i].descpartida+'</option>';
              
                          $("#campanas").html(Linea_select);
              
                    });
                  });
                });
              </script>

@endsection