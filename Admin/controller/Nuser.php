<?php
include "../class/Nusers.php";

//crear usuario
$usuarion = new Nusers(2,$_POST["user"],$_POST["clave"]);

$respuesta = $usuarion->create();

if ($respuesta == "OK") {
   header("location: ../pages/index.php?codigo=1");
   exit();
}

header("location: ../pages/index.php?codigo=4&error=" . $respuesta);
exit();