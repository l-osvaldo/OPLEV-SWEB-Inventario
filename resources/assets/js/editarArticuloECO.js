 
 function abrirModalEditarECO(numInventario) {

 	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "InformacionArticuloECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numInventario: numInventario },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);


    	$.each(response, function(i, item) {
    		//console.log(item['partida 


    		$('#editarPartidaECO').html(item['partida']);
    		$('#editarLineaECO').html(item['linea']);
    		$('#editarSublineaECO').html(item['sublinea']);

    		$('#editarPartidaNECO').html(item['descripcionpartida']);
    		$('#editarLineaNECO').html(item['descripcionlinea']);
    		$('#editarSublineaNECO').html(item['descripcionsublinea']);

    		$('#editarNoInventarioECO').html(item['numeroinventario']);
    		$('#editarConceptoECO').html(item['concepto']); 
    		$('#editarResponsableECO').html(item['nombreempleado']); 
    		$('#editarAreaECO').html(item['nombrearea']); 

    		$('#editarFacturaECO').val(item['factura']);
    		$('#editarImporteECO').val(item['importe']);

    		if (item['fechacomp'] === '0'){
    			console.log('entre');
    			//$('#editarDateFechaCompra').val("2001-05-05");
    			//$('#editarDateFechaCompra').val("DD-MM-YYYY");
    			//$('#editarDateFechaCompra').val("YYYY-MM-DD");
    		}else{
    			$('#editarDateFechaCompraECO').val(item['fechacompra']);
    		}

    		
    		$('#editarMarcaECO').val(item['marca']);
    		$('#editarModeloECO').val(item['modelo']);
    		$('#EditarNumSerieECO').val(item['numeroserie']);
    		$('#editarColorECO').val(item['colores']);
    		$('#editarMaterialECO').val(item['material']);
    		$('#editarMedidasECO').val(item['medidas']);
    		$('#editarEstadoECO').val(item['claveestado']).change();

    		$('#numeroInventarioECO').val(numInventario);

    		$('#btnActualizarArticuloECO').prop("disabled", true);
			$('#btnActualizarArticuloECO').css("display","none");


		});
    	$('#editarECOModal').modal('show');     	    	
    }); 	
 }

$('#editarECOModal').on('hidden.bs.modal', function (e) {
  $('#activarEditarECO').prop("checked", false).change();
})

 $('#activarEditarECO').change(function(){
    	if( $('#activarEditarECO').is(':checked') ) {
		    $('#editarFacturaECO').prop("disabled", false);
	    	$('#editarImporteECO').prop("disabled", false);
	    	$('#editarDateFechaCompraECO').prop("disabled", false);
	    	$('#editarMarcaECO').prop("disabled", false);
	    	$('#editarModeloECO').prop("disabled", false);
	    	$('#EditarNumSerieECO').prop("disabled", false);
	    	$('#editarColorECO').prop("disabled", false);
	    	$('#editarMaterialECO').prop("disabled", false);
	    	$('#editarMedidasECO').prop("disabled", false);
	    	$('#editarEstadoECO').prop("disabled", false);


	    	$('#editarFacturaECO').removeClass('inputDanger');
	    	$('#editarImporteECO').removeClass('inputDanger');
	    	$('#editarDateFechaCompraECO').removeClass('inputDanger');
	    	$('#editarMarcaECO').removeClass('inputDanger');
	    	$('#editarModeloECO').removeClass('inputDanger');
	    	$('#EditarNumSerieECO').removeClass('inputDanger');
	    	$('#editarColorECO').removeClass('inputDanger');
	    	$('#editarMaterialECO').removeClass('inputDanger');
	    	$('#editarMedidasECO').removeClass('inputDanger');
	    	$('#editarEstadoECO').removeClass('inputDanger');


	    	$('#editarFacturaECO').addClass('inputSuccess');
	    	$('#editarImporteECO').addClass('inputSuccess');
	    	$('#editarDateFechaCompraECO').addClass('inputSuccess');
	    	$('#editarMarcaECO').addClass('inputSuccess');
	    	$('#editarModeloECO').addClass('inputSuccess');
	    	$('#EditarNumSerieECO').addClass('inputSuccess');
	    	$('#editarColorECO').addClass('inputSuccess');
	    	$('#editarMaterialECO').addClass('inputSuccess');
	    	$('#editarMedidasECO').addClass('inputSuccess');
	    	$('#editarEstadoECO').addClass('inputSuccess');
		}else{
			$('#editarFacturaECO').prop("disabled", true);
	    	$('#editarImporteECO').prop("disabled", true);
	    	$('#editarDateFechaCompraECO').prop("disabled", true);
	    	$('#editarMarcaECO').prop("disabled", true);
	    	$('#editarModeloECO').prop("disabled", true);
	    	$('#EditarNumSerieECO').prop("disabled", true);
	    	$('#editarColorECO').prop("disabled", true);
	    	$('#editarMaterialECO').prop("disabled", true);
	    	$('#editarMedidasECO').prop("disabled", true);
	    	$('#editarEstadoECO').prop("disabled", true);

	    	$('#editarFacturaECO').removeClass('inputDanger');
	    	$('#editarImporteECO').removeClass('inputDanger');
	    	$('#editarDateFechaCompraECO').removeClass('inputDanger');
	    	$('#editarMarcaECO').removeClass('inputDanger');
	    	$('#editarModeloECO').removeClass('inputDanger');
	    	$('#EditarNumSerieECO').removeClass('inputDanger');
	    	$('#editarColorECO').removeClass('inputDanger');
	    	$('#editarMaterialECO').removeClass('inputDanger');
	    	$('#editarMedidasECO').removeClass('inputDanger');
	    	$('#editarEstadoECO').removeClass('inputDanger');


	    	$('#editarFacturaECO').removeClass('inputSuccess');
	    	$('#editarImporteECO').removeClass('inputSuccess');
	    	$('#editarDateFechaCompraECO').removeClass('inputSuccess');
	    	$('#editarMarcaECO').removeClass('inputSuccess');
	    	$('#editarModeloECO').removeClass('inputSuccess');
	    	$('#EditarNumSerieECO').removeClass('inputSuccess');
	    	$('#editarColorECO').removeClass('inputSuccess');
	    	$('#editarMaterialECO').removeClass('inputSuccess');
	    	$('#editarMedidasECO').removeClass('inputSuccess');
	    	$('#editarEstadoECO').removeClass('inputSuccess');

	    	$('.error1').text("");
	    	$('.error2').text("");
	    	$('.error7').text("");
	    	$('.error3').text("");
	    	$('.error4').text("");
	    	$('.error5').text("");

	    	$('#btnActualizarArticuloECO').prop("disabled", true);
			$('#btnActualizarArticuloECO').css("display","none");


		}
    	
    	
    });


 $('#editarColorECO').keyup(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });

 $('#editarMaterialECO').keyup(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });

 $('#editarMedidasECO').keyup(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });

  $('#editarEstadoECO').change(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });


