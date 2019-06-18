$('#selectReportes').change(function() {
	desactivarcampos();
	switch ($(this).val()){
		case '1':
			$('#divPartida').css("display","block");
			break;
		case '2':
			$('#seleccionSelect').css("display","none");	
			$('#btnGenerarPDF').css("display","block");
			break;
		case '3':			
			$('#seleccionSelect').css("display","none");	
			$('#btnGenerarPDF').css("display","block");
			break;
		case '4':			
			$('#divArea').css("display","block");
			break;
		case '5':
			$('#seleccionSelect').css("display","none");	
			$('#btnGenerarPDF').css("display","block");
			break;
		case '6':			
			$('#divEmpleado').css("display","block");
			break;
		default:
			desactivarcampos();			   
			break;
	}
});

$('#selectPartida').change(function(){
	if ($(this).val() != 0 ){
		bienesPorPartida($(this).val());
		$('#btnGenerarPDF').css("display","block");
	}else{
		$('#btnGenerarPDF').css("display","none");
	}
	
});

$('#selectArea').change(function(){
	if ($(this).val() != 0 ){
		$('#btnGenerarPDF').css("display","block");
	}else{
		$('#btnGenerarPDF').css("display","none");
	}
	
});

function desactivarcampos(){
	$('#seleccionSelect').css("display","block");

	$('#divPartida').css("display","none");
	$('#divArea').css("display","none");
	$('#divEmpleado').css("display","none");

	$('#btnGenerarPDF').css("display","none");

	$('#selectPartida').val("0").change();
	$('#selectArea').val("0").change();
	$('#selectEmpleado').val("0").change();
}

function bienesPorPartida(partida){

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
      contentType: 'application/json'
    }).done(function(response) {
    	console.log('hola');
    	$('#respuestaReporte').html(response);
    	
    });

}
