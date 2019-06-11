$('#partidaAltaArticulo').change(function() {
	if ($(this).val() != 0){
		$('#lineaAltaArticulo').val("0").change();
		filtroLineas($(this).val());
		$('#lineaAltaArticulo').prop("disabled", false);
	}else{
		reiniciarmodal($(this).attr("id"));
	}
});


function filtroLineas(partida){
	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "obtenLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
    }).done(function(response) {

    	//console.log(response);

    	comboLineas = "<option value='0'>Línea</option>";
	    $.each(response, function(index, value){
	    	var cadena = value['linea'] + " - " + value['desclinea'];
	        comboLineas += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
	    });

	    $('#lineaAltaArticulo').html(comboLineas);
    	
    });
}


$('#lineaAltaArticulo').change(function(){
	if ($(this).val() != 0){
		filtroSublinea($('#partidaAltaArticulo').val() ,$(this).val());
		$('#sublineaAltaArticulo').prop("disabled", false);
	}else{
		reiniciarmodal($(this).attr("id"));
	}
});

function filtroSublinea(partida,linea){
	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$.ajax({
      url: "obtenSublineas2",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida, linea:linea},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
      	console.log(response);

      	comboSublineas = "<option value='0'>Sublinea</option>";

      	$.each(response, function(index, value){
	    	var cadena = value['sublinea'] + " - " + value['descsub'];
	        comboSublineas += "<option value='"+value['sublinea']+"'>"+ cadena +"</option>";
	    });

        $('#sublineaAltaArticulo').html(comboSublineas);


      }); 
}


function reiniciarmodal(campo){
	console.log('si');
	switch(campo){
		case 'partidaAltaArticulo':
			$('#lineaAltaArticulo').prop("disabled", true);
			$('#lineaAltaArticulo').val("0").change();
		break;
		case 'lineaAltaArticulo':
			$('#sublineaAltaArticulo').prop("disabled", true);
			$('#sublineaAltaArticulo').val("0").change();
		break;

	}
}