$(function() {

  $.ajaxSetup(
	{
		headers:
		{ 
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#Partidas").change(function() 
  {		
		$('#Linea').val("0").change();      
		var partida = $('#Partidas').find(':selected').val();
    //console.log(partida);
    if (partida != 'Seleccione una Partida'){
      
      $.ajax({
      url: "obtenLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        // console.log(response);

        
          // console.log('123');
          // $('#Linea').val("Seleccione una Línea").change();
          
          comboLineas = "<option value='0'>Número de Línea</option>";
          $.each(response, function(index, value){
            var cadena = value['linea'] + " - " + value['desclinea'];
            comboLineas += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
          });

          $('#Linea').html(comboLineas);
        
          $('#Linea').prop("disabled", false);

          $('#sublineaRespuesta').css("display","none");

          //console.log('prueba');
                  
      });
    }else{
      comboLineas = "<option value='0'>Seleccione Linea...</option>";
      $('#Linea').html(comboLineas);
      $('#Linea').prop("disabled", true);
    }    
  });
});

 $('#Linea').change(function()
 {    
    if ($('#Linea').val() != 0){
      $('#btnMostrarSublinea').prop("disabled", false);
    }else{
      $('#btnMostrarSublinea').prop("disabled", true);
    }
 }); 		

//funcion para traer partida
  $("#partida").change(function() 
  {		
		$('#LineaMax').html('');    
		var partida = $('#partida').find(':selected').val();;
    $.ajax({
      url: "obtenMaxLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        //console.log(response.length);

        if (response.length != 0){
          var b = response.length+1;
          if (b < 10){
            b = '0' + b; 
          }
          console.log(b);
          $('#LineaMax').val(b);
        }else{
          $('#LineaMax').val("0");
          $('#LineaMax').html("0");
        }	

      }); 
  });		


//funcion para traer partida y linea
$("#partidaA").change(function() 
{		
  $('#lineaA').html('');
  $('#lineaA').removeClass('inputSuccess');
  $('#lineaA').removeClass('inputDanger');
  $('#lineaA').attr("data-validacion",'1');
  $('#btn-submit').prop("disabled", true);      
  var partida = $('#partidaA').find(':selected').val();

  //console.log(partida);
  $.ajax({
    url: "obtenLineasAg",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: {partida: partida},
    dataType: 'json',
    contentType: 'application/json'
    }).done(function(response) {
        //console.log(response);
        
        comboLineasA = "<option value='0'>Número de Línea</option>";
        $.each(response, function(index, value){
          var cadena = value['linea'] + " - " + value['desclinea'];
          comboLineasA += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
        });
        $('#lineaA').html(comboLineasA);
        $('#lineaA').val('0').change();  				
    	});
  });


$("#lineaA").change(function() {
    if ($(this).val() != '0'){
      $('#sublinea').html('');    
      var partida = $('#partidaA').find(':selected').val();
      var linea = $('#lineaA').find(':selected').val();
      $.ajax({
        url: "obtenSublineas",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'GET',
        data: {partida: partida, linea:linea},
        dataType: 'json',
        contentType: 'application/json'
        }).done(function(response) {

          $('#sublinea').val(response);
          $('#sublinea').html(response);
  /*      
          var c = response.length+1;
          console.log(c);
          $('#sublinea').attr("value",c);*/

        }); 
    }   
    
}); 