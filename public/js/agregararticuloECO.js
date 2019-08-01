$('#partidaAltaArticuloECO').change(function() {
	if ($(this).val() != 0){

		var partidaCompleta = $(this).val().split('*');
		$('#lineaAltaArticuloECO').val("0").change();
		filtroLineasECO(partidaCompleta[0]);
		$('#lineaAltaArticuloECO').prop("disabled", false);

	}else{
		reiniciarmodalECO($(this).attr("id"));
	}
});


function filtroLineasECO(partida){
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

	    $('#lineaAltaArticuloECO').html(comboLineas);
    	
    });
}


$('#lineaAltaArticuloECO').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		$('#sublineaAltaArticuloECO').val("0").change();
		var lineaCompleta = $(this).val().split('*');
		filtroSublineaECO(lineaCompleta[0]);
		$('#sublineaAltaArticuloECO').prop("disabled", false);
	}else{
		reiniciarmodalECO($(this).attr("id"));
	}
});

function filtroSublineaECO(linea){

	var partidaCompleta = $('#partidaAltaArticuloECO').val().split('*');
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

        $('#sublineaAltaArticuloECO').html(comboSublineas);


      }); 
}

$('#sublineaAltaArticuloECO').change(function(){
	if ($(this).val() != 0 && $(this).val() != null){
		var lineaCompleta = 	$('#lineaAltaArticuloECO').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticuloECO').val().split('*');
		$('#txtConceptoECO').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		$('#txtConceptoEnvECO').val(lineaCompleta[1] + ' ' + sublineaCompleta[1]);
		
		$('#numberNumBienesECO').val("1");

		$('#numberNumBienesECO').prop("disabled", false);
		$('#txtFacturaECO').prop("disabled", false);
		$('#txtImporteECO').prop("disabled", false);
		$('#txtMarcaECO').prop("disabled", false);
		$('#txtModeloECO').prop("disabled", false);
		$('#txtNumSerieECO').prop("disabled", false);
		$('#txtColorECO').prop("disabled", false);
		$('#txtMaterialECO').prop("disabled", false);
		$('#txtMedidasECO').prop("disabled", false);
		$('#dateFechaCompraECO').prop("disabled", false);

		generarNumeroInventarioECO($('#numberNumBienesECO').val());
	}else{
		reiniciarmodalECO($(this).attr("id"));
	}
});

$('#numberNumBienesECO').change(function(){
	generarNumeroInventarioECO($(this).val());
	setTimeout(generarNumeroInventarioECO($(this).val()),2500);
});


function generarNumeroInventarioECO(cantidadArticulos){

	if (cantidadArticulos > 0){
		//console.log(cantidadArticulos);
	
		var partidaCompleta = 	$('#partidaAltaArticuloECO').val().split('*');
		var lineaCompleta = 	$('#lineaAltaArticuloECO').val().split('*');
		var sublineaCompleta = 	$('#sublineaAltaArticuloECO').val().split('*');

		var partida = 	partidaCompleta[0];
		var linea = 	lineaCompleta[0];
		var sublinea = 	sublineaCompleta[0];

		var numInv = '';

		var consecutivo = [];
		var arregloNumInv = [];

		$.ajaxSetup(
		{
			headers:
			{ 
	    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
	      url: "numeroInventarioECO",
	      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	      type: 'GET',
	      data: {partida: partida , linea: linea, sublinea: sublinea },
	      dataType: 'json',
	      contentType: 'application/json'
	      }).done(function(response) {
	      	//console.log(response);
	      	
	      	var identificador = 0;
	      	if (cantidadArticulos > 1){
	      		$('#lblNumInvECO').html('Números de Inventario');
	      	}else{
	      		$('#lblNumInvECO').html('Número de Inventario');
	      	}

	      	for (var i = 1 ; i <= cantidadArticulos ; i++) {
	      		numInv += 'ECO-'+ partida + '-' + linea + '-' + sublinea + '-';
	      		var base = 'ECO-'+ partida + '-' + linea + '-' + sublinea + '-';
	      		identificador = parseInt(response)+i;
	      		identificador = ( identificador < 10) ? '000'+identificador : ( identificador < 100 ) ? '00'+identificador : ( identificador < 1000 ) ? '0'+identificador : identificador;
	      		consecutivo[i-1]=identificador;
	      		arregloNumInv[i-1]= base + identificador;
	      		numInv += identificador + '\n';
	      	}     	
	      	$('#txtConsecutivoECO').val(consecutivo);
	      	$('#txtArregloNumInvECO').val(arregloNumInv);
	      	$('#txtaNumInvECO').val(numInv);      	
	      }); 
	  }else{
	  	$('#numberNumBienesECO').val("1");
	  	generarNumeroInventarioECO(1);
	  }

	
}


function reiniciarmodalECO(campo){
	switch(campo){
		case 'partidaAltaArticuloECO':
			$('#lineaAltaArticuloECO').prop("disabled", true);
			$('#lineaAltaArticuloECO').val("0").change();
		break;
		case 'lineaAltaArticuloECO':
			$('#sublineaAltaArticuloECO').prop("disabled", true);
			$('#sublineaAltaArticuloECO').val("0").change();
		break;
		case 'sublineaAltaArticuloECO':
			$('#numberNumBienesECO').prop("disabled", true);
			$('#numberNumBienesECO').val("1");
			$('#txtaNumInvECO').val("");
			$('#txtConceptoECO').val("");
			$('#txtFacturaECO').val("");
			$('#txtImporteECO').val("");
			$('#txtMarcaECO').val("");
			$('#txtModeloECO').val("");
			$('#txtNumSerieECO').val("");
			$('#txtColorECO').val("");
			$('#txtMaterialECO').val("");
			$('#txtMedidasECO').val("");
			$('#dateFechaCompraECO').val("");


			$('#txtFacturaECO').prop("disabled", true);
			$('#txtImporteECO').prop("disabled", true);
			$('#txtMarcaECO').prop("disabled", true);
			$('#txtModeloECO').prop("disabled", true);
			$('#txtNumSerieECO').prop("disabled", true);
			$('#txtColorECO').prop("disabled", true);
			$('#txtMaterialECO').prop("disabled", true);
			$('#txtMedidasECO').prop("disabled", true);
			$('#dateFechaCompraECO').prop("disabled", true);


			$('.error1').text("");
			$('.error2').text("");
			$('.error3').text("");
			$('.error4').text("");
			$('.error5').text("");
			$('.error7').text("");

			$('#txtFacturaECO').attr("data-validacionArticulo", '1');
			$('#txtImporteECO').attr("data-validacionArticulo", '1');
			$('#txtMarcaECO').attr("data-validacionArticulo", '1');
			$('#txtModeloECO').attr("data-validacionArticulo", '1');
			$('#txtNumSerieECO').attr("data-validacionArticulo", '1');
			$('#dateFechaCompraECO').attr("data-validacionArticulo", '1');

			$('#txtFacturaECO').removeClass('inputDanger');
			$('#txtImporteECO').removeClass('inputDanger');
			$('#txtMarcaECO').removeClass('inputDanger');
			$('#txtModeloECO').removeClass('inputDanger');
			$('#txtNumSerieECO').removeClass('inputDanger');
			$('#dateFechaCompraECO').removeClass('inputDanger');

			$('#txtFacturaECO').removeClass('inputSuccess');
			$('#txtImporteECO').removeClass('inputSuccess');
			$('#txtMarcaECO').removeClass('inputSuccess');
			$('#txtModeloECO').removeClass('inputSuccess');
			$('#txtNumSerieECO').removeClass('inputSuccess');
			$('#dateFechaCompraECO').removeClass('inputSuccess')
		break;

	}
}