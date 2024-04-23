<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/Style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <a href="iniciar_sesion.php">Holaaa</a>
</body>

</html>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "registros";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre'];
    $contrasena = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE Nombre = '$nombre_usuario' AND Contraseña = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $usuario = $result->fetch_assoc();
        $_SESSION['nombre'] = $nombre_usuario;
        $_SESSION['Rol'] = $usuario['Rol'];

        // Redirigir según el rol
        if ($_SESSION['Rol'] == 'usuario') {
            header("Location: pepe.php");
        } elseif ($_SESSION['Rol'] == 'admin') {
            header("Location: indeeex.php");
        } elseif ($_SESSION['Rol'] == 'superadmin') {
            header("Location: dashboard.php");
        } else {
            // Si el rol no está definido, redirigir a una página de error o a alguna otra página predeterminada
            header("Location: pagina_de_error.php");
        }
        exit();
    } else {
        $error_message = "Nombre de usuario o contraseña incorrectos.";
    }
}


?>