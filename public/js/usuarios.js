/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en algún campo del registro de un nuevo usuario para los permisos,
             comienza a validar el campo y manda a llamar la función datosValidosUsuarios()
    Parámetros: El valor ingresado al campo 
    Retorna: No regresa nada

********************************************************************************** */

$( ".validateDataUsuario" ).keyup(function() {    
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorUsuario");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeUsuario");
   datosValidosUsuario(valor, error, id, tipo);
});

  /* **********************************************************************************
    Funcionalidad: Obtiene un cambio en algún campo del registro de un nuevo usuario para los permisos,
             comienza a validar el campo y manda a llamar la función datosValidosDos()
    Parámetros: El valor ingresado al campo
    Retorna: No regresa nada

********************************************************************************** */
   
$( ".validateDataUsuario" ).change(function() {
   var valor = $.trim($(this).val());
   var error = $(this).attr("data-errorUsuario");
   var id = $(this).attr("id");
   var tipo = $(this).attr("data-myTypeUsuario");
   datosValidosUsuario(valor, error, id, tipo);
});

/* **********************************************************************************
    Funcionalidad: Función que valida el campo enviado, que cuente con lo requerido, no debe estar 
                    vacio y no tener caracteres especiales 
    Parámetros: Valor del campo a validar, error, su id del elemento, tipo
    Retorna: Valido o no valido el elemento

  ********************************************************************************** */

function datosValidosUsuario(valor, error, id, tipo)
{
  // console.log(tipo);
   switch (tipo) {
     case 'text':
       if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor!=""){
         $('.error'+ error).text("");
         $('#'+id).attr("data-validacionUsuario", '0');
         $('#'+id).removeClass('inputDanger');
         $('#'+id).addClass('inputSuccess');
       }else{
         $('.error'+ error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
         $('#'+id).attr("data-validacionUsuario", '1');
         $('#'+id).removeClass('inputSuccess');
         $('#'+id).addClass('inputDanger');
       }
       break;
     case 'int':
       if (valor.match(/^[0-9]*$/) && valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionUsuario", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Solo numeros.");
       $('#'+id).attr("data-validacionUsuario", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'password':
       if (valor!=""){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionUsuario", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("La contraseña no puede ir vacía.");
       $('#'+id).attr("data-validacionUsuario", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'select':
       if (valor!="0"){
       $('.error'+ error).text("");
       $('#'+id).attr("data-validacionUsuario", '0');
       $('#'+id).removeClass('inputDanger');
       $('#'+id).addClass('inputSuccess');
     }else{
       $('.error'+ error).text("Seleccione una opción.");
       $('#'+id).attr("data-validacionUsuario", '1');
       $('#'+id).removeClass('inputSuccess');
       $('#'+id).addClass('inputDanger'); 
     }
     break;
     case 'email':
      if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor) && valor!=""){
        $('.error'+ error).text("");
        $('#'+id).attr("data-validacionUsuario", '0');
        $('#'+id).removeClass('inputDanger');
        $('#'+id).addClass('inputSuccess');
      }else{
        $('.error'+ error).text("Ingrese un e-mail válido.");
        $('#'+id).attr("data-validacionUsuario", '1');
        $('#'+id).removeClass('inputSuccess');
        $('#'+id).addClass('inputDanger'); 
      }
      break;
     default:
     //console.log('default');
   }
   enablebtnUsuario();
} 

/* **********************************************************************************

    Funcionalidad: Función que activa o desactiva el boton de registrar nuevo usuario, si el arreglo de validación
                    no cuenta con ningun uno, activa el boton pero si tieen por lo menos un uno lo desactiva,
                    ya que algún campo contiene algo que no es valido
    Parámetros: Arreglo de validación
    Retorna: activa o desactiva el bótón de registar nueva partida

********************************************************************************** */

function enablebtnUsuario()
{
 var array = [];
 var claserror = $('.validateDataUsuario');

 for (var i = 0; i < claserror.length; i++) {
   array.push(claserror[i].getAttribute('data-validacionUsuario'));
 }

 if(array.includes('1'))
 { 
   $('#btnCrearUsuario').prop("disabled", true);
 }
 else
 {
   $('#btnCrearUsuario').prop("disabled", false);
 }

  // console.log(array);
}


/* **********************************************************************************
    Funcionalidad: Cierra el modal de registro de nuevo usuario y regresa sus valores al estado predeterminado
    Parámetros: No recibe parámetros
    Retorna: Cierra el modal de registro de nueva partida

********************************************************************************** */

$('#modalCrearUsuario').on('hidden.bs.modal', function (e) {
  $(this).find('.validateDataUsuario').removeClass('inputSuccess');
  $(this).find('.validateDataUsuario').removeClass('inputDanger');
  $(this).find('.validateDataUsuario').attr("data-validacionUsuario",'1');
  $(this).find('.text-danger').text('');
  $('#nombre').val(""); 
  $('#apePat').val("");  
  $('#apeMat').val("");  
  $('#correo').val(""); 
  $('#usuario').val(""); 
  enablebtnUsuario();   
});


$(document).ready(function(){
  $("#correo").keyup(function(){
    var email = document.getElementById('correo').value;
    validarEmail(email);
    document.getElementById('correo').value = email;
  })
});

function validarEmail(email){
  console.log(email)
  status = $('#correo').attr("data-validacionUsuario");
  console.log(status)
  if (status === '0'){

    $.ajaxSetup(
    {
      headers:
      { 
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      type:'POST',
      url:'validarEmail',
      data: {email:email},
      success: function(data){
        if(data.success.popo === '0'){
          $(".error15").text('');
          $('#correo').attr("data-validacionUsuario", '0');
          $('#correo').removeClass('inputDanger');
          $('#correo').addClass('inputSuccess');
        }
        else
        {
          $(".error15").text('Ya exite un usuario/a registrado con este correo electrónico: ' + email);
          $("#correo").val("");
          $('#correo').attr("data-validacionUsuario", '1');
          $('#correo').removeClass('inputSuccess');
          $('#correo').addClass('inputDanger');
          $("#correo").attr("readonly",false);
        }
        enablebtnUsuario();
      }  
    })
  }  
}

/***********************************************
Une los campos del nombre y del apellido paterno
para formar el campo del usuario 
************************************************/
$(document).ready(function(){
  $("#nombre, #apePat").change(function(){
    var value1 = document.getElementById('nombre').value;
    var value2 = document.getElementById('apePat').value;
    var value3 = value1.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
    var value4 = value2.replace(/\s+/g, '').replace(/[á]/, 'a').replace(/[é]/, 'e').replace(/[í]/, 'i').replace(/[ó]/, 'o').replace(/[ú]/, 'u');
    var value5 = value3 + "." + value4;
    var value6 = value5.toLowerCase();
    validarNombre(value6);
    document.getElementById('usuario').value = value6;

  })
});


/*****************************************************************
Funcionalidad: función que valida que el nombre de usuario no esté
repetido para el usuario.
Parámetros: nombre de usuario.
Respuesta: nombre de usuario validado.
******************************************************************/
function validarNombre(usuario){
  console.log(usuario);
  $.ajaxSetup(
  {
    headers:
    { 
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
    type:'POST',
    url:'validarUsername',
    data: {usuario:usuario},
    success: function(data){
      if(data.success.popo === '0'){
        $(".error17").text('');
        $('#usuario').attr("data-validacionUsuario", '0');
        $('#usuario').removeClass('inputDanger');
        $('#usuario').addClass('inputSuccess');
      }
      else
      {
        $(".error17").text('Nombre de usuario no disponible');
        $("#usuario").val("");
        $('#usuario').attr("data-validacionUsuario", '1');
        $('#usuario').removeClass('inputSuccess');
        $('#usuario').addClass('inputDanger');
        $("#usuario").attr("readonly",false);
      }
      enablebtnUsuario();
    }  
  })  
}

/*****************************************************************
Funcionalidad: Generación de contraseña para el usuario.
Parámetros: listado de caracteres alfanuméricos.
Respuesta: contraseña generada automáticamente por el sistema.
******************************************************************/

$(document).on("click", "#passwordGenerate", function(){
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for ( var i = 0; i < 8; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  document.getElementById("contPass").value = result;
  var valor = $('#contPass').val();
  var error = $('#contPass').attr("data-errorUsuario");
  var id = $('#contPass').attr("id");
  var tipo = $('#contPass').attr("data-myTypeUsuario");
  datosValidosUsuario(valor, error, id, tipo);
});

/*****************************************************************
Funcionalidad: Botón muestra la contraseña.
Parámetros: contraseña.
Respuesta: password copiado en el portapapeles para el usuario OPLE.
******************************************************************/
$(document).on("click", "#showPass", function(){
 var x = document.getElementById("contPass");
 if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}   
});

/*****************************************************************
Funcionalidad: Botón que copia el password generado por el sistema.
Parámetros: contraseña.
Respuesta: password copiado en el portapapeles para el usuario.
******************************************************************/
$(document).on("click", "#passCopi", function(){
 var copyText = document.getElementById("contPass");
 copyText.select();
 document.execCommand("copy");
 swal({
   type: "info",
   title: "Password",
   text: 'Contraseña copiada: '+ copyText.value + ', al portapapeles',
   showConfirmButton: true,
   confirmButtonText: "Cerrar"
 });
});


$('#btnCrearUsuario').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  // swal({
  //   title: "Registrar Usuario",
  //   text: "¿Desea continuar?",
  //   type: 'warning',
  //   showCancelButton: true,
  //   confirmButtonColor: '#3085d6',
  //   cancelButtonColor: '#d33',
  //   confirmButtonText: 'Sí, deseo continuar',
  //   cancelButtonText: 'Cancelar'
  // }).then((result) => {
  //   if (result.value) {
  //     form.submit();
  //   }
  // })

  swal({
      title: "Registrar Usuario",
      text: "¿Desea continuar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#E71096",
      confirmButtonText: "Sí, deseo continuar",
      closeOnConfirm: false
  }, function(isConfirm){
      if (isConfirm) {
        form.submit();
      }else {
        swal("Error!", "Por favor intentelo de nuevo", "error");
      }
      
  });
});