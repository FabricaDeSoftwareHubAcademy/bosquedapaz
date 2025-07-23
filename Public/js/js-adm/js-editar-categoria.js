document.addEventListener('DOMContentLoaded', () => {
    const dialog = document.getElementById('cadastro-categoria');
    const form = document.getElementById('form_categoria');

    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title'); // Adicionei esta linha para consistência
    const mensagemModalConfirmar = document.getElementById('msm-confimar'); // Adicionei esta linha para consistência
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnConfirmar = document.getElementById('btn-modal-salvar');

    const modalSucesso = document.getElementById('modal-sucesso');
    // const tituloModalSucesso = document.getElementById('sucesso-title'); // Você já tem 'Salvo com sucesso!' fixo, mas pode querer dynamic
    const mensagemModalSucesso = document.getElementById('msm-sucesso');
    const closeModalSucesso = document.getElementById('close-modal-sucesso'); // Adicionei para fechar o modal sucesso

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

    // --- ABRIR MODAL E PREENCHER COM DADOS DA CATEGORIA (PARA EDIÇÃO) ---
    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault();
            const id = button.dataset.id;
            if (!id) {
                exibirErro('ID inválido para edição.');
                return;
            }

            try {
                // Certifique-se de que este caminho está correto para buscar os dados de uma única categoria
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
                    selectedTextSpan.textContent = 'Cor selecionada'; // Ou exiba a cor real se quiser

                    dialog.showModal();
                } else {
                    exibirErro(data.message || 'Erro ao buscar dados da categoria para edição.');
                }

            } catch (error) {
                console.error('Erro na requisição de busca:', error);
                exibirErro('Erro de comunicação ao buscar os dados para edição.');
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

    // --- BOTÃO SALVAR (ABRE MODAL DE CONFIRMAÇÃO PARA EDIÇÃO) ---
    // Se o btn_cadastrar_cat é usado para editar, o nome é um pouco confuso.
    // Presumi que é o botão de "salvar" final no formulário de edição.
    const btnSalvarEdicao = document.getElementById('btn_cadastrar_cat');
    btnSalvarEdicao?.addEventListener('click', (e) => {
        e.preventDefault();
        if (validarFormularioCategoria()) {
            // Personaliza o modal de confirmação para edição
            tituloModalConfirmar.textContent = 'Confirma a Edição?';
            mensagemModalConfirmar.textContent = 'Deseja realmente salvar as alterações desta categoria?';
            modalConfirmar?.showModal();
        }
    });

    // --- BOTÃO CANCELAR CONFIRMAÇÃO ---
    btnCancelar?.addEventListener('click', () => {
        modalConfirmar?.close();
    });

    // --- BOTÃO CONFIRMAR ENVIO DA EDIÇÃO ---
    btnConfirmar?.addEventListener('click', async () => {
        modalConfirmar?.close(); // Fecha o modal de confirmação

        const formData = new FormData(form);

        try {
            const response = await fetch('../../../actions/action-editar-categoria.php', {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            console.log('Resposta Bruta do Servidor (Edição):', text);

            let data;

            try {
                data = JSON.parse(text);
            } catch (jsonError) {
                console.error('Erro de JSON na resposta de edição:', jsonError);
                exibirErro('Resposta inesperada do servidor ao tentar editar. Verifique o console.');
                return;
            }

            if (data.status === 'success') {
                dialog.close(); // Fecha o modal de edição/cadastro
                mensagemModalSucesso.textContent = data.message || 'Categoria editada com sucesso!'; // Usa a mensagem do PHP
                modalSucesso?.showModal(); // Abre o modal de sucesso
                setTimeout(() => window.location.reload(), 2000); // Recarrega a página após 2 segundos
            } else {
                // Se o status não for 'success', exibe o modal de erro
                exibirErro(data.message || 'Erro desconhecido ao editar a categoria.');
            }
        } catch (error) {
            console.error('Erro de comunicação ao salvar a edição:', error);
            exibirErro('Erro de comunicação com o servidor ao editar. Tente novamente.');
        }
    });

    // --- BOTÕES DE FECHAR DO DIALOG DE CADASTRO/EDIÇÃO ---
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

    // --- FECHAR MODAL SUCESSO PELO X ---
    closeModalSucesso?.addEventListener('click', () => {
        modalSucesso.close();
    });

    // --- BUSCA NA TABELA ---
    const INPUT_BUSCA = document.getElementById('input-busca');
    const TABELA_CATEGORIAS = document.getElementById('tabela-categoria');

    INPUT_BUSCA?.addEventListener('keyup', () => {
        const expressao = INPUT_BUSCA.value.toLowerCase();
        if (expressao.length === 0) { // Se a busca estiver vazia, mostra tudo
            const linhas = TABELA_CATEGORIAS.getElementsByTagName('tr');
            for (let posicao in linhas) {
                if (isNaN(posicao)) continue;
                linhas[posicao].style.display = '';
            }
            return;
        }

        const linhas = TABELA_CATEGORIAS.getElementsByTagName('tr');

        for (let posicao in linhas) {
            if (isNaN(posicao)) continue;
            // Ignorar a primeira linha (cabeçalho da tabela) se necessário
            // if (posicao == 0) continue; 
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