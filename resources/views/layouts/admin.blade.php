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
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'"> --}}
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
  <!-- Morris chart -->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}"> --}}
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- fullCalendar 2.2.5-->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.css') }}"> --}}
  <!-- Bootstrap-->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}"> --}}
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
  <!-- DataTables-->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}"> --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

   <link rel="stylesheet" href="{{ asset('css/MiEstilo.css') }}">

   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}">


</head>
<body class="hold-transition sidebar-mini ">
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

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- iCheck 1.0.1 --> 
<script src="{{ asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- daterangepicker -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> --}}
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
{{-- <script src="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/dist/locale/es.js') }}"></script> --}}
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/sl-1.3.0/datatables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script  src="{{ asset('plugins/chartjs-old/Chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/recursos.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/cancelar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/camposValidados.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/agregararticulo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/reportesOPLE.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/editarArticulo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> --}}
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script> 


<script>
    $ ("input[type='number']").inputSpinner();
</script>

<script>
  $('#example1').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "sSearch": "Filter Data",
    "dom":     "<'row'<'col-sm-3 text-center'l><'col-sm-3'B><'col-sm-3'f>>" +
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
   "buttons": ['excel']
} );
</script>


<!-- tables -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


<script>
  $(document).ready(function(){
    $("#nombre, #apePat").change(function(){
      var value1 = document.getElementById('nombre').value;
      //var value2 = document.getElementById('apePat').value;
      var value3 = value1.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      //var value4 = value2.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value5 = value3;
      var value6 = value5.toLowerCase();
      //validarNombreOple(value6);
      //document.getElementById('usuario').value = value6;
  
    })
  });
  </script>
  <script>
  $(document).ready(function(){
    $("#nombreA, #apePatA").change(function(){
      var value1 = document.getElementById('nombreA').value;
      var value2 = document.getElementById('apePatA').value;
      var value3 = value1.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value4 = value2.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value5 = value3 + "." + value4;
      var value6 = value5.toLowerCase();
      validarNombre(value6);
      document.getElementById('usuarioA').value = value6;
    })
  });
  </script>
  <script>
  $(document).ready(function(){
    $("#selectareaA").change(function(){
      var value1 = $("#selectareaA").val();
      var text = $("#selectareaA :selected").text();
      document.getElementById('idOrgA').value = value1;
      document.getElementById('nameOrgA').value = text;
  
    })
  });
  </script>
  <script>
  $(document).ready(function(){
    $("#selectareaO").change(function(){
      var value1 = $("#selectareaO").val();
      var text = $("#selectareaO :selected").text();
      document.getElementById('idOrgO').value = value1;
      document.getElementById('nameOrgO').value = text;
  
    })
  });
  </script>
  <script>
    $(document).on("click", "#passwordGenerate", function(){
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 8; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
      document.getElementById("contPass").value = result;
      var valor = $('#contPass').val();
      var error = $('#contPass').attr("data-errorDos");
      var id = $('#contPass').attr("id");
      var tipo = $('#contPass').attr("data-myTypeDos");
      datosValidosDos(valor, error, id, tipo);
    });
  </script>
  {{-- <script>
    $(document).on("click", "#passwordGenerateA", function(){
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 8; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
      document.getElementById("contPassA").value = result;
      var valor = $('#contPassA').val();
      var error = $('#contPassA').attr("data-error");
      var id = $('#contPassA').attr("id");
      var tipo = $('#contPassA').attr("data-myType");
      datosValidos(valor, error, id, tipo);
    });
  
    $(document).on("click", "#passwordGenerateEdit", function(){
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 8; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
      document.getElementById("contPassEdit").value = result;
    });
  </script> --}}
  
  <script>
   $(document).on("click", "#passCopi", function(){
     var copyText = document.getElementById("contPass");
     copyText.select();
     document.execCommand("copy");
     swal({
             type: "info",
             title: "Password",
             text: 'Contraseña copiada: '+ copyText.value,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          });
    });
  </script>
  <script>

    $('#editModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var area = button.data('area');
      var id = button.data("areaid");
      var modal = $(this)
      modal.find('.modal-body #depto').val(area);
      modal.find('.modal-body #editClave').val(id);
      //console.log(area,id)
      
    });

    $('#btn-submit2').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      swal({
          title: "Registro de Partidas",
          text: "¿Desea continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#0080FF",
          confirmButtonText: "Sí",
          closeOnConfirm: false
      }, function(isConfirm){
          if (isConfirm) form.submit();
          
      });
    });

    $('#btnActualizarArticulo').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      swal({
          title: "Actualización de Datos de Artículo",
          text: "¿Desea continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#0080FF",
          confirmButtonText: "Sí",
          closeOnConfirm: false
      }, function(isConfirm){
          if (isConfirm) {
            form.submit();
          }else {
            swal("Error!", "Por favor intentelo de nuevo", "error");
          }
          
      });
    });

    $('#editBtn').on('click',function(e){
    e.preventDefault();
    swal({
        title: "Edición de datos",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#0080FF",
        confirmButtonText: "Sí",
        closeOnConfirm: true
    }, function(isConfirm){
       if (isConfirm) {
          var id = $('#editClave').val();
          var no = $('#depto').val();
          console.log(id,no);
          $.ajax({
             type:'POST',
             url:'updatearea/',
             data:{id:id, no:no},
            success:function(data){
                swal({title: "Listo!", text: "Area actualizada", type: "success"},
                   function(){ 
                       location.reload();
                   }
                )
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Por favor intentelo de nuevo!", "error");
              }
          });
        } else {
          swal("Error!", "Por favor intentelo de nuevo", "error");
        }
    });
});
  </script>

  <script>
   $(document).on("click", "#passCopiA", function(){
     var copyText = document.getElementById("contPassA");
     copyText.select();
     document.execCommand("copy");
     swal({
             type: "info",
             title: "Password",
             text: 'Contraseña copiada: '+ copyText.value,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          });
    });
  
   $(document).on("click", "#passCopiEdit", function(){
     var copyText = document.getElementById("contPassEdit");
     copyText.select();
     document.execCommand("copy");
     swal({
             type: "info",
             title: "Password",
             text: 'Contraseña copiada: '+ copyText.value,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          });
    });
  </script>
  <script>
   $(document).on("click", "#showPass", function(){
     var x = document.getElementById("contPass");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }   
      });
  </script>
  <script>
   $(document).on("click", "#showPassA", function(){
     var x = document.getElementById("contPassA");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }   
      });
  
   $(document).on("click", "#showPassEdit", function(){
     var x = document.getElementById("contPassEdit");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }   
      });
  </script>







<!--validacion-->


<script>
  $('#btn-submit').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro de Sublíneas",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#0080FF",
         confirmButtonText: "Sí",
         closeOnConfirm: false
     }, function(isConfirm){
         if (isConfirm) form.submit();
     });
 });
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
           confirmButtonColor: "#0080FF",
           confirmButtonText: "Sí",
           closeOnConfirm: false
       }, function(isConfirm){
           if (isConfirm) form.submit();
       });
   });
</script>

<script>

var validoNumeroPartida = true;
  $('#btn-submitEm').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro de Empleados",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#0080FF",
         confirmButtonText: "Sí",
         closeOnConfirm: false
     }, function(isConfirm){
         if (isConfirm) form.submit();
     });
 });
 </script>

 <script>
  $('#btnGuardarArticulo').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro(s) de Articulo(s)",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#0080FF",
         confirmButtonText: "Sí",
         closeOnConfirm: false
     }, function(isConfirm){
         if (isConfirm) form.submit();
     });
   });
</script>

   <script>
   $( ".validateData" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-error");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myType");
       datosValidos(valor, error, id, tipo);
   });
   
   // $( ".validateData" ).change(function() {
   //     var valor = $(this).val();
   //     var error = $(this).attr("data-error");
   //     var id = $(this).attr("id");
   //     var tipo = $(this).attr("data-myType");
   //     datosValidos(valor, error, id, tipo);
   // });
   
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
   }
   
   function datosValidos(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacion", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacion", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
            validarPartida(valor,error,id);        
           }else{
            $('.error'+ error).text("Solo numeros.");
            $('#'+id).attr("data-validacion", '1');
            $('#'+id).removeClass('inputSuccess');
            $('#'+id).addClass('inputDanger'); 
           }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacion", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacion", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacion", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacion", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtn();
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

   
   function enablebtn()
   {
     var array = [];
     var claserror = $('.validateData');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacion'));
     }

     //console.log(array);
   
     if(array.includes('1'))
     { 
       $('#btn-submit2').prop("disabled", true);
     }
     else
     {
       $('#btn-submit2').prop("disabled", false);
     }
   
       //console.log(array);
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

    //console.log(array);
   
     if(array.includes('1'))
     { 
       $('#btnGuardarArticulo').prop("disabled", true);
     }
     else
     {
       $('#btnGuardarArticulo').prop("disabled", false);
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
     }
     else
     {
       $('#btnActualizarArticulo').prop("disabled", false);
       $('#btnActualizarArticulo').css("display","block");
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
})

 



 $('#passwordModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data("id");
  var modal = $(this)
  modal.find('#editPassword').val(id);
})

</script>
<!-- advanced elements -->
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

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    // $('#daterange-btn').daterangepicker(
    //   {
    //     ranges   : {
    //       'Today'       : [moment(), moment()],
    //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
    //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
    //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     },
    //     startDate: moment().subtract(29, 'days'),
    //     endDate  : moment()
    //   },
    //   function (start, end) {
    //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    //   }
    // )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>
