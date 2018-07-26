<?php 

	session_start();

	if(!$_SESSION["validar"]) {
		?> 
			<nav>
				<ul>
					<li><a href="index.php">Registro</a></li>
					<li><a href="index.php?action=ingresar">Ingreso</a></li>
				</ul>
			</nav>
		
		<?php
	} else {
		?> 

		<nav>
			<ul>
				<li><a href="index.php?action=usuarios">Usuarios</a></li>
				<li><a href="index.php?action=salir">Salir</a></li>
			</ul>
		</nav>

		
		<?php
	}
