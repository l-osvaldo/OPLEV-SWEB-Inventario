 
/********************************** funciones para el modal de editar un artículo ECO *******************************************************/

/* **********************************************************************************
    Funcionalidad: Obtiene toda la información de un bien y la mustra en un modal, con la opción de editar 
            ciertos campos de este como: factura, precio, fecha de compra, marca, modelo, número de serie,
            color, material, medidas y estado
    Parámetros: numero de inventario  
    Retorna: Modal de editar

********************************************************************************** */
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

 /* **********************************************************************************
    Funcionalidad: Función que cierra el modal de editar y regresa a sus valores predeterminados todos los 
            campos editables
    Parámetros: No recibe parámetros 
    Retorna: Cerrar modal

********************************************************************************** */

$('#editarECOModal').on('hidden.bs.modal', function (e) {
  $('#activarEditarECO').prop("checked", false).change();
});

/* **********************************************************************************
    Funcionalidad: Obtiene el valor de un check, que el usuario activa o no para editar alguna información del bien
    Parámetros: No recibe parámetros 
    Retorna: Activa o desactiva los campos editables

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en el campo de editar color,
             comienza a validar el campo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

 $('#editarColorECO').keyup(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });

  /* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en el campo de editar material,
             comienza a validar el campo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

 $('#editarMaterialECO').keyup(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });

  /* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en el campo de editar Medidas,
             comienza a validar el campo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

 $('#editarMedidasECO').keyup(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });

 /* **********************************************************************************
    Funcionalidad: Obtiene el valor del selector de estado
    Parámetros: El valor del selector de estado
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

  $('#editarEstadoECO').change(function(){
 	$('#btnActualizarArticuloECO').prop("disabled", false);
	$('#btnActualizarArticuloECO').css("display","block");
 });


/* **********************************************************************************
    Funcionalidad: Alerta de confirmación para la actualización de los campos de un bien
    Parámetros: Formulario de los datos que se pueden actualizar
    Retorna: Alerta de confirmación cpn el mensaje "Actualización de Datos de este Artículo ECO"

********************************************************************************** */

$('#btnActualizarArticuloECO').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
      title: "Actualización de Datos de este Artículo ECO",
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

/* **********************************************************************************

    Funcionalidad: Mascara para el campo de precio unitario, esta función hace que se muestre siempre un prefijo en el campo, antes del valor se muestra 'MXN$ '
    Parámetros: no recibe parámetros
    Retorna: Una mascara para el campo de texto de precio unitario, se muestra siempre un prefijo antes de la cantidad 'MXN$ '

********************************************************************************** */

$("#editarImporteECO").maskMoney({
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




