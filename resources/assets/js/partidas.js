$('#activarDepreciacion').change(function() {
	if ($(this).is(':checked') ){
		$('#divDepreciacion').css("display","block");
		$('#hiddendepreciacion').val('true');
	}else{
		$('#divDepreciacion').css("display","none");
		$('#hiddendepreciacion').val('false');

		$('#aniosVida').val('1');
		$('#porcentajeDepreciacion').val('1');
	}
});


// validación 

$( ".validateData" ).keyup(function() {
       var valor = $(this).val();
       var error = $(this).attr("data-error");
       var id = $(this).attr("id");
       var tipo = $(this).attr("data-myType");
       datosValidos(valor, error, id, tipo);
   });
   
   // $( ".validateData" ).change(function() {
   //     var valor = $(this).val();
   //     var error = $(this).attr("data-error");
   //     var id = $(this).attr("id");
   //     var tipo = $(this).attr("data-myType");
   //     datosValidos(valor, error, id, tipo);
   // });


   function datosValidos(valor, error, id, tipo)
   {
       switch (tipo) {
         case 'text':
           if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
             $('.error'+ error).text("");
             $('#'+id).attr("data-validacion", '0');
             $('#'+id).removeClass('inputDanger');
             $('#'+id).addClass('inputSuccess');
           }else{
             $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
             $('#'+id).attr("data-validacion", '1');
             $('#'+id).removeClass('inputSuccess');
             $('#'+id).addClass('inputDanger');
           }
           break;
         case 'int':
           if (valor.match(/^[0-9]*$/) && valor!=""){
            validarPartida(valor,error,id);        
           }else{
            $('.error'+ error).text("Solo numeros.");
            $('#'+id).attr("data-validacion", '1');
            $('#'+id).removeClass('inputSuccess');
            $('#'+id).addClass('inputDanger'); 
           }
         break;
         case 'password':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacion", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("La contraseña no puede ir vacía.");
           $('#'+id).attr("data-validacion", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         case 'select':
           if (valor!=""){
           $('.error'+ error).text("");
           $('#'+id).attr("data-validacion", '0');
           $('#'+id).removeClass('inputDanger');
           $('#'+id).addClass('inputSuccess');
         }else{
           $('.error'+ error).text("Seleccione una opción.");
           $('#'+id).attr("data-validacion", '1');
           $('#'+id).removeClass('inputSuccess');
           $('#'+id).addClass('inputDanger'); 
         }
         break;
         default:
         console.log('default');
       }
       enablebtn();
   }

function enablebtn()
{
 var array = [];
 var claserror = $('.validateData');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacion'));
 }

 // console.log(array);

 if(array.includes('1'))
 { 
   $('#btn-submit2').prop("disabled", true);
 }
 else
 {
   $('#btn-submit2').prop("disabled", false);
 }

}

$('#btn-submit2').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
      title: "Registro de Partidas",
      text: "¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#0080FF",
      confirmButtonText: "Sí",
      closeOnConfirm: false
  }, function(isConfirm){
      if (isConfirm) form.submit();
      
  });
});

$('#exampleModal').on('hidden.bs.modal', function (e) {
  $(this).find('.validateData').removeClass('inputSuccess');
  $(this).find('.validateData').removeClass('inputDanger');
  $(this).find('.validateData').attr("data-validacion",'1');
  $(this).find('.text-danger').text('');
  $('#partidaI').val("");
  $('#descpartida').val("");
  $('#desclinea').val("");
  $('#descsub').val("");
  $('#activarDepreciacion').prop("checked", false).change();
  //console.log('partida');
  enablebtn();   
})