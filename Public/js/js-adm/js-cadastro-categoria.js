// document.addEventListener('DOMContentLoaded', async () => {
//     const listaCategorias = document.getElementById('lista-categoria');

//     await carregarCategorias();

//     async function carregarCategorias() {
//         try {
//             const response = await fetch('../../../actions/action-listar-categoria.php');

//             if (!response.ok) {
//                 throw new Error(`Erro HTTP: ${response.status}`);
//             }

//             const data = await response.json();

//             if (data.status === 'success') {
//                 const categorias = data.dados;

//                 listaCategorias.innerHTML = '';

//                 categorias.forEach(cat => {
//                     const div = document.createElement('div');
//                     div.classList.add('item');

//                     div.innerHTML = `
//                         <div style="background-color: ${sanitize(cat.cor)};" class="bolota">
//                             <img src="../../../Public/${sanitize(cat.icone)}" alt="Ícone da categoria ${sanitize(cat.descricao)}" class="icon-item">
//                         </div>
//                         <p class="nome-cat">${sanitize(cat.descricao)}</p>
//                     `;

//                     listaCategorias.appendChild(div);
//                 });

//                 adicionarBotaoNovaCategoria();

//             } else {
//                 listaCategorias.innerHTML = '<p>❌ Erro ao carregar categorias.</p>';
//             }
//         } catch (error) {
//             console.error('Erro na requisição:', error);
//             listaCategorias.innerHTML = '<p>❌ Erro ao buscar dados.</p>';
//         }
//     }

//     function adicionarBotaoNovaCategoria() {
//         const botaoNovaCategoria = document.createElement('div');
//         botaoNovaCategoria.className = 'item open-modal';
//         botaoNovaCategoria.dataset.modal = 'cadastro-categoria';
//         botaoNovaCategoria.innerHTML = `
//         <div class="bolota" id="b10">
//             <img src="../../../Public/assets/icons/icones-categorias/Circulo-mais.png" alt="Adicionar nova categoria" class="icon-item">
//         </div>
//         <p class="nome-cat">Nova Categoria</p>
//     `;
//         listaCategorias.appendChild(botaoNovaCategoria);

//         const modalCadastro = document.getElementById("cadastro-categoria");
//         botaoNovaCategoria.addEventListener("click", function (event) {
//             event.preventDefault();
//             modalCadastro?.showModal();
//         });
//     }

//     document.addEventListener("click", function (event) {
//         if (event.target.closest(".open-modal")) {
//             const modalCadastro = document.getElementById("cadastro-categoria");
//             modalCadastro?.showModal();
//         }
//     });


//     function sanitize(str) {
//         const div = document.createElement('div');
//         div.textContent = str;
//         return div.innerHTML;
//     }
// });


let modalCadastro;
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
    const modalCadastro = document.getElementById("cadastro-categoria");

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
    modalCadastro.addEventListener("click", function (event) {
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
            const dados_php = await fetch('../../../actions/cadastro-categoria.php', {
                method: 'POST',
                body: formData
            });

            const response = await dados_php.json();
            console.log(response);

            if (response.status === "OK") {
                alert("✅ " + response.message);
                modalCadastro?.close();
                window.location.reload();
            } else if (response.status === "Error") {
                // Exibe a mensagem de erro vinda do PHP
                alert("❌ " + response.message);
            } else {
                // Caso alguma estrutura inesperada seja retornada
                alert("❌ Ocorreu um erro desconhecido.");
            }
        } catch (error) {
            console.error("Erro no envio:", error);
            alert("❌ Erro inesperado ao enviar o formulário.");
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
function fecharModal(idModal) {
    const modal = document.getElementById(idModal);
    if (modal && typeof modal.close === 'function') {
        modal.close();
    }
}


