$(function() {

  $.ajaxSetup(
	{
		headers:
		{ 
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#Partidas").change(function() 
  {		
		$('#Linea').html('');    
		var partida = $('#Partidas').find(':selected').val();
    $.ajax({
      url: "obtenLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
				//console.log(response);
        comboLineas = "<option value='0'>Seleccione Linea...</option>";
        $.each(response, function(index, value){
          var cadena = value['linea'] + " - " + value['desclinea'];
          comboLineas += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
        });
        $('#Linea').html(comboLineas);  				
    	});
  });		









});

