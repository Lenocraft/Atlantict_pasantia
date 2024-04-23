<?php

require 'config.php';

$nombre_usuario = $_REQUEST['nombre'];
$contrasena = $_REQUEST['contrasena'];

$sql = "UPDATE * FROM usuarios WHERE Nombre = '$nombre_usuario' AND Contrasena = '$contrasena'";


?>