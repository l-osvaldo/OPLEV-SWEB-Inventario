/******************** Menu de reportes ***********************/
$('#selectReportes').change(function() {
	desactivarcampos();
	switch ($(this).val()){
		case '1':
			$('#divPartida').css("display","block");
			$('#segundaInstruccion').css("display","block");
			$('#instruccion').html('2.- Seleccione una partida:');
			break;
		case '2':
			$('#seleccionSelect').css("display","none");
			$('#segundaInstruccion').css("display","none");	
			importeBienesPorArea();
			break;
		case '3':		
			$('#seleccionSelect').css("display","none");
			$('#segundaInstruccion').css("display","none");
			importeBienesPorPartida();
			break;
		case '4':			
			$('#divArea').css("display","block");
			$('#segundaInstruccion').css("display","block");
			$('#instruccion').html('2.- Seleccione una partida:');
			break;
		case '5':
			$('#seleccionSelect').css("display","none");
			$('#segundaInstruccion').css("display","none");	
			inventarioPorOrdenAlfabetico();
			break;
		case '6':			
			$('#divEmpleado').css("display","block");
			$('#segundaInstruccion').css("display","block");
			$('#instruccion').html('2.- Seleccione una partida:');
			break;
	}
}); 

/******************** selección de partida, area y empleado ***********************/
$('#selectPartida').change(function(){
	if ($(this).val() != 0 ){		
		bienesPorPartida($(this).val());
		var partidaNumNombre = $(this).val().split('*');		

	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
	
});

$('#selectArea').change(function(){
	if ($(this).val() != 0 ){
		inventarioPorArea($(this).val());
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
	
});


$('#selectEmpleado').change(function(){
	if ($(this).val() != 0 ){
		ResguardoPorEmpleado($(this).val());
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
});

/******************** funcion para reiniciar los componentes ***********************/
function desactivarcampos(){

	$('#cargando').css("display","none");

	$('#selectPartida').val("0").change();
	$('#selectArea').val("0").change();
	$('#selectEmpleado').val("0").change();


	$('#seleccionSelect').css("display","block");

	$('#divPartida').css("display","none");
	$('#divArea').css("display","none");
	$('#divEmpleado').css("display","none");

	$('#btnGenerarPDF').css("display","none");

	
	$('#btnGenerarPDF').attr("href","");

	$('#divRespuesta').css("display","none");
}


/******************** Funciones ajax para la consulta de los reportes ***********************/
function bienesPorPartida(partida){

	$('#cargando').css("display","block");
	$('#divRespuesta').css("display","none");
	$('#btnGenerarPDF').css("display","none");

	var partidaNumNombre = partida.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "BienesXPartida",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numPartida: partidaNumNombre[0], nombrePartida: partidaNumNombre[1]},
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","/catalogos/reportes/BienesPorPartida/"+partidaNumNombre[0]+"/"+partidaNumNombre[1]);
    	    	
    });
}

function importeBienesPorArea(){

	$('#cargando').css("display","block");
	$('#divRespuesta').css("display","none");
	$('#btnGenerarPDF').css("display","none");

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "importeBienesPorArea",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","/catalogos/reportes/importeBienesPorAreaPDF");
    	    	
    });

}

function importeBienesPorPartida(){

	$('#cargando').css("display","block");
	$('#divRespuesta').css("display","none");
	$('#btnGenerarPDF').css("display","none");

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "importeBienesPorPartida",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","/catalogos/reportes/importeBienesPorPartidaPDF");
    	    	
    });

}

function inventarioPorArea(area){

	$('#cargando').css("display","block");
	$('#divRespuesta').css("display","none");
	$('#btnGenerarPDF').css("display","none");

	var areaNumNombre = area.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "inventarioPorArea",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numArea: areaNumNombre[0], nombreArea: areaNumNombre[1]},
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","/catalogos/reportes/inventarioPorAreaPDF/"+areaNumNombre[0]+"/"+areaNumNombre[1]);
    	    	
    });

} 


function inventarioPorOrdenAlfabetico(){

	$('#cargando').css("display","block");
	$('#divRespuesta').css("display","none");
	$('#btnGenerarPDF').css("display","none");

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "inventarioPorOrdenAlfabetico",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","/catalogos/reportes/inventarioPorOrdenAlfabeticoPDF");
    	    	
    });

}

function ResguardoPorEmpleado(empleado){

	$('#cargando').css("display","block");
	$('#divRespuesta').css("display","none");
	$('#btnGenerarPDF').css("display","none");

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
      url: "ResguardoPorEmpleado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numEmpleado: empleadoNumNombre[0], nombreEmpleado: empleadoNumNombre[1]},
      dataType: 'html',
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","/catalogos/reportes/ResguardoPorEmpleadoPDF/"+empleadoNumNombre[0]+"/"+empleadoNumNombre[1]);
    }); 

} 


