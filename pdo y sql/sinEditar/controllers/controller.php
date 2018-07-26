<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if( isset( $_GET['action'] ) ) {

			$enlaces = $_GET['action'];

		} else {

			$enlaces = "index";

		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	# REGISTRO DE USUARIO
	#-------------------------------------

	public function registroUsuarioController () {

		if (isset($_POST["usuario"])) {
		
			$datos = array(
				"usuario" 	=> 	$_POST["usuario"],
				"password"	=>	$_POST["password"],
				"email"		=>	$_POST["email"]
			);

			$res = Datos::registroUsuarioModel($datos, "usuarios");

			if ($res === "success") {
				header("location:index.php?action=ok");
			} else {
				header("location:index.php");
			}

		}
	}

	# INGRESO USUARIO
	#-------------------------------------

	public function ingresoUsuarioController () {

		if (isset($_POST["usuario"])) {
		
			$datos = array(
				"usuario" 	=> 	$_POST["usuario"],
				"password"	=>	$_POST["password"]
			);

			$res = Datos::ingresoUsuarioModel($datos, "usuarios");

			if ( $res["usuario"] === $_POST["usuario"] && $res["password"] === $_POST["password"]  ) {

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");
			} else {
				header("location:index.php?action=fallo-ingreso");
			}

		}
	}

	# VISTA DE USUARIOS
	#-------------------------------------

	public function vistaUsuariosController () {

		$res = Datos::vistaUsuariosModel("usuarios");

		// var_dump( $res[0][0] );

		foreach ( $res as $row => $item) {
			echo ' <tr>
				<td>'.$item[1].'</td>
				<td>'.$item[2].'</td>
				<td>'.$item[3].'</td>
				<td><a href="index.php?action=editar&id='.$item[0].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item[0].'"><button>Borrar</button></a></td>
			</tr> ';
		}		
	}

	# VISTA DEL USUARIOS POR ID
	#-------------------------------------

	public function verUsuarioController () {
		$id = $_GET["id"];

		$res = Datos::verUsuarioModel($id, "usuarios");

		echo '
			<input type="hidden" value="'.$res[0].'" name="id" >

			<input type="text" value="'.$res[1].'" placeholder="Usuario" name="usuario" required>

			<input type="text" value="'.$res[2].'" placeholder="Contraseña" name="password" required>
		
			<input type="email" value="'.$res[3].'" placeholder="Email" name="email" required>
		';
	}

	# ACTUALIZAR DATOS DEL USUARIO
	#-------------------------------------

	public function actualizarUsuarioController () {

		if(isset($_POST["usuario"])) {

			$datos = array(
				"id"		=>	$_POST["id"],
				"usuario"	=>	$_POST["usuario"],
				"password"	=>	$_POST["password"],
				"email"		=>	$_POST["email"]
			);

			var_dump( $datos );

			$res = Datos::actualizarUsuarioModel($datos, "usuarios");

			if ( $res ) {
				header("location:index.php?action=actualizado");
			} else {
				header("location:index.php?action=error-de-actualizacion");
			}

			

		}

	}

	# BORRAR USUARIO
	#-------------------------------------

	public function borrarUsuarioController () {

		if ( isset( $_GET["idBorrar"] ) ) {
			$id = $_GET["idBorrar"];

			$res = Datos::borrarUsuarioModel($id, "usuarios");

			if ( $res ) {
				header("location:index.php?action=borrado");
			} else {
				header("location:index.php?action=error-al-borrar");
			}
		}

	}
}

?>