<?php 

require 'config.php';

if (!empty($_GET["id"])) {
    $parametro = $_GET["id"];
    $sql = $conn->prepare("DELETE FROM empleados WHERE no_emp = ?");
    $sql->bind_param("i", $parametro);
    $sql->execute();
    header("Location: tickets.php");
    exit(); // Es importante salir del script después de redirigir para evitar que se ejecute más código
} 

?>