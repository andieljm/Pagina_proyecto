<?php
include "../class/Producto.php";

if(!isset($_POST["nombre"])){
    header("location: ../pages/productos.php");
    exit();
}

// Validar que los datos no esten vacios.
$productosid = Producto::getAll();
$contador = 0;
foreach ($productosid as $productoid){
    $contador ++;
 
}
$contador ++;
session_start();
$usuario = $_SESSION["id"];

//almacenar imagen
$nombreimg = $_FILES['img']['name'];
$archivo=$_FILES['img']['tmp_name'];
$ruta="../../imgs/".$nombreimg;

move_uploaded_file($archivo,$ruta);
 
// Crear
$producto = new Producto($contador,$usuario,$_POST["nombre"], $_POST["precio"],
 $_POST["descripcion"], $nombreimg);

 $respuesta = $producto->create();

 if ($respuesta == "OK") {
    header("location: ../pages/Menu.php?codigo=1");
    exit();
 }

 header("location: ../pages/Menu.php?codigo=4&error=" . $respuesta);
 exit();

 //eliminar
 $eliminar = new Producto($_POST["eli"],$usuario,$_POST["nombre"], $_POST["precio"],
 $_POST["descripcion"], $nombreimg);

$respuesta = $eliminar->delete();

if ($respuesta == "OK") {
    header("location: ../pages/Menu.php?codigo=1");
    exit();
 }

 header("location: ../pages/Menu.php?codigo=4&error=" . $respuesta);
 exit();