<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../login2.css">
    <title>Nuevas venta</title>
</head>
 
<body class="login">
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Bienvenido
                </div>
                <form id="loginform" action="../controller/login.php" method="post">
                    <input id="usuario" name="usuario" class="form_text" type="text" placeholder="Ingrese su usuario">

                    <input id="contrasena" name="contrasena" class="form_text" type="password" placeholder="Ingrese su contraseña">

                    <button type="submit" title="Ingresar" name="Ingresar">Ingresar</button>
                </form>
                <div class="pie-form">
                    <a href="#">¿Perdiste tu contraseña?</a>
                    <a href="../pages/registro.php">¿No tienes Cuenta? Regístrate?</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case '1':
                echo "<p class='text-tertiary'>* No autorizado</p>";
                break;
            case '2':
                echo "<p class='text-tertiary'>* Se requiere usuario y contraseña</p>";
                break;
            case '3':
                echo "<p class='text-tertiary'>* Credenciales inválidos</p>";
                break;
        }
    }
    ?>
</body>

</html>