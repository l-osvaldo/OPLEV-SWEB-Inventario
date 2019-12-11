

$('#selectPartidaECOCat').change(function() {
	if ($(this).val() != 0 ){
		$('#instruccionLineaECOCat').css('display','block');
		$('#cargando').css('display','block');
		llenarTablePartidasCatECO($(this).val());
		obtenerLineaECOCat();
		// console.log($(this).val());
	} else {
		$('#instruccionLineaECOCat').css('display','none');
		$('#cargando').css('display','none');
		$('#divSelectLineaEcoCat').css('display','none');
		$('#divRespuestaECOcat').css('display','none');
	}

});

$('#selectLineaEcoCat').change(function() {
	if ($(this).val() != 0 ){
		$('#cargando').css('display','block');
		llenarTablePartidasLineasCatECO($(this).val());
	}
});

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