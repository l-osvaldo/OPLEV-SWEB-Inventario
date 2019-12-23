

/********************************** funciones para el modal de bienes ECO, filtros para la presentación de los bienes *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de partidas, si su valor cambia diferente a cero y la partida es diferente a la 51100001 muestra los bienes de esa partida, 
    				mandando a llamar la función llenarTablePartidasCatECO() y obtiene las líneas de esa partida mediante la función obtenerLineaECOCat(), si la partida es la 51100001
    				solo obtiene las líneas por la función obtenerLineaECOCat(), ya que esta partida cuenta con muchos bienes, se debe seleccionar también la línea para mostrar sus bienes, 
    				si el valor regresa a cero, oculta los bienes y las líneas
    Parámetros: Valor del select 
    Retorna: Un selector con las líneas de la partida, los bienes de la partida 

********************************************************************************** */

$('#selectPartidaECOCat').change(function() {
	if ($(this).val() != 0 ){
		
		var partidaNumNombre = $(this).val().split('*');
		if (partidaNumNombre[0] === '51100001'){
			console.log($(this).val());
			$('#instruccionLineaECOCat').css('display','block');
			$('#labelInstruciionECOcat').html('2.- Seleccione un línea:');
			$('#divRespuestaECOcat').css('display','none');
			obtenerLineaECOCat();

		}else{
			$('#instruccionLineaECOCat').css('display','block');
			$('#labelInstruciionECOcat').html('2.- Seleccione un línea (Opcional):');
			$('#cargando').css('display','block');
			llenarTablePartidasCatECO($(this).val());
			obtenerLineaECOCat();
		} 

		
		
	} else {
		$('#instruccionLineaECOCat').css('display','none');
		$('#cargando').css('display','none');
		$('#divSelectLineaEcoCat').css('display','none');
		$('#divRespuestaECOcat').css('display','none');
	}

});


/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el selector de línea para mandar a llamar la función llenarTablePartidasLineasCatECO(), este selector es un segundo filtro 
    				para mostrar los bienes de una partida
    Parámetros: Valor del select 
    Retorna: Los bienes de la partia y línea selecionada

********************************************************************************** */

$('#selectLineaEcoCat').change(function() {
	if ($(this).val() != 0 ){
		$('#cargando').css('display','block');
		llenarTablePartidasLineasCatECO($(this).val());
	}else{
		var partidaNumNombre = $('#selectPartidaECOCat').val().split('*');
		if (partidaNumNombre[0] === '51100001'){
			$('#divRespuestaECOcat').css('display','none');
		}else{
			llenarTablePartidasCatECO($('#selectPartidaECOCat').val());
		}
	}
});

/* **********************************************************************************
    Funcionalidad: Obtiene todos bienes ECO de una partida seleccionada
    Parámetros: partida
    Retorna: Un html con un datatable con los bienes de una partida

********************************************************************************** */

function llenarTablePartidasCatECO(partida){
	// console.log(partida);

	var partidaNumNombre = partida.split('*');  

    $.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "llenarTablePartidasCat",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partidaNumNombre[0], nombrePartida: partidaNumNombre[1]},
      dataType: 'html',
      contentType: 'application/json'
    }).done(function(response) {

    	// console.log(response);
    	$('#cargando').css('display','none');
    	$('#divRespuestaECOcat').css('display','block');
    	$('#respuestaReporteECOcat').html(response);	

    });
}

/* **********************************************************************************
    Funcionalidad: Obtiene todas las líneas de una partida seleccionada
    Parámetros: partida
    Retorna: Un selector con todas las líneas de una partida seleccionda

********************************************************************************** */

function obtenerLineaECOCat(){

	var partidaNumNombre = $('#selectPartidaECOCat').val().split('*'); 

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
      data: {partida: partidaNumNombre[0]},
      dataType: 'json',
      contentType: 'application/json'
    }).done(function(response) {

    	// console.log(response);
    	lineas = "<option value='0'>Selecciona una Línea</option>";
	  	$.each(response, function(index, value){
	    	var cadena = value['linea'] + " | " + value['desclinea'];
	    	lineas += "<option value='"+value['linea']+"*"+value['desclinea']+"'>"+ cadena +"</option>";
	  	});

	  	$('#selectLineaEcoCat').html(lineas);
	  	$('#selectLineaEcoCat').val("0").change(); 
	  	$('#divSelectLineaEcoCat').css('display','block');
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene todos bienes ECO de una partida y una línea seleccionada
    Parámetros: partida y línea
    Retorna: Un html con un datatable con los bienes de una partida y una línea seleccionada

********************************************************************************** */

function llenarTablePartidasLineasCatECO(linea){

	var partidaNumNombre = $('#selectPartidaECOCat').val().split('*');
	var lineaNumNombre = linea.split('*');      

    $.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "llenarTablePartidasLineasCatECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partidaNumNombre[0], nombrePartida: partidaNumNombre[1], linea: lineaNumNombre[0], nombreLinea: lineaNumNombre[1]},
      dataType: 'html',
      contentType: 'application/json'
    }).done(function(response) {

    	// console.log(response);
    	$('#cargando').css('display','none');
    	$('#divRespuestaECOcat').css('display','block');
    	$('#respuestaReporteECOcat').html(response);	

    });
}