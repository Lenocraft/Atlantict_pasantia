<?php
// Verifica si se recibió una solicitud POST desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectarse a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "impresiones";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el PO#1 enviado desde el formulario
    $po1 = $_POST['po1'];

    // Consulta SQL para obtener los datos del PO#1 de la base de datos
    $sql = "SELECT * FROM informacion WHERE po1 = '$po1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos en el formulario
        $row = $result->fetch_assoc();
        // Llenar los campos del formulario con los datos obtenidos de la base de datos
        // Ten en cuenta que estos campos deben ser de solo lectura para que el usuario no los modifique
        $id = $row['id_field'];
        $po = $row['po'];
        $line = $row['line'];
        $code = $row['code'];
        $qty = $row['qty'];
        $um = $row['um'];
        $jt = $row['jt'];
        $die = $row['die'];
        $code2 = $row['code2'];
        $sizeCode = $row['size_code'];
        $area = $row['area'];
        $deliveryDate = $row['delivery_date'];
        $comments = $row['comments'];
        $totalImpresion = $row['total_impresion'];
        $impresionRestante = $row['impresion_restante'];
        $cantidadImpresion = $_POST['cantidadImpresion'];
        $aprobadoCalidad = $row['aprobado_calidad'];
        $impreso = $row['impreso'];
        $noImpreso = $row['no_impreso'];
    } else {
        echo "No se encontraron datos para el PO#1 proporcionado";
    }

    // Actualizar la base de datos con la cantidad restante de impresión solo si se presionó el botón de guardar
    if (isset($_POST['guardar'])) {
        // Calcular la cantidad restante de impresión
        $impresionRestante = $totalImpresion - $cantidadImpresion;

        // Actualizar la base de datos con la cantidad restante de impresión
        $sql_update = "UPDATE informacion SET cantidad_impresion = '$cantidadImpresion', impresion_restante = '$impresionRestante' WHERE po1 = '$po1'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Cantidad de impresión actualizada exitosamente";
        } else {
            echo "Error al actualizar la cantidad de impresión: " . $conn->error;
        }
    }

    $conn->close();
}
?>
