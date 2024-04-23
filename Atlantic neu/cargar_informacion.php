<?php

    include_once('./conexion.php');


    $po1 = $_GET['po1'];

    $query = $mbd->prepare('SELECT * FROM impresiones WHERE po1 = ?');
    $query->execute(array($po1));

    $informacion = $query->fetch();

    print_r(json_encode($informacion));


?>