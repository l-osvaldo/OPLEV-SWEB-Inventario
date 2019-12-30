
/********************************** funciones para el módulo de cancelación de resguardo *******************************************************/

/* **********************************************************************************
    Funcionalidad: Función que espera un cambio en el selector de empleado, si el valor es diferente de cero, la función manda a llamar a bienesDelEmpleado()
    Parámetros: Valor del selector 
    Retorna: No regresa nada

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Obtiene todos los bienes OPLE Y ECO de un empleado seleccionado
    Parámetros: empleado
    Retorna: Un html con un datatable con los bienes que tiene a su resguardo el empleado seleccionado

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación sobre la cancelación de resguardo
    Parámetros: empleado
    Retorna: Alerta con el mensaje de "Cancelacion de resguardo realizada" si fue exitoso la cancelación, si no manda el mensaje "Error!", "Por favor intentelo de nuevo!", "error" y un reporte en PDF

********************************************************************************** */

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