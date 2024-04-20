<!-- obtener_reporte.php -->
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
            // Mostrar los datos en la ventana modal
            echo "<div class='modal fade' id='reporteModal' tabindex='-1' role='dialog' aria-labelledby='reporteModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='reporteModalLabel'>Reporte de Impresión</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>";
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>PO#1:</strong> " . $row['po1'] . "</p>
                      <p><strong>ID:</strong> " . $row['id_field'] . "</p>
                      <p><strong>PO#:</strong> " . $row['po'] . "</p>
                      <p><strong>Line:</strong> " . $row['line'] . "</p>
                      <p><strong>Code:</strong> " . $row['code'] . "</p>
                      <p><strong>Qty:</strong> " . $row['qty'] . "</p>
                      <p><strong>U/M:</strong> " . $row['um'] . "</p>
                      <p><strong>JT/WO:</strong> " . $row['jt'] . "</p>
                      <p><strong>DIE:</strong> " . $row['die'] . "</p>
                      <p><strong>Code2:</strong> " . $row['code2'] . "</p>
                      <p><strong>Size Code:</strong> " . $row['size_code'] . "</p>
                      <p><strong>Area:</strong> " . $row['area'] . "</p>
                      <p><strong>Delivery Date:</strong> " . $row['delivery_date'] . "</p>
                      <p><strong>Comments:</strong> " . $row['comments'] . "</p>
                      <p><strong>Total Impresion:</strong> " . $row['total_impresion'] . "</p>
                      <p><strong>Impresion Restante:</strong> " . $row['impresion_restante'] . "</p>
                      <input type='text' class='form-control' id='cantidadImpresion' name='cantidadImpresion' placeholder='Cantidad de impresión realizada'>
                      <button class='btn btn-primary mt-2' onclick='guardarCantidadImpresion(\"" . $po1 . "\")'>Guardar Cantidad de Impresión</button>";
            }
            echo "</div>
                    </div>
                </div>
            </div>";
        } else {
            echo "No se encontraron datos para el PO#1 proporcionado";
        }

        $conn->close();
    }
?>
