function validarConfSenha() {
    const senha = document.getElementById("novaSenha").value.trim();
    const confSenha = document.getElementById("confirmSenha").value.trim();

    if (senha === "" || confSenha === "") {
        alert("Preencha todos os campos");
        return false;
    } else if (senha !== confSenha) {
        alert("Senha e Confirmar Senha não conferem!");
        return false;
    }

    document.querySelector(".fundo-container-confirmacao-dados").classList.add("show");

    return false;
}