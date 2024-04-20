<?php


    print_r($_POST);

    include_once('./conexion.php');


    // Asignar los valores del array $_POST a variables individuales
    $po1 = $_POST['po1'] ?? '';
    $id = $_POST['id'] ?? '';
    $po = $_POST['po'] ?? '';
    $line = $_POST['line'] ?? '';
    $code = $_POST['code'] ?? '';
    $qty = $_POST['qty'] ?? '';
    $um = $_POST['um'] ?? '';
    $jt = $_POST['jt'] ?? '';
    $die = $_POST['die'] ?? '';
    $code2 = $_POST['code2'] ?? '';
    $sizeCode = $_POST['sizeCode'] ?? '';
    $area = $_POST['area'] ?? '';
    $deliveryDate = $_POST['deliveryDate'] ?? '';
    $comments = $_POST['comments'] ?? '';
    $totalImpresion = $_POST['totalImpresion'] ?? '';
    $impresionRestante = $_POST['impresionRestante'] ?? '';
    $cantidadImpresion = $_POST['cantidadImpresion'] ?? '';
    $materialDescription = $_POST['materialDescription'] ?? '';


    if($_POST['submit'] == "Add Record"){
        $consulta = $mbd->prepare('INSERT INTO impresiones(po1, po, line, code, qty, um, jt, die, code2, sizeCode, area, deliveryDate, comments, totalImpresion, impresionRestante, cantidadImpresion, materialDescription) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $consulta->execute(array($po1,$po,$line,$code,$qty,$um,$jt,$die,$code2, $sizeCode, $area, $deliveryDate, $comments, $totalImpresion, $impresionRestante, $cantidadImpresion, $materialDescription));
    }

    if($_POST['submit'] == "Save Record"){
        $consulta = $mbd->prepare('UPDATE impresiones SET impresionRestante=? WHERE id=?');
        // Suponiendo que $id contiene el ID del registro que quieres actualizar
        $consulta->execute(array($impresionRestante, $id));
    }


    

  header('location: usuario.php');

   





    //return header('location: ./index (1).html');


?>