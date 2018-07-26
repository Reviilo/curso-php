<?php
    $numero = 5;
    echo "Esto es una variable Numero: $numero";
    echo "<br>";
    var_dump($numero);
    echo "<br><br>";

    $palabra = "palabra";
    echo "Esto es una variable String: $palabra";
    echo "<br>";
    var_dump($palabra);
    echo "<br><br>";
    

    $bool = true;
    echo "Esto es una variable de tipo booleana: $bool";
    echo "<br>";
    var_dump($bool);
    echo "<br><br>";

    // $colores = ["azul", "marron", "amarillo"];
    $colores = array("azul", "amarillo", "rojo");
    echo "Esto es una variable de tipo array: $colores[1]";
    echo "<br>";
    var_dump($colores);
    echo "<br><br>";

    $frutas = array("fruta1"=>"manzana", "fruta2"=>"banana", "fruta2"=>"sandia",);
    echo "Esto es una variable de tipo array con propiedades: $frutas[fruta2]";
    echo "<br>";
    var_dump($frutas);
    echo "<br><br>";

    $verduras = (object)["verdura1"=>"Pimenton", "verdura2"=>"Tomate", "verdura3"=>"Zanahoria"];
    echo "Esto es una variable de tipo object: $verduras->verdura1";
    echo "<br>";
    var_dump($verduras);
    echo "<br><br>";