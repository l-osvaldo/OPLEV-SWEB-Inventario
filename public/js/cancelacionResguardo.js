$('#empleadoCR').change(function() {
	if ( $(this).val() != 0){

		$('#cargandoCR').css("display","block");
		$('#divRespuestaCR').css("display","none");
		$('#btnCancelarResguardo').css("display","block");
		$('#divBtnCancelar').css("display","block");
		bienesDelEmpleado($(this).val());
	}else{
		$('#divRespuestaCR').css("display","none");
		$('#btnCancelarResguardo').css("display","none");
	}
});


function bienesDelEmpleado(empleado){

	var empleadoNumNombre = empleado.split('*');

	$.ajaxSetup(
	{
		headers:
		{ 
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
    url: "bienesDelEmpleado",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: { numEmpleado: empleadoNumNombre[0], nombreEmpleado: empleadoNumNombre[1] },
    dataType: 'html',
    contentType: 'application/json'

  }).done(function(response) {
  	$('#divRespuestaCR').css("display","block");
  	$('#respuestaCR').html(response);
  	$('#cargandoCR').css("display","none");
  });
}


function confirmacionCancelacion (){
	var empleadoNumNombre = $('#empleadoCR').val().split('*');
	swal({
         title: "Cancelar el resguardo del empleado "+empleadoNumNombre[1],
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#E71096",
         confirmButtonText: "Sí",
         closeOnConfirm: true
     }, function(isConfirm){

	    if (isConfirm) {
	          $.ajax({
	             type:'POST',
	             url:'cancelacionResguardoconfirmado',
	             data:{ numEmpleado: empleadoNumNombre[0] },
	            success:function(data){
	            	console.log(data);

	                swal({title: "Listo!", text: "Cancelacion de resguardo realizada", type: "success"},
	                   function(){
	                   	   window.open('../catalogos/reportes/cancelacionResguardoPDF/'+data,'_blank');
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
}