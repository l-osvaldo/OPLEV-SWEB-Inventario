<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	  	
	  	

	  	<script type="text/javascript">
	  		$(document).ready(function() {
	  			var table = $('#tableDepreciacion01').DataTable( {

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
		                    text: 'Control',
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

	  	</script>


	  	<script type="text/javascript">
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
	  	</script>


	  </head>
	  <body>

	  	<div>
	  		<!-- Content Wrapper. Contains page content -->
	  		<div class="" style="min-height: 885px;">
	  			@yield('content')
	  		</div>		    
	  	</div>


	  </body>
	  </html>