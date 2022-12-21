<?php
include "../class/Usuario.php";

if (!isset($_POST["usuario"])) {
    header("location: ../pages/index.php?error=1");
    exit();
}

if ($_POST["usuario"] == "") {
    header("location: ../pages/index.php?error=2");
    exit();
}

if ($_POST["contrasena"] == "") {
    header("location: ../pages/index.php?error=2");
    exit();
}

$usuario = Usuario::getByUserName($_POST["usuario"]);

// echo "<pre>";
// var_dump($usuario);
// echo "</pre>";

if (!$usuario) {
    header("location: ../pages/index.php?error=3");
    exit();
}
 
if ($usuario->validarClave($_POST["contrasena"])) {
    session_start();
    $_SESSION["login"] = true;
    $_SESSION["usuario"] = $usuario->getUsuario();
    $_SESSION["id"] = $usuario->getid_usuario();
    $_SESSION["rol"] = $usuario->getID_rol();
    header("location: ../pages/Menu.php");
    exit();
} else {
    header("location: ../pages/index.php?error=3");
    exit();
}





