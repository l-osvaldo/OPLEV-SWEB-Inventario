$('#PartidasL').change(function (){
  if ( $(this).val() != 0){
    $.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "datosLinea",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { Partidas: $(this).val() },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$.each(response, function(index, value){
            //comboLineas += "<td> " +  + " </td>";
            console.log(value.linea);
            $('#example1').append('<tr><td>' + value.linea + '</td> <td>' + value.desclinea + '</td> </tr>')
        });
    	    	    	
    });
  }
});