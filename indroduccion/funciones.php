<?php

function saludo() {
    echo "Hola" . "<br>";
}

saludo();

function despedida ($adios) {
    echo "$adios" . "<br>";
}

despedida("chao"); 

function retorno ($ret) {
    return $ret;
}

echo retorno("El retorno");