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

    public function __construct1($idventa)
    {   
        $this->idventa = $idventa;

    }
 
    // METODOS (CRUD => CREATE, READ, UPDATE, DELETE)
 
    public function create()
    {
        $this->conectar();

        $query = "INSERT INTO ventas(codigov, id_usuario, nombre, precio, descripcion, img)" .
            "VALUES(?, ?, ?, ?, ?, ?)";

        $prepare = mysqli_prepare($this->link, $query);

        // s => cadenas de texto
        // d => doble
        // i => entero
        // b => binarios

        $prepare->bind_param(
            "iisiss",
            $this->idventa,
            $this->usuario,
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

    public function delete()
    {
        $this->conectar();

        $query = "DELETE FROM ventas WHERE codigov = ?;";

        $prepare = mysqli_prepare($this->link, $query);

        // s => cadenas de texto
        // d => doble
        // i => entero
        // b => binarios

        $prepare->bind_param(
            "i",
            $this->idventa
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


    public function getIDventa(): int
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