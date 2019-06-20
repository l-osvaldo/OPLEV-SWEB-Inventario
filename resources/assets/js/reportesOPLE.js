$('#selectReportes').change(function() {
	//desactivarcampos();
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
			console.log('default');
			
			$('#selectPartida').val("0").change();
			//desactivarcampos();			   
			break;
	}
});

$('#selectPartida').change(function(){
	if ($(this).val() != 0 ){
		bienesPorPartida($(this).val());
		var partidaNumNombre = $(this).val().split('*');
		$('#btnGenerarPDF').css("display","block");
		$('#divRespuesta').css("display","block");
		$('#btnGenerarPDF').attr("href","/catalogos/reportes/generarBienesPartida/"+partidaNumNombre[0]+"/"+partidaNumNombre[1]);
	}else{
		$('#btnGenerarPDF').css("display","none");
		$('#divRespuesta').css("display","none");
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
	console.log('si');
	
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
    	$('#respuestaReporte').html(response);
    	
    });

}
