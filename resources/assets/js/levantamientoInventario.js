
$('#tableLevantamiento').DataTable( {
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[ 1, "desc" ]],
  "sSearch": "Filter Data",
  "dom":      "<'row'<'col-sm-4'l><'col-sm-8 text-right'f>>" +
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
} );

var levantamientoEsp = $('#detalleLote02').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "desc" ]],
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

var levantamientoEspECO = $('#detalleLote02ECO').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "desc" ]],
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



var levantamientoGral = $('#detalleLote03').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "desc" ]],
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

var levantamientoGralECO = $('#detalleLote03ECO').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "desc" ]],
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

function verDetalleLote(id_lote, totalOPLE, totalECO, nombre, tipo, estado) {
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
          console.log(response);

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
          console.log(item);

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

          if (item['semaforo'] == 'si' || item['semaforo'] == '?') {
            $asignar = '';
          }else {
            $asignar = '<div class="form-check" align="center">'+
                          '<label class="form-check-label">'+
                            '<input type="checkbox" class="form-check-input mycheckbox" onchange="cambioCheckBoxLevantamiento()" name="articuloSeleccionadoL'
                             +item['tipo']+'[]" value="'+item['numeroinventario']+'" style="margin-top: -0.8rem;">'+
                          '</label>'+
                        '</div>';
          }          

          if (item['tipo'] === 'OPLE'){
            levantamientoEsp.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                $semaforo,
                item['nombreemple'],
                item['fecha'],
                $asignar            
            ] ).draw();
          }else{
            levantamientoEspECO.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                $semaforo,
                item['nombreemple'],
                item['fecha'],
                $asignar            
            ] ).draw();
          }

          
        });
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
          console.log(response);

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
          console.log(item);         

          if (item['tipo'] === 'OPLE'){
            levantamientoGral.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                item['nombreemple'],
                item['fecha']              
            ] ).draw();
          }else{
            levantamientoGralECO.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                item['nombreemple'],
                item['fecha']              
            ] ).draw();
          }
          
        });
        $('#btnDetalleGralPDF').attr("href","../catalogos/reportes/levantamientoInventarioDetallePDF/"+id_lote+"/"+tipo);
        $('#detalleLoteGeneral').modal('show');    
                  
      }); 
    }
  }
}

$('#detalleLoteEspecifico').on('shown.bs.modal', function() {
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();

});

$('#detalleLoteGeneral').on('shown.bs.modal', function() {
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
      levantamientoGralECO.columns.adjust();
});


$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $.fn.dataTable
        .tables( { visible: true, api: true } )
        .columns.adjust();
});


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

$("#selectAllOPLEECO").click(function(){
  $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
  if ( $(this).prop('checked')){
    validar = 0; 
  }else{
    validar = 1; 
  }
  activarBtnAsignarL();  
});

$('#detalleLoteEspecifico').on('hidden.bs.modal', function (e) {
  $('#selectAllOPLEECO').prop('checked', false);
  validar = 1;
});

function activarBtnAsignarL(){
  if (validar == 1){
    $('#opcionesAsignarLevantamiento').css("display", 'none');
  }else{
    $('#opcionesAsignarLevantamiento').css("display", 'block');
  }
  //console.log(validar);
}



  

