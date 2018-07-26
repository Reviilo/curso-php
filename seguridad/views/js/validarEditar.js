/**
 * Validar Editar
 */

function validarEditar () {

    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;


    /** Validacion de Usuario */
    
    if ( usuario !== '' ) {
        var caracteres = usuario.length;
        var expression = /^[a-z0-9]*$/;

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

        if ( !expression.test(email) ) {
            document.querySelector("label[for='email']").innerHTML += "<p class='mensaje-error'>Debe ingresar un correo electronico valido.</p>";
            return false;
        }
    }

    return true;

 }

 /**
 * Validar Editar FIN
 */