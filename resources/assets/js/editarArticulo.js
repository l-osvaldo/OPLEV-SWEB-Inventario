 
 function abrirModalEditar(numInventario) {

 	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "InformacionArticulo",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numInventario: numInventario },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	console.log(response);


    	$.each(response, function(i, item) {
    		console.log(item['partida']);

    		$('#editarPartida').html(item['partida']);
    		$('#editarLinea').html(item['linea']);
    		$('#editarSublinea').html(item['sublinea']);

    		$('#editarPartidaN').html(item['descpartida']);
    		$('#editarLineaN').html(item['desclinea']);
    		$('#editarSublineaN').html(item['descsublinea']);

    		

		});

    	$('#editarModal').modal('show'); 
    	    	
    });


 	
 }