<?php 
# Esta pagina es agregada en index para que se pueda usar en template -- controller
class EnlacesPaginas {

    public function enlacesPaginaModel ($enlace) {

        switch ($enlace) {
            case inicio:
            case nosotros:
            case servicios:
            case contacto:

                $module = "views/modules/" . $enlace . ".php";

                break;
            default:
            $module = "views/modules/404.php";
        }

        return $module;
    }
    
}