linkSuscess.href = '../Public/css/css-modais/style-modal-sucesso.css';

const form = document.querySelector('form');

form.addEventListener('submit', function (e) {
    const senha = document.getElementById("novaSenha").value.trim();
    const confSenha = document.getElementById("confirmSenha").value.trim();

    if (senha === "" || confSenha === "") {
        alert("Preencha todos os campos");
        e.preventDefault();
        return;
    }

    if (senha !== confSenha) {
        alert("Senha e confirmação não conferem");
        e.preventDefault();
        return;
    }

    // Modal opcional
    openModalSucesso();
});
