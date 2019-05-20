<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIADMON | OPLE VER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.css') }}">
  <!-- Bootstrap-->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
  <!-- DataTables-->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SIADMON</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="#" class="d-block">{{ $usuario->username }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class=" nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('lista') }}" class="{!! Request::is('catalogos/lista','catalogos/TablaDeLineas','catalogos/Lineas',
              'catalogos/TablaEmpleados','catalogos/TablaPartida','catalogos/Sublineas','catalogos/TablaSublineas','catalogos/TablaAreas') ? 'nav-link active' : 'nav-link' !!}">
                <i class="nav-icon fa fa-pie-chart"></i>
                <p>
                  Catálogos
                </p>
              </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('catalogos') }}" class="{!! Request::is('catalogos/bienes','home','/') ? 'nav-link active' : 'nav-link' !!}">
                <i class="nav-icon fa fa-table"></i>
                <p>
                  Bienes OPLE
                </p>
              </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('catalogoeco') }}" class="{!! Request::is('catalogos/bieneseco') ? 'nav-link active' : 'nav-link' !!}">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                    Bienes ECO
                  </p>
                </a>
              </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <span style="color: #FF2D00;">
                    <i class="nav-icon fa fa-power-off"></i>
                  </span>  
                  <p>
                    {{ __('Salir') }}
                  </p>
              </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                </form>
            </li>    
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    
    
    
    <!-- /.container-fluid -->
    <!-- /.content-wrapper -->
    

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <footer class="main-footer">
    @include('partials.footer')
  </footer>


<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- iCheck 1.0.1 --> 
<script src="{{ asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/dist/locale/es.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/sl-1.3.0/datatables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('plugins/chartjs-old/Chart.min.js') }}"></script>
<script src="{{ asset('js/recursos.js') }}"></script>
<script>
  $('#example1').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "sSearch": "Filter Data",
    "dom":     "lBfrtip",
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
</script>

<script>
    $(function () {
  
      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function () {
  
          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }
  
          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)
  
          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          })
  
        })
      }
  
      ini_events($('#external-events div.external-event'))
  
      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d    = date.getDate(),
          m    = date.getMonth(),
          y    = date.getFullYear()
      $('#calendario').fullCalendar({
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'month, listWeek,agendaWeek,agendaDay'
        },
        //Random default events
        events    : [
          {
            title          : 'All Day Event',
            start          : new Date(y, m, 1),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954' //red
          },
          {
            title          : 'Long Event',
            start          : new Date(y, m, d - 5),
            end            : new Date(y, m, d - 2),
            backgroundColor: '#f39c12', //yellow
            borderColor    : '#f39c12' //yellow
          },
          {
            title          : 'Meeting',
            start          : new Date(y, m, d, 10, 30),
            allDay         : false,
            backgroundColor: '#0073b7', //Blue
            borderColor    : '#0073b7' //Blue
          },
          {
            title          : 'Lunch',
            start          : new Date(y, m, d, 12, 0),
            end            : new Date(y, m, d, 14, 0),
            allDay         : false,
            backgroundColor: '#00c0ef', //Info (aqua)
            borderColor    : '#00c0ef' //Info (aqua)
          },
          {
            title          : 'Birthday Party',
            start          : new Date(y, m, d + 1, 19, 0),
            end            : new Date(y, m, d + 1, 22, 30),
            allDay         : false,
            backgroundColor: '#00a65a', //Success (green)
            borderColor    : '#00a65a' //Success (green)
          },
          {
            title          : 'Click for Google',
            start          : new Date(y, m, 28),
            end            : new Date(y, m, 29),
            url            : 'http://google.com/',
            backgroundColor: '#3c8dbc', //Primary (light-blue)
            borderColor    : '#3c8dbc' //Primary (light-blue)
          }
        ],
        editable  : true,
        droppable : true, // this allows things to be dropped onto the calendar !!!
        drop      : function (date, allDay) { // this function is called when something is dropped
  
          // retrieve the dropped element's stored Event Object
          var originalEventObject = $(this).data('eventObject')
  
          // we need to copy it, so that multiple events don't have a reference to the same object
          var copiedEventObject = $.extend({}, originalEventObject)
  
          // assign it the date that was reported
          copiedEventObject.start           = date
          copiedEventObject.allDay          = allDay
          copiedEventObject.backgroundColor = $(this).css('background-color')
          copiedEventObject.borderColor     = $(this).css('border-color')
  
          // render the event on the calendar
          // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
          $('#calendario').fullCalendar('renderEvent', copiedEventObject, true)
  
          // is the "remove after drop" checkbox checked?
          if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove()
          }
  
        }
      })
  
      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      //Color chooser button
      var colorChooser = $('#color-chooser-btn')
      $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color'    : currColor
        })
      })
      $('#add-new-event').click(function (e) {
        e.preventDefault()
        //Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }
  
        //Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color'    : currColor,
          'color'           : '#fff'
        }).addClass('external-event')
        event.html(val)
        $('#external-events').prepend(event)
  
        //Add draggable funtionality
        ini_events(event)
  
        //Remove event from text input
        $('#new-event').val('')
      })
    })
</script>
<!-- tables -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- chart script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>

<script>
  $(document).ready(function(){
    $("#nombre, #apePat").change(function(){
      var value1 = document.getElementById('nombre').value;
      var value2 = document.getElementById('apePat').value;
      var value3 = value1.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value4 = value2.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value5 = value3 + "." + value4;
      var value6 = value5.toLowerCase();
      validarNombreOple(value6);
      document.getElementById('usuario').value = value6;
  
    })
  });
  </script>
  <script>
  $(document).ready(function(){
    $("#nombreA, #apePatA").change(function(){
      var value1 = document.getElementById('nombreA').value;
      var value2 = document.getElementById('apePatA').value;
      var value3 = value1.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value4 = value2.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
      var value5 = value3 + "." + value4;
      var value6 = value5.toLowerCase();
      validarNombre(value6);
      document.getElementById('usuarioA').value = value6;
    })
  });
  </script>
  <script>
  $(document).ready(function(){
    $("#selectareaA").change(function(){
      var value1 = $("#selectareaA").val();
      var text = $("#selectareaA :selected").text();
      document.getElementById('idOrgA').value = value1;
      document.getElementById('nameOrgA').value = text;
  
    })
  });
  </script>
  <script>
  $(document).ready(function(){
    $("#selectareaO").change(function(){
      var value1 = $("#selectareaO").val();
      var text = $("#selectareaO :selected").text();
      document.getElementById('idOrgO').value = value1;
      document.getElementById('nameOrgO').value = text;
  
    })
  });
  </script>
  <script>
    $(document).on("click", "#passwordGenerate", function(){
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 8; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
      document.getElementById("contPass").value = result;
      var valor = $('#contPass').val();
      var error = $('#contPass').attr("data-errorDos");
      var id = $('#contPass').attr("id");
      var tipo = $('#contPass').attr("data-myTypeDos");
      datosValidosDos(valor, error, id, tipo);
    });
  </script>
  <script>
    $(document).on("click", "#passwordGenerateA", function(){
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 8; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
      document.getElementById("contPassA").value = result;
      var valor = $('#contPassA').val();
      var error = $('#contPassA').attr("data-error");
      var id = $('#contPassA').attr("id");
      var tipo = $('#contPassA').attr("data-myType");
      datosValidos(valor, error, id, tipo);
    });
  
    $(document).on("click", "#passwordGenerateEdit", function(){
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 8; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
      document.getElementById("contPassEdit").value = result;
    });
  </script>
  
  <script>
   $(document).on("click", "#passCopi", function(){
     var copyText = document.getElementById("contPass");
     copyText.select();
     document.execCommand("copy");
     swal({
             type: "info",
             title: "Password",
             text: 'Contraseña copiada: '+ copyText.value,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          });
    });
  </script>
  <script>
$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var area = button.data('area');
  var id = button.data("areaid");
  var modal = $(this)
  modal.find('.modal-body #depto').val(area);
  modal.find('.modal-body #editClave').val(id);
  console.log(area,id)
  
})

    $('#editBtn').on('click',function(e){
    e.preventDefault();
    swal({
        title: "Edición de datos",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#0080FF",
        confirmButtonText: "Sí",
        closeOnConfirm: false
    }, function(isConfirm){
       if (isConfirm) {
          var id = $('#editClave').val();
          var no = $('#depto').val();
          console.log(id,no);
          $.ajax({
             type:'POST',
             url:'updatearea/',
             data:{id:id, no:no},
            success:function(data){
                swal({title: "Listo!", text: "Area actualizada", type: "success"},
                   function(){ 
                       location.reload();
                   }
                )
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Por favor intentelo de nuevo!", "error");
              }
          });
        } else {
          swal("Error!", "Por favor intentelo de nuevo", "error");
        }
    });
});
  </script>

  <script>
   $(document).on("click", "#passCopiA", function(){
     var copyText = document.getElementById("contPassA");
     copyText.select();
     document.execCommand("copy");
     swal({
             type: "info",
             title: "Password",
             text: 'Contraseña copiada: '+ copyText.value,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          });
    });
  
   $(document).on("click", "#passCopiEdit", function(){
     var copyText = document.getElementById("contPassEdit");
     copyText.select();
     document.execCommand("copy");
     swal({
             type: "info",
             title: "Password",
             text: 'Contraseña copiada: '+ copyText.value,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
          });
    });
  </script>
  <script>
   $(document).on("click", "#showPass", function(){
     var x = document.getElementById("contPass");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }   
      });
  </script>
  <script>
   $(document).on("click", "#showPassA", function(){
     var x = document.getElementById("contPassA");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }   
      });
  
   $(document).on("click", "#showPassEdit", function(){
     var x = document.getElementById("contPassEdit");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }   
      });
  </script>







<!--validacion-->


<script>
  $('#btn-submit').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro de Líneas",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#0080FF",
         confirmButtonText: "Sí",
         closeOnConfirm: false
     }, function(isConfirm){
         if (isConfirm) form.submit();
     });
 });
 </script>

<script>
    $('#btn-submit3').on('click',function(e){
       e.preventDefault();
       var form = $(this).parents('form');
       swal({
           title: "Registro de Líneas",
           text: "¿Desea continuar?",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#0080FF",
           confirmButtonText: "Sí",
           closeOnConfirm: false
       }, function(isConfirm){
           if (isConfirm) form.submit();
       });
   });
   </script>

   <script>
      $('#btn-submitEm').on('click',function(e){
         e.preventDefault();
         var form = $(this).parents('form');
         swal({
             title: "Registro de Líneas",
             text: "¿Desea continuar?",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#0080FF",
             confirmButtonText: "Sí",
             closeOnConfirm: false
         }, function(isConfirm){
             if (isConfirm) form.submit();
         });
     });
     </script>

   <script>
   $( ".validateData" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-error");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myType");
       datosValidos(valor, error, id, tipo);
   });
   
   $( ".validateData" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-error");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myType");
       datosValidos(valor, error, id, tipo);
   });
   
   $( ".validateDataDos" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorDos");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeDos");
       datosValidosDos(valor, error, id, tipo);
   });
   
   $( ".validateDataDos" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorDos");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeDos");
       datosValidosDos(valor, error, id, tipo);
   });

   $( ".validateDataLi" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorLi");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeLi");
       datosValidosLi(valor, error, id, tipo);
   });
   
   $( ".validateDataLi" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorLi");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeLi");
       datosValidosLi(valor, error, id, tipo);
   });
   
   $( ".validateDataEm" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorEm");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeEm");
       datosValidosEm(valor, error, id, tipo);
   });
   
   $( ".validateDataEm" ).change(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-errorEm");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myTypeEm");
       datosValidosEm(valor, error, id, tipo);
   });
   
   function datosValidos(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacion", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacion", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacion", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
         }else{
          $('.error'+ error).text("Solo numeros.");
             $('#'+id).attr("data-validacion", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacion", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacion", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacion", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacion", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtn();
   }
   
   function datosValidosDos(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionDos", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacionDos", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionDos", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Solo numeros.");
           $('#'+id).attr("data-validacionDos", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionDos", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacionDos", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionDos", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacionDos", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtnDos();
   }


   


   function datosValidosLi(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionLi", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacionLi", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionLi", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Solo numeros.");
           $('#'+id).attr("data-validacionLi", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionLi", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacionLi", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionLi", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacionLi", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtnLi();
   }

   
   function datosValidosEm(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacionEm", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacionEm", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionEm", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Solo numeros.");
           $('#'+id).attr("data-validacionEm", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionEm", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacionEm", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacionEm", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacionEm", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtnEm();
   }





   
   function enablebtn()
   {
     var array = [];
     var claserror = $('.validateData');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacion'));
     }
   
     if(array.includes('1'))
     { 
       $('#btn-submit2').prop("disabled", true);
     }
     else
     {
       $('#btn-submit2').prop("disabled", false);
     }
   
       console.log(array);
   }
   
   function enablebtnDos()
   {
     var array = [];
     var claserror = $('.validateDataDos');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionDos'));
     }
   
     if(array.includes('1'))
     { 
       $('#btn-submit').prop("disabled", true);
     }
     else
     {
       $('#btn-submit').prop("disabled", false);
     }
   
       console.log(array);
   }

   function enablebtnLi()
   {
     var array = [];
     var claserror = $('.validateDataLi');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionLi'));
     }
   
     if(array.includes('1'))
     { 
       $('#btn-submit3').prop("disabled", true);
     }
     else
     {
       $('#btn-submit3').prop("disabled", false);
     }
   
       console.log(array);
   }

   function enablebtnEm()
   {
     var array = [];
     var claserror = $('.validateDataEm');
   
     for (var i = 0; i < claserror.length; i++) {
       array.push(claserror[i].getAttribute('data-validacionEm'));
     }
   
     if(array.includes('1'))
     { 
       $('#btn-submitEm').prop("disabled", true);
     }
     else
     {
       $('#btn-submitEm').prop("disabled", false);
     }
   
       console.log(array);
   }
   
   </script>

<script>
$('#btn-submit2').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Registro de Partidas",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#0080FF",
        confirmButtonText: "Sí",
        closeOnConfirm: false
    }, function(isConfirm){
        if (isConfirm) form.submit();
        
    });
});




$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 



 $('#passwordModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data("id");
  var modal = $(this)
  modal.find('#editPassword').val(id);
})

</script>
<!-- advanced elements -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
