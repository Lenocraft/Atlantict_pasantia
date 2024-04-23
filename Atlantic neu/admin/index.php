<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/Style1.css">
    <link rel="icon" href="img/Logo-Atlantic - copia.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<div id="logo">
        <img src="img/Logo-Atlantic.jpg" alt="">
    </div>
    <div id="todo">

        <div id="title">
            <h1>Bienvenido a Atlantic Caribbeans</h1> 
            <br>
            <hr>
            <br>
            <p>Login</p>
        </div>
        <div id="color"></div>

        <div id="formulario">
            <form action="../Procesar_Iniciar.php" method="post" onsubmit="return enviar();">
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