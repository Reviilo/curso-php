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

	# TESTEAR LOS DATOS DE ENTRADA
	#-------------------------------------

	public function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }

	# REGISTRO DE USUARIO
	#-------------------------------------

	public function registroUsuarioController () {

		if (isset($_POST["usuario"])) {

			// Validacion
			// $rexEmail = "/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
			
			$rexEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
			$rexUsuario = "/[a-z0-9]*$/";
			$rexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/";
			$email = MvcController::test_input($_POST["email"]);
			$usuario = MvcController::test_input($_POST["usuario"]);
			$password = MvcController::test_input($_POST["password"]);
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
			}

			if ( preg_match($rexUsuario, $usuario) && 
				preg_match($rexPassword, $password) &&
				preg_match($rexEmail, $email)) {

				$password = password_hash($password, PASSWORD_DEFAULT);

				$datos = array(
					"usuario" 	=> 	$usuario,
					"password"	=>	$password,
					"email"		=>	$email
				);
	
				$res = Datos::registroUsuarioModel($datos, "usuarios");
	
				if ($res === "success") {
					header("location:index.php?action=ok");
				} else {
					header("location:index.php");
				}

			}

		}
	}

	# INGRESO USUARIO
	#-------------------------------------

	public function ingresoUsuarioController () {

		if (isset($_POST["usuario"])) {
			$rexUsuario = "/[a-z0-9]*$/";
			$rexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/";
			$usuario = MvcController::test_input($_POST["usuario"]);
			$password = MvcController::test_input($_POST["password"]);

			if ( preg_match($rexUsuario, $usuario) && 
				preg_match($rexPassword, $password)) {

				$datos = array(
					"usuario" 	=> 	$usuario,
					"password"	=>	$password
				);
	
				$res = Datos::ingresoUsuarioModel($datos, "usuarios");

				$intentos = $res["intentos"];
				$maxIntentos = 2;

				if ( $intentos < $maxIntentos ) {

					if ( $res["usuario"] === $_POST["usuario"] && password_verify($_POST["password"], $res["password"])  ) {
	
						session_start();
		
						$_SESSION["validar"] = true;

						$datos = array(
							"usuarioIngresado" 	=> 	$usuario,
							"numeroIntentos"	=>	0
						);

						$res = Datos::intentoIngresoUsuarioModel($datos, "usuarios");
		
						header("location:index.php?action=usuarios");
					} else {
						++$intentos;

						$datos = array(
							"usuarioIngresado" 	=> 	$usuario,
							"numeroIntentos"	=>	$intentos
						);

						$res = Datos::intentoIngresoUsuarioModel($datos, "usuarios");

						if ( $res ) {
							header("location:index.php?action=fallo-ingreso-c");
							echo "La contraseña ingresada no coincide, intentelo nuevamente.";
						} else {
							header("location:index.php?action=fallo-ingreso-u");
							echo "El usuario ingresado no se encontro en la base de datos.";
						}
					}

				} else {
					$datos = array(
						"usuarioIngresado" 	=> 	$usuario,
						"numeroIntentos"	=>	0
					);

					$res = Datos::intentoIngresoUsuarioModel($datos, "usuarios");

					header("location:index.php?action=fallo-ingreso-3");
				}
	
				
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

	# VISTA DEL USUARIOS POR ID PARA SER EDITADO
	#-------------------------------------

	public function verUsuarioController () {
		$id = $_GET["id"];

		$res = Datos::verUsuarioModel($id, "usuarios");

		echo '
			<input type="hidden" value="'.$res[0].'" name="id" >

			<input type="text" value="'.$res[1].'" placeholder="Usuario" name="usuario" id="usuario" required>

			<input type="text" value="'.$res[2].'" placeholder="Contraseña" name="password" id="password" required>
		
			<input type="email" value="'.$res[3].'" placeholder="Email" name="email" id="email" required>
		';
	}

	# ACTUALIZAR DATOS DEL USUARIO
	#-------------------------------------

	public function actualizarUsuarioController () {

		if(isset($_POST["usuario"])) {

			$rexEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
			$rexUsuario = "/[a-z0-9]*$/";
			$rexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/";
			$id = MvcController::test_input($_POST["id"]);
			$email = MvcController::test_input($_POST["email"]);
			$usuario = MvcController::test_input($_POST["usuario"]);
			$password = MvcController::test_input($_POST["password"]);
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
			}

			if ( preg_match($rexUsuario, $usuario) && 
				preg_match($rexPassword, $password) &&
				preg_match($rexEmail, $email)) {

				$password = password_hash($password, PASSWORD_DEFAULT);

				$datos = array(
					"id"		=>	$id,
					"usuario"	=>	$usuario,
					"password"	=>	$password,
					"email"		=>	$email
				);

				var_dump( $datos );

				$res = Datos::actualizarUsuarioModel($datos, "usuarios");

				if ( $res ) {
					header("location:index.php?action=actualizado");
				} else {
					header("location:index.php?action=error-de-actualizacion");
				}
			}

		} else {
			echo "error";
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