<?php 
	session_start();

	if(!$_SESSION["validar"]) {
		header("location:ingresar");
		exit();
	}
?>

<h1>EDITAR USUARIO</h1>

<form method="post" onsubmit="return validarEditar();">
	
	<?php

		$mvc = new MvcController();
		$mvc -> verUsuarioController();
		$mvc -> actualizarUsuarioController();
		
	?>
	<a href="index.php?action=usuarios">Cancelar</a>
	<input type="submit" value="Actualizar">
</form>

<?php 

if ( isset( $_GET[action] ) ) {
	if ($_GET[action] === "error-de-actualizacion") {
		echo "<p class='mensaje-error'>No se pudo actualizar la informacion del usuario.</p>";
		exit();
	}
}