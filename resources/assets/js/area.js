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
        title: "Edición de datos",
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