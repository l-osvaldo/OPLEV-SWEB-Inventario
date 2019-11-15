$('#empleadoCR').change(function() {
	if ( $(this).val() != 0){

		$('#cargandoCR').css("display","block");
		$('#divRespuestaCR').css("display","none");
		$('#btnCancelarResguardo').css("display","block");

		bienesDelEmpleado($(this).val());
	}else{
		$('#divRespuestaCR').css("display","none");
		$('#btnCancelarResguardo').css("display","none");
	}
});


function bienesDelEmpleado(empleado){

	var empleadoNumNombre = empleado.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
    url: "bienesDelEmpleado",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: { numEmpleado: empleadoNumNombre[0], nombreEmpleado: empleadoNumNombre[1] },
    dataType: 'html',
    contentType: 'application/json'

  }).done(function(response) {
  	$('#divRespuestaCR').css("display","block");
  	$('#respuestaCR').html(response);
  	$('#cargandoCR').css("display","none");
  });
} 