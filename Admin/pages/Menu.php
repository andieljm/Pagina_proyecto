<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos.css">
    <title>Nuevas ventas</title>
    <?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("location: index.php?error=1");
        exit();
    }
    ?>
</head>

<body>
    <section class="intro">
        <div class="info">
            <h1> !! Bienvenido a nuevas ventas !!</h1>
            <p>
                Donde podras comprar productos de otras personas en linea o
                vender tus productos en linea
            </p>
        </div>
    </section>
    <section class="boton">
        <div class="botonsele">
            <a class="fcc-btn" href="Vender.html">Vender Productos</a>
        </div>
        <div class="botonsele">
            <a class="fcc-btn" href="Compras.html">Comprar Productos</a>
        </div>
        <div class="botonsele">
            <a class="fcc-btn" href="#">Revisar Productos</a>
        </div>
    </section>
    <footer class="footer">
        <div class="informacion_contacto">
            <div>
                <p>Dirección: Heredia,</p>
                <p>Avenida No. 12,</p>
                <p>Edificio Azul.</p>
            </div>

            <div class="info_contacto">
                <p>&#128222; Teléfono (506) 2365-0634</p>
                <p>&#128241; Whatsapp (506) 8955-8654</p>
                <p>&#128231; nuevasventas@gmail.com</p>
            </div>

        </div>

        <div class="derechos">
            <p>© Todos los derechos reservados. Nuevas Ventas <span><a href="../controller/logout.php">Cerrar Sección</a></span></p>
        </div>
    </footer>

</body>

</html>