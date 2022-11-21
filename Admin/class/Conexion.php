<?php

class Conexion
{
    public $link;

    public function conectar() {
        $this->link = mysqli_connect("localhost", "root", "", "proyecto");
    }

    public function cerrar() {
        $this->link->close();
    }

}