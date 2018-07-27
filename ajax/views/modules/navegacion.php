<?php 

	session_start();

	if(!$_SESSION["validar"]) {
		?> 
			<nav>
				<ul>
					<li><a href="index.php">Registro</a></li>
					<li><a href="ingresar">Ingreso</a></li>
				</ul>
				<div class="heart"></div>
			</nav>
		
		<?php
	} else {
		?> 

		<nav>
			<ul>
				<li><a href="usuarios">Usuarios</a></li>
				<li><a href="salir">Salir</a></li>
			</ul>
			<div class="heart"></div>
		</nav>
		

		
		<?php
	}
