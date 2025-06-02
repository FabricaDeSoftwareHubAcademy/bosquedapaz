document.addEventListener("DOMContentLoaded", function () {
    const modalCadastro = document.getElementById("cadastro-categoria");
    const form_categoria = document.getElementById('form_categoria');
    const botao_cadastrar = document.getElementById("btn_cadastrar_cat");

    // Abertura do modal e preenchimento dos campos
    document.querySelectorAll(".open-modal").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const id = this.dataset.id;
            const nome = this.dataset.nome;
            const cor = this.dataset.cor;

            document.querySelector('input[name="id_categoria"]').value = id;
            document.querySelector('input[name="descricao"]').value = nome;
            document.getElementById('corInput').value = cor;

            document.getElementById('selectedText').textContent = cor;
            document.getElementById('selectedColor').style.backgroundColor = cor;

            modalCadastro.showModal();
        });
    });

    // Fechar modal nos botões com classe close-modal
    document.querySelectorAll(".close-modal").forEach(button => {
        button.addEventListener("click", function () {
            modalCadastro.close();
        });
    });

    // Fechar modal clicando fora do conteúdo
    modalCadastro.addEventListener("click", function (event) {
        if (event.target === modalCadastro) {
            modalCadastro.close();
        }
    });

    // Enviar formulário de categoria (edição)
    botao_cadastrar?.addEventListener("click", async function (event) {
        event.preventDefault();

        if (!form_categoria) {
            console.error("Formulário 'form_categoria' não encontrado!");
            alert("Erro interno: formulário não encontrado.");
            return;
        }

        const formData = new FormData(form_categoria);

        try {
            const resposta = await fetch('../../../actions/edicao-categoria.php', {
                method: 'POST',
                body: formData
            });

            const resultado = await resposta.json();
            console.log(resultado);

            if (resultado.status === "OK") {
                alert("Editado com sucesso");
                modalCadastro?.close();
                setTimeout(() => location.reload(), 1000);
            } else {
                alert("Erro ao editar: " + (resultado.message || 'Erro desconhecido'));
            }
        } catch (error) {
            console.error("Erro no envio:", error);
            alert("Erro inesperado.");
        }
    });

    // Selecionador de cor no modal
    const colorItems = document.querySelectorAll("#seletor-cor div");
    const corInput = document.getElementById("corInput");
    const selectedText = document.getElementById("selectedText");
    const selectedColor = document.getElementById("selectedColor");

    colorItems.forEach(item => {
        item.addEventListener("click", () => {
            const selectedValue = item.getAttribute("data-value");
            corInput.value = selectedValue;
            selectedColor.style.backgroundColor = selectedValue;
            selectedText.textContent = selectedValue;
        });
    });
});

// Função global para fechar modal por ID
function fecharModal(idModal) {
    const modal = document.getElementById(idModal);
    if (modal && typeof modal.close === 'function') {
        modal.close();
    }
}
