


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
                <input type="text" id="rol" name="rol" value="admin" style="display:none;">



                <div id="boton">
                    <button type="submit">Ingresar</button>
                </div>
        </div>
        </form>
    </div>
    <script src="js/Script.js"></script>
