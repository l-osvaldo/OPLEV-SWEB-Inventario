
$('#tableLevantamiento').DataTable( {
  "deferRender": true,
  "retrieve": true,
  "processing": true,
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

function verDetalleLote(id_lote, totalOPLE, totalECO, nombre, tipo) {
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

        levantamientoEsp.clear().draw();

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

          levantamientoEsp.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                $semaforo,
                item['nombreemple']             
            ] ).draw();
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

        levantamientoGral.clear().draw();

        $.each(response, function(i, item) {
          console.log(item);         

          levantamientoGral.row.add( [
                item['tipo'],
                item['numeroinventario'],
                item['concepto'],
                item['nombreemple']             
            ] ).draw();
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
});

  

