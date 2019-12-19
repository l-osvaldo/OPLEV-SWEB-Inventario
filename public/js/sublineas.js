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
  }else{
    $('#sublineaRespuesta').css("display","none");
  }
});

$('#btn-submit').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro de Sublíneas",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#E71096",
         confirmButtonText: "Sí",
         closeOnConfirm: false
     }, function(isConfirm){
         if (isConfirm) form.submit();
     });
 });


$( ".validateDataDos" ).keyup(function() {    
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorDos");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeDos");
   datosValidosDos(valor, error, id, tipo);
});
   
$( ".validateDataDos" ).change(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorDos");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeDos");
   datosValidosDos(valor, error, id, tipo);
});

function datosValidosDos(valor, error, id, tipo)
{
  console.log(tipo);
   switch (tipo) {
     case 'text':
       if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
         $('.error'+ error).text("");
         $('#'+id).attr("data-validacionDos", '0');
         $('#'+id).removeClass('inputDanger');
         $('#'+id).addClass('inputSuccess');
       }else{
         $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
         $('#'+id).attr("data-validacionDos", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger');
       }
       break;
     case 'int':
       if (valor.match(/^[0-9]*$/) && valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionDos", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Solo numeros.");
       $('#'+id).attr("data-validacionDos", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'password':
       if (valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionDos", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("La contraseña no puede ir vacía.");
       $('#'+id).attr("data-validacionDos", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'select':
       if (valor!="0"){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionDos", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Seleccione una opción.");
       $('#'+id).attr("data-validacionDos", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     default:
     //console.log('default');
   }
   enablebtnDos();
} 

function enablebtnDos()
{
 var array = [];
 var claserror = $('.validateDataDos');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionDos'));
 }

 if(array.includes('1'))
 { 
   $('#btn-submit').prop("disabled", true);
 }
 else
 {
   $('#btn-submit').prop("disabled", false);
 }

   console.log(array);
}

$('#exampleModalTb').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataDos').removeClass('inputSuccess');
  $(this).find('.validateDataDos').removeClass('inputDanger');
  $(this).find('.validateDataDos').attr("data-validacionDos",'1');
  $(this).find('.text-danger').text('');
  $('#descsub').val("");
  $('#partidaA').val("0").change(); 
  $('#sublineaA').val("0").change();
  $('#lineaA').val("0").change();
  enablebtnDos();    
});

$("#partidaA").change(function() 
{ 
  console.log($(this).val());
  if ( $(this).val() != 0 ){
    $('#lineaA').html('');
    $('#lineaA').removeClass('inputSuccess');
    $('#lineaA').removeClass('inputDanger');
    $('#lineaA').attr("data-validacionDos",'1');
    $('#btn-submit').prop("disabled", true);      
    var partida = $('#partidaA').find(':selected').val();

    console.log('partida');
    $.ajax({
      url: "obtenLineasAg",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
          //console.log(response);
          
          comboLineasA = "<option value='0'>Número de Línea</option>";
          $.each(response, function(index, value){
            var cadena = value['linea'] + " - " + value['desclinea'];
            comboLineasA += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
          });
          $('#lineaA').html(comboLineasA);
          $('#lineaA').val("0").change();
          $('#lineaA').attr("disabled", false);         
        });
  }else{
    $(this).find('.validateDataDos').removeClass('inputSuccess');
    $(this).find('.validateDataDos').removeClass('inputDanger');
    $(this).find('.validateDataDos').attr("data-validacionDos",'1');
    $('#lineaA').attr("disabled", true);
    $('#lineaA').val("0").change();
    $('#sublineaA').val("0").change(); 
    enablebtnDos();
  }   
  
});

$("#lineaA").change(function() {
  if ($(this).val() != '0'){
    $('#sublineaA').html('');    
    var partida = $('#partidaA').find(':selected').val();
    var linea = $('#lineaA').find(':selected').val();
    $.ajax({
      url: "obtenSublineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida, linea:linea},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {

        $('#sublineaA').val(response);
        $('#sublineaA').html(response);
      }); 
  }else{
    $('#sublineaA').val("0").change();
  }      
});


$("#Partidas").change(function() 
{
  console.log($(this).val());   
  $('#Linea').val("0").change();      
  var partida = $('#Partidas').find(':selected').val();
  //console.log(partida);
  if (partida != 0){
    
    $.ajax({
    url: "obtenLineas",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: {partida: partida},
    dataType: 'json',
    contentType: 'application/json'
    }).done(function(response) {
      // console.log(response);

      
        // console.log('123');
        // $('#Linea').val("Seleccione una Línea").change();
        
        comboLineas = "<option value='0'>Número de Línea</option>";
        $.each(response, function(index, value){
          var cadena = value['linea'] + " - " + value['desclinea'];
          comboLineas += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
        });

        $('#Linea').html(comboLineas);
      
        $('#Linea').prop("disabled", false);

        $('#sublineaRespuesta').css("display","none");

        //console.log('prueba');
                
    });
  }else{
    comboLineas = "<option value='0'>Seleccione Linea...</option>";
    $('#Linea').html(comboLineas);
    $('#Linea').attr("disabled", true);
    $('#sublineaRespuesta').css("display","none");
  }    
});