<?php
include_once("./conexion.php");

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Preparar la consulta de eliminación
    $query = $mbd->prepare("DELETE FROM impresiones WHERE id = ?");
    
    // Vincular parámetros y ejecutar la consulta
    $query->execute([$id]);
    
    // Verificar si se eliminó correctamente
    if($query->rowCount() > 0) {
        // Si se eliminó correctamente, envía una respuesta JSON con éxito
        echo json_encode(["success" => true]);
        exit;
    } else {
        // Si ocurrió un error al eliminar, envía una respuesta JSON con error
        echo json_encode(["success" => false, "message" => "Error deleting record"]);
        exit;
    }
} else {
    // Si no se proporcionó el ID, envía una respuesta JSON con error
    echo json_encode(["success" => false, "message" => "ID not provided"]);
    exit;
}
?>
