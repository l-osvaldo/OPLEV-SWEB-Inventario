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

	  {{-- <style type="text/css">
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
 
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/fc-3.3.0/fh-3.1.6/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/datatables.min.js"></script> --}}

		<!-- Font Awesome -->
		  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
		 
		  <!-- Select2 -->
		  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">
		  
		  <!-- DataTables-->
		  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
		  {{-- <link rel="stylesheet" href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}"> --}}
		  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">

		   <!-- Theme style -->
		   <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

		   <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">



		   <script type="text/javascript">
		   	stickyColumns();

			function stickyColumns() {
				console.log('jfdjfsd');
			  // Número de elementos que se mantendran fijos
			  var stickElements = $('.sticky-column');   
			  
			  // Variable que permite identificar el numero de columnas a fijar
			  var totalColumns = $('thead .sticky-column').length;
			  
			  // Formula para identificar la primer columnas
			  // Si el total de columnas es 2 obtendremos (2n-1)  
			  var firstColumn = totalColumns+'n'+'-'+(totalColumns-1);
			  
			  // Formula para identificar la segunda columna
			  // Si el total de columnas es 2 obtendremos (2n+2)
			  var secondColum = totalColumns+'n'+'+'+(totalColumns);
			  
			  // Obtenemos el ancho de la primer elemeto de la primera columna
			  // este elemento no sirve para posicionar la primera columna totalmente a la izquierda
			  var firstElement = $('tbody .sticky-column:first-child()').outerWidth();
			  
			 stickElements.each(function(){ 
			   // Si el elemento a fijar tiene el valor del primer elemento de la primera columan 
			   // Posicionamos los elementos totalmente a la izquierda
			   if($(this).outerWidth() == firstElement){ 
			     $(this).css('left','0px');
			   } else {
			     // Si no lo posicionamos a X(tamaño del primer elemento) pixeles a la izquierda
			     $(this).css({
			       'left': firstElement,
			       'width': '220px'
			     });
			   }
			 });
			  
			  // Mueve los elementos fijos al realizar el scroll de la tabla
			  $('.fixed-table').scroll(function() {
			     $('.sticky-column:nth-child('+firstColumn+')').css('left',$(this).scrollLeft());
			     $('.sticky-column:nth-child('+secondColum+')').css('left',firstElement+$(this).scrollLeft());
			  });
			}
		   </script>



	  
	</head>
	<body class="hold-transition sidebar-mini ">

		<div class="wrapper">
	    	<!-- Content Wrapper. Contains page content -->
		    <div class="" style="min-height: 885px;">
		      @yield('content')
		    </div>		    
		</div>


		<!-- jQuery -->
		{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
		<!-- Morris.js charts -->
		<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

		<!-- Select2 -->
		<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>

		<!-- AdminLTE App -->
		<script src="{{ asset('dist/js/adminlte.js') }}"></script>

		<!-- DataTables -->
		<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

		<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/dataTables.select.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>


		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


		<script type="text/javascript" src="{{ asset('js/depreciacion.js') }}"></script>

	 {{--  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script> --}}
	 {{--  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script> --}}

	  
	</body>
</html>