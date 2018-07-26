<?php 

$automovil1 = (object)["marca"=>"Toyota", "modelo"=>"Hudson"];
$automovil2 = (object)["marca"=>"Chevrolet", "modelo"=>"Camaro"];

function mostrarAutomovil ($auto) {
    echo "Mi carro es un $auto->marca, modelo $auto->modelo";
}

mostrarAutomovil($automovil1);
echo "<br><br>";
mostrarAutomovil($automovil2);