 
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
    	//console.log(response);


    	$.each(response, function(i, item) {
    		//console.log(item['partida 


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

    		if (item['fechacomp'] === '0'){
    			console.log('entre');
    			//$('#editarDateFechaCompra').val("2001-05-05");
    			//$('#editarDateFechaCompra').val("DD-MM-YYYY");
    			//$('#editarDateFechaCompra').val("YYYY-MM-DD");
    		}else{
    			$('#editarDateFechaCompra').val(item['fechacomp']);
    		}

    		
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
 });

 $('#editarMaterial').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

 $('#editarMedidas').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

  $('#editarEstado').change(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

 $('#btnActualizarArticulo').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
      title: "Actualización de Datos de este Artículo",
      text: "¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#E71096",
      confirmButtonText: "Sí",
      closeOnConfirm: false
  }, function(isConfirm){
      if (isConfirm) {
        form.submit();
      }else {
        swal("Error!", "Por favor intentelo de nuevo", "error");
      }
      
  });
});

 $("#editarImporte").maskMoney({
    // The symbol to be displayed before the value entered by the user
    prefix:'MXN$ ',
    // The suffix to be displayed after the value entered by the user(example: "1234.23 €").
    suffix: "",
    // Delay formatting of text field until focus leaves the field
    formatOnBlur: false,
    // Prevent users from inputing zero
    allowZero:false,
    // Prevent users from inputing negative values
    allowNegative:true,
    // Allow empty input values, so that when you delete the number it doesn't reset to 0.00.
    allowEmpty: false,
    // Select text in the input on double click
    doubleClickSelection: true,
    // Select all text in the input when the element fires the focus event.
    selectAllOnFocus: false,
    // The thousands separator
    thousands: ',',
    // The decimal separator
    decimal: '.' ,
    // How many decimal places are allowed
    precision: 2,
    // Set if the symbol will stay in the field after the user exits the field.
    affixesStay : false,
    // Place caret at the end of the input on focus
    bringCaretAtEndOnFocus: true
  });


