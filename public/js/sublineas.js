$('#Linea').change(function (){
  if ( $(this).val() != 0){
    $.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "datosSublinea",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { Linea: $(this).val(), Partida: $('#Partidas').val() },
      dataType: 'html',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);

      $('#sublineaRespuesta').css("display","block");
    	$('#sublineaRespuesta').html(response); 
    	    	    	
    });
  }
});

$('#btn-submit').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Registro de Sublíneas",
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