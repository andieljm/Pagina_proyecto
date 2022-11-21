<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <title>ElectroComp - Login</title>
</head>

<body class="login">

    <section class="contenedor contenido2">
        <form class="form" action="../controller/login.php" method="post">
            <legend>Inicio de sección</legend>
            <div>
                <div class="form_campo">
                    <label for="usuario">Usuario:</label>
                    <input id="usuario" name="usuario" class="form_text" type="text" 
                    placeholder="Ingrese su usuario">
                </div>
                <div class="form_campo">
                    <label for="contrasena">Contraseña:</label>
                    <input id="contrasena" name="contrasena" class="form_text" 
                    type="password" placeholder="Ingrese su contraseña">
                </div>
            </div>
            <div>
                <button class="boton enviar" type="submit">Ingresar</button>
            </div>
        </form>

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
                        echo "<p class='text-tertiary'>* Credenciales invalidos</p>";
                        break;
                }
            }
        ?>

    </section>
</body>

</html>