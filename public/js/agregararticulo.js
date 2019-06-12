$('#partidaAltaArticulo').change(function() {
	if ($(this).val() != 0){

		var partidaCompleta = $(this).val().split('*');
		$('#lineaAltaArticulo').val("0").change();
		filtroLineas(partidaCompleta[0]);
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
	        comboLineas += "<option value='"+value['linea']+"*"+value['desclinea']+"'>"+ cadena +"</option>";
	    });

	    $('#lineaAltaArticulo').html(comboLineas);
    	
    });
}


$('#lineaAltaArticulo').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		$('#sublineaAltaArticulo').val("0").change();
		var lineaCompleta = $(this).val().split('*');
		filtroSublinea(lineaCompleta[0]);
		$('#sublineaAltaArticulo').prop("disabled", false);
		$('#txtFactura').prop("disabled", false);
		$('#txtImporte').prop("disabled", false);
	}else{
		reiniciarmodal($(this).attr("id"));
	}
});

function filtroSublinea(linea){

	var partidaCompleta = $('#partidaAltaArticulo').val().split('*');
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
      data: {partida: partidaCompleta[0], linea:linea},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
      	//console.log(response);

      	comboSublineas = "<option value='0'>Sublinea</option>";

      	$.each(response, function(index, value){
	    	var cadena = value['sublinea'] + " - " + value['descsub'];
	        comboSublineas += "<option value='"+value['sublinea']+"*"+value['descsub']+"'>"+ cadena +"</option>";
	    });

        $('#sublineaAltaArticulo').html(comboSublineas);


      }); 
}

$('#sublineaAltaArticulo').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		var lineaCompleta = 	$('#lineaAltaArticulo').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticulo').val().split('*');
		$('#txtConcepto').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		$('#numberNumBienes').val("1");
		$('#numberNumBienes').prop("disabled", false);
		generarNumeroInventario($('#numberNumBienes').val());
	}else{
		reiniciarmodal($(this).attr("id"));
	}
});

$('#numberNumBienes').change(function(){
	generarNumeroInventario($(this).val());
});


function generarNumeroInventario(cantidadArticulos){
	
	var partidaCompleta = 	$('#partidaAltaArticulo').val().split('*');
	var lineaCompleta = 	$('#lineaAltaArticulo').val().split('*');
	var sublineaCompleta = 	$('#sublineaAltaArticulo').val().split('*');

	var partida = 	partidaCompleta[0];
	var linea = 	( lineaCompleta[0] < 10 ) ? '0'+lineaCompleta[0] : lineaCompleta[0];
	var sublinea = 	( sublineaCompleta[0] < 10 ) ? '0'+sublineaCompleta[0] : sublineaCompleta[0];

	var numInv = '';

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "numeroInventario",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida , linea: linea, sublinea: sublinea },
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
      	console.log(response);
      	var identificador = 0;
      	if (cantidadArticulos > 1){
      		$('#lblNumInv').html('Números de Inventario');
      	}else{
      		$('#lblNumInv').html('Número de Inventario');
      	}

      	for (var i = 1 ; i <= cantidadArticulos ; i++) {
      		numInv += 'OPLEV-'+ partida + '-' + linea + '-' + sublinea + '-';
      		identificador = parseInt(response)+i;
      		identificador = ( identificador < 10) ? '000'+identificador : ( identificador < 100 ) ? '00'+identificador : ( identificador < 1000 ) ? '0'+identificador : identificador;
      		numInv += identificador + '\n';
      	}     	
      	
      	$('#txtaNumInv').val(numInv);      	
      }); 
}


function reiniciarmodal(campo){
	switch(campo){
		case 'partidaAltaArticulo':
			$('#lineaAltaArticulo').prop("disabled", true);
			$('#lineaAltaArticulo').val("0").change();
		break;
		case 'lineaAltaArticulo':
			$('#sublineaAltaArticulo').prop("disabled", true);
			$('#sublineaAltaArticulo').val("0").change();
		break;
		case 'sublineaAltaArticulo':
			$('#numberNumBienes').prop("disabled", true);
			$('#numberNumBienes').val("1");
			$('#txtaNumInv').val("");
			$('#txtConcepto').val("");
			$('#txtFactura').prop("disabled", true);
			$('#txtImporte').prop("disabled", true);
		break;

	}
}