<?php
// Conexión a la base de datos (reemplaza los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "control_de_impresiones";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Recibir datos del formulario
$id = $_POST['id'];
$po = $_POST['po'];
$line = $_POST['line'];
$code = $_POST['code'];
$qty = $_POST['qty'];
$um = $_POST['um'];
$jt = $_POST['jt'];
$die = $_POST['die'];
$code2 = $_POST['code2'];
$sizeCode = $_POST['sizeCode'];
$area = $_POST['area'];
$deliveryDate = $_POST['deliveryDate'];
$comments = $_POST['comments'];
$totalImpresion = $_POST['totalImpresion'];
$cantidadImpresion = $_POST['cantidadImpresion'];
$impresionRestante = $_POST['impresionRestante'];
$aprobadoCalidad = isset($_POST['aprobadoCalidad']) ? 1 : 0;
$impreso = isset($_POST['impreso']) ? 1 : 0;
$noImpreso = isset($_POST['noImpreso']) ? 1 : 0;
$materialDescription = $_POST['materialDescription'];

// Query de inserción
$sql = "INSERT INTO impresiones (id, po1, line, code, qty, um, jt, die, code2, sizeCode, area, deliveryDate, comments, totalImpresion, impresionRestante, cantidadImpresion, materialDescription) VALUES ('$id', '$po', '$line', '$code', '$qty', '$um', '$jt', '$die', '$code2', '$sizeCode', '$area', '$deliveryDate', '$comments', '$totalImpresion', '$impresionRestante', '$cantidadImpresion', '$materialDescription')";

if ($conn->query($sql) === TRUE) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
