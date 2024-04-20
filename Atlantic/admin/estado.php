<?php

require 'config.php';


$query1 = "SELECT COUNT(*) AS total_uno FROM carros";
$result = mysqli_query($conn, $query1);
$row_uno = mysqli_fetch_assoc($result);
$total_uno = $row_uno['total_uno'];

$query2 = "SELECT COUNT(*) AS total_dos FROM pedidos";
$result_dos = mysqli_query($conn, $query2);
$row_dos = mysqli_fetch_assoc($result_dos);
$total_dos = $row_dos['total_dos'];

$query3 = "SELECT COUNT(*) AS total_tres FROM clientes";
$result_tres = mysqli_query($conn, $query3);
$row_tres = mysqli_fetch_assoc($result_tres);
$total_tres = $row_tres['total_tres'];
?>



(<?php echo $total_uno; ?>)


<?php
?>