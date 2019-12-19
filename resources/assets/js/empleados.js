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
})