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


$('#editModal').on('hidden.bs.modal', function (e) {
  console.log('si');
  $(this).find('.validateDataArea').removeClass('inputSuccess');
  $(this).find('.validateDataArea').removeClass('inputDanger');
  $(this).find('.validateDataArea').attr("data-validacionArea",'1');
  $(this).find('.text-danger').text('');   
  
})

