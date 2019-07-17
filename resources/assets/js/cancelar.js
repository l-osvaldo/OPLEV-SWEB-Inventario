$('#exampleModal').on('hidden.bs.modal', function (e) {
  $(this).find('.validateData').removeClass('inputSuccess');
  $(this).find('.validateData').removeClass('inputDanger');
  $(this).find('.validateData').attr("data-validacion",'1');
  $(this).find('.text-danger').text('');
  $('#partidaI').val("");
  $('#descpartida').val("");
  $('#desclinea').val("");
  $('#descsub').val("");   
})

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

$('#exampleModalTb').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataDos').removeClass('inputSuccess');
  $(this).find('.validateDataDos').removeClass('inputDanger');
  $(this).find('.validateDataDos').attr("data-validacion",'1');
  $(this).find('.text-danger').text('');
  $('#descsub').val("");
  $('#partidaA').val("No. partida").change(); 
  $('#sublinea').val("0");    
})


$('#exampleModalEmpleado').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataEm').removeClass('inputSuccess');
  $(this).find('.validateDataEm').removeClass('inputDanger');
  $(this).find('.validateDataEm').attr("data-validacionEm",'1');
  $(this).find('.text-danger').text('');   
  $('#numemple').val("");
  $('#nombre').val("");
  $('#cargo').val("");
  $('#clvdepto').val("0").change();
})


$('#altasModal').on('hidden.bs.modal', function (e) {
  //reiniciarmodal('partidaAltaArticulo');
  $('#partidaAltaArticulo').val("0").change();
})

$('#altasECOModal').on('hidden.bs.modal', function (e) {
  //reiniciarmodal('partidaAltaArticulo');
  $('#partidaAltaArticuloECO').val("0").change();
})


