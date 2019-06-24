<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/logoople.png') }}">

    <title>@yield('title') | SICLI | OPLE Veracruz</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('vendor_components/bootstrap/dist/css/bootstrap.css') }}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-extend.css') }}">

    <!-- theme style -->
    <!--link rel="stylesheet" href="{{ asset('css/master_style.css') }}"-->

    <!-- Lion_admin skins -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body class="hold-transition bg-img" data-overlay="4">
    @yield('content')
    <!-- jQuery 3 -->
    <script src="{{ URL::asset('vendor_components/jquery/dist/jquery.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ URL::asset('vendor_components/jquery-ui/jquery-ui.js') }}"></script>
    <!-- popper -->
    <script src="{{ URL::asset('vendor_components/popper/dist/popper.min.js') }}"></script>
    <!-- Bootstrap 4.0-->
    <script src="{{ URL::asset('vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::asset('vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

  </body>
</html>