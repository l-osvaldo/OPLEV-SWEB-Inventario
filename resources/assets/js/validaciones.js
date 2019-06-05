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


function SoloNumerosLetras(evt, tipovalidacion){
 if(window.event){
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 }
 //console.log(keynum);
 if((keynum > 47 && keynum < 58) 
      || keynum == 8 
      || keynum == 13 
      || keynum == 6 
      || keynum == 32  //espacio
      ){
  return true;
 }
 else{
  if (soloLetras(evt,tipovalidacion) && tipovalidacion != 'numero'){
    return true;
  }else{
    return false;
  }  
 }
}

function soloLetras(e,tipovalidacion) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
  especiales = [8, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

  if (tipovalidacion == 'partida' ){
    especiales = [8, 6, 44, 45]; 
  }
  if (tipovalidacion == 'linea' ) {
    especiales = [8, 6, 45, 47];
  }
  if (tipovalidacion == 'sublinea' ) {
    especiales = [8, 6, 34, 39, 44 ,45, 46, 47];
  }
  if (tipovalidacion == 'area' ) {
    especiales = [8, 6, 46];
  }

  tecla_especial = false
  for(var i in especiales) {
      if(key == especiales[i]) {
          tecla_especial = true;
          break;
      }
  }

  if(letras.indexOf(tecla) == -1 && !tecla_especial){
      return false;
  }else{
    return true;
  }
}