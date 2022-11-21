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
    <title>ElectroComp - Admin</title>
</head>

<body>
    <header>
        <h1>Thunder Express</h1>
    </header>

    <div class="nav_bg">
        <nav class="nav_principal contenedor">
            <a href="admin.php">Administrador</a>
            <a href="paquetes.php">Paquetes</a>
            <a href="">Cerrar Sección</a>
        </nav>
    </div>

    <section class="contenedor contenido">
        <h2>Administrador</h2>

    </section>

    <footer class="contenedor">
        <div class="derechos">
            <p>Todos los derechos reservados. ThunderExpress</p>
        </div>
    </footer>
</body>

</html>	



    public function getCodigo(): int
    {
        return $this->codigo;
    }