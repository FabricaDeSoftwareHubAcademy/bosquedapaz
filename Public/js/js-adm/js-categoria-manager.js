document.addEventListener('DOMContentLoaded', () => {
    // --- Elementos da Tabela e Busca ---
    const tabelaCategoria = document.getElementById('tabela-categoria');
    const inputBusca = document.getElementById('input-busca');
    const formBusca = document.querySelector('form');

    // --- Modal de Edição de Categoria (cadastro-categoria) ---
    const dialogEdicao = document.getElementById('cadastro-categoria');
    const formEdicaoCategoria = document.getElementById('form_categoria');

    // --- Elementos Comuns do Formulário de Edição (dentro de form_categoria) ---
    const idCategoriaInput = document.getElementById('id_categoria');
    const descricaoInput = document.getElementById('descricao');
    const corInput = document.getElementById('corInput');
    const selectedColorDiv = document.getElementById('selectedColor');
    const selectedTextSpan = document.getElementById('selectedText');

    // --- Elementos do Seletor de Cores (dentro do modal de edição) ---
    const selectedColorWrapper = document.querySelector(".select-selected"); // Onde a cor selecionada é exibida
    const itemsColorList = document.querySelector(".select-items"); // A lista de opções de cores

    // Este botão abre o modal de confirmação para edição completa
    const btnSalvarEdicaoCompleta = document.getElementById('btn_cadastrar_cat');

    // --- Modal de Confirmação (USADO PARA ALTERAR STATUS E SALVAR EDIÇÃO) ---
    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title');
    const mensagemModalConfirmar = document.getElementById('msm-confimar');
    const btnCancelarConfirmar = document.getElementById('btn-modal-cancelar');
    const btnSalvarConfirmar = document.getElementById('btn-modal-salvar'); // Este é o botão "Salvar" no modal de confirmação
    const closeModalConfirmarIcon = document.getElementById('close-modal-confirmar'); // O ícone 'X' para fechar

    // --- Modal de Sucesso ---
    const modalSucesso = document.getElementById('modal-sucesso');
    const mensagemModalSucesso = document.getElementById('msm-sucesso');
    const closeModalSucesso = document.getElementById('close-modal-sucesso');

    // --- Modal de Erro ---
    const modalErro = document.getElementById('modal-error');
    const mensagemModalErro = document.getElementById('erro-text'); // ID correto do seu HTML
    const closeModalErro = document.getElementById('close-modal-erro'); // ID correto do seu HTML

    // Variável de controle para distinguir a ação do modal de confirmação
    // Pode ser 'status' ou 'edicaoCompleta'
    let acaoModalConfirmar = null;
    // Variável para armazenar o contexto da categoria ao alterar status
    let categoriaParaAlterarStatus = null;


    // --- Carrega as categorias ao carregar a página ---
    carregarCategorias();

    // --- Event Listener para a Busca/Filtro ---
    formBusca.addEventListener('submit', function (e) {
        e.preventDefault(); // Impede o recarregamento da página
        const termo = inputBusca.value.trim().toLowerCase();
        filtrarTabela(termo);
    });

    // --- Função Principal para Carregar Categorias ---
    async function carregarCategorias() {
        try {
            const response = await fetch('../../../actions/action-listar-categoria.php');
            if (!response.ok) throw new Error('Erro na requisição da listagem');

            const data = await response.json();

            if (data.status === 'success') {
                renderizarTabela(data.dados);
                aplicarEventosBotoesEdicao();
            } else {
                tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro ao carregar categorias: ${data.message || 'Erro desconhecido'}</td></tr>`;
                exibirModalErro(data.message || 'Erro ao carregar categorias.');
            }
        } catch (error) {
            console.error('Erro ao carregar categorias:', error);
            tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro de comunicação ao carregar categorias</td></tr>`;
            exibirModalErro('Erro de comunicação ao carregar categorias.');
        }
    }

    // --- Função para Renderizar a Tabela de Categorias ---
    function renderizarTabela(categorias) {
        tabelaCategoria.innerHTML = '';

        if (categorias.length === 0) {
            tabelaCategoria.innerHTML = `<tr><td colspan="4">Nenhuma categoria encontrada</td></tr>`;
            return;
        }

        categorias.forEach(cat => {
            const status = (cat.status_cat || '').trim().toLowerCase();
            const statusClass = status === 'ativo' ? 'active' : 'inactive';
            const statusLabel = status === 'ativo' ? 'Ativo' : 'Inativo';

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="usuario-col">${cat.id_categoria}</td>
                <td>${sanitizeHTML(cat.descricao)}</td>
                <td>
                    <button class="status ${statusClass}" data-id="${cat.id_categoria}" data-status="${status}">${statusLabel}</button>
                </td>
                <td>
                    <a href="#"
                        class="edit-icon open-modal"
                        data-id="${cat.id_categoria}"
                        data-nome="${sanitizeHTML(cat.descricao)}"
                        data-cor="${sanitizeHTML(cat.cor)}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
            `;
            tabelaCategoria.appendChild(tr);
        });
    }

    // --- Função para Filtrar a Tabela ---
    function filtrarTabela(termo) {
        const linhas = tabelaCategoria.querySelectorAll('tr');
        linhas.forEach(linha => {
            if (linha.querySelector('th')) return;

            const nome = linha.children[1].textContent.toLowerCase();
            if (nome.includes(termo)) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    }

    // --- Função para Sanitizar HTML (para evitar XSS ao exibir dados) ---
    function sanitizeHTML(str) {
        const temp = document.createElement('div');
        temp.textContent = str;
        return temp.innerHTML;
    }

    // --- Lógica do Modal de Edição Completa da Categoria ---

    // Eventos para abrir o modal de edição (ícones de caneta)
    function aplicarEventosBotoesEdicao() {
        document.querySelectorAll('.open-modal').forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault();
                const id = button.dataset.id;
                if (!id) {
                    exibirModalErro('ID inválido para edição.');
                    return;
                }

                try {
                    const response = await fetch(`../../../actions/action-buscar-categoria.php?id=${id}`);
                    const data = await response.json();

                    if (data.status === 'success' && data.categoria) {
                        const categoria = data.categoria;
                        // Preenche os campos do formulário de edição
                        if (idCategoriaInput) idCategoriaInput.value = categoria.id_categoria;
                        if (descricaoInput) descricaoInput.value = categoria.descricao.slice(0, 30);

                        if (corInput && selectedColorDiv && selectedTextSpan) {
                            corInput.value = categoria.cor;
                            selectedColorDiv.style.backgroundColor = categoria.cor;
                            selectedTextSpan.textContent = categoria.cor;
                        }

                        dialogEdicao.showModal();
                    } else {
                        exibirModalErro(data.message || 'Erro ao buscar dados da categoria para edição.');
                    }

                } catch (error) {
                    console.error('Erro na requisição de busca para edição:', error);
                    exibirModalErro('Erro de comunicação ao buscar os dados para edição.');
                }
            });
        });
    }

    // Evento de "input" para limitar a descrição em 30 caracteres (no formulário de edição)
    if (descricaoInput) {
        descricaoInput.addEventListener('input', () => {
            if (descricaoInput.value.length > 30) {
                descricaoInput.value = descricaoInput.value.slice(0, 30);
            }
        });
    }

    // Eventos para o seletor de cores (no formulário de edição)
    selectedColorWrapper?.addEventListener("click", () => {
        if (itemsColorList) {
            itemsColorList.style.display = itemsColorList.style.display === "block" ? "none" : "block";
        }
    });

    document.querySelectorAll(".select-items div").forEach(item => {
        item.addEventListener("click", function () {
            if (selectedTextSpan && selectedColorDiv && corInput) {
                selectedTextSpan.textContent = this.textContent.trim();
                selectedColorDiv.style.backgroundColor = this.dataset.value;
                corInput.value = this.dataset.value;
            }
            if (itemsColorList) itemsColorList.style.display = "none";
        });
    });

    // Função de Validação do Formulário de Categoria (para edição ou cadastro)
    function validarFormularioCategoria() {
        const descricao = descricaoInput?.value.trim();
        const cor = corInput?.value;

        if (!descricao) {
            exibirModalErro('O nome da categoria é obrigatório.');
            return false;
        }
        if (descricao.length > 30) {
            exibirModalErro('O nome deve ter no máximo 30 caracteres.');
            return false;
        }
        if (!cor) {
            exibirModalErro('Por favor, selecione uma cor.');
            return false;
        }
        return true;
    }

    // Evento para o botão de "Salvar" dentro do modal de edição (abre modal de confirmação)
    btnSalvarEdicaoCompleta?.addEventListener('click', (e) => {
        e.preventDefault();
        if (validarFormularioCategoria()) {
            acaoModalConfirmar = 'edicaoCompleta';
            tituloModalConfirmar.textContent = 'Confirma a Edição?';
            mensagemModalConfirmar.textContent = 'Deseja realmente salvar as alterações desta categoria?';
            modalConfirmar?.showModal();
        }
    });

    // --- Lógica para Alteração de Status (Botão Ativo/Inativo na Tabela) ---
    tabelaCategoria.addEventListener('click', (e) => {
        if (e.target.classList.contains('status')) {
            const buttonStatus = e.target;
            const id = buttonStatus.dataset.id;
            const statusAtual = buttonStatus.dataset.status;

            categoriaParaAlterarStatus = { button: buttonStatus, id, statusAtual };
            acaoModalConfirmar = 'status';

            tituloModalConfirmar.textContent = 'Alterar Status?';
            mensagemModalConfirmar.textContent = `Deseja mudar o status para "${statusAtual === 'ativo' ? 'INATIVO' : 'ATIVO'}"?`;
            modalConfirmar.showModal();
        }
    });

    // --- Evento ÚNICO para o Botão "Salvar" do Modal de Confirmação ---
    // Este é o coração da distinção entre alterar status e edição completa
    btnSalvarConfirmar?.addEventListener('click', async () => {
        modalConfirmar?.close();

        if (acaoModalConfirmar === 'status') {
            await salvarAlteracaoStatus();
        } else if (acaoModalConfirmar === 'edicaoCompleta') {
            await salvarEdicaoCompleta();
        }
        acaoModalConfirmar = null;
    });

    // Função que executa a requisição de alteração de status
    async function salvarAlteracaoStatus() {
        if (!categoriaParaAlterarStatus) return;

        const { button, id, statusAtual } = categoriaParaAlterarStatus;

        try {
            const params = new URLSearchParams();
            params.append('acao', 'alterarStatus');
            params.append('id_categoria', id);
            params.append('status_atual', statusAtual);

            console.log('Parâmetros enviados para alterarStatus:');
            for (let pair of params.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            const response = await fetch('../../../actions/action-categoria.php', {
                method: 'POST',
                body: params
            });

            const data = await response.json();

            if (data.status === 'success') {
                const novoStatus = statusAtual === 'ativo' ? 'inativo' : 'ativo';

                button.textContent = novoStatus.charAt(0).toUpperCase() + novoStatus.slice(1);
                button.classList.remove('active', 'inactive');
                button.classList.add(novoStatus === 'ativo' ? 'active' : 'inactive');
                button.dataset.status = novoStatus;

                mensagemModalSucesso.textContent = data.message || 'Status alterado com sucesso!';
                modalSucesso.showModal();

            } else {
                mensagemModalErro.textContent = data.message || 'Erro desconhecido ao alterar status.';
                modalErro.showModal();
            }
        } catch (error) {
            console.error('Erro na comunicação ao alterar status:', error);
            mensagemModalErro.textContent = 'Erro de comunicação com o servidor ao alterar status. Tente novamente.';
            modalErro.showModal();
        } finally {
            categoriaParaAlterarStatus = null;
        }
    }

    async function salvarEdicaoCompleta() {
        const formData = new FormData(formEdicaoCategoria);

        console.log('--- Conteúdo do FormData (Edição Completa) antes do envio ---');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }
        console.log('------------------------------------------');

        try {
            const response = await fetch('../../../actions/action-editar-categoria.php', {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            console.log('Resposta Bruta do Servidor (Edição Completa):', text);

            let data;
            try {
                data = JSON.parse(text);
            } catch (jsonError) {
                console.error('Erro de JSON na resposta de edição completa:', jsonError);
                exibirModalErro('Resposta inesperada do servidor ao tentar editar. Verifique o console.');
                return;
            }

            if (data.status === 'success') {
                dialogEdicao.close();
                mensagemModalSucesso.textContent = data.message || 'Categoria editada com sucesso!';
                modalSucesso?.showModal();
                setTimeout(() => window.location.reload(), 2000);
            } else {
                exibirModalErro(data.message || 'Erro desconhecido ao editar a categoria.');
            }
        } catch (error) {
            console.error('Erro de comunicação ao salvar a edição completa:', error);
            exibirModalErro('Erro de comunicação com o servidor ao editar. Tente novamente.');
        }
    }

    // --- Eventos de Fechamento de Modais ---

    // Botão Cancelar (do modal de confirmação)
    btnCancelarConfirmar?.addEventListener('click', () => {
        modalConfirmar.close();
        acaoModalConfirmar = null;
        categoriaParaAlterarStatus = null;
    });

    // Ícone de fechar do modal de confirmação
    if (closeModalConfirmarIcon) {
        closeModalConfirmarIcon.addEventListener('click', () => {
            modalConfirmar.close();
            acaoModalConfirmar = null;
            categoriaParaAlterarStatus = null;
        });
    }

    // Fechar o modal de edição/cadastro (X e botão Cancelar)
    dialogEdicao.querySelectorAll('.close-modal, .cancelar').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            dialogEdicao.close();
        });
    });

    // Fechar o modal de sucesso pelo X
    if (closeModalSucesso) {
        closeModalSucesso.addEventListener('click', () => {
            modalSucesso.close();
        });
    }

    // Fechar modal de sucesso ao clicar fora
    if (modalSucesso) {
        modalSucesso.addEventListener('click', (event) => {
            if (event.target === modalSucesso) {
                modalSucesso.close();
            }
        });
    }

    // Fechar o modal de erro pelo X
    if (closeModalErro) {
        closeModalErro.addEventListener('click', () => {
            modalErro.close();
        });
    }

    // Fechar modal de erro ao clicar fora
    if (modalErro) {
        modalErro.addEventListener('click', (event) => {
            if (event.target === modalErro) {
                modalErro.close();
            }
        });
    }

    // --- FUNÇÃO PARA EXIBIR MODAL DE ERRO (Reutilizável) ---
    function exibirModalErro(mensagem) {
        if (mensagemModalErro) mensagemModalErro.textContent = mensagem;
        modalErro?.showModal();
    }
});