@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Ventana Modal</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Modal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href="#" class="btnp btn-personalizado" data-toggle="modal" data-target="#exampleModal">Ventana Modal</a>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background: #001F3F; color:white">
              <h5 class="modal-title" id="exampleModalLabel"><b>Modal Personalizado</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
                <div class="form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-address-book"></i></span>    
                      <input class="form-control form-control-sm" type="text" placeholder="Nombre completo">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-at"></i></span>    
                      <input class="form-control form-control-sm" type="text" placeholder="Correo electrónico">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>    
                      <input class="form-control form-control-sm" type="text" placeholder="Usuario">
                  </div>
                </div>    
              </div>
            <div class="card-footer">
              <button type="button" class="btnp btn-salir" data-dismiss="modal">Salir</button>  
              <button type="button" class="btnp btn-personalizado float-right">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection

