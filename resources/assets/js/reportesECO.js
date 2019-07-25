/******************** Menu de reportes ***********************/
$('#selectReportesECO').change(function() {
	desactivarcamposECO();
	switch ($(this).val()){
		case '1':
			$('#divPartidaECO').css("display","block");
			break;
		case '2':
			$('#seleccionSelectECO').css("display","none");	
			importeBienesPorAreaECO();
			break;
		case '3':		
			$('#seleccionSelectECO').css("display","none");
			importeBienesPorPartidaECO();
			break;
		case '4':			
			$('#divAreaECO').css("display","block");
			break;
		case '5':
			$('#seleccionSelectECO').css("display","none");	
			inventarioPorOrdenAlfabeticoECO();
			break;
		case '6':			
			$('#divEmpleadoECO').css("display","block");
			break;
	}
});

/******************** selección de partida, area y empleado ***********************/
$('#selectPartidaECO').change(function(){
	if ($(this).val() != 0 ){		
		bienesPorPartidaECO($(this).val());
		var partidaNumNombre = $(this).val().split('*');		

	}else{
		$('#btnGenerarPDFECO').css("display","none");
		$('#divRespuestaECO').css("display","none");
	}
	
});

$('#selectAreaECO').change(function(){
	if ($(this).val() != 0 ){
		inventarioPorAreaECO($(this).val());
	}else{
		$('#btnGenerarPDFECO').css("display","none");
		$('#divRespuestaECO').css("display","none");
	}
	
});


$('#selectEmpleadoECO').change(function(){
	if ($(this).val() != 0 ){
		ResguardoPorEmpleadoECO($(this).val());
	}else{
		$('#btnGenerarPDFECO').css("display","none");
		$('#divRespuestaECO').css("display","none");
	}
});

/******************** funcion para reiniciar los componentes ***********************/
function desactivarcamposECO(){

	$('#cargandoECO').css("display","none");

	$('#selectPartidaECO').val("0").change();
	$('#selectAreaECO').val("0").change();
	$('#selectEmpleadoECO').val("0").change();


	$('#seleccionSelectECO').css("display","block");

	$('#divPartidaECO').css("display","none");
	$('#divAreaECO').css("display","none");
	$('#divEmpleadoECO').css("display","none");

	$('#btnGenerarPDFECO').css("display","none");

	
	$('#btnGenerarPDFECO').attr("href","");

	$('#divRespuestaECO').css("display","none");
}

/******************** Funciones ajax para la consulta de los reportes ***********************/
function bienesPorPartidaECO(partida){

	$('#cargandoECO').css("display","block");
	$('#divRespuestaECO').css("display","none");
	$('#btnGenerarPDFECO').css("display","none");

	var partidaNumNombre = partida.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "BienesXPartidaECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numPartida: partidaNumNombre[0], nombrePartida: partidaNumNombre[1]},
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	$('#divRespuestaECO').css("display","block");
    	$('#respuestaReporteECO').html(response);
    	$('#cargandoECO').css("display","none");
    	$('#btnGenerarPDFECO').css("display","block");
    	$('#btnGenerarPDFECO').attr("href","/catalogos/reportes/BienesPorPartidaECO/"+partidaNumNombre[0]+"/"+partidaNumNombre[1]);
    	    	
    });
}

function importeBienesPorAreaECO(){

	$('#cargandoECO').css("display","block");
	$('#divRespuestaECO').css("display","none");
	$('#btnGenerarPDFECO').css("display","none");

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "importeBienesPorAreaECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuestaECO').css("display","block");
    	$('#respuestaReporteECO').html(response);
    	$('#cargandoECO').css("display","none");
    	$('#btnGenerarPDFECO').css("display","block");
    	$('#btnGenerarPDFECO').attr("href","/catalogos/reportes/importeBienesPorAreaPDFECO");
    	    	
    });

}

function importeBienesPorPartidaECO(){

	$('#cargandoECO').css("display","block");
	$('#divRespuestaECO').css("display","none");
	$('#btnGenerarPDFECO').css("display","none");

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "importeBienesPorPartidaECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuestaECO').css("display","block");
    	$('#respuestaReporteECO').html(response);
    	$('#cargandoECO').css("display","none");
    	$('#btnGenerarPDFECO').css("display","block");
    	$('#btnGenerarPDFECO').attr("href","/catalogos/reportes/importeBienesPorPartidaPDFECO");
    	    	
    });
 
}

function inventarioPorAreaECO(area){

	$('#cargandoECO').css("display","block");
	$('#divRespuestaECO').css("display","none");
	$('#btnGenerarPDFECO').css("display","none");

	var areaNumNombre = area.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "inventarioPorAreaECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numArea: areaNumNombre[0], nombreArea: areaNumNombre[1]},
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuestaECO').css("display","block");
    	$('#respuestaReporteECO').html(response);
    	$('#cargandoECO').css("display","none");
    	$('#btnGenerarPDFECO').css("display","block");
    	$('#btnGenerarPDFECO').attr("href","/catalogos/reportes/inventarioPorAreaPDFECO/"+areaNumNombre[0]+"/"+areaNumNombre[1]);
    	    	
    });

}

function inventarioPorOrdenAlfabeticoECO(){

	$('#cargandoECO').css("display","block");
	$('#divRespuestaECO').css("display","none");
	$('#btnGenerarPDFECO').css("display","none");

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "inventarioPorOrdenAlfabeticoECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuestaECO').css("display","block");
    	$('#respuestaReporteECO').html(response);
    	$('#cargandoECO').css("display","none");
    	$('#btnGenerarPDFECO').css("display","block");
    	$('#btnGenerarPDFECO').attr("href","/catalogos/reportes/inventarioPorOrdenAlfabeticoPDFECO");
    	    	
    });

}

function ResguardoPorEmpleadoECO(empleado){

	$('#cargandoECO').css("display","block");
	$('#divRespuestaECO').css("display","none");
	$('#btnGenerarPDFECO').css("display","none");

	var empleadoNumNombre = empleado.split('*');

	console.log(empleadoNumNombre);

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "ResguardoPorEmpleadoECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numEmpleado: empleadoNumNombre[0], nombreEmpleado: empleadoNumNombre[1]},
      dataType: 'html',
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuestaECO').css("display","block");
    	$('#respuestaReporteECO').html(response);
    	$('#cargandoECO').css("display","none");
    	$('#btnGenerarPDFECO').css("display","block");
    	$('#btnGenerarPDFECO').attr("href","/catalogos/reportes/ResguardoPorEmpleadoPDFECO/"+empleadoNumNombre[0]+"/"+empleadoNumNombre[1]);
    }); 

} 