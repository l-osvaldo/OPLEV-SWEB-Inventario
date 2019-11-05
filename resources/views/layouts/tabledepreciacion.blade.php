<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/fc-3.3.0/fh-3.1.6/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/fc-3.3.0/fh-3.1.6/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>

	    <script type="text/javascript" src="{{ asset('js/depreciacion.js') }}"></script>

	    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>

	    <script type="text/javascript">
	    	$(document).ready(function() {
	    		var tableP = $('#tableDepreciacion').DataTable( {
				  "deferRender": true,
				  "retrieve": true,
				  "processing": true,
				  "scrollX": true,
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

				new $.fn.dataTable.FixedColumns( tableP, {
			        leftColumns: 1,
			        rightColumns: 1
			    } );
	    	});
	    </script>

	  
	</head>
	<body class="hold-transition sidebar-mini ">

		<div class="wrapper">
	    	<!-- Content Wrapper. Contains page content -->
		    <div class="" style="min-height: 885px;">
		      @yield('content')
		    </div>		    
		</div>

			  
	</body>
</html>