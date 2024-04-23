function envia() {
    let nombr = document.getElementById("nombr");
    let contraseñ = document.getElementById("contraseñ");
    
    if (nombr.value.trim() !== "") {
        nombr.style.border = "1px solid #00ccff";

    }
    else if (nombr.value === "") {
        document.getElementById("nombr").style.border = "1px solid #ff000090";        
        contraseñ.style.border = "1px solid #ff000090";
        return false;
    }

    //Validacion de Contraseña

    if (contraseñ.value === "") {
        document.getElementById("contraseñ").style.border = "1px solid #ff000090";
        return false;
    }
}