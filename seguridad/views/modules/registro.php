<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">
	<label for="usuario">Usuario</label>
	<input type="text" placeholder="Usuario" name="usuario" id="usuario" maxlength="12" required>

	<label for="password">Password</label>
	<input type="password" placeholder="Contraseña" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="6 o mas caracteres con almenos una mayusculas, minuscula y un numero. " required>

	<label for="email">Email</label>
	<input type="email" placeholder="Email" name="email" id="email" required>

	<!-- <label class="terminos-label" for="terminosYCondiciones">Terminos y Condiciones</label> -->
	<p class="terminos-texto">
		<input class="terminos-input" type="checkbox" name="terminosYCondiciones" id="tyc" title="Debe marcar los terminos y condiciones" required> 
		Acepta los terminos y Condiciones, para mas informacion puede leer los <a href="" target="_blank">"Terminos y Condiciones"</a>
	</p>

	<input type="submit" value="Enviar">

</form>

<?php 

$mvc = new MvcController();
$mvc -> registroUsuarioController();

if (isset($_GET["action"])) {
	if ($_GET["action"] === "ok") {
		echo "<p>Registro exitoso!</p>";
	}
}