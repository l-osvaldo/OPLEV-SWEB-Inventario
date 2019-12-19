<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>
	  	
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