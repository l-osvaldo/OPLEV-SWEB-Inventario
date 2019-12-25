

/********************************** funciones que se utilizan enmás de un módulo o vista del sistema *******************************************************/

/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en algún campo de los modales nuevo artículo OPLE o ECO
                    , comienza la validación de los mismos, mandando a llamar la función 
                    datosValidosArticulo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

$( ".validateDataArticulo" ).keyup(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticulo");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticulo");
   //console.log(valor,error,id,tipo);
   datosValidosArticulo(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Cuando sufre un cambio algún campo de los modales nuevo artículo OPLE o ECO
                    , comienza la validación de los mismos, mandando a llamar la función 
                    datosValidosArticulo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

$( ".validateDataArticulo" ).change(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticulo");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticulo");
   //console.log(valor,error,id,tipo);
   datosValidosArticulo(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en algún campo de los modales editar artículo OPLE o ECO
                    , comienza la validación de los mismos, mandando a llamar la función 
                    datosValidosArticuloEditar()
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

$( ".validateDataArticuloEditar" ).keyup(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticuloEditar");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticuloEditar");
   //console.log(valor,error,id,tipo);
   datosValidosArticuloEditar(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Cuando sufre un cambio algún campo de los modales editar artículo OPLE o ECO
                    , comienza la validación de los mismos, mandando a llamar la función 
                    datosValidosArticulo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

$( ".validateDataArticuloEditar" ).change(function() {

   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArticuloEditar");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArticuloEditar");
   //console.log(valor,error,id,tipo);
   datosValidosArticuloEditar(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Función que valida que algún campo de los modales nuevo artículo OPLE o ECO, cumpla con lo requerido, 
                    no debe estar vacio y no tener caracteres especiales 
    Parámetros: Valor del campo a validar, error, su id del elemento, tipo
    Retorna: Valido o no valido el elemento

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Función que valida que algún campo de los modales editar artículo OPLE o ECO, cumpla con lo requerido, 
                    no debe estar vacio y no tener caracteres especiales 
    Parámetros: Valor del campo a validar, error, su id del elemento, tipo
    Retorna: Valido o no valido el elemento

********************************************************************************** */

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


/* **********************************************************************************

    Funcionalidad: Función que activa el boton de guardar artículo (OPLE y ECO) si el arreglo de 
                    validaciones cuenta con solos ceros, si llegara a tener un uno por lo menos
                    quiere decir que un campo esta vacio o no cumple con las especificaciones 
    Parámetros: No recibe parámetros
    Retorna: activa o desactiva el boton de guardar artículo

********************************************************************************** */

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

/* **********************************************************************************

    Funcionalidad: Función que activa el boton de actualizar artículo (OPLE y ECO) si el arreglo de 
                    validaciones cuenta con solos ceros, si llegara a tener un uno por lo menos
                    quiere decir que un campo esta vacio o no cumple con las especificaciones 
    Parámetros: No recibe parámetros
    Retorna: activa o desactiva el boton de guardar artículo

********************************************************************************** */

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

/* **********************************************************************************

    Funcionalidad: cierra o abre las opciones del menu principal 
    Parámetros: No recibe parámetros
    Retorna: activa o desactiva las opciones del menu despegable de la izquierda

********************************************************************************** */

function cerrarMenus(){
	$('#cat').removeClass('menu-open');
	$('#ople').removeClass('menu-open');
	$('#eco').removeClass('menu-open');
	$('#CancelacionesR').removeClass('menu-open');
}

/* **********************************************************************************

    Funcionalidad: Configuraución inicial de los tooltip
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

********************************************************************************** */

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

/* **********************************************************************************

    Funcionalidad: Configuraución inicial de los inputSpinner
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

********************************************************************************** */

$("input[type='number']").inputSpinner(); 

/* **********************************************************************************

    Funcionalidad: Configuraución inicial de los inputmask, 
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

********************************************************************************** */

$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  //Money Euro
  $('[data-mask]').inputmask()

}); 