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
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
      $('#lineaRespuesta').css('display', 'block');
    	$('#lineaRespuesta').html(response); 
    	    	    	
    });
  }else{
    $('#lineaRespuesta').css('display', 'none');
  }
});

$('#btn-submit3').on('click',function(e){
   e.preventDefault();
   var form = $(this).parents('form');
   swal({
       title: "Registro de Líneas",
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

$('#exampleModalLinea').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataLi').removeClass('inputSuccess');
  $(this).find('.validateDataLi').removeClass('inputDanger');
  $(this).find('.validateDataLi').attr("data-validacionLi",'1');
  $(this).find('.text-danger').text('');
  $('#partida').val("0").change();
  $('#LineaMax').val("0"); 
  $('#desclinea').val(""); 
  $('#descsub').val("");         
});

$("#partida").change(function() 
{   
  $('#LineaMax').html('');    
  var partida = $('#partida').find(':selected').val();;
  $.ajax({
    url: "obtenMaxLineas",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: {partida: partida},
    dataType: 'json',
    contentType: 'application/json'
    }).done(function(response) {
      //console.log(response.length);

      if (response.length != 0){
        var b = response.length+1;
        if (b < 10){
          b = '0' + b; 
        }
        console.log(b);
        $('#LineaMax').val(b);
      }else{
        $('#LineaMax').val("0");
        $('#LineaMax').html("0");
      } 

    }); 
});


$( ".validateDataLi" ).keyup(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorLi");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeLi");
   //console.log(valor,error,id,tipo);
   datosValidosLi(valor, error, id, tipo);

});

$( ".validateDataLi" ).change(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorLi");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeLi");
   //console.log(valor,error,id,tipo);
   datosValidosLi(valor, error, id, tipo);
});

function datosValidosLi(valor, error, id, tipo)
{
   switch (tipo) {
     case 'text':
       if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
         $('.error'+ error).text("");
         $('#'+id).attr("data-validacionLi", '0');
         $('#'+id).removeClass('inputDanger');
         $('#'+id).addClass('inputSuccess');
       }else{
         $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
         $('#'+id).attr("data-validacionLi", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger');
       }
       break;
     case 'int':
       if (valor.match(/^[0-9]*$/) && valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionLi", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Solo numeros.");
       $('#'+id).attr("data-validacionLi", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'password':
       if (valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionLi", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("La contraseña no puede ir vacía.");
       $('#'+id).attr("data-validacionLi", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'select':
       if (valor!="0"){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionLi", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Seleccione una opción.");
       $('#'+id).attr("data-validacionLi", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     default:
     console.log('default');
   }
   enablebtnLi();
}

function enablebtnLi()
{
 var array = [];
 var claserror = $('.validateDataLi');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionLi'));
 }

  //console.log(array);

 if(array.includes('1'))
 { 
   $('#btn-submit3').prop("disabled", true);
 }
 else
 {
   $('#btn-submit3').prop("disabled", false);
 }

}