<?php
    // Iniciar sesión si no está iniciada
    session_start();

    // Destruir todas las variables de sesión
    $_SESSION = array();

    // Si se desea destruir la sesión completamente, también se borra la cookie de sesión.
    // Nota: Esto destruirá la sesión y no afectará a otras cookies.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalmente, destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión u otra página deseada
    header("Location: index.php"); // Cambia 'login.php' al nombre de tu página de inicio de sesión
    exit;
?>
