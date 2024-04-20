function validacion () {
    let campos = [
        "PO#1",
        "ID",
        "PO#",
        "Line",
        "Code",
        "Qty",
        "U/M",
        "JT/WO",
        "DIE",
        "Code2",
        "SizeCode",
        "Area",
        "DeliveryDate",
        "Comments",
        "TotalImpresion",
        "ImpresionRestante",
        "CantidadDeImpresion",
        "AprobadoCalidad",
        "Impreso",
        "NoImpreso",
        "MaterialDescription"

    ];

    for (let campo of campos) {
        let valorCampo = document.getElementById(campo).value;

        if (valorCampo === "") {
            alert("Por favor, llena todos los campos!");
            return false; 
        }
    }
};