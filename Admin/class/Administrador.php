<?php
include "Conexion.php";

class Administrador
{
    // Atributos
    protected $codigoA;
    protected $usuarioA;
    protected $claveA;

    public function __construct($codigoA, $usuarioA, $claveA)
    {
        $this->codigoA = $codigoA;
        $this->usuarioA = $usuarioA;
        $this->claveA = $claveA;
    }

    // Metodos
    public static function getByUserName($user_name) // Carlos777
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM administrador WHERE usuarioA = ?";

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
            return new Administrador($dataArray[0], $dataArray[1], $dataArray[2]);
        }

        return false;
    }

    public function validarClave($claveA): bool
    {
        // if ($this->claveA == $claveA) {
        //     return true;
        // }else{
        //     return false;
        // }

        return $this->claveA == $claveA;
    }

    public function getUsuarioA(): string
    {
        return $this->usuarioA;
    }

public function getCodigoA(): int
    {
        return $this->codigoA;
    }

}