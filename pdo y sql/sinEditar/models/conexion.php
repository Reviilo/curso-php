<?php

class Conexion {
    public function conectar () {

        // $link = POD("host;dbname", "user", "pass");
        $link = new PDO("mysql:host=localhost;dbname=cursophp", "root", "root");
        return $link;
    }
}
