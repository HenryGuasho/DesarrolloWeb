<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<link rel="stylesheet" href="estilos.css">
<body>
    
    <form action="validar.php" method="post">
        <h1>Sistema de Ingreso</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su contraseña" name="contraseña"></p>
        <input type="submit" value="Ingresar">
    </form>

    <br><a href="registro2.php">Registro</a></br>

</body>
</html>