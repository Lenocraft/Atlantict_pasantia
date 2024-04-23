<?php
    session_start();

    include_once('./conexion.php');

    // Username
    $username = $_POST['nombre'];
    $username = strtolower($username);

    // Password
    $password = $_POST['contraseña'];

    $encontrar_usuario = $mbd->prepare('SELECT COUNT(*) as cuenta FROM usuarios WHERE username = ?');
    $encontrar_usuario->execute(array($username));

    $usuario_encontrado = $encontrar_usuario->fetch();
    $usuario_encontrado = $usuario_encontrado['cuenta'];

    if($usuario_encontrado == 0) return header('location: index.php');

    $query_usuario = $mbd->prepare('SELECT * FROM usuarios WHERE username = ?');
    $query_usuario->execute(array($username));

    $user = $query_usuario->fetch();

    $password_hash = $user['username_password'];

    if(password_verify($password, $password_hash) == false) return header('location: index.php');

    $rol = "";

    $_SESSION['usuario'] = $user['id'];
    $_SESSION["nombre"] = $user["username"];

    if($user['tipo'] == 0){
        $rol = "usuario";
        $_SESSION['Rol'] = $rol;
        return header('location: usuario.php');
    }
    if($user['tipo'] == 1){
        $rol = "admin";
        $_SESSION['Rol'] = $rol;
        return header('location: ./admin/indeeex.php');
    } 
    if($user['tipo'] == 2){
        $rol = "superadmin";
        $_SESSION['Rol'] = $rol;
        return header('location: ./admin/dashboard.php');
    }

    $_SESSION["Rol"] = $rol;
    return header('location: usuario.php');
?>
