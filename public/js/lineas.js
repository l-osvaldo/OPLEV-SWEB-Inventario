$('#PartidasL').change(function (){
  if ( $(this).val() != 0){
    $.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "datosLinea",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { Partidas: $(this).val() },
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);
    	$('#lineaRespuesta').html(response); 
    	    	    	
    });
  }
});

$('#btn-submit3').on('click',function(e){
   e.preventDefault();
   var form = $(this).parents('form');
   swal({
       title: "Registro de Líneas",
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

$('#exampleModalLinea').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataLi').removeClass('inputSuccess');
  $(this).find('.validateDataLi').removeClass('inputDanger');
  $(this).find('.validateDataLi').attr("data-validacion",'1');
  $(this).find('.text-danger').text('');
  $('#partida').val("0").change();
  $('#LineaMax').val("0"); 
  $('#desclinea').val(""); 
  $('#descsub').val("");         
})