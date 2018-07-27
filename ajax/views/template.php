<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
	<link rel="stylesheet" href="views/css/stylessheet.css">
</head>

<body>

	<?php include "modules/navegacion.php"; ?>


	<section>

		<?php 

		$mvc = new MvcController();
		$mvc -> enlacesPaginasController();

		?>

	</section>

	<script src="views/js/jquery-3.3.1.min.js"></script>
	<script src="views/js/validarRegistro.js"></script>
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/validarEditar.js"></script>
</body>

</html>