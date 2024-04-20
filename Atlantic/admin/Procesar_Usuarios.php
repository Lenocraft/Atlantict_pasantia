<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "control_de_impresiones";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar valores del formulario
    $nombreUsuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $password = password_hash($contraseña, PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    // Consulta SQL para insertar en la tabla de usuarios
    $sql = "INSERT INTO usuarios (username, username_password, tipo) VALUES ('$nombreUsuario', '$password','$rol')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado correctamente";
        header("Location: settings.php");
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();

?>