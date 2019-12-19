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