function mudaFoco(campo, max, destino) {
    if (campo.value.length == max) {
        destino.focus(); 
    } 

    else if (campo.value.length == 0) {
        const campos = document.querySelectorAll('.input_codigo');
        const index = Array.from(campos).indexOf(campo);
        if (index > 0) {
            campos[index - 1].focus();
        }
    }
}