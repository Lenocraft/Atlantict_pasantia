<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuarios</title>
</head>

<body>
    <div id="logo">
        <img src="img/Logo-Atlantic.jpg" alt="">
    </div>
    <div class="btn">
        <button><span class="material-symbols-outlined">
            logout
            </span><p>Regresar </p></button>
    </div>
    <div id="todo">

        <div id="title">
            <h1>Agregar Usuarios Administradores</h1>

            <hr>

        </div>
        <div id="color"></div>

        <div id="formulario">
            <form action="Procesar_Usuarios.php" method="post" onsubmit="return enviar();">
                <p>Nombre de Usuario</p>
                <input type="text" class="nombre" id="nombre" name="nombre" placeholder="Nombre de Usuario">

                <p>Contraseña</p>
                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">


                <div id="boton">
                    <button type="submit">Ingresar</button>
                </div>
        </div>
        </form>
    </div>
    <script src="js/Script.js"></script>
</body>

</html>