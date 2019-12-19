$( ".validateDataArticulo" ).keyup(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticulo");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticulo");
   //console.log(valor,error,id,tipo);
   datosValidosArticulo(valor, error, id, tipo);
});

$( ".validateDataArticulo" ).change(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticulo");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticulo");
   //console.log(valor,error,id,tipo);
   datosValidosArticulo(valor, error, id, tipo);
});


$( ".validateDataArticuloEditar" ).keyup(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticuloEditar");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticuloEditar");
   //console.log(valor,error,id,tipo);
   datosValidosArticuloEditar(valor, error, id, tipo);
});

$( ".validateDataArticuloEditar" ).change(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticuloEditar");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticuloEditar");
   //console.log(valor,error,id,tipo);
   datosValidosArticuloEditar(valor, error, id, tipo);
});

function datosValidosArticulo(valor, error, id, tipo)
{
   switch (tipo) {
     case 'text':
       if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
         $('.error'+ error).text("");
         $('#'+id).attr("data-validacionArticulo", '0');
         $('#'+id).removeClass('inputDanger');
         $('#'+id).addClass('inputSuccess');
       }else{
         $('.error'+ error).text("Este campo no puede ir vacío.");
         $('#'+id).attr("data-validacionArticulo", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger');
       }
       break;
    case 'date':
      //console.log(valor);
      if (valor != ""){
        $('.error'+ error).text("");
        $('#'+id).attr("data-validacionArticulo", '0');
        $('#'+id).removeClass('inputDanger');
        $('#'+id).addClass('inputSuccess');
      }else{
        $('.error'+ error).text("Este campo no puede ir vacío.");
        $('#'+id).attr("data-validacionArticulo", '1');
        $('#'+id).removeClass('inputSuccess');
        $('#'+id).addClass('inputDanger');
      }
    break;
     default:
     console.log('default');
   }
   enablebtnArticulo();
}

function datosValidosArticuloEditar(valor, error, id, tipo)
{
   switch (tipo) {
     case 'text':
       if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
         $('.error'+ error).text("");
         $('#'+id).attr("data-validacionArticuloEditar", '0');
         $('#'+id).removeClass('inputDanger');
         $('#'+id).addClass('inputSuccess');
       }else{
         $('.error'+ error).text("Este campo no puede ir vacío.");
         $('#'+id).attr("data-validacionArticuloEditar", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger');
       }
       break;
    case 'date':
      //console.log(valor);
      if (valor != ""){
        $('.error'+ error).text("");
        $('#'+id).attr("data-validacionArticuloEditar", '0');
        $('#'+id).removeClass('inputDanger');
        $('#'+id).addClass('inputSuccess');
      }else{
        $('.error'+ error).text("Este campo no puede ir vacío.");
        $('#'+id).attr("data-validacionArticuloEditar", '1');
        $('#'+id).removeClass('inputSuccess');
        $('#'+id).addClass('inputDanger');
      }
    break;
     default:
     console.log('default');
   }
   enablebtnArticuloEditar();
}

function enablebtnArticulo()
{
 var array = [];
 var claserror = $('.validateDataArticulo');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionArticulo'));
 }

console.log(array);

 if(array.includes('1'))
 { 
   $('#btnGuardarArticulo').prop("disabled", true);
   $('#btnGuardarArticuloECO').prop("disabled", true);
 }
 else
 {
   $('#btnGuardarArticulo').prop("disabled", false);
   $('#btnGuardarArticuloECO').prop("disabled", false);
 }

}

function enablebtnArticuloEditar()
{
 var array = [];
 var claserror = $('.validateDataArticuloEditar');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionArticuloEditar'));
 }

//console.log(array);

 if(array.includes('1'))
 { 
   $('#btnActualizarArticulo').prop("disabled", true);
   $('#btnActualizarArticulo').css("display","none");
   $('#btnActualizarArticuloECO').prop("disabled", true);
   $('#btnActualizarArticuloECO').css("display","none");
   
 }
 else
 {
   $('#btnActualizarArticulo').prop("disabled", false);
   $('#btnActualizarArticulo').css("display","block");
   $('#btnActualizarArticuloECO').prop("disabled", false);
   $('#btnActualizarArticuloECO').css("display","block");
 }

}

function cerrarMenus(){
	$('#cat').removeClass('menu-open');
	$('#ople').removeClass('menu-open');
	$('#eco').removeClass('menu-open');
	$('#CancelacionesR').removeClass('menu-open');
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$("input[type='number']").inputSpinner();  