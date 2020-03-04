/* **********************************************************************************
    Funcionalidad: Cuando el usuario suelta una tecla en el teclado en algún campo del registro de un nuevo usuario para los permisos,
             comienza a validar el campo y manda a llamar la función datosValidosUsuarios()
    Parámetros: El valor ingresado al campo 
    Retorna: No regresa nada

********************************************************************************** */
$(".validateDataUsuario").keyup(function() {
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
$(".validateDataUsuario").change(function() {
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
function datosValidosUsuario(valor, error, id, tipo) {
    // console.log(tipo);
    switch (tipo) {
        case 'text':
            if (valor.match(/^[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]+(\s*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*)*[0-9a-zA-ZÀ-ÿ.,-^'^"\u00f1\u00d1]*$/) && valor != "") {
                $('.error' + error).text("");
                $('#' + id).attr("data-validacionUsuario", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.error' + error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
                $('#' + id).attr("data-validacionUsuario", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
            }
            break;
        case 'int':
            if (valor.match(/^[0-9]*$/) && valor != "") {
                $('.error' + error).text("");
                $('#' + id).attr("data-validacionUsuario", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.error' + error).text("Solo numeros.");
                $('#' + id).attr("data-validacionUsuario", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
            }
            break;
        case 'password':
            if (valor != "") {
                $('.error' + error).text("");
                $('#' + id).attr("data-validacionUsuario", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.error' + error).text("La contraseña no puede ir vacía.");
                $('#' + id).attr("data-validacionUsuario", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
            }
            break;
        case 'select':
            if (valor != "0") {
                $('.error' + error).text("");
                $('#' + id).attr("data-validacionUsuario", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.error' + error).text("Seleccione una opción.");
                $('#' + id).attr("data-validacionUsuario", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
            }
            break;
        case 'email':
            if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor) && valor != "") {
                $('.error' + error).text("");
                $('#' + id).attr("data-validacionUsuario", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.error' + error).text("Ingrese un e-mail válido.");
                $('#' + id).attr("data-validacionUsuario", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
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
function enablebtnUsuario() {
    var array = [];
    var claserror = $('.validateDataUsuario');
    for (var i = 0; i < claserror.length; i++) {
        array.push(claserror[i].getAttribute('data-validacionUsuario'));
    }
    if (array.includes('1')) {
        $('#btnCrearUsuario').prop("disabled", true);
    } else {
        $('#btnCrearUsuario').prop("disabled", false);
    }
    // console.log(array);
}
/* **********************************************************************************
    Funcionalidad: Cierra el modal de registro de nuevo usuario y regresa sus valores al estado predeterminado
    Parámetros: No recibe parámetros
    Retorna: Cierra el modal de registro de nueva partida

********************************************************************************** */
$('#modalCrearUsuario').on('hidden.bs.modal', function(e) {
    $(this).find('.validateDataUsuario').removeClass('inputSuccess');
    $(this).find('.validateDataUsuario').removeClass('inputDanger');
    $(this).find('.validateDataUsuario').attr("data-validacionUsuario", '1');
    $(this).find('.text-danger').text('');
    $('#nombre').val("");
    $('#apePat').val("");
    $('#apeMat').val("");
    $('#correo').val("");
    $('#usuario').val("");
    $('#contPass').val("");
    enablebtnUsuario();
});
$(document).ready(function() {
    $("#correo").keyup(function() {
        var email = document.getElementById('correo').value;
        validarEmail(email);
        document.getElementById('correo').value = email;
    })
});

function validarEmail(email) {
    console.log(email)
    status = $('#correo').attr("data-validacionUsuario");
    console.log(status)
    if (status === '0') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'validarEmail',
            data: {
                email: email
            },
            success: function(data) {
                if (data.success.popo === '0') {
                    $(".error15").text('');
                    $('#correo').attr("data-validacionUsuario", '0');
                    $('#correo').removeClass('inputDanger');
                    $('#correo').addClass('inputSuccess');
                } else {
                    $(".error15").text('Ya exite un usuario/a registrado con este correo electrónico: ' + email);
                    $("#correo").val("");
                    $('#correo').attr("data-validacionUsuario", '1');
                    $('#correo').removeClass('inputSuccess');
                    $('#correo').addClass('inputDanger');
                    $("#correo").attr("readonly", false);
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
$(document).ready(function() {
    $("#nombre, #apePat, #apeMat").change(function() {
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
function validarNombre(usuario) {
    console.log(usuario);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'validarUsername',
        data: {
            usuario: usuario
        },
        success: function(data) {
            if (data.success.popo === '0') {
                $(".error17").text('');
                $('#usuario').attr("data-validacionUsuario", '0');
                $('#usuario').removeClass('inputDanger');
                $('#usuario').addClass('inputSuccess');
            } else {
                var value = document.getElementById('apeMat').value;
                if (value != "") {
                    var value2 = value.substring(0, 2);
                    $("#usuario").val(usuario + value2);
                    $(".error17").text('');
                    $('#usuario').attr("data-validacionUsuario", '0');
                    $('#usuario').removeClass('inputDanger');
                    $('#usuario').addClass('inputSuccess');
                } else {
                    $(".error17").text('Nombre de usuario no disponible. Ingrese el apellido Materno');
                    $('#usuario').attr("data-validacionUsuario", '1');
                    $('#usuario').removeClass('inputSuccess');
                    $('#usuario').addClass('inputDanger');
                    $("#usuario").attr("readonly", false);
                }
                console.log(value2);
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
$(document).on("click", "#passwordGenerate", function() {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < 8; i++) {
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
$(document).on("click", "#showPass", function() {
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
$(document).on("click", "#passCopi", function() {
    var copyText = document.getElementById("contPass");
    copyText.select();
    document.execCommand("copy");
    swal({
        type: "info",
        title: "Password",
        text: 'Contraseña copiada: ' + copyText.value + ', al portapapeles',
        showConfirmButton: true,
        confirmButtonColor: "#E71096",
        confirmButtonText: "Cerrar"
    });
});
$('#btnCrearUsuario').on('click', function(e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Registrar Usuario",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#E71096",
        confirmButtonText: "Sí, deseo continuar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            form.submit();
        } else {
            swal("Error!", "Por favor intentelo de nuevo", "error");
        }
    });
});
/*****************************************************************
Funcionalidad: Botón que actualiza el status del usuario
seleccionado.
Parámetros: status.
Respuesta: status guardado en la base de datos.
******************************************************************/
$('.estatusBtn').on('click', function(e) {
    e.preventDefault();
    0
    var data = $(this).attr("data-estadoUsuario");
    var id = $(this).attr("data-idUsuario");
    var text;
    data === '1' ? text = "El usuario será desactivado" : text = "El usuario será activado";
    swal({
        title: text,
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#E71096',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo continuar',
        cancelButtonText: 'Cancelar'
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'estatususer',
                data: {
                    id: id,
                    data: data
                },
                success: function(data) {
                    swal({
                        title: 'Gestor de Usuarios',
                        text: 'Status actualizado',
                        type: 'success',
                        confirmButtonColor: "#E71096",
                    }, function(result) {
                        location.reload();
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("Error", "Por favor inténtelo mas tarde", "error");
                }
            });
        } else {
            swal("Error!", "Por favor intentelo de nuevo", "error");
        }
    });
});
/*****************************************************************
Funcionalidad: Carga del modal de edición de datos con los datos
del usuario seleccionado.
Parámetros: id, username, email, apellido paterno, apellido materno,
nombre del usuario, rol, id del rol, cargo y área u asociación.
Respuesta: Modal con los datos cargados previamente mencionados.
******************************************************************/
$('#editModalUsuario').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var area = button.data('area');
    var nombre = button.data('nombre');
    var ap = button.data('ap');
    var am = button.data('am');
    var email = button.data('email');
    var usuario = button.data('usuario');
    var id = button.data("id");
    var modal = $(this)
    modal.find('#editNombreUsuario').val(nombre);
    modal.find('#editApUsuario').val(ap);
    modal.find('#editAmUsuario').val(am);
    modal.find('#editEmailUsuario').val(email);
    modal.find('#actualizarUsuario').val(id);
});
/*****************************************************************
Funcionalidad: Botón que edita los datos del usuario seleccionado.
Parámetros: id, nombre, apellido paterno, apellido materno, email.
Respuesta: campos guardados en la base de datos.
******************************************************************/
$('#editBtnUsuario').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Edición de Usuarios",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#E71096',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo continuar',
        cancelButtonText: 'Cancelar'
    }, function(isConfirm) {
        if (isConfirm) {
            var id = $('#actualizarUsuario').val();
            var nombre = $('#editNombreUsuario').val();
            var ap = $('#editApUsuario').val();
            var am = $('#editAmUsuario').val();
            var em = $('#editEmailUsuario').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //console.log(id,no,ap,am,em);
            $.ajax({
                type: 'POST',
                url: 'updateUsuario',
                data: {
                    id: id,
                    nombre: nombre,
                    apePat: ap,
                    apeMat: am,
                    email: em
                },
                success: function(data) {
                    swal({
                        title: "Edición de Usuarios",
                        text: "Usuario actualizado",
                        type: "success",
                        confirmButtonColor: "#E71096",
                    }, function(result) {
                        location.reload();
                    })
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("¡Error!", "Por favor intentelo de nuevo!", "error");
                }
            });
        } else {
            swal("¡Error!", "Por favor intentelo de nuevo", "error");
        }
    })
});
/*****************************************************************
Funcionalidad: Validación de los datos del usuario en el modal
de edición.
Parámetros: valor, error, tipo, id.
Respuesta: Campos validados.
******************************************************************/
$(".valEdit").keyup(function() {
    var valor = $.trim($(this).val());
    var error = $(this).attr("data-error");
    var id = $(this).attr("id");
    var tipo = $(this).attr("data-myType");
    valEditDataUsuario(valor, error, id, tipo);
});

function enablebtnEditUsuario() {
    var array = [];
    var claserror = $('.valEdit');
    for (var i = 0; i < claserror.length; i++) {
        array.push(claserror[i].getAttribute('data-validacion'));
    }
    array.includes('1') ? $('#editBtnUsuario').prop("disabled", true) : $('#editBtnUsuario').prop("disabled", false);
}

function valEditDataUsuario(valor, error, id, tipo) {
    switch (tipo) {
        case 'text':
            if (valor.match(/^[a-zA-Z\s ñ á é í ó ú]*$/) && valor != "") {
                $('.errorEdit' + error).text("");
                $('#' + id).attr("data-validacion", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.errorEdit' + error).text("Este campo no puede ir vacío o llevar caracteres especiales.");
                $('#' + id).attr("data-validacion", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
            }
            break;
        case 'email':
            if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(valor) && valor != "") {
                $('.errorEdit' + error).text("");
                $('#' + id).attr("data-validacion", '0');
                $('#' + id).removeClass('inputDanger');
                $('#' + id).addClass('inputSuccess');
            } else {
                $('.errorEdit' + error).text("Ingrese un e-mail válido.");
                $('#' + id).attr("data-validacion", '1');
                $('#' + id).removeClass('inputSuccess');
                $('#' + id).addClass('inputDanger');
            }
            break;
        default:
            console.log('default');
    }
    enablebtnEditUsuario();
}
$(document).ready(function() {
    $("#editEmailUsuario").keyup(function() {
        var email = document.getElementById('editEmailUsuario').value;
        validarEmailEditar(email);
        document.getElementById('editEmailUsuario').value = email;
    })
});

function validarEmailEditar(email) {
    console.log(email)
    status = $('#editEmailUsuario').attr("data-validacion");
    console.log(status)
    if (status === '0') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'validarEmail',
            data: {
                email: email
            },
            success: function(data) {
                if (data.success.popo === '0') {
                    $(".errorEdit4").text('');
                    $('#editEmailUsuario').attr("data-validacion", '0');
                    $('#editEmailUsuario').removeClass('inputDanger');
                    $('#editEmailUsuario').addClass('inputSuccess');
                } else {
                    $(".errorEdit4").text('Ya exite un usuario/a registrado con este correo electrónico: ' + email);
                    $("#editEmailUsuario").val("");
                    $('#editEmailUsuario').attr("data-validacion", '1');
                    $('#editEmailUsuario').removeClass('inputSuccess');
                    $('#editEmailUsuario').addClass('inputDanger');
                    $("#editEmailUsuario").attr("readonly", false);
                }
                enablebtnEditUsuario();
            }
        })
    }
}
$('#editModalUsuario').on('hidden.bs.modal', function(e) {
    $('.modal-body').find('.valEdit').val('');
    $('.modal-body').find('.valEdit').attr("data-validacion", '0');
    $('.modal-body').find('.valEdit').removeClass('inputSuccess');
    $('.modal-body').find('.valEdit').removeClass('inputDanger');
    $('.modal-body').find('.text-danger').text('');
    $('#editNombreUsuario').val("");
    $('#editApUsuario').val("");
    $('#editAmUsuario').val("");
    $('#editEmailUsuario').val("");
    $('#actualizarUsuario').val("");
    enablebtnEditUsuario();
});
/*****************************************************************
Funcionalidad: Generación de contraseña para la edición del usuario.
Parámetros: listado de caracteres alfanuméricos.
Respuesta: contraseña generada automáticamente por el sistema.
******************************************************************/
$(document).on("click", "#passwordGenerateEditUsuario", function() {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < 8; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    document.getElementById("contPassEditUsuario").value = result;
    $('#contPassEditUsuario').attr("data-validacion", '0');
    btnEditPassUsuario();
});

function btnEditPassUsuario() {
    var data = document.getElementById("contPassEditUsuario").getAttribute('data-validacion');
    data == 1 ? $('#passwordBtnUsuario').prop("disabled", true) : $('#passwordBtnUsuario').prop("disabled", false);
    $("#errorPassEditUsuario").text('');
}
$(document).on("click", "#showPassEditUsuario", function() {
    var x = document.getElementById("contPassEditUsuario");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
});
$(document).on("click", "#passCopiEditUsuario", function() {
    var copyText = document.getElementById("contPassEditUsuario");
    copyText.select();
    document.execCommand("copy");
    swal({
        type: "info",
        title: "Password",
        text: 'Contraseña copiada: ' + copyText.value,
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        confirmButtonColor: "#E71096",
    });
});
$('#passwordModalUsuario').on('show.bs.modal', function(event) {
    btnEditPassUsuario();
    $("#errorPassEditUsuario").text('Este campo es requerido');
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var modal = $(this)
    modal.find('#editPasswordUsuario').val(id);
});
/*****************************************************************
Funcionalidad: Limpia el modal del password de usuarios.
Parámetros: clase de los objetos.
Respuesta: Modal de cambio de contraseña con los campos limpios.
******************************************************************/
$('#passwordModalUsuario').on('hidden.bs.modal', function(e) {
    $('.modal-body').find('#contPassEditUsuario').val('');
    $('.modal-body').find('#contPassEditUsuario').attr("data-validacion", '1');
    $('.modal-body').find('#contPassEditUsuario').removeClass('inputSuccess');
    $('.modal-body').find('#contPassEditUsuario').removeClass('inputDanger');
    $('.modal-body').find('.text-danger').text('');
    btnEditPassUsuario();
});
/*****************************************************************
Funcionalidad: Botón que actualiza la contraseña del usuario
seleccionado.
Parámetros: contraseña.
Respuesta: contraseña guardada en la base de datos.
******************************************************************/
$('#passwordBtnUsuario').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "Actualizar Contraseña",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#E71096',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo continuar',
        cancelButtonText: 'Cancelar'
    }, function(isConfirm) {
        if (isConfirm) {
            var data = $('#contPassEditUsuario').val();
            var id = $('#editPasswordUsuario').val();
            console.log(id, data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'updatePassword',
                data: {
                    id: id,
                    data: data
                },
                success: function(data) {
                    swal({
                        title: "Actualizar Contraseña",
                        text: "Contraseña actualizada",
                        type: "success",
                        confirmButtonColor: "#E71096",
                    }, function(result) {
                        location.reload();
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("¡Error!", "Por favor intentelo de nuevo!", "error");
                }
            });
        } else {
            swal("¡Error!", "Por favor intentelo de nuevo", "error");
        }
    });
});
/*****************************************************************
Funcionalidad: Botón de eliminación de usuario.
Parámetros: id del usuario.
Respuesta: Usuario eliminado de la base de datos.
******************************************************************/
$(document).ready(function() {
    $(document).on("click", ".deleteUser", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var name = $(this).data("name");
        swal({
            title: "Eliminar datos de " + name,
            text: "¿Desea continuar?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#E71096',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, deseo continuar',
            cancelButtonText: 'Cancelar'
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'deleteUser',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        swal({
                            title: 'Gestor de Usuarios',
                            text: 'El usuario/a ha sido borrado/a correctamente.',
                            type: 'success',
                            confirmButtonColor: "#E71096",
                        }, function(result) {
                            location.reload();
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error", "Favor, de revisar sus datos", "error");
                    }
                });
            } else {
                swal("Error", "Por favor inténtelo de nuevo mas tarde", "error");
            }
        });
    });
});