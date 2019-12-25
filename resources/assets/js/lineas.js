
/********************************** funciones para el módulo de líneas *******************************************************/

/* **********************************************************************************
    Funcionalidad: Obtiene todas las líneas de una partida seleccionada 
    Parámetros: partida
    Retorna: un html con un datatable con la información de las líneas de una partida

********************************************************************************** */

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
});|

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación para registrar una nueva línea
    Parámetros: Información del formulario de registro de nueva línea
    Retorna: No regresa nada

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Cierra el modal de registro de nueva línea y regresa sus valores al estado predeterminado
    Parámetros: No recibe parámetros
    Retorna: Cierra el modal de registro de nueva línea

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Obtiene el valor maximo de líneas de una partida y suma uno a ese valor para asignarlo
                    a la nueva línea
    Parámetros: partida
    Retorna: El número maximo de líneas sumar uno y asignar ese valor a la nueva línea

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en algún campo del formulario de
                    registro de nueva línea, comienza a validar llamando a la función datosValidosLi()
    Parámetros: El valor ingresado al campo 
    Retorna: No regresa nada

********************************************************************************** */

$( ".validateDataLi" ).keyup(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorLi");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeLi");
   //console.log(valor,error,id,tipo);
   datosValidosLi(valor, error, id, tipo);

});

/* **********************************************************************************
    Funcionalidad: Cuando se registra algún cambio de algún campo del formulario de
                    registro de nueva línea, comienza a validar llamando a la función datosValidosLi()
    Parámetros: El valor ingresado al campo 
    Retorna: No regresa nada

********************************************************************************** */

$( ".validateDataLi" ).change(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorLi");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeLi");
   //console.log(valor,error,id,tipo);
   datosValidosLi(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Función que valida el campo enviado cuente con lo requerido, no debe estar 
                    vacio y no tener caracteres especiales 
    Parámetros: Valor del campo a validar, error, su id del elemento, tipo
    Retorna: Valido o no valido el elemento

********************************************************************************** */

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

/* **********************************************************************************

    Funcionalidad: Función que activa o desactiva el boton de rgistrar nueva línea, si el arreglo de validación
                    no cuenta con ningun uno, activa el boton pero si tieen por lo menos un uno lo desactiva,
                    ya que algún campo contiene algo que no es valido
    Parámetros: Arreglo de validación
    Retorna: activa o desactiva el bótón de registar nueva línea

********************************************************************************** */

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