
/********************************** funciones para el modal de alta de nuevo bien de los artículos ECO *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de partidas, manda a llamar a la funcion de filtroLineasECO, si el valor es el inicial reinicia el modal
    				llamando ala funcion reiniciarmodalECO 
    Parámetros: Valor del select 
    Retorna: No regresa nada

********************************************************************************** */
$('#partidaAltaArticuloECO').change(function() {
	if ($(this).val() != 0){

		var partidaCompleta = $(this).val().split('*');
		$('#lineaAltaArticuloECO').val("0").change();
		filtroLineasECO(partidaCompleta[0]);
		$('#lineaAltaArticuloECO').prop("disabled", false);

	}else{
		reiniciarmodalECO($(this).attr("id"));
	}
});


/* **********************************************************************************
    Funcionalidad: Obtiene todas las líneas de la partida solicitada y las presenta en un menu
    Parámetros: partida
    Retorna: todas las líneas de la partida solicitada

********************************************************************************** */

function filtroLineasECO(partida){
	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "obtenLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
    }).done(function(response) {

    	//console.log(response);

    	comboLineas = "<option value='0'>Línea</option>";
	    $.each(response, function(index, value){
	    	var cadena = value['linea'] + " - " + value['desclinea'];
	        comboLineas += "<option value='"+value['linea']+"*"+value['desclinea']+"'>"+ cadena +"</option>";
	    });

	    $('#lineaAltaArticuloECO').html(comboLineas);
    	
    });
}


/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de línea, si el valor deja de ser 0 manda a llamar la funcion filtroSublineaECO(),
    				si el menú regresa a ser 0 manda a llamar la funcion reiniciarmodalECO()
    Parámetros: valor del select de líneas
    Retorna: No regresa nada

********************************************************************************** */

$('#lineaAltaArticuloECO').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		$('#sublineaAltaArticuloECO').val("0").change();
		var lineaCompleta = $(this).val().split('*');
		filtroSublineaECO(lineaCompleta[0]);
		$('#sublineaAltaArticuloECO').prop("disabled", false);
	}else{
		reiniciarmodalECO($(this).attr("id"));
	}
});

/* **********************************************************************************
    Funcionalidad: Obtiene todas las sublíneas de la partida y línea solicitada y las presenta en un menu
    Parámetros: línea
    Retorna: todas las sublíneas de la partida y línea solicitada

********************************************************************************** */

function filtroSublineaECO(linea){

	var partidaCompleta = $('#partidaAltaArticuloECO').val().split('*');
	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$.ajax({
      url: "obtenSublineas2",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partidaCompleta[0], linea:linea},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
      	//console.log(response);

      	comboSublineas = "<option value='0'>Sublinea</option>";

      	$.each(response, function(index, value){
	    	var cadena = value['sublinea'] + " - " + value['descsub'];
	        comboSublineas += "<option value='"+value['sublinea']+"*"+value['descsub']+"'>"+ cadena +"</option>";
	    });

        $('#sublineaAltaArticuloECO').html(comboSublineas);


      }); 
}

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de sublínea, si el valor deja de ser 0 manda a llamar la funcion generarNumeroInventarioECO()
    				y cambia de estado los campos que no se pueden modficar a editables, si el menú regresa a ser 0 manda a llamar la funcion reiniciarmodalECO()
    Parámetros: valor del select de sublíneas
    Retorna: Hace que los campos con estado disabled se puedan modificar

********************************************************************************** */

$('#sublineaAltaArticuloECO').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		var lineaCompleta = 	$('#lineaAltaArticuloECO').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticuloECO').val().split('*');
		$('#txtConceptoECO').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		$('#txtConceptoEnvECO').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		
		$('#numberNumBienesECO').val("1");

		$('#numberNumBienesECO').prop("disabled", false);
		$('#txtFacturaECO').prop("disabled", false);
		$('#txtImporteECO').prop("disabled", false);
		$('#txtMarcaECO').prop("disabled", false);
		$('#txtModeloECO').prop("disabled", false);
		$('#txtNumSerieECO').prop("disabled", false);
		$('#txtColorECO').prop("disabled", false);
		$('#txtMaterialECO').prop("disabled", false);
		$('#txtMedidasECO').prop("disabled", false);
		$('#dateFechaCompraECO').prop("disabled", false);

		generarNumeroInventarioECO($('#numberNumBienesECO').val());
	}else{
		reiniciarmodalECO($(this).attr("id"));
	}
});

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio del selector de número de bienes a registrar, manda a llamar a la función generarNumeroInventarioECO 
    Parámetros: valor del select de cantidad de bienes
    Retorna: No regresa nada 

********************************************************************************** */

$('#numberNumBienesECO').change(function(){
	generarNumeroInventarioECO($(this).val());
	setTimeout(generarNumeroInventarioECO($(this).val()),2500);
});

/* **********************************************************************************
    Funcionalidad: Genera los número de inventarios que se le asignarán a los artículos registrados
    Parámetros: cantidad de artículos a registrar
    Retorna: los numeros de inventarios que serán registrados

********************************************************************************** */

function generarNumeroInventarioECO(cantidadArticulos){

	if (cantidadArticulos > 0){
		//console.log(cantidadArticulos);
	
		var partidaCompleta = 	$('#partidaAltaArticuloECO').val().split('*');
		var lineaCompleta = 	$('#lineaAltaArticuloECO').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticuloECO').val().split('*');

		var partida = 	partidaCompleta[0];
		var linea = 	lineaCompleta[0];
		var sublinea = 	sublineaCompleta[0];

		var numInv = '';

		var consecutivo = [];
		var arregloNumInv = [];

		$.ajaxSetup(
		{
			headers:
			{ 
	    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
	      url: "numeroInventarioECO",
	      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	      type: 'GET',
	      data: {partida: partida , linea: linea, sublinea: sublinea },
	      dataType: 'json',
	      contentType: 'application/json'
	      }).done(function(response) {
	      	//console.log(response);
	      	
	      	var identificador = 0;
	      	if (cantidadArticulos > 1){
	      		$('#lblNumInvECO').html('Números de Inventario');
	      	}else{
	      		$('#lblNumInvECO').html('Número de Inventario');
	      	}

	      	for (var i = 1 ; i <= cantidadArticulos ; i++) {
	      		numInv += 'ECO-'+ partida + '-' + linea + '-' + sublinea + '-';
	      		var base = 'ECO-'+ partida + '-' + linea + '-' + sublinea + '-';
	      		identificador = parseInt(response)+i;
	      		identificador = ( identificador < 10) ? '000'+identificador : ( identificador < 100 ) ? '00'+identificador : ( identificador < 1000 ) ? '0'+identificador : identificador;
	      		consecutivo[i-1]=identificador;
	      		arregloNumInv[i-1]= base + identificador;
	      		numInv += identificador + '\n';
	      	}     	
	      	$('#txtConsecutivoECO').val(consecutivo);
	      	$('#txtArregloNumInvECO').val(arregloNumInv);
	      	$('#txtaNumInvECO').val(numInv);      	
	      }); 
	  }else{
	  	$('#numberNumBienesECO').val("1");
	  	generarNumeroInventarioECO(1);
	  }

}


/* **********************************************************************************
    Funcionalidad: El modal esta validado, si el valor del selector de partida cambia a cero, todo los valores del formulario del registro vuelven a su estado original,
    				si es el de línea el que vuelve a cero, se reinicia todo excepto el selector de partidas, de igual forma si el valor del selector de sublineas cambia a cero
    				se reinicia el modal excepto los selectores de partidas y líneas
    Parámetros: campo, desde donde se reiniciara el modal, partidas, lineas o sublineas 
    Retorna: No regresa nada

********************************************************************************** */

function reiniciarmodalECO(campo){
	switch(campo){
		case 'partidaAltaArticuloECO':
			$('#lineaAltaArticuloECO').prop("disabled", true);
			$('#lineaAltaArticuloECO').val("0").change();
		break;
		case 'lineaAltaArticuloECO':
			$('#sublineaAltaArticuloECO').prop("disabled", true);
			$('#sublineaAltaArticuloECO').val("0").change();
		break;
		case 'sublineaAltaArticuloECO':
			$('#numberNumBienesECO').prop("disabled", true);
			$('#numberNumBienesECO').val("1");
			$('#txtaNumInvECO').val("");
			$('#txtConceptoECO').val("");
			$('#txtFacturaECO').val("");
			$('#txtImporteECO').val("");
			$('#txtMarcaECO').val("");
			$('#txtModeloECO').val("");
			$('#txtNumSerieECO').val("");
			$('#txtColorECO').val("");
			$('#txtMaterialECO').val("");
			$('#txtMedidasECO').val("");
			$('#dateFechaCompraECO').val("");


			$('#txtFacturaECO').prop("disabled", true);
			$('#txtImporteECO').prop("disabled", true);
			$('#txtMarcaECO').prop("disabled", true);
			$('#txtModeloECO').prop("disabled", true);
			$('#txtNumSerieECO').prop("disabled", true);
			$('#txtColorECO').prop("disabled", true);
			$('#txtMaterialECO').prop("disabled", true);
			$('#txtMedidasECO').prop("disabled", true);
			$('#dateFechaCompraECO').prop("disabled", true);


			$('.error1').text("");
			$('.error2').text("");
			$('.error3').text("");
			$('.error4').text("");
			$('.error5').text("");
			$('.error7').text("");

			$('#txtFacturaECO').attr("data-validacionArticulo", '1');
			$('#txtImporteECO').attr("data-validacionArticulo", '1');
			$('#txtMarcaECO').attr("data-validacionArticulo", '1');
			$('#txtModeloECO').attr("data-validacionArticulo", '1');
			$('#txtNumSerieECO').attr("data-validacionArticulo", '1');
			$('#dateFechaCompraECO').attr("data-validacionArticulo", '1');

			$('#txtFacturaECO').removeClass('inputDanger');
			$('#txtImporteECO').removeClass('inputDanger');
			$('#txtMarcaECO').removeClass('inputDanger');
			$('#txtModeloECO').removeClass('inputDanger');
			$('#txtNumSerieECO').removeClass('inputDanger');
			$('#dateFechaCompraECO').removeClass('inputDanger');

			$('#txtFacturaECO').removeClass('inputSuccess');
			$('#txtImporteECO').removeClass('inputSuccess');
			$('#txtMarcaECO').removeClass('inputSuccess');
			$('#txtModeloECO').removeClass('inputSuccess');
			$('#txtNumSerieECO').removeClass('inputSuccess');
			$('#dateFechaCompraECO').removeClass('inputSuccess')
		break;

	}
}

/* **********************************************************************************
    Funcionalidad: Espera que el usuario de click sobre el boton de guardar artículo, esta función 
    				lanza un alerta de confirmación para registrar los artículos
    Parámetros: Los valores del formulario de registro de un nuevo bien 
    Retorna: No regresa nada

********************************************************************************** */

$('#btnGuardarArticuloECO').on('click',function(e){
 e.preventDefault();
 var form = $(this).parents('form');
 swal({
     title: "Registro(s) de Articulo(s) ECO",
     text: "¿Desea continuar?",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#E71096",
     confirmButtonText: "Sí",
     closeOnConfirm: false
 }, function(isConfirm){
     if (isConfirm) form.submit();
 });
});

/* **********************************************************************************

    Funcionalidad: Función que espera que el usuario presione el boton de cancelar o cierre el modal a traves de la x que esta en la parte superior izquierda del modal,
    				esto desaparece el modal y cambio el valor de la partida a cero, esto automaticamente reinicia todos los valores del modal a los valores iniciales
    Parámetros: no recibe parámetros
    Retorna: Cancela el modal

********************************************************************************** */

$('#altasECOModal').on('hidden.bs.modal', function (e) {
  //reiniciarmodal('partidaAltaArticulo');
  $('#partidaAltaArticuloECO').val("0").change();
});

/* **********************************************************************************

    Funcionalidad: Mascara para el campo de precio unitario, esta función hace que se muestre siempre un prefijo en el campo, antes del valor se muestra 'MXN$ '
    Parámetros: no recibe parámetros
    Retorna: Una mascara para el campo de texto de precio unitario, se muestra siempre un prefijo antes de la cantidad 'MXN$ '

********************************************************************************** */

$("#txtImporteECO").maskMoney({
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

