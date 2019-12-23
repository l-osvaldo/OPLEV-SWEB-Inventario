
/********************************** funciones para el módulo de depreciación  *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio del selector de partida para mandar a llamar la función de depreciacionCalculo(), si el valor es cero, oculta toda la información 
    Parámetros: Valor del selector 
    Retorna: No regresa nada

********************************************************************************** */

$('#selectdepreciacionPartida').change(function() {
	if ( $(this).val() != 0){

		$('#cargandoDepreciacion').css("display","block");
		$('#divRespuestaDepreciacion').css("display","none");

		depreciacionCalculo($(this).val());
	}else{
		$('#divRespuestaDepreciacion').css("display","none");
	}
});

/* **********************************************************************************
    Funcionalidad: Obtiene toda la depreciación que sufren los bienes de una partida seleccionada 
    Parámetros: partida
    Retorna: Un html con un datatable con la depreciación de todos los bienes OPLE de esa partida

********************************************************************************** */

function depreciacionCalculo(partida){
	$.ajaxSetup(
	{
		headers:
		{ 
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
    url: "calculoDepreciacion",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: { numPartida: partida },
    dataType: 'html',
    contentType: 'application/json'

  }).done(function(response) {
  	$('#divRespuestaDepreciacion').css("display","block");
  	$('#respuestaDepreciacion').html(response);
  	$('#cargandoDepreciacion').css("display","none");
  });
}

/* **********************************************************************************
    Funcionalidad: Abre un modal para seleccionar la fecha que se requiere la depreciación 
    Parámetros: No recibe parametros
    Retorna: Modal

********************************************************************************** */

function generarPDFDepreciacion(){

	$('#ModalDepreciacionPDF').modal('show');
} 

/* **********************************************************************************
    Funcionalidad: Configuración del datetimepicker, este sirve para que el usuario seleccione la fecha del reporte de depreciación
    Parámetros: No recibe parametros
    Retorna: Calendario

********************************************************************************** */

$(function () {
    $('#datetimepicker13').datetimepicker({
    	viewMode: 'months',
    	format: 'MM/YYYY',
        inline: true,
        sideBySide: true,
        maxDate: $.now(),
        locale: moment.locale(),
        useCurrent: true
    });

    
});

/* **********************************************************************************
    Funcionalidad: Obtiene la fecha que el usuario requiere para el reporte de depreciación
    Parámetros: No recibe parametros
    Retorna: Fecha seleccionada

********************************************************************************** */

$('#datetimepicker13').on("change.datetimepicker", function (e) {
  // console.log(e.date);
  var date = $('#datetimepicker13').datetimepicker('viewDate');
  // console.log(date._d.getMonth() + ' - ' + date._d.getYear() );

  var fecha = date._d.toJSON().split('-');

  var msj = (fecha[0] < 2000) ? ' de ' : ' del ';

  //console.log(fecha);

  var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

  $('#fechaReporteDepreciacion').html('Reporte de ' + meses[fecha[1]-1] + msj + fecha[0] );

  //console.log(date._d.toJSON() );

  //console.log(date._d.toString() );
});

/* **********************************************************************************
    Funcionalidad: Cierra el modal y regresa sus valores al estado predeterminado 
    Parámetros: No recibe parametros
    Retorna: Cierra modal

********************************************************************************** */

$('#ModalDepreciacionPDF').on('hidden.bs.modal', function (e) {
	// console.log('ok modal off');
	var fechaActual = new Date();
	var fecha = fechaActual.getMonth()+1 + '/01/' + fechaActual.getFullYear();
	console.log(fecha);
	$('#datetimepicker13').datetimepicker('date', moment(fecha, 'MM/DD/YYYY'));
})

/* **********************************************************************************
    Funcionalidad: Obtiene el reporte de depreciación en pdf y lo abre en una nueva ventana 
    Parámetros: fecha
    Retorna: Reporte en formato PDF

********************************************************************************** */

function generarReportePDFDepreciacion(){
	var date = $('#datetimepicker13').datetimepicker('viewDate');
  	var fecha = date._d.toJSON().split('-');
	console.log('01/'+fecha[1]+'/'+fecha[0]);

	var fechaReporte = '01-'+fecha[1]+'-'+fecha[0];

	$('#ModalDepreciacionPDF').modal('hide');

	window.open('../catalogos/reportePDFDepreciacion/'+fechaReporte,'_blank');

	
}










 




