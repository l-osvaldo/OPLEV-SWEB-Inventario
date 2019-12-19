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
