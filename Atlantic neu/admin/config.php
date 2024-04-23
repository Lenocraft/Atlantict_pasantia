<?php

// Creando una nueva conexión a la base de datos.
$conn = new mysqli("localhost", "root", "", "control_de_impresiones");

// Comprobando si hay un error de conexión.
if ($conn->connect_error) {
    echo 'Error de conexion ' . $conn->connect_error;
    exit;
}

?>