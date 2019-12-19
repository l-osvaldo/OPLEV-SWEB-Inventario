<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body class="hold-transition sidebar-mini ">
  <div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="">
      @yield('content')
    </div>

    
  </div>

<script type="text/javascript" src="{{ asset('js/tables.js') }}"></script>

<script>

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
    
</body>
</html>
