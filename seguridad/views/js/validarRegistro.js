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


    return true;

 }

 /**
 * Validar Registro FIN
 */