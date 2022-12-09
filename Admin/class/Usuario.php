<?php
include "Conexion.php";

class Usuario
{
    // Atributos
    protected $id_usuario;
    protected $id_rol;
    protected $usuario;
    protected $clave;

    public function __construct($id_usuario, $id_rol , $usuario, $clave)
    {
        $this->id_usuario = $id_usuario;
        $this->id_rol = $id_rol;
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    // Metodos
    public static function getByUserName($user_name) // nombre de usuario
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
        $dataArray = $respuesta->fetch_row(); // [1, "admin", "admin",rol]

        $conexion->cerrar();

        if (!empty($dataArray)) {
            return new Usuario($dataArray[0], $dataArray[1], $dataArray[2], $dataArray[3]);
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

    public function getid_usuario(): int
    {
        return $this->id_usuario;
    }

    public function getID_rol(): int
    {
        return $this->id_rol;
    }

}