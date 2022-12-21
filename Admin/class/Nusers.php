<?php
include "Conexion.php";

class Nusers extends Conexion
{
    // Atributos
    protected $id_rol;
    protected $usuario;
    protected $clave;

    public function __construct($id_rol , $usuario, $clave)
    {
        $this->id_rol = $id_rol;
        $this->usuario = $usuario;
        $this->clave = $clave;
    }
    //metodo para contador de usuarios

    //crear usuario
    public function create()
    {
        $this->conectar();

        $query = "INSERT INTO usuarios(id_rol, usuario, clave)" .
            "VALUES(?, ?, ?)";

        $prepare = mysqli_prepare($this->link, $query);

        // s => cadenas de texto
        // d => doble
        // i => entero
        // b => binarios

        $prepare->bind_param(
            "iss",
            $this->id_rol,
            $this->usuario,
            $this->clave
        );

        if ($prepare->execute()) {
            $this->cerrar();
            return "OK";
        } else {
            $this->cerrar();
            return "Error: " . $prepare->error;
        }
    }
}