<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css">
	  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

	  <style type="text/css">
	  	/* Ensure that the demo table scrolls */
	    th, td { white-space: nowrap; }
	    div.dataTables_wrapper {
	        width: 800px;
	        margin: 0 auto;
	    }
	 
	    div.ColVis {
	        float: left;
	    }
	  </style>

	  <script type="text/javascript" src="{{ asset('js/depreciacion.js') }}"></script>

	  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

	  <script type="text/javascript">
	  	$('#tableDepreciacion').DataTable( {
	        "scrollY":        "300px",
	        "scrollX":        true,
	        "scrollCollapse": true,
	        "paging":         false,
	        "fixedColumns":   {
	            "leftColumns": 1,
	            "rightColumns": 1
	        }
	    } );
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