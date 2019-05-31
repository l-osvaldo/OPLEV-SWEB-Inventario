function validarPartida(valor,error,id){
	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	 });

	$.ajax({
      url: "validarPartida",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: valor},
      dataType: 'json',
      contentType: 'application/json'
    }).done(function(response) {
    	//console.log(valor);
    	if (response.length > 0){

    		$('.error'+ error).text("Este número de partida ya existe.");
            $('#'+id).attr("data-validacion", '1');
            $('#'+id).removeClass('inputSuccess');
            $('#'+id).addClass('inputDanger'); 
    	}else{
    		$('.error'+ error).text("");
            $('#'+id).attr("data-validacion", '0');
            $('#'+id).removeClass('inputDanger');
            $('#'+id).addClass('inputSuccess');
    	}
    	enablebtn() 


    }); 
}