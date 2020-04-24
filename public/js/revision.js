
/********************************** funciones para el módulo de revición de cancelación de resguardo *******************************************************/

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de detalle de los artículos OPLE de una cancelación
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

var validarRevision = [1,1];
// console.log(validarRevision);
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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de detalle de los artículos ECO de una cancelación
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable de reasignación de bienes de una cancelación 
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Configuración del datatable principal de la vista, presenta las cancelaciones de resguardo realizadas
    Parámetros: Configuración para este datatable
    Retorna: DataTable

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Obtiene toda la información de todos los bienes OPLE de la cancelación 
    Parámetros: id de la cancelación y nombre del empleado
    Retorna: Modal del detalle de bienes OPLE de la cancelación, si no cuenta con bienes OPLE mand aun alerta

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Obtiene toda la información de todos los bienes ECO de la cancelación 
    Parámetros: id de la cancelación y nombre del empleado
    Retorna: Modal del detalle de bienes ECO de la cancelación, si no cuenta con bienes ECO mand aun alerta

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Obtiene toda la información de todos los bienes OPLE Y ECO de la cancelación para su reasignación
                    a un empleado
    Parámetros: id de la cancelación
    Retorna: Modal de reasignación de bienes

********************************************************************************** */

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

/* **********************************************************************************
    Funcionalidad: Selecciona a todos los check de los bienes para su asignación
                    o los deselecciona a todos
    Parámetros: true o false
    Retorna: Selecciona todos los check de los bienes o los desactiva a todos

********************************************************************************** */

$("#selectAll").click(function(){
  $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
  if ( $(this).prop('checked')){
    validarRevision[0] = 0; 
  }else{
    validarRevision[0] = 1; 
  }
  activarBtnAsignar();  
});

/* **********************************************************************************
    Funcionalidad: Cierra el modal de reasignación de bienes y vuelve a todos sus valores al estado inicial
    Parámetros: No recibe parámetros
    Retorna: Cierra el modal de reasignación de bienes

********************************************************************************** */

$('#modalAsignación').on('hidden.bs.modal', function (e) {
  $('#selectAll').prop('checked', false);
  $('#empleadosAsignacion').val("0").change();
  validarRevision[0] = 1;
  validarRevision[1] = 1;
});

/* **********************************************************************************
    Funcionalidad: Obtiene el valor del selector de empleado para activar el botón de asignación,
                    si regresa a cero el valor se vuelve 1 para la validación y desactivar el boton
    Parámetros: El valor del selector de empleados del modal de reasignación de bienes
    Retorna: No regresa nada

********************************************************************************** */

$('#empleadosAsignacion').change(function() {
  if ($(this).val() != 0){
    validarRevision[1] = 0;
  }else{
    validarRevision[1] = 1;
  }
  activarBtnAsignar();
});

/* **********************************************************************************
    Funcionalidad: Ajusta el tamaño de las columnas del datatable en el modal de reasignación de bienes
    Parámetros: No recibe parámetros
    Retorna: Ajusta las columnas del datatable

********************************************************************************** */

$('#modalAsignación').on('shown.bs.modal', function() {
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
});

/* **********************************************************************************
    Funcionalidad: Activa o desactiva el botón de asignación de bienes, de acuerdo al arreglo de validar
                    se debe tener selecionado un bien y al empleado para que sea valido
    Parámetros: No recibe parámetros
    Retorna: Activa o desactiva el botón de asignación de bienes

********************************************************************************** */

function activarBtnAsignar(){

  if (validarRevision[0] == 0 && validarRevision[1] == 0){
    $('#btnAsignarArticulos').prop("disabled", false);
  }else{
    $('#btnAsignarArticulos').prop("disabled", true);
  }
  console.log(validarRevision);
}

/* **********************************************************************************
    Funcionalidad: Valida que este por lo menos un check seleccionado para asignar el bien 
    Parámetros: No recibe parámetros
    Retorna: Valida que este seleccionado por lo menos un bien 

********************************************************************************** */

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
	  	validarRevision[0] = 0;	  	
	  	contador ++;
	  	if (!activos.includes(index)){
	  		activos.push(index);
	  	}
	  }

	});

	if (activos.length == 0){
		validarRevision[0] = 1;
	}

	if (contador < total){
		$("#selectAll").prop('checked', false);
	}else{
		$("#selectAll").prop('checked', true);
	}
	activarBtnAsignar();
	//console.log(contador +' - '+total);
}

/* **********************************************************************************
    Funcionalidad: Alerta de confirmación de reasignación de bienes  
    Parámetros: Información del formulario de asignación de bienes
    Retorna: Alerta de confirmación 

********************************************************************************** */

$('#btnAsignarArticulos').on('click',function(e){
     e.preventDefault();
     var form = $(this).parents('form');
     swal({
         title: "Asignar estos artículos",
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