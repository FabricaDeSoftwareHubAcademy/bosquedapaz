document.addEventListener("DOMContentLoaded", function() {
    // Pegando o checkbox e o botão "Aceitar"
    const checkbox = document.getElementById("termos");
    const btnAceitar = document.getElementById("aceitar");

    // Função para verificar o estado do checkbox
    function toggleAceitarButton() {
        // Se o checkbox estiver marcado, habilita o botão "Aceitar", senão desabilita
        btnAceitar.disabled = !checkbox.checked;
    }

    // Adiciona o evento de mudança no checkbox
    checkbox.addEventListener("change", toggleAceitarButton);

    // Inicializa o estado do botão "Aceitar" na carga da página
    toggleAceitarButton();
});
