<?php

    print_r($_POST);

    include_once('./conexion.php');

    //Username
    $username = $_POST['nombre'];
    $username = strtolower($username);

    //Password
    $password = $_POST['contraseña'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $encontrar_usuario = $mbd->prepare('SELECT COUNT(*) as cuenta FROM usuarios WHERE username = ?');
    $encontrar_usuario->execute(array($username));

    $usuario_encontrado = $encontrar_usuario->fetch();
    $usuario_encontrado = $usuario_encontrado['cuenta'];

    if($usuario_encontrado > 0) return header('location: ./Ingresar_Usuarios.php');


    $insertar = $mbd->prepare('INSERT INTO usuarios (username, username_password, tipo) VALUES (?,?,?)');
    $insertar->execute(array($username, $password, 0));

    header('location: ./Iniciar_Sesion.php');

?>