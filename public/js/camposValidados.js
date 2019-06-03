function datosValidosLineaBusqueda(valor, error, id, tipo)
{
 switch (tipo) {
   case 'select':
     if (valor!=""){
     $('.error'+ error).text("");
     $('#'+id).attr("data-validacionBusquedaLinea", '0');
     $('#'+id).removeClass('inputDanger');
     $('#'+id).addClass('inputSuccess');
   }else{
     $('.error'+ error).text("Seleccione una opción.");
     $('#'+id).attr("data-validacionBusquedaLinea", '1');
     $('#'+id).removeClass('inputSuccess');
     $('#'+id).addClass('inputDanger'); 
   }
   break;
   default:
   console.log('default');
 }
 enablebtnBusquedaLinea();
}