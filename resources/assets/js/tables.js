/********************************** Configuraciones de los datatables generales del sistema *******************************************************/

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de los catálogos Bienes OPLE, bienes OPLE de un empleado de una cancelación, 
                    , bienes ECO partidas, líneas, sublíneas,
                    área y empleado
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de los catálogos bienes ECO de un empleado de una cancelación, 
                    , reportes bienes por partida OPLE y ECO, inventario por área OPLE y ECO, 
                    inventario por orden alfabetico OPLE ECO, resguardo por empleado OPLE y ECO,
                    importe de bienes por anos adquisicion OPLE, inventario por orden alfabetico nuevo OPLE
                    área y empleado
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$('#example1').DataTable( {
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "sSearch": "Filter Data",
  "dom":     "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8'B>>" +
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
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable del  inventario por orden alfabetico nuevo OPLE todas las pestañas
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$('.tableR9').DataTable( {
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[ 1, "asc" ]],
  "sSearch": "Filter Data",
  "dom":     "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8'B>>" +
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
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de los reportes importe de bienes por area OPLE y ECO,
                    importe de bienes por partida OPLE y ECO
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$('#tableReporte').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": false,
    "sSearch": "Filter Data",
    "dom":     "<'row'<'col-sm-12 text-right'B>>" +
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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable del reporte bienes de un area ordenado por empleado
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$('#tableR8').DataTable( {
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[ 5, "asc" ]],
  "sSearch": "Filter Data",
  "dom":     "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8 text-right'B>>" +
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
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de levantamiento de inventario
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de Bienes ECO
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$('#tableCatalogoECO').DataTable( {
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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de Depreciación, bienes sin fecha de compra
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$('#example2').DataTable( {
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "sSearch": "Filter Data",
  "dom":     "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8 text-right'B>>" +
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
});

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de Depreciación de bienes
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

$(document).ready(function() {
  $('#tableDepreciacion01').DataTable( {

    "scrollX":        true,
    "scrollCollapse": true,
    "paging":         true,
    "fixedColumns": {
      leftColumns: 2
    },
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "sSearch": "Filter Data",
    "dom":     "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8 text-right'B>>" +
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
      },
    },
   "buttons": [{
                extend: 'collection',
                text: 'Exportar',
                orientation: 'landscape',
                buttons: [
                    'excel'
                ]
            },
            {
                extend: 'colvis',
                text: 'Ver columnas',
                collectionLayout: 'fixed three-column'
            }
        ],
  } );
} );

$('#listadeusuarios').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "fixedHeader": true,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-1'l><'col-sm-3'f><'col-sm-8'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
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
    {
      "extend": "excelHtml5",
      "autoFilter": true,
      "sheetName": "Lista de Usuarios"
    }
    ]
  });