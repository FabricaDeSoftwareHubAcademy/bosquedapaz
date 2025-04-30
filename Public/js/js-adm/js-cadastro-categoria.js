// Função para exibir o nome da categoria (sem preview de imagem)
var loadFile = function (event) {
    const nomeCategoria = document.getElementById('nome').value;
    const outputText = document.getElementById('output-text');
    if (outputText) {
        outputText.textContent = nomeCategoria;
    }
};

// Ao carregar o DOM
document.addEventListener("DOMContentLoaded", function () {
    const modalCadastro = document.getElementById("modalCadastro");

    // Botões de abrir e fechar modal
    const openModalButtons = document.querySelectorAll(".open-modal");
    const closeModalButtons = document.querySelectorAll(".close-modal");

    openModalButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            modalCadastro?.showModal();
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            modalCadastro?.close();
        });
    });

    // Fecha o modal se clicar fora do conteúdo
    modalCadastro?.addEventListener("click", function (event) {
        if (event.target === modalCadastro) {
            modalCadastro.close();
        }
    });

    // Select customizado de cor
    const selected = document.querySelector(".select-selected");
    const selectedText = document.getElementById("selectedText");
    const selectedColor = document.getElementById("selectedColor");
    const items = document.querySelector(".select-items");

    selected?.addEventListener("click", () => {
        if (items) {
            items.style.display = items.style.display === "block" ? "none" : "block";
        }
    });

    document.querySelectorAll(".select-items div").forEach(item => {
        item.addEventListener("click", function () {
            if (selectedText && selectedColor) {
                selectedText.textContent = this.textContent.trim();
                selectedColor.style.backgroundColor = this.dataset.value;
                document.getElementById("corInput").value = this.dataset.value;
            }
            if (items) {
                items.style.display = "none";
            }
        });
    });

    document.addEventListener("click", (event) => {
        if (!event.target.closest(".custom-select") && items) {
            items.style.display = "none";
        }
    });

    // Modal customizado de confirmação
    const customModal = document.getElementById("custom-modal");
    const cancelBtn = document.getElementById("custom-cancel");
    const confirmBtn = document.getElementById("custom-confirm");
    const openCustomButtons = document.querySelectorAll(".open-custom-modal");

    openCustomButtons.forEach(button => {
        button.addEventListener("click", () => {
            if (customModal) customModal.style.display = "flex";
        });
    });

    cancelBtn?.addEventListener("click", () => {
        if (customModal) customModal.style.display = "none";
    });

    confirmBtn?.addEventListener("click", () => {
        alert("Ação confirmada!");
        if (customModal) customModal.style.display = "none";
    });

    customModal?.addEventListener("click", (e) => {
        if (e.target === customModal) {
            customModal.style.display = "none";
        }
    });

    // Botão de envio do formulário
    const form_categoria = document.getElementById("form_categoria");
    const botao_cadastrar = document.getElementById("btn_cadastrar_cat");

    botao_cadastrar?.addEventListener("click", async function (event) {
        event.preventDefault();

        const formData = new FormData(form_categoria);

        try {
            const dados_php = await fetch('../../actionsADM/cadastro-categoria.php', {
                method: 'POST',
                body: formData
            });

            const response = await dados_php.json();
            console.log(response);

            if (response.status === "OK") {
                alert("Cadastrado com sucesso");
                modalCadastro?.close();
            } else {
                alert("Erro ao cadastrar!");
            }
        } catch (error) {
            console.error("Erro no envio:", error);
            alert("Erro inesperado.");
        }
    });

    // Botão de abrir modal (opcional duplicado)
    const bot_categoria = document.querySelector(".btn-cad");
    bot_categoria?.addEventListener("click", function () {
        modalCadastro?.showModal();
    });

    // Seletor de cor alternativo
    const openModal = document.getElementById("openModal");
    const seletorCor = document.getElementById("seletor-cor");
    const corInput = document.getElementById("corInput");

    if (openModal && seletorCor) {
        openModal.addEventListener("click", function () {
            seletorCor.classList.toggle("show");
        });

        seletorCor.querySelectorAll("div[data-value]").forEach(option => {
            option.addEventListener("click", function () {
                const cor = this.getAttribute("data-value");
                selectedColor.style.backgroundColor = cor;
                selectedText.innerText = this.innerText.trim();
                corInput.value = cor;
                seletorCor.classList.remove("show");
            });
        });
    }
    
});

