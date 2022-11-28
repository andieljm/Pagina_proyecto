<?php

class Conexion
{
    public $link;

    public function conectar() {
        $this->link = mysqli_connect("localhost", "root", "", "nventas");
    }

    public function cerrar() {
        $this->link->close();
    }

}