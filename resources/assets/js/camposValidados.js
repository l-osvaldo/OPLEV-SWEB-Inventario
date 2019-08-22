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


function datosValidosArea(valor, error, id, tipo)
{
 switch (tipo) {
  case 'text':
    if (valor.match(/^[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.\u00f1\u00d1]*$/) && valor!=""){
     $('.error'+ error).text("");
     $('#'+id).attr("data-validacionArea", '0');
     $('#'+id).removeClass('inputDanger');
     $('#'+id).addClass('inputSuccess');
    }else{
     $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
     $('#'+id).attr("data-validacionArea", '1');
     $('#'+id).removeClass('inputSuccess');
     $('#'+id).addClass('inputDanger');
    }
    break;
   
  default:
   console.log('default');
 }
 enablebtnLi();
} 

