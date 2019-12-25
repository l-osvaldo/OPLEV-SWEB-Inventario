

/********************************** funciones para el módulo de empleados *************************************************/

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación de registro de un nuevo empleado
    Parámetros: Formulario de registro de nuevo empleado
    Retorna: No regresa nada

********************************************************************************** */
$('#btn-submitEm').on('click',function(e){
 e.preventDefault();
 var form = $(this).parents('form');
 swal({
     title: "Registro de Empleado",
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
    Funcionalidad: Cierra el modal de registro de un nuevo empleado
    Parámetros: No recibe parámetros
    Retorna: Cierra modal

********************************************************************************** */

$('#exampleModalEmpleado').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataEm').removeClass('inputSuccess');
  $(this).find('.validateDataEm').removeClass('inputDanger');
  $(this).find('.validateDataEm').attr("data-validacionEm",'1');
  $(this).find('.text-danger').text('');   
  $('#numemple').val("");
  $('#nombre').val("");
  $('#cargo').val("");
  $('#clvdepto').val("0").change();

  $('#nombre').attr("disabled",true);
  $('#cargo').attr("disabled",true);
  $('#clvdepto').attr("disabled",true);
});

/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado comienza a validar los campos,
                    manda a llamar la función datosValidosEm()
    Parámetros: No recibe parámetros
    Retorna: Cierra modal

********************************************************************************** */

$( ".validateDataEm" ).keyup(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorEm");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeEm");
   datosValidosEm(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Obtiene el valor del selector de área, cuando obtiene un cambio el selector manda a llamar 
                    la función datosValidosEm().
    Parámetros: No recibe parámetros
    Retorna: Cierra modal

********************************************************************************** */

$( "#clvdepto" ).change(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorEm");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeEm");
   //console.log(valor);
   datosValidosEm(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Valida que los campos de registro de empleado cumplan con las validaciones requeridas
    Parámetros: Valor del campo, error, id del campo, tipo
    Retorna: cambia las clases success o danger de acuerdo a la validación

********************************************************************************** */

function datosValidosEm(valor, error, id, tipo)
{
   switch (tipo) {
     case 'text':
       if (valor.match(/^[a-zA-ZÀ-ÿ.^"\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ.^"\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ.^"\u00f1\u00d1]*$/) && valor!=""){
         $('.error'+ error).text("");
         $('#'+id).attr("data-validacionEm", '0');
         $('#'+id).removeClass('inputDanger');
         $('#'+id).addClass('inputSuccess');
       }else{
         $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
         $('#'+id).attr("data-validacionEm", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger');
       }
       break;
     case 'int':
       if (valor.match(/^[0-9]*$/) && valor!=""){
        console.log('p');
        validarNumeroEmpleado(valor,error,id);
       }else{
         $('.error'+ error).text("Solo numeros.");
         $('#'+id).attr("data-validacionEm", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger'); 

         $('#nombre').attr("disabled",true);
         $('#cargo').attr("disabled",true);
         $('#clvdepto').attr("disabled",true);
       }
     break;
     case 'password':
       if (valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionEm", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("La contraseña no puede ir vacía.");
       $('#'+id).attr("data-validacionEm", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'select':
       if (valor!="0"){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionEm", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Seleccione una opción.");
       $('#'+id).attr("data-validacionEm", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     default:
     console.log('default');
   }
   enablebtnEm();
}

/* **********************************************************************************
    Funcionalidad: Valida que el arreglo de validación este lleno de ceros para activar el boton de registrar,
                    si el arreglo contiene por lo menos un 1, no activa el boton
    Parámetros: No recibe parámetros
    Retorna: Activa o desactiva el boton de registrar

********************************************************************************** */

function enablebtnEm()
{
 var array = [];
 var claserror = $('.validateDataEm');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionEm'));
 }

//console.log(array);
 if(array.includes('1'))
 { 
   $('#btn-submitEm').prop("disabled", true);
 }
 else
 {
   $('#btn-submitEm').prop("disabled", false);
 }
}