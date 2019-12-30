
/********************************** funciones para el módulo de reportes OPLE *******************************************************/

/* **********************************************************************************
    Funcionalidad: Obtiene el reporte seleccionado por el usuario y de acuerdo al valor toma una opción de reporte,
    				algunos reportes deben seleccionar otra opción, como la partida, línea o empleado, otros solo
    				seleccionando el reporte
    Parámetros: Valor del selector de reporte 
    Retorna: No regresa nada

********************************************************************************** */

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
			$('#instruccion').html('2.- Seleccione una área:');
			break;
		case '5':
			$('#seleccionSelect').css("display","none");
			$('#segundaInstruccion').css("display","none");	
			inventarioPorOrdenAlfabetico();
			break;
		case '6':			
			$('#divEmpleado').css("display","block");
			$('#segundaInstruccion').css("display","block");
			$('#instruccion').html('2.- Seleccione un empleado:');
			break;
		case '7':
			$('#divAnioAdquisicion').css("display","block");
			$('#segundaInstruccion').css("display","block");
			$('#instruccion').html('2.- Seleccione un año:');
			break;
		case '8':
			$('#divAreaR8').css("display","block");
			$('#segundaInstruccion').css("display","block");
			$('#instruccion').html('2.- Seleccione una área:');
			break;
		case '9':
			$('#seleccionSelect').css("display","none");
			$('#segundaInstruccion').css("display","none");
			inventarioPorOrdenAlfabeticoNuevo();	
			break;
	}
}); 

/******************** selección de partida, area y empleado ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene la partida del selector para obtener el reporte requerido
    Parámetros: Valor del selector de partida
    Retorna: No regresa nada

********************************************************************************** */
$('#selectPartida').change(function(){
	if ($(this).val() != 0 ){		
		bienesPorPartida($(this).val());
		var partidaNumNombre = $(this).val().split('*');		

	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
	
});

/* **********************************************************************************
    Funcionalidad: Obtiene el área del selector para obtener el reporte requerido
    Parámetros: Valor del selector de área
    Retorna: No regresa nada

********************************************************************************** */

$('#selectArea').change(function(){
	if ($(this).val() != 0 ){
		inventarioPorArea($(this).val());
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
	
});

/* **********************************************************************************
    Funcionalidad: Obtiene el empleado del selector para obtener el reporte requerido
    Parámetros: Valor del selector de empleado
    Retorna: No regresa nada

********************************************************************************** */

$('#selectEmpleado').change(function(){
	if ($(this).val() != 0 ){
		ResguardoPorEmpleado($(this).val());
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
});

/******************** selección año de adquisición ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene el año de adquisición del selector para obtener el reporte requerido
    Parámetros: Valor del selector de año de adquisición
    Retorna: No regresa nada

********************************************************************************** */
$('#selectAnioAdquisicion').change(function(){
	if ($(this).val() != 0 ){
		importeBienesAnioAdquisicion($(this).val());
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
});

/******************** selección de area para biene por área ordenado por empleado ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene el área del selector para obtener el reporte requerido
    Parámetros: Valor del selector de área
    Retorna: No regresa nada

********************************************************************************** */
$('#selectAreaR8').change(function(){
	if ($(this).val() != 0 ){
		bienesAreaOrdenadoEmpleado($(this).val());
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
	}
	
});


/******************** funcion para reiniciar los componentes ***********************/
/* **********************************************************************************
    Funcionalidad: Si el valor del reporte se vuelve cero, opción de inicio (default), se regresan los valores
    				predeterminados de los selectores de área, partida y empleado, se oculta cualquier información
    				desplegada y la vista vuelve a su estado inicial 
    Parámetros: Valor del selector de reporte
    Retorna: No regresa nada

********************************************************************************** */
function desactivarcampos(){

	$('#cargando').css("display","none");

	$('#selectPartida').val("0").change();
	$('#selectArea').val("0").change();
	$('#selectEmpleado').val("0").change();
	$('#selectAnioAdquisicion').val("0").change();
	$('#selectAreaR8').val("0").change();


	$('#seleccionSelect').css("display","block");

	$('#divPartida').css("display","none");
	$('#divArea').css("display","none");
	$('#divEmpleado').css("display","none");
	$('#divAnioAdquisicion').css("display","none");
	$('#divAreaR8').css("display","none");

	$('#segundaInstruccion').css("display","none");	

	$('#btnGenerarPDF').css("display","none");

	
	$('#btnGenerarPDF').attr("href","");

	$('#divRespuesta').css("display","none");
}


/******************** Funciones ajax para la consulta de los reportes ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte bienes por partida
    Parámetros: partida
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */
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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/BienesPorPartida/"+partidaNumNombre[0]+"/"+partidaNumNombre[1]);
    	    	
    });
}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte concentrado de bienes por área
    Parámetros: No recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/importeBienesPorAreaPDF");
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte concentrado de bienes por partida
    Parámetros: No recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/importeBienesPorPartidaPDF");
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte inventario por área
    Parámetros: area
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/inventarioPorAreaPDF/"+areaNumNombre[0]+"/"+areaNumNombre[1]);
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte inventario por orden alfabético
    Parámetros: no recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/inventarioPorOrdenAlfabeticoPDF");
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte resguardo por empleado
    Parámetros: empleado
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/ResguardoPorEmpleadoPDF/"+empleadoNumNombre[0]+"/"+empleadoNumNombre[1]);
    }); 

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte importe de bienes por año de adquisición
    Parámetros: año de adquisición
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

function importeBienesAnioAdquisicion(anioAdquisicion){

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
      url: "importeBienesAnioAdquisicion",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { anioAdquisicion: anioAdquisicion},
      dataType: 'html',
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/importeBienesAnioAdquisicionPDF/"+anioAdquisicion);
    }); 
}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte bienes por área ordenado por empleado
    Parámetros: área
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

function bienesAreaOrdenadoEmpleado(area){

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
      url: "bienesAreaOrdenadoEmpleado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { area: area},
      dataType: 'html',
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#divRespuesta').css("display","block");
    	$('#respuestaReporte').html(response);
    	$('#cargando').css("display","none");
    	$('#btnGenerarPDF').css("display","block");
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/bienesAreaOrdenadoEmpleadoPDF/"+area);
    });
} 

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte inventario por orden alfabético nuevo
    Parámetros: No recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

function inventarioPorOrdenAlfabeticoNuevo(){

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
      url: "inventarioPorOrdenAlfabeticoNuevo",
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
    	$('#btnGenerarPDF').attr("href","../catalogos/reportes/inventarioPorOrdenAlfabeticoNuevoPDF");
    	    	
    });

}


