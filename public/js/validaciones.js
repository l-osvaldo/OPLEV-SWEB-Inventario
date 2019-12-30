
/********************************** funciones para validar algúnos campos del sistema *******************************************************/

/* **********************************************************************************
    Funcionalidad: Valida que el número de partida no exista ya en el sistema 
    Parámetros: valor, error e id
    Retorna: Campo valido o no 

********************************************************************************** */

function validarPartida(valor,error,id){
  if (valor.length == 8){
    $.ajaxSetup(
    {
      headers:
      { 
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });

    $.ajax({
        url: "validarPartida",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'GET',
        data: {partida: valor},
        dataType: 'json',
        contentType: 'application/json'
      }).done(function(response) {
        //console.log(valor);
        if (response.length > 0){

          $('.error'+ error).text("Este número de partida ya existe.");
          $('#'+id).attr("data-validacion", '1');
          $('#'+id).removeClass('inputSuccess');
          $('#'+id).addClass('inputDanger'); 
        }else{
          $('.error'+ error).text("");
              $('#'+id).attr("data-validacion", '0');
              $('#'+id).removeClass('inputDanger');
              $('#'+id).addClass('inputSuccess');
        }
        enablebtn() 


      }); 
  }else{
    $('.error'+ error).text("El número de partida debe contener 8 dígitos.");
    $('#'+id).attr("data-validacion", '1');
    $('#'+id).removeClass('inputSuccess');
    $('#'+id).addClass('inputDanger'); 
  }	
}

/* **********************************************************************************
    Funcionalidad: Valida que el número de empleado no exista ya en el sistema 
    Parámetros: valor, error e id
    Retorna: Campo valido o no 

********************************************************************************** */

function validarNumeroEmpleado(valor,error,id){
  $.ajaxSetup(
  {
    headers:
    { 
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

  $.ajax({
      url: "validarNumeroEmpleado", 
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {numeroEmpleado: valor},
      dataType: 'json',
      contentType: 'application/json'
    }).done(function(response) {
      //console.log(valor);

      if (response.length > 0){
        $('.error'+ error).text("Este número de empleado ya está registrado.");
        $('#'+id).attr("data-validacionEm", '1');
        $('#'+id).removeClass('inputSuccess');
        $('#'+id).addClass('inputDanger');

        $('#clvdepto').prop("disabled", true);
        $('#nombre').prop("disabled", true);
        $('#cargo').prop("disabled", true);

      }else{
        $('.error'+ error).text("");
        $('#'+id).attr("data-validacionEm", '0');
        $('#'+id).removeClass('inputDanger');
        $('#'+id).addClass('inputSuccess');

        $('#clvdepto').prop("disabled", false);
        $('#nombre').prop("disabled", false);
        $('#cargo').prop("disabled", false);
      }
      enablebtnEm() 
      
    }); 
}

/* **********************************************************************************
    Funcionalidad: Validar que solo pueda ingresar letras o números el usuario a un campo
    Parámetros: evento y tipo de validación (solo letras o solo números)
    Retorna: true o false 

********************************************************************************** */


function SoloNumerosLetras(evt, tipovalidacion){
 if(SoloNumeros(evt)){
  return true;
 }
 else{
  if (soloLetras(evt,tipovalidacion) && tipovalidacion != 'numero'){
    return true;
  }else{
    return false;
  }  
 }
}

/* **********************************************************************************
    Funcionalidad: Validar que solo pueda ingresar letras y los caracteres necesario para el campo indicado
    Parámetros: evento y tipo de validación (solo letras)
    Retorna: true o false 

********************************************************************************** */

function soloLetras(e,tipovalidacion) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = "áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
  especiales = [8, 6, 32]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

  //console.log(key);

  if (tipovalidacion == 'partida' ){
    especiales = [8, 6, 32, 44, 45]; 
  }
  if (tipovalidacion == 'linea' ) {
    especiales = [8, 6, 32, 45, 47];
  }
  if (tipovalidacion == 'sublinea' ) {
    especiales = [8, 6, 32, 34, 39, 44 ,45, 46, 47];
  }
  if (tipovalidacion == 'area' ) {
    especiales = [8, 6, 32, 46];
  }
  if (tipovalidacion == 'cargo' ) {
    especiales = [8, 6, 46, 34, 32];
  }
  if (tipovalidacion == 'factura'){
    especiales = [8, 6, 45];
  }
  if (tipovalidacion == 'modelo' ) {
    especiales = [8, 6, 32, 34, 44 ,45, 46, 47];
  }
  if (tipovalidacion == 'serie' ) { 
    especiales = [8, 6, 32, 44 ,45, 47, 58];
  }

  tecla_especial = false
  for(var i in especiales) {
      if(key == especiales[i]) {
          tecla_especial = true;
          break;
      }
  }
  

  if(letras.indexOf(tecla) == -1 && !tecla_especial){
      return false;
  }else{
    return true;
  }
}

/* **********************************************************************************
    Funcionalidad: Validar que solo pueda ingresar números en los campos númericos
    Parámetros: evento
    Retorna: true o false 

********************************************************************************** */
function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
  return false;
 }
}

/* **********************************************************************************
    Funcionalidad: Validar que solo pueda ingresar números y dos decimales despúes del punto
    Parámetros: evento, valor del campo
    Retorna: true o false 

********************************************************************************** */

function valorPrecio(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8){
    return true;
  } 
  // 0-9
  // if (key > 47 && key < 58) {
  //   if (field.value == ""){
  //     return true
  //   } 
  //   regexp = /.[0-9]{2}$/
  //   return !(regexp.test(field.value))
  // }
  // // .
  // if (key == 46) {
  //   if (field.value == ""){
  //     return false
  //   } 
  //   regexp = /^[0-9]+$/
  //   return regexp.test(field.value)
  // }
  // // other key
  // return false

     if (key > 47 && key < 58) {
       if (field.value == ""){
        return true;
       } 
       var existePto = (/[.]/).test(field.value);
       if (existePto == false){
           regexp = /.[0-9]{10}$/; //PARTE ENTERA 10
       }
       else {
         regexp = /.[0-9]{2}$/; //PARTE DECIMAL2
       }
       return !(regexp.test(field.value));
     }
     if (key == 46) {
       if (field.value == ""){
        return false;
       } 
       regexp = /^[0-9]+$/;
       return regexp.test(field.value);
     }
     return false;
 
}


