<?php

include_once("./conexion.php");

$query = $mbd->prepare("SELECT * FROM impresiones");
$query->execute();


$impresiones = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto_Pasantía</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="img/50883886407-removebg-preview.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #495057;
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }

        .container {
            margin-top: 20px;
        }

        .form-section {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .btn {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
        }

        .form-check-input {
            margin-top: 5px;
            margin-right: 5px;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .form-check-inline {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Control de Impresión Producto</h1>
    </header>

    <div class="container">
        <form method="post" action="php.php" data-parsley-validate>

            <div class="form-row">
                <div class="col-md-4 form-section" action="php.php">
                    <label for="po1">PO#</label>
                    <select class="form-select form-select-lg mb-3" id="po1" onchange="getInformacion()" name="po1" aria-label=".form-select-lg example">
                        <option value="" selected disabled>-- Seleccione un PO --</option>
                        <?php foreach ($impresiones as $impresion) : ?>
                            <option value="<?php echo $impresion["po1"] ?>">
                                <?php echo $impresion["po1"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <br>
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="po">PO#</label>
                    <input type="text" class="form-control" id="po" name="po" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="line">Line</label>
                    <input type="text" class="form-control" id="line" name="line" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="qty">Qty</label>
                    <input type="text" class="form-control" id="qty" name="qty" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="um">U/M</label>
                    <input type="text" class="form-control" id="um" name="um" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="jt">JT/WO</label>
                    <input type="text" class="form-control" id="jt" name="jt" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="die">DIE</label>
                    <input type="text" class="form-control" id="die" name="die" required data-parsley-required-message="Este campo es obligatorio">
                </div>

                <div class="col-md-4 form-section">
                    <label for="code2">Code</label>
                    <input type="text" class="form-control" id="code2" name="code2" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="sizeCode">Size Code</label>
                    <input type="text" class="form-control" id="sizeCode" name="sizeCode" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="area">Area</label>
                    <input type="text" class="form-control" id="area" name="area" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="deliveryDate">Delivery Date</label>
                    <input type="text" class="form-control" id="deliveryDate" name="deliveryDate" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="comments">Comments</label>
                    <input type="text" class="form-control" id="comments" name="comments" required data-parsley-required-message="Este campo es obligatorio">
                </div>

                <div class="col-md-4 form-section">
                    <label for="totalImpresion">Total Impresion</label>
                    <input type="text" class="form-control" id="totalImpresion" name="totalImpresion" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="cantidadImpresion">Cantidad De Impresion</label>
                    <input type="text" class="form-control" id="cantidadImpresion" name="cantidadImpresion" required data-parsley-required-message="Este campo es obligatorio" oninput="checkImpresiones()">

                    <label for="impresionRestante">Impresion Restante</label>
                    <input type="text" class="form-control" id="impresionRestante" name="impresionRestante" required data-parsley-required-message="Este campo es obligatorio" oninput="checkImpresiones()">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="aprobadoCalidad" name="aprobadoCalidad">
                        <label class="form-check-label" for="aprobadoCalidad">Aprobado Calidad</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="impreso" name="impreso">
                        <label class="form-check-label" for="impreso">Impreso</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="noImpreso" name="noImpreso">
                        <label class="form-check-label" for="noImpreso">No Impreso</label>
                    </div>
                </div>

                <div class="col-md-12 form-section">
                    <label for="materialDescription">Material Description</label>
                    <input type="text" class="form-control" id="materialDescription" name="materialDescription" required data-parsley-required-message="Este campo es obligatorio">
                </div>
            </div>


            <input type="submit" name="submit" class="btn btn-primary" value="Add Record">

            <input type="submit" name="submit" class="btn btn-success" value="Save Record">



            <button type="button" class="btn btn-primary" onclick="showAlert('Creando Reporte')">
                <i class="fas fa-trash"></i> Ir a Reporte
            </button>

            <input type="submit" name="submit" class="btn btn-danger" onclick="showAlert('Delete Record')" value="Delete Record">


            <button type="button" class="btn btn-secondary" onclick="showAlertAndRefresh()">
                <i class="fas fa-sync-alt"></i> Refresh
            </button>







        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function showAlertAndRefresh() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Se perderán los cambios no guardados.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, refrescar página'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        }
    </script>

    <script>
        function checkImpresiones() {
            var totalImpresion = parseInt(document.getElementById('totalImpresion').value);
            var cantidadImpresion = parseInt(document.getElementById('cantidadImpresion').value);
            var impresionRestante = parseInt(document.getElementById('impresionRestante').value);

            if (cantidadImpresion > totalImpresion) {
                document.getElementById('cantidadImpresion').value = totalImpresion;
                cantidadImpresion = totalImpresion;
            }

            if (impresionRestante > totalImpresion) {
                document.getElementById('impresionRestante').value = totalImpresion;
                impresionRestante = totalImpresion;
            }

            var cantidadRestante = totalImpresion - cantidadImpresion;
            document.getElementById('impresionRestante').value = cantidadRestante;

            if (cantidadRestante < 0) {
                document.getElementById('cantidadImpresion').value = totalImpresion;
                document.getElementById('impresionRestante').value = 0;
            }
        }
    </script>

    <script>
        function getInformacion() {
            const text = document.getElementById('po1');

            console.log(text.value);

            axios.get('./cargar_informacion.php?po1=' + text.value)
                .then(function(response) {
                    // handle success
                    autoFillForm(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .finally(function() {
                    // always executed
                });
        }

        // Función para autocompletar el formulario
        function autoFillForm(data) {
            for (let key in data) {
                if (data.hasOwnProperty(key)) {
                    let element = document.getElementById(key);
                    if (element) {
                        element.value = data[key];
                    }
                }
            }
        }


        $(document).ready(function() {
            $('form').parsley();
        });

        function showAlert(action) {
            Swal.fire({
                title: action,
                text: `You clicked ${action} button`,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>

</html>