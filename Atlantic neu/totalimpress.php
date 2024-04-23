<div class="container">
    <form method="post" id="formReporte">
        <div class="form-row">
            <div class="col-md-4 form-section">
                <label for="po1">PO#1</label>
                <input type="text" class="form-control" id="po1" name="po1" required data-parsley-required-message="Este campo es obligatorio">
            </div>
        </div>
        <button type="button" class="btn btn-info" onclick="obtenerReporte()">
            <i class="fas fa-file-alt"></i> Ir a Reporte
        </button>
    </form>

    <div id="reporteContainer"></div>
</div>

<!-- Script para enviar solicitud al servidor y mostrar ventana modal -->
<script>
    function obtenerReporte() {
        var po1 = document.getElementById('po1').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'obtener_datos.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('reporteContainer').innerHTML = xhr.responseText;
            }
        };
        xhr.send('po1=' + encodeURIComponent(po1));
    }

    function guardarCantidadImpresion(po1) {
        var cantidadImpresion = document.getElementById('cantidadImpresion').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'guardar_cantidad_impresion.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                obtenerReporte();
                alert(xhr.responseText);
            }
        };
        xhr.send('po1=' + encodeURIComponent(po1) + '&cantidadImpresion=' + encodeURIComponent(cantidadImpresion));
    }
</script>
