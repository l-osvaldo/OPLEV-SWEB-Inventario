
/********************************** funciones para el módulo de área *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio el menu de partidas, manda a llamar a la funcion de filtroLineasECO, si el valor es el inicial reinicia el modal
            llamando ala funcion reiniciarmodalECO 
    Parámetros: Valor del select 
    Retorna: No regresa nada

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

$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var area = button.data('area');
  var id = button.data("areaid");
  var modal = $(this)
  modal.find('.modal-body #depto').val(area);
  modal.find('.modal-body #editClave').val(id);
  //console.log(area,id)
  
});


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


$( ".validateDataArea" ).keyup(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorArea");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeArea");
   // console.log(valor,error,id,tipo);
   datosValidosArea(valor, error, id, tipo);
});



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


$('#editModal').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataArea').removeClass('inputSuccess');
  $(this).find('.validateDataArea').removeClass('inputDanger');
  $(this).find('.validateDataArea').attr("data-validacionArea",'1');
  $(this).find('.text-danger').text('');
  enablebtnArea();         
}); 