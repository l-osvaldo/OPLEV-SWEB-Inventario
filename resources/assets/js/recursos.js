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
		$('#Linea').html('');    
		var partida = $('#Partidas').find(':selected').val();
    $.ajax({
      url: "obtenLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
				console.log(response);
        comboLineas = "<option value='0'>Seleccione Linea...</option>";
        $.each(response, function(index, value){
          var cadena = value['linea'] + " - " + value['desclinea'];
          comboLineas += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
        });
        $('#Linea').html(comboLineas);  				
    	});
  });		

//funcion para traer partida
  $("#partida").change(function() 
  {		
		$('#LineaMax').html('');    
		var partida = $('#partida').find(':selected').val();
    $.ajax({
      url: "obtenMaxLineas",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {partida: partida},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        console.log(response.length);	



      var b = response.length+1;
        console.log(b);
        $('#LineaMax').attr("value",b);
      //  $('#LineaMax').text(b);

      }); 
  });		


//funcion para traer partida y linea
$("#partidaA").change(function() 
{		
  $('#lineaA').html('');    
  var partida = $('#partidaA').find(':selected').val();
  $.ajax({
    url: "/catalogos/obtenLineasAg",
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: 'GET',
    data: {partida: partida},
    dataType: 'json',
    contentType: 'application/json'
    }).done(function(response) {
        //console.log(response);
        
        comboLineasA = "<option value='0'>Seleccione Linea...</option>";
        $.each(response, function(index, value){
          var cadena = value['linea'] + " - " + value['desclinea'];
          comboLineasA += "<option value='"+value['linea']+"'>"+ cadena +"</option>";
        });
        $('#lineaA').html(comboLineasA);  				
    	});
  });


  $("#lineaA").change(function() 
  {		
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
        console.log(response);	                
        $('#sublinea').attr("value",response);
/*
        var c = response.length+1;
        console.log(c);
        $('#sublinea').attr("value",c);*/

      }); 
    });	

    function el(el) {
      return document.getElementById(el);
        }
  
    el("depto").addEventListener("input",function() {
        el("editBtn").disabled = Boolean(this.value.length<=0);
      });

});

