<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto mvc</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

    <header>
        <h1>LOGOTIPO</h1>
    </header>

    <?php 
        include "modules/nav.php";
    ?>

    <section>
        <?php 
            $mvc = new MvcController();
            $mvc -> enlacesPaginaController();
        ?>
    </section>
    
</body>
</html>