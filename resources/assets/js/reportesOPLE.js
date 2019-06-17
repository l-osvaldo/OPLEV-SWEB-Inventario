$('#selectReportes').change(function() {

	switch ($(this).val()){
		case '1':
		case '3':
			activarCampos('partida');
			break;
		case '2':
		case '4':
			$('#divArea').css("display","block");
			break;
		default:
			$('#divPartida').css("display","none");
			$('#divArea').css("display","none");
			$('#btnGenerarPDF').css("display","none");
			break;
	}
});

$('#selectPartida').change(function(){
	if ($(this).val() != 0 ){
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


function activarCampos(campo){
	switch (campo){
		case 'partida':
			$('#divPartida').css("display","block");
			break;
	}
}

function desactivarCampos(campo){
	switch (campo){

	}
}