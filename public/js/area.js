
/********************************** funciones para el módulo de área *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que valida que el campo para editar el nombre de un área cumpla con lo requerido, no debe estar vacio y no tener caracteres especiales 
    Parámetros: Valor del campo a validar, error, su id del elemento, tipo
    Retorna: Valido o no valido el elemento

********************************************************************************** */

function datosValidosArea(valor, error, id, tipo)
{
  // console.log(valor);
 switch (tipo) {
  case 'text':
    //console.log(valor);
    if (valor.match(/^[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]*$/) && valor!=""){
     $('.error'+ error).text("");
     $('#'+id).attr("data-validacionArea", '0');
     $('#'+id).removeClass('inputDanger');
     $('#'+id).addClass('inputSuccess');
     // console.log(valor);
    }else{
     $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
     $('#'+id).attr("data-validacionArea", '1');
     $('#'+id).removeClass('inputSuccess');
     $('#'+id).addClass('inputDanger');
    }
    break;
   
  default:
   console.log('default');
 }
 enablebtnArea();
}

/* **********************************************************************************

    Funcionalidad: Función que abre el modal de editar el nombre del área
    Parámetros: id del área y su nombre
    Retorna: Abre el modal

********************************************************************************** */

$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var area = button.data('area');
  var id = button.data("areaid");
  var modal = $(this)
  modal.find('.modal-body #depto').val(area);
  modal.find('.modal-body #editClave').val(id);
  //console.log(area,id)
  
});

/* **********************************************************************************

    Funcionalidad: Abre un alerta para confirmar que se quiere actualizar el nombre del área seleccionada, se ser aceptada actualiza el nombre y cierra el modal, de lo contrario solo se cierra el alerta 
    Parámetros: El id del área y el nombre nuevo del área
    Retorna: Alerta con el mensaje "Area actualizada"

********************************************************************************** */

$('#editBtn').on('click',function(e){
    e.preventDefault();
    swal({
        title: "Editar el nombre de está área",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#E71096",
        confirmButtonText: "Sí",
        closeOnConfirm: true
    }, function(isConfirm){
       if (isConfirm) {
          var id = $('#editClave').val();
          var no = $('#depto').val();
          console.log(id,no);
          $.ajaxSetup(
          {
            headers:
            { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          
          $.ajax({
             type:'POST',
             url:'updatearea',
             data:{id:id, no:no},
            success:function(data){
                swal({title: "Listo!", text: "Area actualizada", type: "success"},
                   function(){ 
                       location.reload();
                   }
                )
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error!", "Por favor intentelo de nuevo!", "error");
              }
          });
        } else {
          swal("Error!", "Por favor intentelo de nuevo", "error");
        }
    });
});

/* **********************************************************************************

    Funcionalidad: Cuando el usuario suelta una tecla en el teclado comienza a validar el campo, manda llamar a la función datosValidosArea()
    Parámetros: El valor ingresado al campo
    Retorna: No regresa nada 

********************************************************************************** */

$( ".validateDataArea" ).keyup(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArea");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArea");
   // console.log(valor,error,id,tipo);
   datosValidosArea(valor, error, id, tipo);
});

/* **********************************************************************************

    Funcionalidad: Función que activa el boton de actualizar si el nombre a actualizar es valido
    Parámetros: El valor ingresado al campo
    Retorna: activa el boton de actualizar si los datos son validos 

********************************************************************************** */

function enablebtnArea()
{
 var array = [];
 var claserror = $('.validateDataArea');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionArea'));
 }

//console.log(array);

 if(array.includes('1'))
 { 
   $('#editBtn').prop("disabled", true);
 }
 else
 {
   $('#editBtn').prop("disabled", false);
 }

};

/* **********************************************************************************

    Funcionalidad: Función que espera que el usuario presione el boton de cancelar o cierre el modal a traves de la x que esta en la parte superior izquierda del modal,
                    esto cierra el modal y regresa sus valores predeterminados
    Parámetros: No recibe parámetros
    Retorna: Cierra el modal

********************************************************************************** */

$('#editModal').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataArea').removeClass('inputSuccess');
  $(this).find('.validateDataArea').removeClass('inputDanger');
  $(this).find('.validateDataArea').attr("data-validacionArea",'1');
  $(this).find('.text-danger').text('');
  enablebtnArea();         
}); 