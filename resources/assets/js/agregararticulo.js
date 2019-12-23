

/********************************** funciones para el modal de alta de nuevo bien de los artículos OPLE *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de partidas, manda a llamar a la funcion de filtroLineas, si el valor es el inicial reinicia el modal
    				llamando ala funcion reiniciarmodal 
    Parámetros: Valor del select 
    Retorna: No regresa nada

********************************************************************************** */


$('#partidaAltaArticulo').change(function() {
	if ($(this).val() != 0){

		var partidaCompleta = $(this).val().split('*');
		$('#lineaAltaArticulo').val("0").change();
		filtroLineas(partidaCompleta[0]);
		$('#lineaAltaArticulo').prop("disabled", false);

	}else{
		reiniciarmodal($(this).attr("id"));
	}
});

/* **********************************************************************************
    Funcionalidad: Obtiene todas las líneas de la partida solicitada y las presenta en un menu
    Parámetros: partida
    Retorna: todas las líneas de la partida solicitada

********************************************************************************** */

function filtroLineas(partida){
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

	    $('#lineaAltaArticulo').html(comboLineas);
    	
    });
}


/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de línea, si el valor deja de ser 0 manda a llamar la funcion filtroSublinea,
    				si el menú regresa a ser 0 manda a llamar la funcion reiniciarmodal
    Parámetros: valor del select de líneas
    Retorna: No regresa nada

********************************************************************************** */

$('#lineaAltaArticulo').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		$('#sublineaAltaArticulo').val("0").change();
		var lineaCompleta = $(this).val().split('*');
		filtroSublinea(lineaCompleta[0]);
		$('#sublineaAltaArticulo').prop("disabled", false);
	}else{
		reiniciarmodal($(this).attr("id"));
	}
});

/* **********************************************************************************
    Funcionalidad: Obtiene todas las sublíneas de la partida y línea solicitada y las presenta en un menu
    Parámetros: línea
    Retorna: todas las sublíneas de la partida y línea solicitada

********************************************************************************** */

function filtroSublinea(linea){

	var partidaCompleta = $('#partidaAltaArticulo').val().split('*');
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

        $('#sublineaAltaArticulo').html(comboSublineas);


      }); 
}

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de sublínea, si el valor deja de ser 0 manda a llamar la funcion generarNumeroInventario()
    				y cambia de estado los campos que no se pueden modficar a editables, si el menú regresa a ser 0 manda a llamar la funcion reiniciarmodal()
    Parámetros: valor del select de sublíneas
    Retorna: Hace que los campos con estado disabled se puedan modificar

********************************************************************************** */

$('#sublineaAltaArticulo').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		var lineaCompleta = 	$('#lineaAltaArticulo').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticulo').val().split('*');
		$('#txtConcepto').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		$('#txtConceptoEnv').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		
		$('#numberNumBienes').val("1");

		$('#numberNumBienes').prop("disabled", false);
		$('#txtFactura').prop("disabled", false);
		$('#txtImporte').prop("disabled", false);
		$('#txtMarca').prop("disabled", false);
		$('#txtModelo').prop("disabled", false);
		$('#txtNumSerie').prop("disabled", false);
		$('#txtColor').prop("disabled", false);
		$('#txtMaterial').prop("disabled", false);
		$('#txtMedidas').prop("disabled", false);
		$('#dateFechaCompra').prop("disabled", false);

		generarNumeroInventario($('#numberNumBienes').val());
	}else{
		reiniciarmodal($(this).attr("id"));
	}
});

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio del selector de número de bienes a registrar, manda a llamar a la función generarNumeroInventario 
    Parámetros: valor del select de cantidad de bienes
    Retorna: No regresa nada 

********************************************************************************** */

$('#numberNumBienes').change(function(){
	// console.log($(this).val());
	generarNumeroInventario($(this).val());
	setTimeout(generarNumeroInventario($(this).val()),2500);
});

/* **********************************************************************************
    Funcionalidad: Genera los número de inventarios que se le asignarán a los artículos registrados
    Parámetros: cantidad de artículos a registrar
    Retorna: los numeros de inventarios que serán registrados

********************************************************************************** */

function generarNumeroInventario(cantidadArticulos){

	if (cantidadArticulos > 0){
		//console.log(cantidadArticulos);
	
		var partidaCompleta = 	$('#partidaAltaArticulo').val().split('*');
		var lineaCompleta = 	$('#lineaAltaArticulo').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticulo').val().split('*');

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
	      url: "numeroInventario",
	      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	      type: 'GET',
	      data: {partida: partida , linea: linea, sublinea: sublinea },
	      dataType: 'json',
	      contentType: 'application/json'
	      }).done(function(response) {
	      	//console.log(response);
	      	
	      	var identificador = 0;
	      	if (cantidadArticulos > 1){
	      		$('#lblNumInv').html('Números de Inventario');
	      	}else{
	      		$('#lblNumInv').html('Número de Inventario');
	      	}

	      	for (var i = 1 ; i <= cantidadArticulos ; i++) {
	      		numInv += 'OPLEV-'+ partida + '-' + linea + '-' + sublinea + '-';
	      		var base = 'OPLEV-'+ partida + '-' + linea + '-' + sublinea + '-';
	      		identificador = parseInt(response)+i;
	      		identificador = ( identificador < 10) ? '000'+identificador : ( identificador < 100 ) ? '00'+identificador : ( identificador < 1000 ) ? '0'+identificador : identificador;
	      		consecutivo[i-1]=identificador;
	      		arregloNumInv[i-1]= base + identificador;
	      		numInv += identificador + '\n';
	      	}     	
	      	$('#txtConsecutivo').val(consecutivo);
	      	$('#txtArregloNumInv').val(arregloNumInv);
	      	$('#txtaNumInv').val(numInv);      	
	      }); 
	  }else{
	  	$('#numberNumBienes').val("1");
	  	generarNumeroInventario(1);
	  } 

	
}

/* **********************************************************************************
    Funcionalidad: El modal esta validado, si el valor del selector de partida cambia a cero, todo los valores del formulario del registro vuelven a su estado original,
    				si es el de línea el que vuelve a cero, se reinicia todo excepto el selector de partidas, de igual forma si el valor del selector de sublineas cambia a cero
    				se reinicia el modal excepto los selectores de partidas y líneas
    Parámetros: campo, desde donde se reiniciara el modal, partidas, lineas o sublineas 
    Retorna: No regresa nada

********************************************************************************** */

function reiniciarmodal(campo){
	switch(campo){
		case 'partidaAltaArticulo':
			$('#lineaAltaArticulo').prop("disabled", true);
			$('#lineaAltaArticulo').val("0").change();
		break;
		case 'lineaAltaArticulo':
			$('#sublineaAltaArticulo').prop("disabled", true);
			$('#sublineaAltaArticulo').val("0").change();
		break;
		case 'sublineaAltaArticulo':
			$('#numberNumBienes').prop("disabled", true);
			$('#numberNumBienes').val("1");
			$('#txtaNumInv').val("");
			$('#txtConcepto').val("");
			$('#txtFactura').val("");
			$('#txtImporte').val("");
			$('#txtMarca').val("");
			$('#txtModelo').val("");
			$('#txtNumSerie').val("");
			$('#txtColor').val("");
			$('#txtMaterial').val("");
			$('#txtMedidas').val("");
			$('#dateFechaCompra').val("");


			$('#txtFactura').prop("disabled", true);
			$('#txtImporte').prop("disabled", true);
			$('#txtMarca').prop("disabled", true);
			$('#txtModelo').prop("disabled", true);
			$('#txtNumSerie').prop("disabled", true);
			$('#txtColor').prop("disabled", true);
			$('#txtMaterial').prop("disabled", true);
			$('#txtMedidas').prop("disabled", true);
			$('#dateFechaCompra').prop("disabled", true);


			$('.error1').text("");
			$('.error2').text("");
			$('.error3').text("");
			$('.error4').text("");
			$('.error5').text("");
			$('.error7').text("");

			$('#txtFactura').attr("data-validacionArticulo", '1');
			$('#txtImporte').attr("data-validacionArticulo", '1');
			$('#txtMarca').attr("data-validacionArticulo", '1');
			$('#txtModelo').attr("data-validacionArticulo", '1');
			$('#txtNumSerie').attr("data-validacionArticulo", '1');
			$('#dateFechaCompra').attr("data-validacionArticulo", '1');

			$('#txtFactura').removeClass('inputDanger');
			$('#txtImporte').removeClass('inputDanger');
			$('#txtMarca').removeClass('inputDanger');
			$('#txtModelo').removeClass('inputDanger');
			$('#txtNumSerie').removeClass('inputDanger');
			$('#dateFechaCompra').removeClass('inputDanger');

			$('#txtFactura').removeClass('inputSuccess');
			$('#txtImporte').removeClass('inputSuccess');
			$('#txtMarca').removeClass('inputSuccess');
			$('#txtModelo').removeClass('inputSuccess');
			$('#txtNumSerie').removeClass('inputSuccess');
			$('#dateFechaCompra').removeClass('inputSuccess')
		break;

	}
};

/* **********************************************************************************
    Funcionalidad: Espera que el usuario de click sobre el boton de guardar artículo, esta función 
    				lanza un alerta de confirmación para registrar los artículos
    Parámetros: Los valores del formulario de registro de un nuevo bien 
    Retorna: No regresa nada

********************************************************************************** */

$('#btnGuardarArticulo').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro(s) de Articulo(s)",
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

$('#altasModal').on('hidden.bs.modal', function (e) {
  //reiniciarmodal('partidaAltaArticulo');
  $('#partidaAltaArticulo').val("0").change();
});


/* **********************************************************************************

    Funcionalidad: Mascara para el campo de precio unitario, esta función hace que se muestre siempre un prefijo en el campo, antes del valor se muestra 'MXN$ '
    Parámetros: no recibe parámetros
    Retorna: Una mascara para el campo de texto de precio unitario, se muestra siempre un prefijo antes de la cantidad 'MXN$ '

********************************************************************************** */

$("#txtImporte").maskMoney({
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



