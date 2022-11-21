<?php
include "Conexion.php";

class Usuario
{
    // Atributos
    protected $codigo;
    protected $usuario;
    protected $clave;

    public function __construct($codigo, $usuario, $clave)
    {
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    // Metodos
    public static function getByUserName($user_name) // Carlos777
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM usuarios WHERE usuario = ?";

        $prepare = mysqli_prepare($conexion->link, $query);

        // s => cadenas de texto
        // d => doble
        // i => entero
        // b => binarios

        $prepare->bind_param("s", $user_name);
        $prepare->execute();

        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_row(); // [1, "Carlos777", "777"]

        $conexion->cerrar();

        if (!empty($dataArray)) {
            return new Usuario($dataArray[0], $dataArray[1], $dataArray[2]);
        }

        return false;
    }

    public function validarClave($clave): bool
    {
        // if ($this->clave == $clave) {
        //     return true;
        // }else{
        //     return false;
        // }

        return $this->clave == $clave;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

}