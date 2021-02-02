
/********************************** funciones para el modal de editar un artículo OPLE *******************************************************/

/* **********************************************************************************
    Funcionalidad: Obtiene toda la información de un bien y la mustra en un modal, con la opción de editar 
    				ciertos campos de este como: factura, precio, fecha de compra, marca, modelo, número de serie,
    				color, material, medidas y estado
    Parámetros: numero de inventario  
    Retorna: Modal de editar

********************************************************************************** */
 
 function abrirModalEditar(numInventario) {
 	var baja = document.getElementById('btnBajaArt');
 	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "InformacionArticulo",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { numInventario: numInventario },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	//console.log(response);


    	$.each(response, function(i, item) {
    		//console.log(item['partida 
    		//alert(item['nombrearea']);
    		item['nombrearea'] == 'BODEGA' ? $('#btnBajaArt').addClass('d-none') :  $('#btnBajaArt').removeClass('d-none');

    		$('#editarPartida').html(item['partida']);
    		$('#editarLinea').html(item['linea']);
    		$('#editarSublinea').html(item['sublinea']);

    		$('#editarPartidaN').html(item['descpartida']);
    		$('#editarLineaN').html(item['desclinea']);
    		$('#editarSublineaN').html(item['descsublinea']);

    		$('#editarNoInventario').html(item['numeroinv']);
    		$('#editarConcepto').html(item['concepto']); 
    		$('#editarResponsable').html(item['nombreemple']); 
    		$('#editarArea').html(item['nombrearea']); 

    		$('#editarFactura').val(item['factura']);
    		$('#editarImporte').val(item['importe']);

    		if (item['fechacomp'] === '0'){
    			console.log('entre');
    			
    			//$('#editarDateFechaCompra').val("2001-05-05");
    			//$('#editarDateFechaCompra').val("DD-MM-YYYY");
    			//$('#editarDateFechaCompra').val("YYYY-MM-DD");
    		}else{
    			$('#editarDateFechaCompra').val(item['fechacomp']);
    		}

    		
    		$('#editarMarca').val(item['marca']);
    		$('#editarModelo').val(item['modelo']);
    		$('#EditarNumSerie').val(item['numserie']);
    		$('#editarColor').val(item['colores']);
    		$('#editarMaterial').val(item['material']);
    		$('#editarMedidas').val(item['medidas']);
    		$('#editarEstado').val(item['clvestado']).change();

    		$('#numeroInventario').val(numInventario);

    		$('#btnActualizarArticulo').prop("disabled", true);
			$('#btnActualizarArticulo').css("display","none");


		});
    	$('#editarModal').modal('show');     	    	
    }); 	
 }

 /* **********************************************************************************
    Funcionalidad: Función que cierra el modal de editar y regresa a sus valores predeterminados todos los 
    				campos editables
    Parámetros: No recibe parámetros 
    Retorna: Cerrar modal

********************************************************************************** */

$('#editarModal').on('hidden.bs.modal', function (e) {
  $('#activarEditar').prop("checked", false).change();
});

/* **********************************************************************************
    Funcionalidad: Obtiene el valor de un check, que el usuario activa o no para editar alguna información del bien
    Parámetros: No recibe parámetros 
    Retorna: Activa o desactiva los campos editables

********************************************************************************** */
 $('#activarEditar').change(function(){
    	if( $('#activarEditar').is(':checked') ) {
		    $('#editarFactura').prop("disabled", false);
	    	$('#editarImporte').prop("disabled", false);
	    	$('#editarDateFechaCompra').prop("disabled", false);
	    	$('#editarMarca').prop("disabled", false);
	    	$('#editarModelo').prop("disabled", false);
	    	$('#EditarNumSerie').prop("disabled", false);
	    	$('#editarColor').prop("disabled", false);
	    	$('#editarMaterial').prop("disabled", false);
	    	$('#editarMedidas').prop("disabled", false);
	    	$('#editarEstado').prop("disabled", false);


	    	$('#editarFactura').removeClass('inputDanger');
	    	$('#editarImporte').removeClass('inputDanger');
	    	$('#editarDateFechaCompra').removeClass('inputDanger');
	    	$('#editarMarca').removeClass('inputDanger');
	    	$('#editarModelo').removeClass('inputDanger');
	    	$('#EditarNumSerie').removeClass('inputDanger');
	    	$('#editarColor').removeClass('inputDanger');
	    	$('#editarMaterial').removeClass('inputDanger');
	    	$('#editarMedidas').removeClass('inputDanger');
	    	$('#editarEstado').removeClass('inputDanger');


	    	$('#editarFactura').addClass('inputSuccess');
	    	$('#editarImporte').addClass('inputSuccess');
	    	$('#editarDateFechaCompra').addClass('inputSuccess');
	    	$('#editarMarca').addClass('inputSuccess');
	    	$('#editarModelo').addClass('inputSuccess');
	    	$('#EditarNumSerie').addClass('inputSuccess');
	    	$('#editarColor').addClass('inputSuccess');
	    	$('#editarMaterial').addClass('inputSuccess');
	    	$('#editarMedidas').addClass('inputSuccess');
	    	$('#editarEstado').addClass('inputSuccess');
		}else{
			$('#editarFactura').prop("disabled", true);
	    	$('#editarImporte').prop("disabled", true);
	    	$('#editarDateFechaCompra').prop("disabled", true);
	    	$('#editarMarca').prop("disabled", true);
	    	$('#editarModelo').prop("disabled", true);
	    	$('#EditarNumSerie').prop("disabled", true);
	    	$('#editarColor').prop("disabled", true);
	    	$('#editarMaterial').prop("disabled", true);
	    	$('#editarMedidas').prop("disabled", true);
	    	$('#editarEstado').prop("disabled", true);

	    	$('#editarFactura').removeClass('inputDanger');
	    	$('#editarImporte').removeClass('inputDanger');
	    	$('#editarDateFechaCompra').removeClass('inputDanger');
	    	$('#editarMarca').removeClass('inputDanger');
	    	$('#editarModelo').removeClass('inputDanger');
	    	$('#EditarNumSerie').removeClass('inputDanger');
	    	$('#editarColor').removeClass('inputDanger');
	    	$('#editarMaterial').removeClass('inputDanger');
	    	$('#editarMedidas').removeClass('inputDanger');
	    	$('#editarEstado').removeClass('inputDanger');


	    	$('#editarFactura').removeClass('inputSuccess');
	    	$('#editarImporte').removeClass('inputSuccess');
	    	$('#editarDateFechaCompra').removeClass('inputSuccess');
	    	$('#editarMarca').removeClass('inputSuccess');
	    	$('#editarModelo').removeClass('inputSuccess');
	    	$('#EditarNumSerie').removeClass('inputSuccess');
	    	$('#editarColor').removeClass('inputSuccess');
	    	$('#editarMaterial').removeClass('inputSuccess');
	    	$('#editarMedidas').removeClass('inputSuccess');
	    	$('#editarEstado').removeClass('inputSuccess');

	    	$('.error1').text("");
	    	$('.error2').text("");
	    	$('.error7').text("");
	    	$('.error3').text("");
	    	$('.error4').text("");
	    	$('.error5').text("");

	    	$('#btnActualizarArticulo').prop("disabled", true);
			$('#btnActualizarArticulo').css("display","none");


		}
    	
    	
    });

/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en el campo de editar color,
    				 comienza a validar el campo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

 $('#editarColor').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

 /* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en el campo de editar material,
    				 comienza a validar el campo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

 $('#editarMaterial').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

 /* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en el campo de editar Medidas,
    				 comienza a validar el campo
    Parámetros: El valor ingresado al campo 
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

 $('#editarMedidas').keyup(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

  /* **********************************************************************************
    Funcionalidad: Obtiene el valor del selector de estado
    Parámetros: El valor del selector de estado
    Retorna: Activa o desactiva el botón actualizar

********************************************************************************** */

  $('#editarEstado').change(function(){
 	$('#btnActualizarArticulo').prop("disabled", false);
	$('#btnActualizarArticulo').css("display","block");
 });

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación para la actualización de los campos de un bien
    Parámetros: Formulario de los datos que se pueden actualizar
    Retorna: Alerta de confirmación cpn el mensaje "Actualización de Datos de este Artículo"

********************************************************************************** */

 $('#btnActualizarArticulo').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
      title: "Actualización de Datos de este Artículo",
      text: "¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#E71096",
      confirmButtonText: "Sí",
      closeOnConfirm: false
  }, function(isConfirm){
      if (isConfirm) {
        form.submit();
      }else {
        swal("Error!", "Por favor intentelo de nuevo", "error");
      }
      
  });
});

 /* **********************************************************************************

    Funcionalidad: Mascara para el campo de precio unitario, esta función hace que se muestre siempre un prefijo en el campo, antes del valor se muestra 'MXN$ '
    Parámetros: no recibe parámetros
    Retorna: Una mascara para el campo de texto de precio unitario, se muestra siempre un prefijo antes de la cantidad 'MXN$ '

********************************************************************************** */

$("#editarImporte").maskMoney({
	// The symbol to be displayed before the value entered by the user
	prefix:'MXN$ ',
	// The suffix to be displayed after the value entered by the user(example: "1234.23 €").
	suffix: "",
	// Delay formatting of text field until focus leaves the field
	formatOnBlur: false,
	// Prevent users from inputing zero
	allowZero:false,
	// Prevent users from inputing negative values
	allowNegative:true,
	// Allow empty input values, so that when you delete the number it doesn't reset to 0.00.
	allowEmpty: false,
	// Select text in the input on double click
	doubleClickSelection: true,
	// Select all text in the input when the element fires the focus event.
	selectAllOnFocus: false,
	// The thousands separator
	thousands: ',',
	// The decimal separator
	decimal: '.' ,
	// How many decimal places are allowed
	precision: 2,
	// Set if the symbol will stay in the field after the user exits the field.
	affixesStay : false,
	// Place caret at the end of the input on focus
	bringCaretAtEndOnFocus: true
});


 


 /* **********************************************************************************
    Funcionalidad: Función para confirmar la baja del artículo y hacer el update en la tabla de articulos
    Parámetros: No recibe parámetros 
    Retorna: Confirmación de baja de artículo

********************************************************************************** */

function confirmBajaArt(){
	var numInv = document.getElementById('editarNoInventario').textContent;
	var area = document.getElementById('editarArea').textContent;

	swal({
	      title: area =='BODEGA' ?  "Este artículo SERÁ DADO DE BAJA DEFINITIVAMENTE" : "Este artículo SERÁ ENVIADO A BODEGA",
	      text: "¿Desea continuar?",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonColor: "#E71096",
	      confirmButtonText: "Sí",
	      closeOnConfirm: false
	  }, function(isConfirm){
	      if (isConfirm) {
	        
	        $.ajax({
	          type:'get',
	          url:'./bajaArticulo',
	          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	          data:{numInv:numInv},
	          success:function(data){
	            console.log(data);
	            swal({
	              position: 'center',
	              type:'success',
	              title: area =='BODEGA' ? 'El artículo HA SIDO DADO DE BAJA DEFINITIVAMENTE' : 'Este artículo HA SIDO ENVIADO A BODEGA',
	              showConfirmButton: false,
	              timer: 1800
	            })
	           //location.reload();
	          },
	          error: function (xhr, ajaxOptions, thrownError) {
	              //alert('error');
	          }
	        });
		
	      }else {
	        swal("Cancelado!", "El artículo no se dio de baja", "error");
	      }
	      
	  });

}



 /* **********************************************************************************
    Funcionalidad: Función para buscar un artículo y llenar la tabla de articulos de baja
    Parámetros: No recibe parámetros 
    Retorna: Confirmación o negación de búsqueda de artículo

********************************************************************************** */

function buscaArt(){
	var numInv = document.getElementById('numeroinvArt').value;
	var arrArticulos = [];
	var ievopl = numInv.split('-');
	var idArts = [];
	
	var importArts = document.getElementsByClassName('artIdInvt');

	for (var i = 0; i < importArts.length; i++) {
           importArts[i].textContent;
           idArts.push(importArts[i].textContent); 
        }
    
    var numArt = idArts.includes(numInv);
	console.log(numArt);

	if (numArt == false) {
		if (ievopl[0] == 'IEV' || ievopl[0] == 'iev' || ievopl[0] == 'OPLEV' || ievopl[0] == 'oplev') {
			$.ajax({
	        	type:'POST', 
	        	url:'./buscaArt',
	        	headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	        	data:{numInv:numInv},
	        	success:function(data){
	            //console.log(data.length );
	            if (data.length >= 1) {
	            	
	            	var styleOpt = { style: 'currency', currency: 'USD' };
					var totalFormat = new Intl.NumberFormat('en-US', styleOpt);
					totalFormat.format(intImporte);

					var intImporte = parseFloat(data[0].importe);
					var formatImporte = new Intl.NumberFormat('es-MX').format(intImporte);
					console.log(totalFormat.format(intImporte));

	            	$("#agregaArt").modal()

	            	document.getElementById('numInvBdef').innerHTML= numInv;
	            	document.getElementById('concepBdef').innerHTML=data[0].concepto;
	            	document.getElementById('facturaBdef').innerHTML=data[0].factura;
	            	document.getElementById('fechaCBdef').innerHTML=data[0].fechacomp;
	            	document.getElementById('importeBdef').innerHTML='$ '+data[0].importe;
	            	//document.getElementById('importeBdef').innerHTML='$ '+totalFormat.format(intImporte);

	            }else{
		            swal({
			            position: 'center',
			            type:'error',
			            title: 'El artículo ingresado no se encuentra en la bodega',
			            showConfirmButton: false,
			            timer: 3000
		            });
	            }
	            //location.reload();
	           },
	           error: function (xhr, ajaxOptions, thrownError) {
	            console.log('err')
	           }
	        });

		}else{
			swal({
	              position: 'center',
	              type:'warning',
	              title: 'Verifique el número de inventario escrito' ,
	              showConfirmButton: false,
	              timer: 3000
	            });
		}

	}else{
		swal({
        	position: 'center',
        	type:'warning',
        	title: 'Este artículo ya fue ingresado a la lista' ,
        	showConfirmButton: false,
        	timer: 3000
        });
	}
}


function agregaArtBajDef(){

	document.getElementById('tableBajasDef').classList.remove('d-none');
	document.getElementById('btnEnvArtBajDef').classList.remove('d-none');

	var numInvBdef=document.getElementById('numInvBdef').textContent;
	var concepBdef =document.getElementById('concepBdef').textContent;
	var facturaBdef =document.getElementById('facturaBdef').textContent;
	var fechaCBdef =document.getElementById('fechaCBdef').textContent;
	var importeBdef =document.getElementById('importeBdef').textContent;
	
	var importeFormat = importeBdef.replace('$','')

	var tablaArtBDef = document.getElementById('tableBajasDef');

	var styleOpt = { style: 'currency', currency: 'USD' };
	var totalFormat = new Intl.NumberFormat('en-US', styleOpt);
	//totalFormat.format(importeFormat);
	//console.log(totalFormat.format(importeFormat));

    var artBajaList = document.createElement('tr');
        artBajaList.id = numInvBdef;

    var numInv = document.createElement('td');
        numInv.textContent = numInvBdef;
        numInv.className = 'artIdInvt';
        artBajaList.appendChild(numInv);

    var conceptBajaD = document.createElement('td');
        conceptBajaD.textContent = concepBdef;
        artBajaList.appendChild(conceptBajaD);

    var factBajDef = document.createElement('td');
        factBajDef.textContent = facturaBdef;
        artBajaList.appendChild(factBajDef);

    var fechCompBDef = document.createElement('td');
        fechCompBDef.textContent = fechaCBdef;
        artBajaList.appendChild(fechCompBDef);

    var importBajDef = document.createElement('td');
        importBajDef.textContent = totalFormat.format(importeFormat);
        importBajDef.className = 'importArtInvt';
        artBajaList.appendChild(importBajDef);

    var elim = document.createElement('td');    
    var icon = document.createElement("i");
        //icon.addEventListener('click', quitaBeneficiarioFall, false);
        icon.addEventListener('click', quitaArticulo, false);
        icon.className='fa fa-times-circle';
        icon.style.cursor='pointer';
        icon.style.color='#dc3545';
        icon.style.fontSize='24px';
        elim.style.textAlign = 'center';
        elim.appendChild(icon);
        artBajaList.appendChild(elim);
        //icon.style.float='right';
        //icon.setAttribute('data-idRegistro',datoInconsis.id);

    tablaArtBDef.appendChild(artBajaList);

    var importArts = document.getElementsByClassName('importArtInvt');
    //var imptotal = importArts.replace('$','');
    var total = 0;

        for (var i = 0; i < importArts.length; i++) {
           importArts[i].textContent;
           var impTotal = importArts[i].textContent;
           var importeTotal = impTotal.replace('$','');
           var formImporte = importeTotal.replace(',','');
           total += parseFloat(formImporte);
           //console.log(total);
        }

    icon.setAttribute('data-importArt',formImporte);

	$("#agregaArt").modal('hide');

	document.getElementById('importeTotalArts').classList.remove('d-none');
	document.getElementById('importeTotBajDef').textContent = totalFormat.format(total);
	//importeTotalArts new Intl.NumberFormat('en-US', options2);
	//const amount = total;
	//console.log(totalFormat.format(total));
}



function quitaArticulo(){

	//var importe = this.getElementById('importArt').textContent; getAttribute('data-idRegistro');
	var importeBtn = this.getAttribute('data-importArt');
	var rowArt = this.parentNode.parentNode;
	var impAnterior = document.getElementById('importeTotBajDef').textContent;

	var impReplace = impAnterior.replace('$','');
	var impReplaceForm = impReplace.replace(',','');
	//alert(impReplace);
	var calcTotalN = parseFloat(impReplaceForm)-parseFloat(importeBtn);
	console.log(importeBtn, impReplaceForm, calcTotalN);

	var importArts = document.getElementsByClassName('importArtInvt');
	console.log(importArts.length);
	swal({
      title: "Éste artículo se eliminará de la lista de baja definitiva",
      text: "¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#E71096",
      confirmButtonText: "Sí",
      closeOnConfirm: false
  }, function(isConfirm){
      if (isConfirm) {

      	console.log(calcTotalN);
      	//impAnterior = calcTotalN;
      	document.getElementById('importeTotBajDef').textContent = calcTotalN;
      	rowArt.remove();

      	//importeTotBajDef
      	
      	importArts.length === 0 ? (
        document.getElementById('tableBajasDef').classList.add('d-none'),
        document.getElementById('btnEnvArtBajDef').classList.add('d-none'),
        document.getElementById('importeTotalArts').classList.add('d-none'),
        document.getElementById('importeTotBajDef').textContent = ''
        ) : '';
      	
      	//OPERACION DE ELIMINAR EL TR Y RECALCULAR EL TOTAL DEL IMPORTE
        swal({
        	position: 'center',
        	type:'success',
        	title: 'Artículo Eliminado' ,
        	showConfirmButton: false,
        	timer: 3000
        });
      }else {
        swal("Cancelado!", "El artículo no se eliminó de la lista");
      }
      
  });
}




function enviaArtBajaDefinit(){
	 var articulosBDef = document.getElementsByClassName('artIdInvt');
	 //var importeTot = document.getElementById('importeTotBajDef').textContent;
	 var arrArticulos = [];

        for (var i = 0; i < articulosBDef.length; i++) {
           articulosBDef[i].textContent;
           arrArticulos.push(articulosBDef[i].textContent);
           //console.log(articulosBDef[i].textContent);
        }
        console.log(arrArticulos);
   
		$.ajax({
          type:'POST', 
          url:'./articulosBajaDefinitiva',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          data:{arrArticulos:arrArticulos},
         success:function(data){
            console.log(data);
            document.getElementById('loader').classList.remove('d-none');
            location.reload();
           },
           error: function (xhr, ajaxOptions, thrownError) {
            console.log('err')
           }
        });
}



 /* **********************************************************************************
    Funcionalidad: Función para buscar un artículo y llenar la tabla de articulos de baja
    Parámetros: No recibe parámetros 
    Retorna: Confirmación o negación de búsqueda de artículo

********************************************************************************** */

function buscaArtEco(){
	var numInv = document.getElementById('numeroinvArt').value;
	//alert('numInv');
	var arrArticulos = [];

	var ievopl = numInv.split('-');
	var idArts = [];
	
	var importArts = document.getElementsByClassName('artIdInvt');

	for (var i = 0; i < importArts.length; i++) {
           importArts[i].textContent;
           idArts.push(importArts[i].textContent); 
        }
    
    var numArt = idArts.includes(numInv);
	//alert(numArt);
	if (numArt == false) {
		if (ievopl[0] == 'IEV' || ievopl[0] == 'iev' || ievopl[0] == 'ECO') {
			$.ajax({
	        	type:'POST', 
	        	url:'./buscaArtEco',
	        	headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	        	data:{numInv:numInv},
	        	success:function(data){
	            //console.log(data.length );
	            if (data.length >= 1) {

	            	var styleOpt = { style: 'currency', currency: 'USD' };
					var totalFormat = new Intl.NumberFormat('en-US', styleOpt);
					totalFormat.format(intImporte);

					var intImporte = parseFloat(data[0].importe);
					var formatImporte = new Intl.NumberFormat('es-MX').format(intImporte);
					console.log(totalFormat.format(intImporte));
					//document.getElementById('importeBdef').innerHTML='$ '+totalFormat.format(intImporte);


	            	$("#agregaArt").modal()
	            	document.getElementById('numInvBdef').innerHTML= numInv;
	            	document.getElementById('concepBdef').innerHTML=data[0].concepto;
	            	document.getElementById('facturaBdef').innerHTML=data[0].factura;
	            	document.getElementById('fechaCBdef').innerHTML=data[0].fechacompra;
	            	document.getElementById('importeBdef').innerHTML='$ '+data[0].importe;

	            }else{
		            swal({
			            position: 'center',
			            type:'error',
			            title: 'El artículo ingresado no se encuentra en la bodega',
			            showConfirmButton: false,
			            timer: 3000
		            });
	            }
	            //location.reload();
	           },
	           error: function (xhr, ajaxOptions, thrownError) {
	            console.log('err')
	           }
	        });
		}else{
			swal({
	          position: 'center',
	          type:'warning',
	          title: 'Verifique el número de inventario escrito' ,
	          showConfirmButton: false,
	          timer: 3000
	        });
		}
	}else{
		swal({
        	position: 'center',
        	type:'warning',
        	title: 'Este artículo ya fue ingresado a la lista' ,
        	showConfirmButton: false,
        	timer: 3000
        });
	}
}


 /* **********************************************************************************
    Funcionalidad: Función para confirmar la baja del artículo y hacer el update en la tabla de articulos
    Parámetros: No recibe parámetros 
    Retorna: Confirmación de baja de artículo

********************************************************************************** */

function confirmBajaArtEco(){
	var numInv = document.getElementById('editarNoInventario').textContent;
	var area = document.getElementById('editarArea').textContent;

	swal({
	      title: "Este artículo SERÁ ENVIADO A BODEGA",
	      text: "¿Desea continuar?",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonColor: "#E71096",
	      confirmButtonText: "Sí",
	      closeOnConfirm: false
	  }, function(isConfirm){
	      if (isConfirm) {
	        
	        $.ajax({
	          type:'get',
	          url:'./bajaArticuloEco',
	          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	          data:{numInv:numInv},
	          success:function(data){
	            console.log(data);
	            swal({
	              position: 'center',
	              type:'success',
	              title: 'Este artículo HA SIDO ENVIADO A BODEGA',
	              showConfirmButton: false,
	              timer: 1800
	            })
	           //location.reload();
	          },
	          error: function (xhr, ajaxOptions, thrownError) {
	              //alert('error');
	          }
	        });
		
	      }else {
	        swal("Cancelado!", "El artículo no se dio de baja", "error");
	      }
	      
	  });

}




function enviaArtBajaDefinitEco(){
	 var articulosBDef = document.getElementsByClassName('artIdInvt');
	 //var importeTot = document.getElementById('importeTotBajDef').textContent;
	 var arrArticulos = [];

        for (var i = 0; i < articulosBDef.length; i++) {
           articulosBDef[i].textContent;
           arrArticulos.push(articulosBDef[i].textContent);
           //console.log(articulosBDef[i].textContent);
        }
        console.log(arrArticulos);
   
		$.ajax({
          type:'POST', 
          url:'./articulosBajaDefinitivaEco',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          data:{arrArticulos:arrArticulos},
         success:function(data){
            console.log(data);
            document.getElementById('loader').classList.remove('d-none');
            location.reload();
           },
           error: function (xhr, ajaxOptions, thrownError) {
            console.log('err')
           }
        });
}


