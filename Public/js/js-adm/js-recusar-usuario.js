document.getElementById("formRecusar").addEventListener("submit", function(e) {
    e.preventDefault(); // Evita o recarregamento da página ou o redirecionamento

    const formData = new FormData(this); // Coleta os dados do formulário

    // Faz a requisição para o PHP usando POST
    fetch("../../../app/adm/Controller/recusar_usuario.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) // Espera a resposta do PHP
    .then(data => {
        // A resposta é tratada, mas não há necessidade de mostrar nada
        console.log("Usuário recusado com sucesso.");
    })
    .catch(error => {
        console.error("Erro ao recusar usuário:", error);
    });
});