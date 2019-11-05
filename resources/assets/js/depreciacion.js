$('#depreciacionPartida').change(function() {

	if ( $(this).val() != 0){

		$('#cargandoDepreciacion').css("display","block");
		$('#divRespuestaDepreciacion').css("display","none");

		$.ajaxSetup(
		{
			headers:
			{ 
	    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
	      url: "calculoDepreciacion",
	      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	      type: 'GET',
	      data: { numPartida: $(this).val() },
	      dataType: 'html',
	      async: true,
	      contentType: 'application/json'

	    }).done(function(response) {
	    	$('#divRespuestaDepreciacion').css("display","block");
	    	$('#respuestaDepreciacion').html(response);
	    	$('#cargandoDepreciacion').css("display","none");
	    	    	
	    });
	}else{
		$('#divRespuestaDepreciacion').css("display","none");
	}
}); 


function abrirModalHistorial(numInventario, numPartida){
	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "HistorialDepreciacionArticulo",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numInventario: numInventario, numPartida: numPartida },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	console.log(response);


    	$.each(response, function(i, item) {
    		//console.log(item['partida 


    		$('#historialDepreciacionModalLabel').html('Número de inventario: '+item['numeroinv']);
    		$('#DepreciacionConcepto').html(' '+item['concepto']);
    		
    		$('#DepreciacionFecha').html(' '+item['fechacomp']); 
    		$('#DepreciacionValorBien').html('$ '+item['importe']); 
    		$('#DepreciacionValorResidual').html('$ '+item['valorResidual']);

    		$('#DepreciacionBienMenosResidual').html('$ '+item['valorDelBienMenosValorResidual']);

    		$('#DepreciacionAnual').html('$ '+item['depreciacionAnual']); 
    		$('#DepreciacionMensual').html('$ '+item['depreciacionMensual']);  

    		$('#DepreciacionMesActual').html('Depreciación del mes actual ('); 

    		
   //  		$('#editarMarca').val(item['marca']);
   //  		$('#editarModelo').val(item['modelo']);
   //  		$('#EditarNumSerie').val(item['numserie']);
   //  		$('#editarColor').val(item['colores']);
   //  		$('#editarMaterial').val(item['material']);
   //  		$('#editarMedidas').val(item['medidas']);
   //  		$('#editarEstado').val(item['clvestado']).change();

   //  		$('#numeroInventario').val(numInventario);

   //  		$('#btnActualizarArticulo').prop("disabled", true);
			// $('#btnActualizarArticulo').css("display","none");


		});
    	$('#historialDepreciacionModal').modal('show');     	    	
    }); 	
}



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





 




