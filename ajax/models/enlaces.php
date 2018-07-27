<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlace){

		switch ( $enlace ) {
			case "ingresar":
			case "usuarios": 
			case "editar":
			case "salir":
				$module =  "views/modules/".$enlace.".php";	
				break;
			case "index":
				session_start();
				if(!$_SESSION["validar"]){
					$module =  "views/modules/registro.php";
				} else {
					$module =  "views/modules/usuarios.php";
				}
				break;
			case "fallo-ingreso-c":
			case "fallo-ingreso-u":
			case "fallo-ingreso-3":
				$module =  "views/modules/ingresar.php";
				break;
			case "actualizado":
				$module =  "views/modules/usuarios.php";	
				break;
			case "error-de-actualizacion":
				$module =  "views/modules/editar.php";	
				break;
			case "borrado":
				$module =  "views/modules/usuarios.php";	
				break;
			case "error-al-borrar":
				$module =  "views/modules/usuarios.php";	
				break;
			default:
				$module =  "views/modules/registro.php";
		}
		
		return $module;

	}

}
