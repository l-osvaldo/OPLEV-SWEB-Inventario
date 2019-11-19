$('#empleadoAsignacion').change(function() {
	if ( $(this).val() != 0){
		console.log($(this).val());
		$('#cargandoAsignacion').css("display","block");
		$('#divRespuestaAsignacion').css("display","none");
		bienesCancelados($(this).val());
	}else{
		$('#divRespuestaAsignacion').css("display","none");
	}
});


function bienesCancelados(empleado){

	var empleadoNumNombre = empleado.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
    url: "bienesCancelados",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: { idCancelacion: empleadoNumNombre[0], nombreEmpleado: empleadoNumNombre[1] },
    dataType: 'html',
    contentType: 'application/json'

  }).done(function(response) {
  	$('#divRespuestaAsignacion').css("display","block");
  	$('#respuestaAsignacion').html(response);
  	$('#cargandoAsignacion').css("display","none");
  	
  });
}