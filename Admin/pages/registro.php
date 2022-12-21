<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../registro.css">
    <title>Registro</title>
</head>

<body>
<div id="contenedor">
<div id="central">
<div class="regis">
	<h2 class="titulo">Registro de usuario</h2>
    <form  action="../controller/Nuser.php" method="post" >
    	<input type="text" id="user" name="user" placeholder="Usuario" required="required" />
        <input type="password" id="clav" name="clave" placeholder="Contraseña" required="required" />
        <input type="submit" class="btn btn-primary btn-block btn-large" value="Registrarse" />
        <br><br>
        <a href="../pages/index.php" class="link">> Devuelta a la pagina Login <</a>
    </form>
</div>
</div>
</div>
 
</body>