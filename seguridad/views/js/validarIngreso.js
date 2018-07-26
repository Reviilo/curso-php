/**
 * Validar Ingreso
 */

function validarIngreso () {

    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("password").value;


    /** Validacion de Usuario */
    
    if ( usuario !== '' ) {
        var caracteres = usuario.length;
        var expression = /^[a-zA-Z0-9]*$/;

        if ( caracteres > 12 ) {
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


    return true;

 }

 /**
 * Validar Ingreso FIN
 */