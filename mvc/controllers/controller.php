<?php

class MvcController {

    # LLamada a la plantilla
    public function plantilla () {
        include "views/template.php";
    }

    # Interaccion del usuario con los links
    public function enlacesPaginaController () {
        if (!isset($_GET["action"])) {
            $enlace = "inicio";
        } else {
            $enlace = $_GET["action"];
        }

        ## Para usar esta herencia, la pagina "models/models.php" que es de donde viene se ha agregado en index.php
        ## entonces ya se puede hacer la herencia por que es una herencia, por que estamos usando una clase sobre otra
        
        $respuesta = EnlacesPaginas::enlacesPaginaModel($enlace);

        include $respuesta;
    }
}