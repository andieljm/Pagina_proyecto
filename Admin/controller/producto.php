<?php
include "../class/Producto.php";

if(!isset($_POST["nombre"])){
    header("location: ../pages/productos.php");
    exit();
}

// Validar que los datos no esten vacios.

$contador;
$contador =+ $producto->getIDventa;

 
// Crear
$producto = new Producto($contador,$_SESSION["id"],$_POST["nombre"], $_POST["precio"],
 $_POST["descripcion"], $_POST["img"]);

 $respuesta = $producto->create();

 if ($respuesta == "OK") {
    header("location: ../pages/productos.php?codigo=1");
    exit();
 }

 header("location: ../pages/productos.php?codigo=4&error=" . $respuesta);
 exit();