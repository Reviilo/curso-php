<?php

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax {
    public $validarUsuario;
    public $validarEmail;

    public function validarUsuarioAjax () {

        $usuario = $this->validarUsuario;

        $res = MvcController::validarUsuarioController($usuario);

        echo $res;
    }

    public function validarEmailAjax () {

        $email = $this->validarEmail;

        $res = MvcController::validarEmailController($email);

        echo $res;
    }
}

if ( isset( $_POST["usuario"] ) ) {
    $u = new Ajax();
    $u -> validarUsuario = $_POST["usuario"];
    $u -> validarUsuarioAjax();
}

if ( isset( $_POST["email"] ) ) {
    $e = new Ajax();
    $e -> validarEmail = $_POST["email"];
    $e -> validarEmailAjax();
}

