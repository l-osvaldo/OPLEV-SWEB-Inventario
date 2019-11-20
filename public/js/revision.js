var validar = [1,1];
var t = $('#detalles').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-4'l><'col-sm-8 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "select": true,
    "language": {
      
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
} );

var ta = $('#detallesE').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-4'l><'col-sm-8 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "select": true,
    "language": {
      
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
} );

var tab = $('#detallesAsignacion').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "scrollY":        "300px",
    "scrollCollapse": true,
    "paging": false,
    "order": [[ 2, "asc" ]],
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-12 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "select": true,
    "language": {
      
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
});


$('#tableRevision').DataTable( {
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": false,
    "sSearch": "Filter Data",
    "dom":      "<'row'<'col-sm-12 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
    "select": true,
    "language": {
      
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
} );

function detalleOPLE(id_cancelacion,nombreEmpleado) {
	//console.log(id_cancelacion);

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "detalleOPLE",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { id_cancelacion: id_cancelacion },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	// console.log(response);

    	if (response == 0 ){
    		swal({
			  title: "Información",
			  text: "Esta cancelacion No tiene artículos OPLE",
			  icon: "info",
			});
    	}else{
    		$('#nombreEmpleadoDOPLE').html(nombreEmpleado);

    		t.clear().draw();

    		$.each(response, function(i, item) {
			    //console.log(item);
			    t.row.add( [
		            item['numeroinventario'],
		            item['concepto'],
		            item['numserie'],
		            '$'+item['importe'],
		            item['nombreemple']		            
		        ] ).draw( false );
			});
    		$('#detalleOPLE').modal('show'); 
    	}   	
    	    	    	
    }); 
}

function detalleECO(id_cancelacion,nombreEmpleado) {
	//console.log(id_cancelacion);

	$.ajaxSetup(
	{
		headers:
		{ 
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
      url: "detalleECO",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { id_cancelacion: id_cancelacion },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
    	// console.log(response);

    	if (response == 0 ){
    		swal({
			  title: "Información",
			  text: "Esta cancelacion No tiene artículos ECO",
			  icon: "info",
			});
    	}else{
    		$('#nombreEmpleadoDECO').html(nombreEmpleado);

    		ta.clear().draw();

    		$.each(response, function(i, item) {
			    //console.log(item);
			    ta.row.add( [ 
		            item['numeroinventario'],
		            item['concepto'],
		            item['numserie'],
		            '$ '+item['importe'],
		            item['nombreemple']		            
		        ] ).draw( false );
			});
    		$('#detalleECO').modal('show'); 
    	}   	
    	    	    	
    }); 
}

function articulosAsignables(id_cancelacion) {
  //console.log(id_cancelacion);

  $.ajaxSetup(
  {
    headers:
    { 
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      url: "articulosAsignables",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: { id_cancelacion: id_cancelacion },
      dataType: 'json',
      async: true,
      contentType: 'application/json'

    }).done(function(response) {
      // console.log(response);

      if (response == 0 ){
        swal({
        title: "Todos los artículos de este lote ya estan asignados a un empleado",
        text: "Vea detalle OPLE y detalle ECO",
        icon: "info",
      });
      }else{

        tab.clear().draw();


        $.each(response, function(i, item) {
          //console.log(item);
          tab.row.add( [
                '<div class="form-check" align="center">'+
                  '<label class="form-check-label">'+
                    '<input type="checkbox" class="form-check-input mycheckbox" onchange="cambioCheckBox()" name="articuloSeleccionado[]" value="'+item['numeroinventario']+'" style="margin-top: -0.8rem;">'+
                  '</label>'+
                '</div>',
                item['numeroinventario'],
                item['concepto'],
                item['numserie'],
                '$ '+item['importe']               
            ] ).draw();
      });
        //tab.columns.adjust().draw();
        $('#modalAsignación').modal('show'); 
      }     
                  
    }); 
}

$("#selectAll").click(function(){
  $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
  if ( $(this).prop('checked')){
    validar[0] = 0; 
  }else{
    validar[0] = 1; 
  }
  activarBtnAsignar();  
});

$('#modalAsignación').on('hidden.bs.modal', function (e) {
  $('#selectAll').prop('checked', false);
  $('#empleadosAsignacion').val("0").change();
  validar[0] = 1;
  validar[1] = 1;
})

$('#empleadosAsignacion').change(function() {
  if ($(this).val() != 0){
    validar[1] = 0;
  }else{
    validar[1] = 1;
  }
  activarBtnAsignar();
});

$('#modalAsignación').on('shown.bs.modal', function() {
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
});

function activarBtnAsignar(){
  if (validar[0] == 0 && validar[1] == 0){
    $('#btnAsignarArticulos').prop("disabled", false);
  }else{
    $('#btnAsignarArticulos').prop("disabled", true);
  }
  //console.log(validar);
}

function cambioCheckBox(){
	// tab.rows().every(function (rowIdx, tableLoop, rowLoop) {
 //      var data = this.node();
 //      console.log($(data).find('input').prop('checked'));
	// });

	var activos = [];
	var contador = 0;
	var total = 0;

	var data = tab.rows().nodes();
	$.each(data, function (index, value) {
	  //console.log($(this).find('input').prop('checked'));
	  total ++;
	  if ($(this).find('input').prop('checked')){
	  	validar[0] = 0;	  	
	  	contador ++;
	  	if (!activos.includes(index)){
	  		activos.push(index);
	  	}
	  }

	});

	if (activos.length == 0){
		validar[0] = 1;
	}

	if (contador < total){
		$("#selectAll").prop('checked', false);
	}else{
		$("#selectAll").prop('checked', true);
	}
	activarBtnAsignar();
	//console.log(contador +' - '+total);
}

$('#btnAsignarArticulos').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Asignar estos artículos",
         text: "¿Desea continuar?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#0080FF",
         confirmButtonText: "Sí",
         closeOnConfirm: false
     }, function(isConfirm){
         if (isConfirm) form.submit();
     });
 }); 