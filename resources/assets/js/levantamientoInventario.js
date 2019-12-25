
/********************************** funciones para el módulo de levantamiento de inventario *******************************************************/

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de detalle de lote específico de Bienes OPLE
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

var levantamientoEsp = $('#detalleLote02').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "asc" ]],
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-12 text-right'f>>" +
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
    }
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de detalle de lote específico de Bienes OPLE
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

var levantamientoEspECO = $('#detalleLote02ECO').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "asc" ]],
    "bAutoWidth": false,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-12 text-right'f>>" +
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
    "columnDefs": [
      { "width": "67px", "targets": 0 }
    ]
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de detalle de lote general Bienes OPLE
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

var levantamientoGral = $('#detalleLote03').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "asc" ]],
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-12 text-right'f>>" +
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
    }
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de detalle de lote general Bienes ECO
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

var levantamientoGralECO = $('#detalleLote03ECO').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "asc" ]],
    "bAutoWidth": false,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-12 text-right'f>>" +
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
    "columnDefs": [
      { "width": "67px", "targets": 0 }
    ]
});

var asignablesOPLE = 0;
var asignablesECO = 0;
var globalNombre = '';

/* **********************************************************************************
    Funcionalidad: Obtiene la información de los bienes del lote que se quiere ver, ya sea general o de un empleado
    Parámetros: id_lote, totalOPLE, totalECO, nombre, tipo, estado
    Retorna: Modal de detalle

********************************************************************************** */

function verDetalleLote(id_lote, totalOPLE, totalECO, nombre, tipo, estado) {
  $('#infoAsignacion').css('display','none');
  $('#infoAsignacionMSJ').html('');

  $('#infoAsignacion2').css('display','none');
  $('#infoAsignacionMSJ2').html('');

  if (totalOPLE == 0 && totalECO == 0){
    swal({
      title: "Información",
      text: "Este lote No tiene artículos",
      icon: "info",
    });
  }else{
    if (tipo === 'Especifico'){

      $.ajaxSetup(
      {
        headers:
        { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: "levantamientoInventarioDetalleEsp",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          type: 'GET',
          data: { id_lote: id_lote },
          dataType: 'json',
          async: true,
          contentType: 'application/json'

      }).done(function(response) {
          //console.log(response);

          $('#nombreEmpleadoDetalleLote').html(nombre);

          $('#detalleEstadoEsp').html(estado);

          $('#detalleEstadoEsp').removeClass();
          if (estado == 'Abierto'){
            $('#detalleEstadoEsp').addClass('badge badge-success');
          }
          if (estado == 'Cerrado'){
            $('#detalleEstadoEsp').addClass('badge badge-info');
            $('#detalleEstadoEsp').css('background','#f44611');
          }

          $('#totalOpleDetalleEsp').html(totalOPLE);
          $('#totalEcoDetalleEsp').html(totalECO);
          

        levantamientoEsp.clear().draw();
        levantamientoEspECO.clear().draw();

        $.each(response, function(i, item) {
          $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })

          tooltip = '';

          if (item['anterior'] !== ''){
            tooltip = 'data-toggle="tooltip" data-placement="top" title="Asignado anteriormente a: '+ item['anterior'] +' "';

          }

          $('#hiddenNumeroEmpleado').val(item['numeroEmpleado']);

          switch (item['semaforo']) {
            case 'si':
              $semaforo = '<div align="center"><i class="fa fa-check" aria-hidden="true"></i></div> ';
              break;
            case 'no':
              $semaforo = '<div align="center"><i class="fa fa-times" aria-hidden="true"></i></div>';
              break;
            case '?':
              $semaforo = '<div align="center"><i class="fa fa-question" aria-hidden="true"></i></div>';
              break;
          }

          if (item['semaforo'] == 'si' || item['semaforo'] == '?' || estado== 'Cerrado') {
            $asignar = '<div align="center"><i class="fa fa-ban" aria-hidden="true" style="color: #ff0000;"></i></div> ';
            eliminar = '<div align="center"><i class="fa fa-ban" aria-hidden="true" style="color: #ff0000;"></i></div> ';
          }else {
            $asignar = '<div class="form-check" align="center">'+
                          '<label class="form-check-label">'+
                            '<input type="checkbox" class="form-check-input mycheckbox" onchange="cambioCheckBoxLevantamiento()" name="articuloSeleccionadoL'
                             +item['tipo']+'[]" value="'+item['numeroinventario']+'" style="margin-top: -0.8rem;">'+
                          '</label>'+
                        '</div>';
            eliminar = '<div align="center"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarArticuloLevantamiento(\''+ item['numeroinventario'] + '\')">'+
                        '<i class="fa fa-trash-o" aria-hidden="true"></i>'+
                       '</button></div>';
          } 

          if (item['semaforo'] == 'no' || item['semaforo'] == '?') {
            if (item['tipo'] === 'OPLE'){
              asignablesOPLE ++ ;
            }else{
              asignablesECO++;
            }
          }

          if (asignablesOPLE == 0 && asignablesECO == 0){
            $('#divSelectAllOPLEECO').css('display','none');
          }else {
            $('#divSelectAllOPLEECO').css('display','block');
          }

          if (item['estatus'] === 'AsignadoDesdeLevantamientoInventario'){
            numInv =  '<span class="badge badge-info" '+ tooltip +' >'+ item['numeroinventario'] +'</span>';
            $('#infoAsignacion').css('display','block');
            $('#infoAsignacionMSJ').html('Artículo(s) asignados desde este módulo al usuario: '+ nombre);
            $('#infoAsignacion2').css('display','block');
            $('#infoAsignacionMSJ2').html('Artículo(s) asignados desde este módulo al usuario: '+ nombre);
          } else{
            numInv = item['numeroinventario'];
          }        

          if (item['tipo'] === 'OPLE'){
            var prueba = levantamientoEsp.row.add( [
                item['tipo'],
                numInv,
                item['concepto'],
                $semaforo,
                item['nombreemple'],
                item['fecha'],
                $asignar,
                eliminar            
            ] ).draw();
          }else{
            levantamientoEspECO.row.add( [
                item['tipo'],
                numInv,
                item['concepto'],
                $semaforo,
                item['nombreemple'],
                item['fecha'],
                $asignar,
                eliminar            
            ] ).draw();
          }
          
        });
        globalNombre = nombre;
        $('#btnDetalleEspPDF').attr("href","../catalogos/reportes/levantamientoInventarioDetallePDF/"+id_lote+"/"+tipo);
        $('#detalleLoteEspecifico').modal('show');    
                  
      }); 
    }

    if ( tipo == 'General'){
      $.ajaxSetup(
      {
        headers:
        { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: "levantamientoInventarioDetalleGral",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          type: 'GET',
          data: { id_lote: id_lote },
          dataType: 'json',
          async: true,
          contentType: 'application/json'

      }).done(function(response) {
          // console.log(response);

          $('#nombreDetalleLote').html(nombre);
          $('#detalleEstadoGral').html(estado);

          $('#detalleEstadoGral').removeClass();
          if (estado == 'Abierto'){
            $('#detalleEstadoGral').addClass('badge badge-success');
          }
          if (estado == 'Cerrado'){
            $('#detalleEstadoGral').addClass('badge badge-info');
            $('#detalleEstadoGral').css('background','#f44611');
          }

          $('#totalOpleDetalleGral').html(totalOPLE);
          $('#totalEcoDetalleGral').html(totalECO);

           

        levantamientoGral.clear().draw();
        levantamientoGralECO.clear().draw();

        $.each(response, function(i, item) {
          //console.log(item);



          if (estado == 'Cerrado') {
            eliminar = '<div align="center"><i class="fa fa-ban" aria-hidden="true" style="color: #ff0000;"></i></div> ';
          }else {
            eliminar = '<div align="center"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarArticuloLevantamiento(\''+ item['numeroinventario'] + '\'+)">'+
                        '<i class="fa fa-trash-o" aria-hidden="true"></i>'+
                       '</button></div>';
          }         

          if (item['tipo'] === 'OPLE'){
            levantamientoGral.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                item['nombreemple'],
                item['fecha'],
                eliminar              
            ] ).draw();
          }else{
            levantamientoGralECO.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                item['nombreemple'],
                item['fecha'],
                eliminar              
            ] ).draw();
          }
          
        });
        $('#btnDetalleGralPDF').attr("href","../catalogos/reportes/levantamientoInventarioDetallePDF/"+id_lote+"/"+tipo);
        $('#detalleLoteGeneral').modal('show');    
                  
      }); 
    }
  }
}

/* **********************************************************************************
    Funcionalidad: Ajusta el tamaño de las columnas del datatable en el modal de detalle de un lote de empleado
    Parámetros: No recibe parámetros
    Retorna: Ajusta las columnas del datatable

********************************************************************************** */

$('#detalleLoteEspecifico').on('shown.bs.modal', function() {
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();

});

/* **********************************************************************************
    Funcionalidad: Ajusta el tamaño de las columnas del datatable en el modal de detalle de un lote general
    Parámetros: No recibe parámetros
    Retorna: Ajusta las columnas del datatable

********************************************************************************** */

$('#detalleLoteGeneral').on('shown.bs.modal', function() {
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
      levantamientoGralECO.columns.adjust();
});

/* **********************************************************************************
    Funcionalidad: Ajusta el tamaño de las columnas del datatable para los data-toggle
    Parámetros: No recibe parámetros
    Retorna: Ajusta las columnas del datatable

********************************************************************************** */

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
});

/* **********************************************************************************
    Funcionalidad: Actualiza la información del datatable principal
    Parámetros: No recibe parámetros
    Retorna: Un html con un datatable y la información de los levantamientos

********************************************************************************** */

function actualizar(){
  // $('#lotesRespues').css('display', 'none');
  $.ajaxSetup(
  {
    headers:
    { 
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      url: "actualizar",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
      $('#lotesRespues').css("display","block");
      $('#lotesRespues').html(response);
          
    });
}

var validar = 1;

/* **********************************************************************************
    Funcionalidad: Función que selecciona todos los bienes para su asignación, activa todos los check disponibles
    Parámetros: No recibe parámetros
    Retorna: Selecciona todos los artículos

********************************************************************************** */

$("#selectAllOPLEECO").click(function(){
  $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
  if ( $(this).prop('checked')){
    validar = 0; 
  }else{
    validar = 1; 
  }
  activarBtnAsignarL();  
});

/* **********************************************************************************
    Funcionalidad: Cierra el modal de detalle y regresa los valores a su estado predeterminado
    Parámetros: No recibe parámetros
    Retorna: Cierra el modal de detalle del lote

********************************************************************************** */

$('#detalleLoteEspecifico').on('hidden.bs.modal', function (e) {
  $('#selectAllOPLEECO').prop('checked', false);
  validar = 1;
  asignablesOPLE = 0;
  asignablesECO = 0;
  activarBtnAsignarL();
});

/* **********************************************************************************
    Funcionalidad: Activa o desactiva el botón de asignar bien, cuando esta seleccionado por lo menos un check
                    de un bien 
    Parámetros: No recibe parámetros
    Retorna: Activa o desactiva el botón de asignar 

********************************************************************************** */

function activarBtnAsignarL(){
  if (validar == 1){
    $('#opcionesAsignarLevantamiento').css("display", 'none');
  }else{
    $('#opcionesAsignarLevantamiento').css("display", 'block');
  }
  //console.log(validar);
}

/* **********************************************************************************
    Funcionalidad: Valida que este por lo menos un check seleccionado para asignar el bien 
    Parámetros: No recibe parámetros
    Retorna: Activa o desactiva el botón de asignar 

********************************************************************************** */

function cambioCheckBoxLevantamiento(){

  var activos = [];
  var activos2 = [];
  var contador = 0;
  var contador2 = 0;

  // console.log(asignablesOPLE + ' - - '+ asignablesECO);

  var data = levantamientoEsp.rows().nodes();
  $.each(data, function (index, value) {
    //console.log($(this).find('input').prop('checked'));
    if ($(this).find('input').prop('checked')){
      validar = 0;     
      contador ++;
      if (!activos.includes(index)){
        activos.push(index);
      }
    }

  });


  var data = levantamientoEspECO.rows().nodes();
  $.each(data, function (index, value) {
    //console.log($(this).find('input').prop('checked'));
    if ($(this).find('input').prop('checked')){
      validar = 0;     
      contador2 ++;
      if (!activos2.includes(index)){
        activos2.push(index);
      }
    }

  });

  if (activos2.length == 0 && activos.length == 0){
    validar = 1;
  }

  if (contador == asignablesOPLE && contador2 == asignablesECO ){
    $("#selectAllOPLEECO").prop('checked', true);
  }else{
    $("#selectAllOPLEECO").prop('checked', false);
  }
  activarBtnAsignarL();
  //console.log(contador +' - '+total);
}

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación para asignar uno o varios bienes a un empleado 
    Parámetros: información del formulario de asignación de bienes a un empleado
    Retorna: No regresa nada

********************************************************************************** */

$('#btnAsignarArticulosL').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Asignar estos artículos a "+globalNombre,
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

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación para eliminar un artículo de la lista de levantamiento
    Parámetros: numero de inventario
    Retorna: Mensaje de confirmación o mensaje de error 

********************************************************************************** */  

function eliminarArticuloLevantamiento(numeroinventario){
    // console.log(numeroinventario);
  swal({
         title: "Eliminar artículo "+numeroinventario + " de este lote",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#E71096",
         confirmButtonText: "Sí",
         closeOnConfirm: true
     }, function(isConfirm){

      if (isConfirm) {
            $.ajax({
               type:'POST',
               url:'eliminarArticuloLevantamiento',
               data:{ numeroinventario: numeroinventario},
              success:function(data){
                console.log(data);

                  swal({title: "Listo!", text: "Se elimino el artículo con numero de inventario "+  numeroinventario + "de este lote", type: "success"},
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
}

