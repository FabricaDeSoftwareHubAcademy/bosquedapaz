let modalCadastro;

var loadFile = function (event) {
    const nomeCategoria = document.getElementById('nome')?.value;
    const outputText = document.getElementById('output-text');
    if (outputText) {
        outputText.textContent = nomeCategoria;
    }
};

document.addEventListener("DOMContentLoaded", function () {
    modalCadastro = document.getElementById("cadastro-categoria");

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

    modalCadastro.addEventListener("click", function (event) {
        if (event.target === modalCadastro) {
            modalCadastro.close();
        }
    });

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

    const bot_categoria = document.querySelector(".btn-cad");
    bot_categoria?.addEventListener("click", function () {
        modalCadastro?.showModal();
    });

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

    const formCategoria = document.getElementById('form_categoria');
    const btnSalvarDialog = document.getElementById('btn_cadastrar_cat');

    const modalConfirmar = document.getElementById('modal-confirmar');
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnConfirmar = document.getElementById('btn-modal-salvar');

    const modalSucesso = document.getElementById('modal-sucesso');
    const mensagemModalSucesso = document.getElementById('msm-sucesso'); // Obtem a referência para o elemento de mensagem

    const modalErro = document.getElementById('modal-error');
    const modalErroText = document.getElementById('erro-text');
    const btnFecharErro = document.getElementById('close-modal-erro');

    function validarFormularioCategoria() {
        const nome = document.getElementById('nome')?.value.trim();
        const cor = document.getElementById('corInput')?.value;

        if (!nome) {
            modalErroText.textContent = 'O nome da categoria é obrigatório.';
            modalErro.showModal();
            return false;
        }

        if (nome.length > 30) {
            modalErroText.textContent = 'O nome da categoria deve ter no máximo 30 caracteres.';
            modalErro.showModal();
            return false;
        }

        if (!cor) {
            modalErroText.textContent = 'Por favor, selecione uma cor para a categoria.';
            modalErro.showModal();
            return false;
        }

        return true;
    }

    // CLICOU EM “SALVAR” → ABRE MODAL DE CONFIRMAR
    btnSalvarDialog?.addEventListener("click", function (event) {
        event.preventDefault();
        if (validarFormularioCategoria()) {
            modalConfirmar?.showModal();
        }
    });

    // CANCELAR CONFIRMAÇÃO
    btnCancelar?.addEventListener("click", () => modalConfirmar?.close());

    // CONFIRMAR ENVIO
    btnConfirmar?.addEventListener("click", async function () {
        modalConfirmar?.close();

        const formData = new FormData(formCategoria);

        try {
            const resposta = await fetch('../../../actions/cadastro-categoria.php', {
                method: 'POST',
                body: formData
            });

            const json = await resposta.json();
            console.log(json);

            if (json.status === "success") {
                modalCadastro?.close();
                // ATUALIZANDO MENSAGEM PARA SER MAIS ESPECÍFICA
                mensagemModalSucesso.textContent = 'Categoria cadastrada com sucesso!';
                modalSucesso?.showModal();
                setTimeout(() => window.location.reload(), 2000);
            } else {
                modalErroText.textContent = json.message || 'Ocorreu um erro desconhecido.';
                modalErro.showModal();
            }
        } catch (error) {
            console.error("Erro no envio:", error);
            modalErroText.textContent = 'Erro inesperado ao enviar o formulário.';
            modalErro.showModal();
        }
    });

    btnFecharErro?.addEventListener("click", () => {
        modalErro?.close();
    });

    modalErro?.addEventListener("click", (e) => {
        if (e.target === modalErro) {
            modalErro.close();
        }
    });
});

function openModalSucesso() {
    const modal = document.getElementById('modal-sucesso');
    if(modal) modal.showModal();
}

function fecharModal(idModal) {
    const modal = document.getElementById(idModal);
    if (modal && typeof modal.close === 'function') {
        modal.close();
    }
}

const nomeInput = document.getElementById('nome');
const fileInput = document.getElementById('file');
const previewContainer = document.getElementById('preview-container');
const previewCircle = document.getElementById('preview-circle');
const previewImg = document.getElementById('preview-img');
const previewLabel = document.getElementById('preview-label');
const corInput = document.getElementById('corInput');
const colorOptions = document.querySelectorAll('#seletor-cor div[data-value]');
const uploadPlaceholder = document.getElementById('upload-placeholder');
const btnCancelar = document.getElementById('btn_cancelar_categoria');

function atualizarPreview() {
    const nome = nomeInput?.value.trim();
    if (nome) previewLabel.textContent = nome;
}

nomeInput?.addEventListener('input', () => {
    atualizarPreview();
});

colorOptions?.forEach(item => {
    item.addEventListener('click', () => {
        const cor = item.getAttribute('data-value');
        corInput.value = cor;
        previewCircle.style.backgroundColor = cor;
    });
});


fileInput?.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            if (previewImg) {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            }
            if (previewContainer) previewContainer.style.display = 'flex';
            if (uploadPlaceholder) uploadPlaceholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
});


function limparPreviewCategoria() {
    if (previewContainer) previewContainer.style.display = 'none';
    if (previewImg) { previewImg.src = ''; previewImg.style.display = 'none'; }
    if (previewCircle) previewCircle.style.backgroundColor = '#ccc';
    if (previewLabel) previewLabel.textContent = '';
    if (uploadPlaceholder) uploadPlaceholder.style.display = 'block';

    if (fileInput) fileInput.value = '';
    if (nomeInput) nomeInput.value = '';
    if (corInput) corInput.value = '';
}

// Evento do botão "Cancelar"
btnCancelar?.addEventListener('click', () => {
    limparPreviewCategoria();
    const dialog = document.getElementById('cadastro-categoria');
    if (dialog) dialog.close();
});
