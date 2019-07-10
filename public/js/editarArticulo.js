 
 function abrirModalEditar(numInventario) {

 	$('#editarDateFechaCompra').val("0");
 	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "InformacionArticulo",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numInventario: numInventario },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);


    	$.each(response, function(i, item) {
    		//console.log(item['partida']);



    		$('#editarPartida').html(item['partida']);
    		$('#editarLinea').html(item['linea']);
    		$('#editarSublinea').html(item['sublinea']);

    		$('#editarPartidaN').html(item['descpartida']);
    		$('#editarLineaN').html(item['desclinea']);
    		$('#editarSublineaN').html(item['descsublinea']);

    		$('#editarNoInventario').html(item['numeroinv']);
    		$('#editarConcepto').html(item['concepto']); 
    		$('#editarResponsable').html(item['nombreemple']); 
    		$('#editarArea').html(item['nombrearea']); 

    		$('#editarFactura').val(item['factura']);
    		$('#editarImporte').val(item['importe']);


    		$('#editarDateFechaCompra').val(item['fechacomp']);
    		$('#editarMarca').val(item['marca']);
    		$('#editarModelo').val(item['modelo']);
    		$('#EditarNumSerie').val(item['numserie']);
    		$('#editarColor').val(item['colores']);
    		$('#editarMaterial').val(item['material']);
    		$('#editarMedidas').val(item['medidas']);
    		$('#editarEstado').val(item['clvestado']).change();

    		$('#numeroInventario').val(numInventario);

    		$('#btnActualizarArticulo').prop("disabled", true);
			$('#btnActualizarArticulo').css("display","none");


		});
    	$('#editarModal').modal('show');     	    	
    }); 	
 }

$('#editarModal').on('hidden.bs.modal', function (e) {
  $('#activarEditar').prop("checked", false).change();

})

 $('#activarEditar').change(function(){
    	if( $('#activarEditar').is(':checked') ) {
		    $('#editarFactura').prop("disabled", false);
	    	$('#editarImporte').prop("disabled", false);
	    	$('#editarDateFechaCompra').prop("disabled", false);
	    	$('#editarMarca').prop("disabled", false);
	    	$('#editarModelo').prop("disabled", false);
	    	$('#EditarNumSerie').prop("disabled", false);
	    	$('#editarColor').prop("disabled", false);
	    	$('#editarMaterial').prop("disabled", false);
	    	$('#editarMedidas').prop("disabled", false);
	    	$('#editarEstado').prop("disabled", false);


	    	$('#editarFactura').removeClass('inputDanger');
	    	$('#editarImporte').removeClass('inputDanger');
	    	$('#editarDateFechaCompra').removeClass('inputDanger');
	    	$('#editarMarca').removeClass('inputDanger');
	    	$('#editarModelo').removeClass('inputDanger');
	    	$('#EditarNumSerie').removeClass('inputDanger');
	    	$('#editarColor').removeClass('inputDanger');
	    	$('#editarMaterial').removeClass('inputDanger');
	    	$('#editarMedidas').removeClass('inputDanger');
	    	$('#editarEstado').removeClass('inputDanger');


	    	$('#editarFactura').addClass('inputSuccess');
	    	$('#editarImporte').addClass('inputSuccess');
	    	$('#editarDateFechaCompra').addClass('inputSuccess');
	    	$('#editarMarca').addClass('inputSuccess');
	    	$('#editarModelo').addClass('inputSuccess');
	    	$('#EditarNumSerie').addClass('inputSuccess');
	    	$('#editarColor').addClass('inputSuccess');
	    	$('#editarMaterial').addClass('inputSuccess');
	    	$('#editarMedidas').addClass('inputSuccess');
	    	$('#editarEstado').addClass('inputSuccess');
		}else{
			$('#editarFactura').prop("disabled", true);
	    	$('#editarImporte').prop("disabled", true);
	    	$('#editarDateFechaCompra').prop("disabled", true);
	    	$('#editarMarca').prop("disabled", true);
	    	$('#editarModelo').prop("disabled", true);
	    	$('#EditarNumSerie').prop("disabled", true);
	    	$('#editarColor').prop("disabled", true);
	    	$('#editarMaterial').prop("disabled", true);
	    	$('#editarMedidas').prop("disabled", true);
	    	$('#editarEstado').prop("disabled", true);

	    	$('#editarFactura').removeClass('inputDanger');
	    	$('#editarImporte').removeClass('inputDanger');
	    	$('#editarDateFechaCompra').removeClass('inputDanger');
	    	$('#editarMarca').removeClass('inputDanger');
	    	$('#editarModelo').removeClass('inputDanger');
	    	$('#EditarNumSerie').removeClass('inputDanger');
	    	$('#editarColor').removeClass('inputDanger');
	    	$('#editarMaterial').removeClass('inputDanger');
	    	$('#editarMedidas').removeClass('inputDanger');
	    	$('#editarEstado').removeClass('inputDanger');


	    	$('#editarFactura').removeClass('inputSuccess');
	    	$('#editarImporte').removeClass('inputSuccess');
	    	$('#editarDateFechaCompra').removeClass('inputSuccess');
	    	$('#editarMarca').removeClass('inputSuccess');
	    	$('#editarModelo').removeClass('inputSuccess');
	    	$('#EditarNumSerie').removeClass('inputSuccess');
	    	$('#editarColor').removeClass('inputSuccess');
	    	$('#editarMaterial').removeClass('inputSuccess');
	    	$('#editarMedidas').removeClass('inputSuccess');
	    	$('#editarEstado').removeClass('inputSuccess');

	    	$('.error1').text("");
	    	$('.error2').text("");
	    	$('.error7').text("");
	    	$('.error3').text("");
	    	$('.error4').text("");
	    	$('.error5').text("");

	    	$('#btnActualizarArticulo').prop("disabled", true);
			$('#btnActualizarArticulo').css("display","none");


		}
    	
    	
    });


 $('#editarColor').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 })

 $('#editarMaterial').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 })

 $('#editarMedidas').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 })

  $('#editarEstado').change(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 })