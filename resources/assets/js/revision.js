
var t = $('#detalles').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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

var ta = $('#detallesE').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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

function detalleOPLE(id_cancelacion,nombreEmpleado) {
	//console.log(id_cancelacion);

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "detalleOPLE",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { id_cancelacion: id_cancelacion },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	// console.log(response);

    	if (response == 0 ){
    		swal({
			  title: "Información",
			  text: "Esta cancelacion No tiene artículos OPLE",
			  icon: "info",
			});
    	}else{
    		$('#nombreEmpleadoDOPLE').html(nombreEmpleado);

    		t.clear().draw();

    		$.each(response, function(i, item) {
			    console.log(item);
			    t.row.add( [
		            item['numeroinventario'],
		            item['concepto'],
		            item['numserie'],
		            item['importe']		            
		        ] ).draw( false );
			});
    		$('#detalleOPLE').modal('show'); 
    	}   	
    	    	    	
    }); 
}

function detalleECO(id_cancelacion,nombreEmpleado) {
	//console.log(id_cancelacion);

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "detalleECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { id_cancelacion: id_cancelacion },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	// console.log(response);

    	if (response == 0 ){
    		swal({
			  title: "Información",
			  text: "Esta cancelacion No tiene artículos ECO",
			  icon: "info",
			});
    	}else{
    		$('#nombreEmpleadoDECO').html(nombreEmpleado);

    		ta.clear().draw();

    		$.each(response, function(i, item) {
			    console.log(item);
			    ta.row.add( [
		            item['numeroinventario'],
		            item['concepto'],
		            item['numserie'],
		            item['importe']		            
		        ] ).draw( false );
			});
    		$('#detalleECO').modal('show'); 
    	}   	
    	    	    	
    }); 
}

