 
 function abrirModalEditar(numInventario) {

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
    	console.log(response);


    	$.each(response, function(i, item) {
    		console.log(item['partida']);

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


		});

    	$('#editarModal').modal('show'); 
    	    	
    });


    $('#activarEditar').change(function(){
    	
    	
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
    });

 	
 }