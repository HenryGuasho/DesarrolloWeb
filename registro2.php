<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); // Encriptamos la contraseña

    $conn = new mysqli("localhost", "root", "", "usuariosdw");

    // Verificar si el email ya está registrado
    $stmt = $conn->prepare("SELECT id FROM usuariosregistrados WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El email ya está registrado.";
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $contraseña);
        if ($stmt->execute()) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error en el registro.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>


<br>
    <h2>Registro de Usuario</h2>
    <form action="registro.php" method="POST">
        <label>IdUsuario:</label>
        <input type="num" name="idusuarios" requered>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Correo:</label>
        <input type="email" name="email" required>
        <label>Contraseña:</label>
        <input type="password" name="contraseña" required>
        <button type="submit">Registrarse</button>
    </form>
</br>
<link rel="stylesheet" href="estilos.css">
</body>
</html>