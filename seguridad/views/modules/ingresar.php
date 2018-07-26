<h1>INGRESAR</h1>

	<form method="post" onsubmit="return validarIngreso()">
		
		<input type="text" placeholder="Usuario" name="usuario" id="usuario" required>

		<input type="password" placeholder="Contraseña" name="password" id="password" required>

		<input type="submit" value="Enviar">

	</form>

	<?php

		$mvc = new MvcController();
		$mvc -> ingresoUsuarioController();

		if ( isset( $_GET["action"] ) ) {
			if ( $_GET["action"] === "fallo-ingreso-c" ) {
				echo "<p class='mensaje-error'>La contraseña ingresada no coincide, intentelo nuevamente.</p>";
			}
			if ( $_GET["action"] === "fallo-ingreso-u" ) {
				echo "<p class='mensaje-error'>El usuario ingresado no se encontro en la base de datos.</p>";
			}

			if ( $_GET["action"] === "fallo-ingreso-u" ) {
				echo "<p class='mensaje-error'>Debe llenar el recapchat.</p>";
			}
		}