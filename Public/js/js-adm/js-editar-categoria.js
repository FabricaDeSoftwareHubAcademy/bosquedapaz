document.addEventListener('DOMContentLoaded', () => {
    const dialog = document.getElementById('cadastro-categoria');
    const form = document.getElementById('form_categoria');

    const modalConfirmar = document.getElementById('modal-confirmar');
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnConfirmar = document.getElementById('btn-modal-salvar');

    const modalSucesso = document.getElementById('modal-sucesso');
    const modalErro = document.getElementById('modal-error');
    const erroMensagem = document.getElementById('erro-mensagem');
    const btnFecharErro = document.getElementById('close-modal-erro');

    if (!dialog || !form) {
        console.error('O dialog de edição ou o formulário não foram encontrados no HTML.');
        return;
    }

    const inputDescricao = document.getElementById('descricao');

    inputDescricao?.addEventListener('input', () => {
        if (inputDescricao.value.length > 30) {
            inputDescricao.value = inputDescricao.value.slice(0, 30);
        }
    });

    form.addEventListener('input', (event) => {
        if (event.target && event.target.id === 'descricao') {
            const input = event.target;
            if (input.value.length > 30) {
                input.value = input.value.slice(0, 30);
            }
        }
    });

    // --- ABRIR MODAL E PREENCHER COM DADOS DA CATEGORIA ---
    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();
            const id = button.dataset.id;
            if (!id) return exibirErro('ID inválido.');

            try {
                const response = await fetch(`../../../actions/action-buscar-categoria.php?id=${id}`);
                const data = await response.json();

                if (data.status === 'success' && data.categoria) {
                    const categoria = data.categoria;
                    form.querySelector('#id_categoria').value = categoria.id_categoria;
                    form.querySelector('#descricao').value = categoria.descricao.slice(0, 30);

                    const corInput = form.querySelector('#corInput');
                    const selectedColorDiv = form.querySelector('#selectedColor');
                    const selectedTextSpan = form.querySelector('#selectedText');

                    corInput.value = categoria.cor;
                    selectedColorDiv.style.backgroundColor = categoria.cor;
                    selectedTextSpan.textContent = 'Cor selecionada';

                    dialog.showModal();
                } else {
                    exibirErro(data.mensagem || 'Erro ao buscar categoria.');
                }

            } catch (error) {
                console.error('Erro na requisição:', error);
                exibirErro('Erro de comunicação ao buscar os dados.');
            }
        });
    });

    // --- SELETOR DE COR ---
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
            if (items) items.style.display = "none";
        });
    });

    function validarFormularioCategoria() {
        const descricao = document.getElementById('descricao')?.value.trim();
        const cor = document.getElementById('corInput')?.value;

        if (!descricao) {
            exibirErro('O nome da categoria é obrigatório.');
            return false;
        }

        if (descricao.length > 30) {
            exibirErro('O nome deve ter no máximo 30 caracteres.');
            return false;
        }

        if (!cor) {
            exibirErro('Por favor, selecione uma cor.');
            return false;
        }

        return true;
    }

    // --- BOTÃO SALVAR (ABRE CONFIRMAR) ---
    const btnSalvar = document.getElementById('btn_cadastrar_cat');
    btnSalvar?.addEventListener('click', (e) => {
        e.preventDefault();
        if (validarFormularioCategoria()) {
            modalConfirmar?.showModal();
        }
    });

    // --- BOTÃO CANCELAR CONFIRMAÇÃO ---
    btnCancelar?.addEventListener('click', () => {
        modalConfirmar?.close();
    });

    // --- BOTÃO CONFIRMAR ENVIO ---
    btnConfirmar?.addEventListener('click', async () => {
        modalConfirmar?.close();

        const formData = new FormData(form);

        try {
            const response = await fetch('../../../actions/action-editar-categoria.php', {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            console.log('Resposta:', text);

            let data;

            try {
                data = JSON.parse(text);
            } catch (jsonError) {
                exibirErro('Resposta inesperada do servidor.');
                return;
            }

            if (data.status === 'success') {
                dialog.close();
                modalSucesso?.showModal();
                setTimeout(() => window.location.reload(), 2000);
            } else {
                exibirErro(data.message || 'Erro ao editar a categoria.');
            }
        } catch (error) {
            console.error('Erro ao salvar:', error);
            exibirErro('Erro de comunicação com o servidor.');
        }
    });

    // --- BOTÕES DE FECHAR DO DIALOG DE CADASTRO ---
    dialog.querySelectorAll('.close-modal, .cancelar').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            dialog.close();
        });
    });

    // --- BOTÃO FECHAR MODAL ERRO ---
    btnFecharErro?.addEventListener('click', () => {
        modalErro.close();
    });

    // --- FECHAR MODAL ERRO AO CLICAR FORA ---
    modalErro?.addEventListener('click', (event) => {
        if (event.target === modalErro) {
            modalErro.close();
        }
    });

    // --- BUSCA NA TABELA ---
    const INPUT_BUSCA = document.getElementById('input-busca');
    const TABELA_CATEGORIAS = document.getElementById('tabela-categoria');

    INPUT_BUSCA.addEventListener('keyup', () => {
        const expressao = INPUT_BUSCA.value.toLowerCase();
        if (expressao.length === 1) return;

        const linhas = TABELA_CATEGORIAS.getElementsByTagName('tr');

        for (let posicao in linhas) {
            if (isNaN(posicao)) continue;
            const conteudo = linhas[posicao].innerHTML.toLowerCase();
            linhas[posicao].style.display = conteudo.includes(expressao) ? '' : 'none';
        }
    });

    // --- FUNÇÃO PARA EXIBIR MODAL DE ERRO ---
    function exibirErro(mensagem) {
        if (erroMensagem) erroMensagem.textContent = mensagem;
        modalErro?.showModal();
    }
});
