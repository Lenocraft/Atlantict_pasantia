<?php


    session_start();

    if(isset($_SESSION["Rol"]) == false) return header('location: ../inicio.html');

    if($_SESSION["Rol"] == "usuario") return header('location: ../inicio.html');

    include_once("../conexion.php");

    $GLOBALS["pdo"] = $mbd;


    function countEstado($estado){

        $pdo = $GLOBALS["pdo"];

        $query = $pdo->prepare("SELECT COUNT(*) as cuenta FROM impresiones WHERE estado = ?");
        $query->execute(array($estado));

        $count = $query->fetch();
        $count = $count["cuenta"];

        return $count;

    }

    $query = $mbd->prepare("SELECT * FROM impresiones");
    $query->execute();

    $impresiones = $query->fetchAll();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
</head> 

<body>


<div class="sidebar">
        <a href="#" class="logo">
            <img src="img/logo.png" alt="">
            <div class="logo-name"><span>Atla</span>ntic</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="./dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="./tickets.php"><i class='bx bxs-briefcase-alt'></i>Employee</a></li>
            <li><a href="./usuarios.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="./settings.php"><i class='bx bxs-user-plus'></i>Add user</a></li>
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Registros
                            </a></li>
                        /
                        <li><a href="#" class="active">Atlantic</a></li>
                    </ul>
                </div>
            </div>


            <ul class="insights">

            <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            <?php echo countEstado("Pendiente"); ?>
                        </h3>
                        <p>Pendiente</p>
                    </span>
                </li>

                <li>
                <i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            <?php echo countEstado("No Impreso"); ?>
                        </h3>
                        <p>No Impreso</p>
                    </span>
                </li>


                <li><i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            <?php echo countEstado("Impreso"); ?>
                        </h3>
                        <p>Impreso</p>
                    </span>
                </li>
            </ul>


            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Registros</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>PO1</th>

                                <th>User</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            

                            </tr>
                        </thead>
                        <tbody>


                        <?php foreach($impresiones as $impresion): ?>
                            <tr>
                                <td><?php echo $impresion["po1"] ?></td>

                                <td>
                                    <img src="https://e7.pngegg.com/pngimages/905/625/png-clipart-computer-icons-user-profile-women-avatar-child-face.png">
                                    <p>John Doe</p>
                                </td>
                                <td><?php echo $impresion["deliveryDate"] ?></td>
                                <td><span class="status completed"><?php echo $impresion["estado"] ?></span></td>


                            </tr>
                        <?php endforeach; ?>
                           
                        </tbody>
                    </table>
                </div>





            </div>

        </main>

    </div>

    <script src="js/index.js"></script>
</body>

</html>