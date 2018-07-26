<?php 
	session_start();

	if(!$_SESSION["validar"]) {
		header("location:index.php?action=ingresar");
		exit();
	}
?>

<h1>USUARIOS</h1>

<table border="1">
	
	<thead>
		
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th></th>
			<th></th>

		</tr>

	</thead>

	<tbody>
		
		<?php
			$mvc = new MvcController();
			$mvc -> vistaUsuariosController();
			$mvc -> borrarUsuarioController();
		?>

	</tbody>

</table>

<?php

if ( isset( $_GET[action] ) ) {
	if ($_GET[action] === "actualizado") {
		echo "<p class='mensaje-exitoso'>La informacion del usuario a sido actualizada con exito.</p>";
		exit();
	} else if ($_GET[action] === "borrado") {
		echo "<p class='mensaje-exitoso'>El usuario a sido borrado con exito.</p>";
		exit();
	} else if ($_GET[action] === "error-al-borrar") {
		echo "<p class='mensaje-error'>No se pudo borrar el usuario.</p>";
		exit();
	}
}