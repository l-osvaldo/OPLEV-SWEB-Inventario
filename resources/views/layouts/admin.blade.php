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

<script type="text/javascript" src="{{ asset('js/area.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/funcionesGenerales.js') }}"></script>
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

<script src="{{ asset('/plugins/jquery-maskmoney-master/dist/jquery.maskMoney.js') }}"></script>

<script>
  $('#tableCatalogo').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "select": true,
    "language": {
      
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
   "buttons": [
              'excel'
              ]
} );

  $("input[type='number']").inputSpinner();  
</script>

<!--validacion-->
<script>
  
 </script>

<script>
    $('#btn-submit3').on('click',function(e){
       e.preventDefault();
       var form = $(this).parents('form');
       swal({
           title: "Registro de Líneas",
           text: "¿Desea continuar?",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#E71096",
           confirmButtonText: "Sí",
           closeOnConfirm: false
       }, function(isConfirm){
           if (isConfirm) form.submit();
       });
   });
</script>

<script>

var validoNumeroPartida = true;
  
 </script>


   <script>
   
   
   $( ".validateDataDos" ).keyup(function() {    
       var valor = $(this).val();
       var error = $(this).attr("data-errorDos");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeDos");
       datosValidosDos(valor, error, id, tipo);
   });
   
   $( ".validateDataDos" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorDos");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeDos");
       datosValidosDos(valor, error, id, tipo);
   });

   $( ".validateDataLi" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorLi");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeLi");
       //console.log(valor,error,id,tipo);
       datosValidosLi(valor, error, id, tipo);

   });
   
   $( ".validateDataLi" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorLi");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeLi");
       //console.log(valor,error,id,tipo);
       datosValidosLi(valor, error, id, tipo);
   });
   
   $( ".validateDataEm" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorEm");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeEm");
       datosValidosEm(valor, error, id, tipo);
   });
   
   $( "#clvdepto" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorEm");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeEm");
       //console.log(valor);
       datosValidosEm(valor, error, id, tipo);
   });

   $( ".validateDataBusquedaLinea" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorBusquedaLinea");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeBusquedaLinea");
       datosValidosLineaBusqueda(valor, error, id, tipo);       
   });

   $( ".validateDataArea" ).keyup(function() {

       var valor = $(this).val();
       var error = $(this).attr("data-errorArea");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeArea");
       //console.log(valor,error,id,tipo);
       datosValidosArea(valor, error, id, tipo);
   });

   $( ".validateDataArticulo" ).keyup(function() {

       var valor = $(this).val();
       var error = $(this).attr("data-errorArticulo");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeArticulo");
       //console.log(valor,error,id,tipo);
       datosValidosArticulo(valor, error, id, tipo);
   });

   $( ".validateDataArticulo" ).change(function() {

       var valor = $(this).val();
       var error = $(this).attr("data-errorArticulo");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeArticulo");
       //console.log(valor,error,id,tipo);
       datosValidosArticulo(valor, error, id, tipo);
   });

   $( ".validateDataArticuloEditar" ).keyup(function() {

       var valor = $(this).val();
       var error = $(this).attr("data-errorArticuloEditar");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeArticuloEditar");
       //console.log(valor,error,id,tipo);
       datosValidosArticuloEditar(valor, error, id, tipo);
   });

   $( ".validateDataArticuloEditar" ).change(function() {

       var valor = $(this).val();
       var error = $(this).attr("data-errorArticuloEditar");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeArticuloEditar");
       //console.log(valor,error,id,tipo);
       datosValidosArticuloEditar(valor, error, id, tipo);
   });

   function cerrarMenus(){
    $('#cat').removeClass('menu-open');
    $('#ople').removeClass('menu-open');
    $('#eco').removeClass('menu-open');
    $('#CancelacionesR').removeClass('menu-open');
   }

   function datosValidosDos(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionDos", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacionDos", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionDos", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Solo numeros.");
           $('#'+id).attr("data-validacionDos", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionDos", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacionDos", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionDos", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacionDos", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         //console.log('default');
       }
       enablebtnDos();
   } 


   function datosValidosLi(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionLi", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacionLi", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionLi", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Solo numeros.");
           $('#'+id).attr("data-validacionLi", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionLi", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacionLi", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!="0"){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionLi", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacionLi", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtnLi();
   }

   
   function datosValidosEm(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[a-zA-ZÀ-ÿ.^"\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ.^"\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ.^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionEm", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacionEm", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
            validarNumeroEmpleado(valor,error,id);
         }else{
           $('.error'+ error).text("Solo numeros.");
           $('#'+id).attr("data-validacionEm", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionEm", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacionEm", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionEm", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacionEm", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtnEm();
   }


  function datosValidosArea(valor, error, id, tipo)
  {
   switch (tipo) {
    case 'text':
      if (valor.match(/^[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]*$/) && valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionArea", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
      }else{
       $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
       $('#'+id).attr("data-validacionArea", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger');
      }
      break;
     
    default:
     console.log('default');
   }
   enablebtnArea();
  }

  function datosValidosArticulo(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionArticulo", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío.");
             $('#'+id).attr("data-validacionArticulo", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
        case 'date':
          //console.log(valor);
          if (valor != ""){
            $('.error'+ error).text("");
            $('#'+id).attr("data-validacionArticulo", '0');
            $('#'+id).removeClass('inputDanger');
            $('#'+id).addClass('inputSuccess');
          }else{
            $('.error'+ error).text("Este campo no puede ir vacío.");
            $('#'+id).attr("data-validacionArticulo", '1');
            $('#'+id).removeClass('inputSuccess');
            $('#'+id).addClass('inputDanger');
          }
        break;
         default:
         console.log('default');
       }
       enablebtnArticulo();
   }

   function datosValidosArticuloEditar(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionArticuloEditar", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío.");
             $('#'+id).attr("data-validacionArticuloEditar", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
        case 'date':
          //console.log(valor);
          if (valor != ""){
            $('.error'+ error).text("");
            $('#'+id).attr("data-validacionArticuloEditar", '0');
            $('#'+id).removeClass('inputDanger');
            $('#'+id).addClass('inputSuccess');
          }else{
            $('.error'+ error).text("Este campo no puede ir vacío.");
            $('#'+id).attr("data-validacionArticuloEditar", '1');
            $('#'+id).removeClass('inputSuccess');
            $('#'+id).addClass('inputDanger');
          }
        break;
         default:
         console.log('default');
       }
       enablebtnArticuloEditar();
   } 
   
   function enablebtnDos()
   {
     var array = [];
     var claserror = $('.validateDataDos');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionDos'));
     }
   
     if(array.includes('1'))
     { 
       $('#btn-submit').prop("disabled", true);
     }
     else
     {
       $('#btn-submit').prop("disabled", false);
     }
   
       //console.log(array);
   }

   function enablebtnLi()
   {
     var array = [];
     var claserror = $('.validateDataLi');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionLi'));
     }

    //console.log(array);
   
     if(array.includes('1'))
     { 
       $('#btn-submit3').prop("disabled", true);
     }
     else
     {
       $('#btn-submit3').prop("disabled", false);
     }
   
       //console.log(array);
   }

   function enablebtnEm()
   {
     var array = [];
     var claserror = $('.validateDataEm');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionEm'));
     }
   
    console.log(array);
     if(array.includes('1'))
     { 
       $('#btn-submitEm').prop("disabled", true);
     }
     else
     {
       $('#btn-submitEm').prop("disabled", false);
     }
   }

   function enablebtnBusquedaLinea()
   {
     var array = [];
     var claserror = $('.validateDataBusquedaLinea');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionBusquedaLinea'));
     }
   
     if(array.includes('1'))
     { 
       $('#btn-submitBL').prop("disabled", true);
     }
     else
     {
       $('#btn-submitBL').prop("disabled", false);
     }
   
       //console.log(array);
   }

   function enablebtnArea()
   {
     var array = [];
     var claserror = $('.validateDataArea');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionArea'));
     }

    //console.log(array);
   
     if(array.includes('1'))
     { 
       $('#editBtn').prop("disabled", true);
     }
     else
     {
       $('#editBtn').prop("disabled", false);
     }
   
   }

   function enablebtnArticulo()
   {
     var array = [];
     var claserror = $('.validateDataArticulo');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionArticulo'));
     }

    console.log(array);
   
     if(array.includes('1'))
     { 
       $('#btnGuardarArticulo').prop("disabled", true);
       $('#btnGuardarArticuloECO').prop("disabled", true);
     }
     else
     {
       $('#btnGuardarArticulo').prop("disabled", false);
       $('#btnGuardarArticuloECO').prop("disabled", false);
     }
   
   }

   function enablebtnArticuloEditar()
   {
     var array = [];
     var claserror = $('.validateDataArticuloEditar');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionArticuloEditar'));
     }

    //console.log(array);
   
     if(array.includes('1'))
     { 
       $('#btnActualizarArticulo').prop("disabled", true);
       $('#btnActualizarArticulo').css("display","none");
       $('#btnActualizarArticuloECO').prop("disabled", true);
       $('#btnActualizarArticuloECO').css("display","none");
       
     }
     else
     {
       $('#btnActualizarArticulo').prop("disabled", false);
       $('#btnActualizarArticulo').css("display","block");
       $('#btnActualizarArticuloECO').prop("disabled", false);
       $('#btnActualizarArticuloECO').css("display","block");
     }
   
   }

  function cerrar(){
    console.log('si');
    $('#depto').removeClass('inputSuccess');
    $('#depto').removeClass('inputDanger');
    $('#depto').attr("data-validacionArea",'1');
    $('#depto').find('.text-danger').text('');
    enablebtnArea();
  }

   
   </script>

<script>

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  });
</script>
</body>
</html>
