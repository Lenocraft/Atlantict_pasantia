function enviar() {
    let nombre = document.getElementById("nombre");
    let contraseña = document.getElementById("contraseña");
    
    if (nombre.value.trim() !== "") {
        nombre.style.border = "1px solid #00ccff";

    }
    else if (nombre.value === "") {
        document.getElementById("nombre").style.border = "1px solid #ff000090";        
        contraseña.style.border = "1px solid #ff000090";
        return false;
    }

    //Validacion de Contraseña

    if (contraseña.value === "") {
        document.getElementById("contraseña").style.border = "1px solid #ff000090";
        return false;
    }
}