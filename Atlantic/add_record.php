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
        margin-top: 20px;
            background-color: #f8f9fa;
            /* Color de fondo del cuerpo */
            font-family: 'Arial', sans-serif;
            color: #495057;
            /* Color del texto */
        }

        .header {
            background-color: #007bff;
            /* Color de fondo del encabezado */
            color: #ffffff;
            /* Color del texto en el encabezado */
            padding: 10px;
            text-align: center;
        }

        .container {
            margin-top: 20px;
        }

        .form-section {
            background-color: #ffffff;
            /* Color de fondo de las secciones del formulario */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
        }

        label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn {
            margin-right: 10px;
        }

        .form-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 1rem;
            line-height: 1.5;
            width: 100%;
            max-width: 20rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        }

        .form-select option {
            color: #333;
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
                    <input type="text" class="form-control" id="id" name="id" required data-parsley-required-message="Este campo es obligatorio">

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
                    <input type="text" class="form-control" id="cantidadImpresion" name="cantidadImpresion" required data-parsley-required-message="Este campo es obligatorio">

                    <label for="impresionRestante">Impresion Restante</label>
                    <input type="text" class="form-control" id="impresionRestante" name="impresionRestante" required data-parsley-required-message="Este campo es obligatorio">



                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="aprobadoCalidad" name="aprobadoCalidad">
                        <label class="form-check-label" for="aprobadoCalidad">Aprobado Calidad</label required data-parsley-required-message="Este campo es obligatorio">
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="impreso" name="impreso">
                        <label class="form-check-label" for="impreso">Impreso</label required data-parsley-required-message="Este campo es obligatorio">
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="noImpreso" name="noImpreso">
                        <label class="form-check-label" for="noImpreso">No Impreso</label required data-parsley-required-message="Este campo es obligatorio">
                    </div>
                </div>

                <div class="col-md-12 form-section">
                    <label for="materialDescription">Material Description</label>
                    <input type="text" class="form-control" id="materialDescription" name="materialDescription" required data-parsley-required-message="Este campo es obligatorio">
                </div>
            </div>


            <input type="submit" name="submit" class="btn btn-primary" value="Add Record">

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.delete-record').click(function() {
                var id = $(this).data('id');
                deleteRecord(id);
            });
        });

        function deleteRecord(id) {
            axios.post('./eliminar_registro.php', {
                    id: id
                })
                .then(function(response) {
                    showAlert('Record Deleted Successfully');
                    // Aquí puedes actualizar la interfaz de usuario si es necesario
                })
                .catch(function(error) {
                    console.error('Error deleting record:', error);
                    showAlert('Error Deleting Record');
                });
        }


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