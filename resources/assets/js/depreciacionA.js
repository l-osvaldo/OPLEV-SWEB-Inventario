$('#selectdepreciacionPartida').change(function() {
	if ( $(this).val() != 0){

		$('#cargandoDepreciacion').css("display","block");
		$('#divRespuestaDepreciacion').css("display","none");

		depreciacionCalculo($(this).val());
	}else{
		$('#divRespuestaDepreciacion').css("display","none");
	}
});


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

function generarPDFDepreciacion(){
	//console.log('ok');

	$('#ModalDepreciacionPDF').modal('show');
} 


// $ ( '#datetimepicker' ). datetimepicker ({
//     format: 'mm/yyyy',
//     minViewMode: '3',
//     maxViewMode: '2',
//     startView: '3', 
//     todayBtn: true,
//     language: 'es',
// });

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


$('#ModalDepreciacionPDF').on('hidden.bs.modal', function (e) {
	console.log('ok modal off');
	var fechaActual = new Date();
	var fecha = fechaActual.getMonth()+1 + '/01/' + fechaActual.getFullYear();
	console.log(fecha);
	$('#datetimepicker13').datetimepicker('date', moment(fecha, 'MM/DD/YYYY'));
})


function generarReportePDFDepreciacion(){
	var date = $('#datetimepicker13').datetimepicker('viewDate');
  	var fecha = date._d.toJSON().split('-');
	console.log('01/'+fecha[1]+'/'+fecha[0]);
}










 




