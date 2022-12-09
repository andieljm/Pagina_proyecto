<?php
include "Conexion.php";

class Producto extends Conexion
{   
    private $idventa;
    private $usuario;
    private $nombre;
    private $precio;
    private $descripcion;
    private $img;

    public function __construct($idventa,$usuario, $nombre, $precio, $descripcion, $img)
    {   
        $this->idventa = $idventa;
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->img = $img;
    }

    // METODOS (CRUD => CREATE, READ, UPDATE, DELETE)

    public function create()
    {
        $this->conectar();

        $query = "INSERT INTO productos(usuario, nombre, precio, descripcion, img)" .
            "VALUES(?, ?, ?, ?, ?)";

        $prepare = mysqli_prepare($this->link, $query);

        // s => cadenas de texto
        // d => doble
        // i => entero
        // b => binarios

        $prepare->bind_param(
            "siss",
            $this->nombre,
            $this->precio,
            $this->descripcion,
            $this->img,
        );

        if ($prepare->execute()) {
            $this->cerrar();
            return "OK";
        } else {
            $this->cerrar();
            return "Error: " . $prepare->error;
        }
    }

    // METODOS READ [STATIC]

    public static function getAll()
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM ventas";

        $prepare = mysqli_prepare($conexion->link, $query);
        $prepare->execute();

        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_all();

        $productos = [];

        foreach ($dataArray as $data) {
            $producto = new producto($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
            array_push($productos, $producto);
        }

        return $productos;
    }



    // METODOS GET Y SET


    public function getIDventa(): string
    {
        return $this->idventa;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getImg(): string
    {
        return $this->img;
    }
}