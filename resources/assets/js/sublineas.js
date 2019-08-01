$('#Linea').change(function (){
  if ( $(this).val() != 0){
    $.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "datosSublinea",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { Linea: $(this).val(), Partida: $('#Partidas').val() },
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);

      $('#sublineaRespuesta').css("display","block");
    	$('#sublineaRespuesta').html(response); 
    	    	    	
    });
  }
});