/**
 * DATOS EXISTENTES
 */

 var usuarioExistente = false;
 var emailExistente = false;

/**
 * VALIDAR USUARIO EXISTENTE CON AJAX
 */

$("#usuario").change(function() {

    if ( $("label[for='usuario'] p").length ) {
        $("label[for='usuario'] p").remove();
    }

    var usuario = $("#usuario").val();
    var datos = new FormData();
    datos.append("usuario", usuario);
    
    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
            if ( parseInt(res) === 0 ) {
                usuarioExistente = true;
                $("label[for='usuario']").append("<p class='mensaje-error'>El usuario '" + usuario + "' no esta disponible</p>");
            } else {
                usuarioExistente = false;
            }
        }
    });

});

/**
 * VALIDAR EMAIL EXISTENTE CON AJAX
 */

$("#email").change(function() {

    if ( $("label[for='email'] p").length ) {
        $("label[for='email'] p").remove();
    }

    var email = $("#email").val();
    var datos = new FormData();
    datos.append("email", email);
    
    $.ajax({
        url: "views/modules/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
            if ( parseInt(res) === 0 ) {
                emailExistente = true;
                $("label[for='email']").append("<p class='mensaje-error'>El email '" + email + "' ya esta registrado.</p>");
            } else {
                emailExistente = false;
            }
        }
    });

});

/**
 * Valida usuario existente con AJAX
 */

/**
 * Validar Registro
 */

 function validarRegistro () {

    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var terminos = document.getElementById("tyc").checked;


    /** Validacion de Usuario */
    
    if ( usuario !== '' ) {
        var caracteres = usuario.length;
        var expression = /[a-zA-Z0-9]$/;

        if ( caracteres > 12 ) {
            console.log("entra");
            document.querySelector("label[for='usuario']").innerHTML += "<p class='mensaje-error'>Escriba menos de 12 caracteres.</p>";
            return false;
        }

        if ( !expression.test(usuario) ) {
            document.querySelector("label[for='usuario']").innerHTML += "<p class='mensaje-error'>No se aceptan caracteres especiales.</p>";
            return false;
        }
    }

    /** Validacion de password */

    if ( password !== '' ) {
        var caracteres = password.length;
        var expression = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,}$/;

        if ( !expression.test(password) ) {
            document.querySelector("label[for='password']").innerHTML += "<p class='mensaje-error'>No se aceptan caracteres especiales.</p>";
            return false;
        }
    }

    /** Validacion de email */

    if ( email !== '' ) {
        var expression = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        console.log(expression.test(email));
        if ( !expression.test(email) ) {
            document.querySelector("label[for='email']").innerHTML += "<p class='mensaje-error'>Debe ingresar un correo electronico valido.</p>";
            return false;
        }
    }

    /** Validacion de Terminos y Condiciones */

    if ( !terminos ) {
        document.querySelector(".terminos-texto").innerHTML += "<p class='mensaje-error'>Debe aceptar los terminos y condiciones</p>";

        document.getElementById("usuario").value = usuario;
        document.getElementById("password").value = password;
        document.getElementById("email").value = email;
        
        return false;
    }

    if ( usuarioExistente || emailExistente ) {
        return false;
    }


    return true;

 }

 /**
 * Validar Registro FIN
 */