linkSuscess.href = '../Public/css/css-modais/style-modal-sucesso.css';

const form = document.querySelector('form');

form.addEventListener('submit', function (e) {
    e.preventDefault(); // Impede envio imediato

    const senha = document.getElementById("novaSenha").value.trim();
    const confSenha = document.getElementById("confirmSenha").value.trim();

    if (senha === "" || confSenha === "") {
        alert("Preencha todos os campos");
        return;
    }

    if (senha !== confSenha) {
        alert("Senha e confirmação não conferem");
        return;
    }

    openModalSucesso(); // Mostra feedback visual
    // window.location.href = "./tela-login.php"; 

    setTimeout(() => {
        window.location.href = "./tela-login.php"; 
    }, 1500);
});
