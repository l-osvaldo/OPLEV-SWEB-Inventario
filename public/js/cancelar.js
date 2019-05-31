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

/*$('#exampleModal').on('hidden.bs.modal', function (e) {
  $(this).find('.validateData').removeClass('inputSuccess');
  $(this).find('.validateData').removeClass('inputDanger');
  $(this).find('.validateData').attr("data-validacion",'1');
  $(this).find('.text-danger').text('');
  $(this).find("input,textarea,select").val('').end();      
})

$('#exampleModal').on('hidden.bs.modal', function (e) {
  $(this).find('.validateData').removeClass('inputSuccess');
  $(this).find('.validateData').removeClass('inputDanger');
  $(this).find('.validateData').attr("data-validacion",'1');
  $(this).find('.text-danger').text('');
  $(this).find("input,textarea,select").val('').end();      
})*/