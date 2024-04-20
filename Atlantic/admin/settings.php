<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
</head>

<body>


<div class="sidebar">
        <a href="#" class="logo">
            <img src="img/logo.png" alt="">
            <div class="logo-name"><span>Atla</span>ntic</div>
        </a>
        <ul class="side-menu">
            <li><a href="./dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="./tickets.php"><i class='bx bxs-briefcase-alt'></i>Employee</a></li>
            <li><a href="./usuarios.php"><i class='bx bx-group'></i>Users</a></li>
            <li class="active"><a href="./settings.php"><i class='bx bxs-user-plus'></i>Add user</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="cerrar.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Cerrar Sesión
                </a>
            </li>
        </ul>
    </div>



    <div class="content">

        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">

            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="https://w7.pngwing.com/pngs/78/788/png-transparent-computer-icons-avatar-business-computer-software-user-avatar-child-face-hand.png">
            </a>
        </nav>



        <main>
            <div class="header">
                <div class="left">
                    <h1>Add Users</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Add Users
                            </a></li>
                        /
                        <li><a href="#" class="active">Atlantic</a></li>
                    </ul>
                    <div class="fomularios">
                        <?php
                            include 'adduser.php';
                        ?>

                        <div id="todo">

                        <div id="title">
                            <h1>Agregar Usuarios Normales</h1>

                            <hr>

                        </div>
                        <div id="color"></div>

                        <div id="formulario">
                            <form action="Procesar_Usuarios.php" method="post" onsubmit="return envia();">
                                <p>Nombre de Usuario</p>
                                <input type="text" class="nombre" id="nombr" name="nombre" placeholder="Nombre de Usuario">

                                <p>Contraseña</p>
                                <input type="password" id="contraseñ" name="contraseña" placeholder="Contraseña">
                                <input type="text" id="rol" name="rol" value="usuario" style="display:none;">

                                <div id="boton">
                                    <button type="submit">Ingresar</button>
                                </div>
                        </div>
                        </form>
                        </div>
                        <script src="js/Scriptd.js"></script>
                    </div>
                    
                </div>
            </div>




        </main>

    </div>

    <script src="js/index.js"></script>
</body>

</html>