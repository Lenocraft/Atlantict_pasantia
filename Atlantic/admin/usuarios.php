<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tabla.css">
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
            <li class="active"><a href="./usuarios.php"><i class='bx bx-group'></i>Users</a></li>
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
                    <h1>Users</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Registros
                            </a></li>
                        /
                        <li><a href="#" class="active">Atlantic</a></li>
                    </ul>
                </div>
            </div>

        <div class="container py-4 text-center rounded-4 bg-fff">

            <div class="row g-4">

                <div class="col-auto text-start">
                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                </div>

                <div class="col-auto text-start">
                    <select name="num_registros" id="num_registros" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <div class="col-auto text-start">
                    <label for="num_registros" class="col-form-label">registros </label>
                </div>

                <div class="col-md-4 col-xl-5"></div>

                <div class="col-6 col-md-1 text-end">
                    <label for="campo" class="col-form-label">Buscar: </label>
                </div>
                <div class="col-6 col-md-3 text-end">
                    <input type="text" name="campo" id="campo" class="form-control">
                </div>
            </div>

            <div class="row py-4">
                <div class="col">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <th class="">ID</th>
                            <th class="">Nombre</th>
                            <th class="">Contraseña</th>
                            <th class="">Rol</th>
                            <th></th>
                            <th></th>
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-between">

                <div class="col-12 col-md-4">
                    <label id="lbl-total"></label>
                </div>

                <div class="col-12 col-md-4" id="nav-paginacion"></div>

                <input type="hidden" id="pagina" value="1">
                <input type="hidden" id="orderCol" value="0">
                <input type="hidden" id="orderType" value="asc">

            </div>
        </div>
    </main>

    <script>
        // Llamando a la función getData() al cargar la página
        document.addEventListener("DOMContentLoaded", getData);

        // Función para obtener datos con AJAX
        function getData() {
            let input = document.getElementById("campo").value
            let num_registros = document.getElementById("num_registros").value
            let content = document.getElementById("content")
            let pagina = document.getElementById("pagina").value || 1;
            let orderCol = document.getElementById("orderCol").value
            let orderType = document.getElementById("orderType").value

            let formaData = new FormData()
            formaData.append('campo', input)
            formaData.append('registros', num_registros)
            formaData.append('pagina', pagina)
            formaData.append('orderCol', orderCol)
            formaData.append('orderType', orderType)

            fetch("loaddos.php", {
                    method: "POST",
                    body: formaData
                })
                .then(response => response.json())
                .then(data => {
                    content.innerHTML = data.data
                    document.getElementById("lbl-total").innerHTML = `Mostrando ${data.totalFiltro} de ${data.totalRegistros} registros`;
                    document.getElementById("nav-paginacion").innerHTML = data.paginacion

                    // Si la página actual no tiene resultados, ajustar la paginación para mostrar la primera página
                    if (data.data.includes('Sin resultados') && parseInt(pagina) !== 1) {
                        nextPage(1); // Ir a la primera página
                    }
                })
                .catch(err => console.log(err))
        }

        // Función para cambiar de página
        function nextPage(pagina) {
            document.getElementById('pagina').value = pagina
            getData()
        }

        // Función para ordenar columnas
        function ordenar(e) {
            let elemento = e.target;
            let orderType = elemento.classList.contains("asc") ? "desc" : "asc";

            document.getElementById('orderCol').value = elemento.cellIndex;
            document.getElementById("orderType").value = orderType;
            elemento.classList.toggle("asc");
            elemento.classList.toggle("desc");

            getData()
        }

        // Event listeners para los eventos de cambio en el campo de entrada y el select
        document.getElementById("campo").addEventListener("keyup", getData);
        document.getElementById("num_registros").addEventListener("change", getData);

        // Event listener para ordenar las columnas
        let columns = document.querySelectorAll(".sort");
        columns.forEach(column => {
            column.addEventListener("click", ordenar);
        });
    </script>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>