<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css"> --}}
	  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"> --}}

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

	  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/fc-3.3.0/fh-3.1.6/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/fc-3.3.0/fh-3.1.6/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/datatables.min.js"></script>

	  	<script type="text/javascript">
// 		  	$(document).ready(function() {
//     var table = $('#tableDepreciacion').DataTable( {
//         scrollY:        "750px",
//         scrollX:        false,
//         scrollCollapse: true,
//         paging:         false,
//         searching: false,
//         ordering: true,
//         orderClasses: true,
//         columnDefs: [
//     { targets: [0,1],width: '800px', }
//   ]
         
//     } );
//     new $.fn.dataTable.FixedColumns( table, {
//         leftColumns: 2,
         
//     } );
// } );


		  	$(document).ready(function() {
    var table = $('#tableDepreciacion').DataTable( {
        
    } );
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


		<script type="text/javascript" src="{{ asset('js/depreciacion.js') }}"></script>

	 {{--  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script> --}}
	 {{--  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script> --}}

	  
	</body>
</html>