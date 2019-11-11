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









 




