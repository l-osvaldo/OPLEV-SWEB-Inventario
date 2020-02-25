
/********************************** funciones para el módulo de reportes ECO *******************************************************/

var banderaSelectAnio = 'default'; // variable para que el sistema tome el año para el reporte 9 o 10, de acuerdo a lo el usuario necesite

/* **********************************************************************************
    Funcionalidad: Obtiene el reporte seleccionado por el usuario y de acuerdo al valor toma una opción de reporte,
    				algunos reportes deben seleccionar otra opción, como la partida, línea o empleado, otros solo
    				seleccionando el reporte
    Parámetros: Valor del selector de reporte 
    Retorna: No regresa nada

********************************************************************************** */

/******************** Menu de reportes ***********************/
$('#selectReportesECO').change(function() {
	desactivarcamposECO();
	switch ($(this).val()){
		case '1':
			$('#divPartidaECO').css("display","block");
			$('#segundaInstruccionECO').css("display","block");
			$('#instruccionECO').html('2.- Seleccione una partida:');
			break;
		case '2':
			$('#seleccionSelectECO').css("display","none");
			$('#segundaInstruccionECO').css("display","none");	
			importeBienesPorAreaECO();
			break;
		case '3':		
			$('#seleccionSelectECO').css("display","none");
			$('#segundaInstruccionECO').css("display","none");
			importeBienesPorPartidaECO();
			break;
		case '4':			
			$('#divAreaECO').css("display","block");
			$('#segundaInstruccionECO').css("display","block");
			$('#instruccionECO').html('2.- Seleccione una área:');
			break;
		case '5':
			$('#seleccionSelectECO').css("display","none");
			$('#segundaInstruccionECO').css("display","none");	
			inventarioPorOrdenAlfabeticoECO();
			break;
		case '6':			
			$('#divEmpleadoECO').css("display","block");
			$('#segundaInstruccionECO').css("display","block");
			$('#instruccionECO').html('2.- Seleccione un empleado:');
			break;
    case '7':
      $('#divAreaR7ECO').css("display","block");
      $('#segundaInstruccionECO').css("display","block");
      $('#instruccionECO').html('2.- Seleccione una área:');
      break;
    case '8':
      $('#divAnioAdquisicionECO').css("display","block");
      $('#segundaInstruccionECO').css("display","block");
      $('#instruccionECO').html('2.- Seleccione un año:');
      banderaSelectAnio = 'reporte08';
      break;
    case '9':
      break;
	}
});

/******************** selección de partida, area y empleado ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene la partida del selector para obtener el reporte requerido
    Parámetros: Valor del selector de partida
    Retorna: No regresa nada

********************************************************************************** */
$('#selectPartidaECO').change(function(){
	if ($(this).val() != 0 ){		
		bienesPorPartidaECO($(this).val());
		var partidaNumNombre = $(this).val().split('*');		

	}else{
		$('#btnGenerarPDFECO').css("display","none");
		$('#divRespuestaECO').css("display","none");
	}
	
});

/* **********************************************************************************
    Funcionalidad: Obtiene el área del selector para obtener el reporte requerido
    Parámetros: Valor del selector de área
    Retorna: No regresa nada

********************************************************************************** */

$('#selectAreaECO').change(function(){
	if ($(this).val() != 0 ){
		inventarioPorAreaECO($(this).val());
	}else{
		$('#btnGenerarPDFECO').css("display","none");
		$('#divRespuestaECO').css("display","none");
	}
	
});

/* **********************************************************************************
    Funcionalidad: Obtiene el empleado del selector para obtener el reporte requerido
    Parámetros: Valor del selector de empleado
    Retorna: No regresa nada

********************************************************************************** */

$('#selectEmpleadoECO').change(function(){
	if ($(this).val() != 0 ){
		ResguardoPorEmpleadoECO($(this).val());
	}else{
		$('#btnGenerarPDFECO').css("display","none");
		$('#divRespuestaECO').css("display","none");
	}
});

/******************** selección de area para biene por área ordenado por empleado ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene el área del selector para obtener el reporte requerido
    Parámetros: Valor del selector de área
    Retorna: No regresa nada

********************************************************************************** */
$('#selectAreaR7ECO').change(function(){
  console.log('entre');
  if ($(this).val() != 0 ){
    bienesAreaOrdenadoEmpleadoECO($(this).val());
  }else{
    $('#btnGenerarPDFECO').css("display","none");
    $('#divRespuestaECO').css("display","none");
  }
  
});

$('#selectAnioAdquisicionECO').change(function(){
  if ($(this).val() != 0 ){
    importeBienesAnioAdquisicionECO($(this).val());
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
function desactivarcamposECO(){

	$('#cargandoECO').css("display","none");

	$('#selectPartidaECO').val("0").change();
	$('#selectAreaECO').val("0").change();
	$('#selectEmpleadoECO').val("0").change();


	$('#seleccionSelectECO').css("display","block");

	$('#divPartidaECO').css("display","none");
	$('#divAreaECO').css("display","none");
	$('#divEmpleadoECO').css("display","none");
  $('#selectAnioAdquisicionECO').val("0").change();
  $('#selectAreaR7ECO').val("0").change();
  $('#selectPartida02ECO').val("0").change();

	$('#btnGenerarPDFECO').css("display","none");

	
	$('#btnGenerarPDFECO').attr("href","");

	$('#divRespuestaECO').css("display","none");

  $('#divAreaECO').css("display","none");
  $('#divEmpleadoECO').css("display","none");
  $('#divAnioAdquisicionECO').css("display","none");
  $('#divAreaR7ECO').css("display","none");

  $('#segundaInstruccionECO').css("display","none"); 

}

/******************** Funciones ajax para la consulta de los reportes ***********************/
/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte bienes por partida
    Parámetros: partida
    Retorna: Unhtml con un datatable de la vista preliminar del reporte

********************************************************************************** */
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
    	$('#btnGenerarPDFECO').attr("href","../catalogos/reportes/BienesPorPartidaECO/"+partidaNumNombre[0]+"/"+partidaNumNombre[1]);
    	    	
    });
}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte concentrado de bienes por área
    Parámetros: No recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDFECO').attr("href","../catalogos/reportes/importeBienesPorAreaPDFECO");
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte concentrado de bienes por partida
    Parámetros: No recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDFECO').attr("href","../catalogos/reportes/importeBienesPorPartidaPDFECO");
    	    	
    });
 
}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte inventario por área
    Parámetros: area
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDFECO').attr("href","../catalogos/reportes/inventarioPorAreaPDFECO/"+areaNumNombre[0]+"/"+areaNumNombre[1]);
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte inventario por orden alfabético
    Parámetros: no recibe parámetros
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDFECO').attr("href","../catalogos/reportes/inventarioPorOrdenAlfabeticoPDFECO");
    	    	
    });

}

/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte resguardo por empleado
    Parámetros: empleado
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

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
    	$('#btnGenerarPDFECO').attr("href","../catalogos/reportes/ResguardoPorEmpleadoPDFECO/"+empleadoNumNombre[0]+"/"+empleadoNumNombre[1]);
    }); 

}

function bienesAreaOrdenadoEmpleadoECO(area){

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
      url: "bienesAreaOrdenadoEmpleadoECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { area: area},
      dataType: 'html',
      contentType: 'application/json'

    }).done(function(response) {
      //console.log(response);
      $('#divRespuestaECO').css("display","block");
      $('#respuestaReporteECO').html(response);
      $('#cargandoECO').css("display","none");
      $('#btnGenerarPDFECO').css("display","block");
      $('#btnGenerarPDFECO').attr("href","../catalogos/reportes/bienesAreaOrdenadoEmpleadoPDFECO/"+area);
    });
}  


/* **********************************************************************************
    Funcionalidad: Obtiene la vista preliminar del reporte importe de bienes por año de adquisición
    Parámetros: año de adquisición
    Retorna: Un html con un datatable de la vista preliminar del reporte

********************************************************************************** */

function importeBienesAnioAdquisicionECO(anioAdquisicion){

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
      url: "importeBienesAnioAdquisicionECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { anioAdquisicion: anioAdquisicion},
      dataType: 'html',
      contentType: 'application/json'

    }).done(function(response) {
      //console.log(response);
      $('#divRespuestaECO').css("display","block");
      $('#respuestaReporteECO').html(response);
      $('#cargandoECO').css("display","none");
      $('#btnGenerarPDFECO').css("display","block");
      $('#btnGenerarPDFECO').attr("href","../catalogos/reportes/importeBienesAnioAdquisicionPDFECO/"+anioAdquisicion);
    }); 
}