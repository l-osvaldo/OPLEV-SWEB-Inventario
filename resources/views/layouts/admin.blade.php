<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIADMON | OPLE VER | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" href="{{ asset('images/logoople.png') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500&display=swap" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"/>

    
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">
  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

   <link rel="stylesheet" href="{{ asset('css/MiEstilo.css') }}">

   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <style type="text/css">
      .dataTables_wrapper .dt-buttons {
        float:right;
      }

      div.dt-button-collection.three-column {
        width: 750px;
        background-color: #F5ECF2;
      }

      button.dt-button,
      div.dt-button,
      a.dt-button {
        color: black;
        border: 1px solid #F5ECF2 !important;
        background-color: #F5ECF2;
        background-image: linear-gradient(to bottom, #F5ECF2 0%, #F5ECF2 100%);               
      }

      a.dt-button.active:not(.disabled):hover:not(.disabled) {
        box-shadow: inset 1px 1px 3px #F5ECF2;
        background-color: #F5ECF2;
        background-image: linear-gradient(to bottom, #F5ECF2 0%, #F5ECF2 100%);
      }

      a.dt-button:hover:not(.disabled) {
        border: 1px solid #fff !important;
        background-color: #fff;
        background-image: linear-gradient(to bottom, #fff 0%, #fff 100%);
      }

      .dropdown-item.active{
        color: black !important;
      }

      div.dt-button-collection a.dt-button.active:not(.disabled){
        border: 1px solid #fff !important;
        box-shadow: inset 1px 1px 3px #fff;
        background-color: #fff;
        background-image: linear-gradient(to bottom, #fff 0%, #fff 100%);
      }
     </style>



</head>
<body class="hold-transition sidebar-mini sidebar-collapse" onload="cerrarMenus();">
  <div class="wrapper">
   
  
    <!-- Main Sidebar Container -->
    @include('partials.aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 885px;">
      @yield('content')
    </div>
    
    <footer class="main-footer">
        @include('partials.footer')
    </footer>
    
  </div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>


{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

<script type="text/javascript" src="{{ asset('js/es.js') }}"></script>

<script src="{{ asset('/plugins/jquery-maskmoney-master/dist/jquery.maskMoney.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bienesECO.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/recursos.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cancelar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/camposValidados.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/agregararticulo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/agregararticuloECO.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/reportesOPLE.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/reportesECO.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/editarArticulo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/editarArticuloECO.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lineas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sublineas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/partidas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/empleados.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/depreciacionA.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cancelacionResguardo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revision.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/levantamientoInventario.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/area.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/funcionesGenerales.js') }}"></script>


</body>
</html>
