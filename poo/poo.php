<?php

class Automovil {
    public $marca;
    public $modelo;

    public function mostrar () {
        echo "<p>Mi carro es un $this->marca, modelo $this->modelo</p>";
    }
}

$auto1 = new Automovil();
$auto1 -> marca = "Toyota";
$auto1 -> modelo = "Corolla";
$auto1 -> mostrar();

$auto2 = new Automovil();
$auto2 -> marca = "Chevrolet";
$auto2 -> modelo = "Corsa";
$auto2 -> mostrar();