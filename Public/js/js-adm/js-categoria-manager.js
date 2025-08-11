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
    const selectedColorWrapper = document.querySelector(".select-selected");
    const itemsColorList = document.querySelector(".select-items");

    const btnSalvarEdicaoCompleta = document.getElementById('btn_cadastrar_cat');
    
    // --- Modais ---
    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title');
    const mensagemModalConfirmar = document.getElementById('msm-confimar');
    const btnCancelarConfirmar = document.getElementById('btn-modal-cancelar');
    const btnSalvarConfirmar = document.getElementById('btn-modal-salvar');
    const closeModalConfirmarIcon = document.getElementById('close-modal-confirmar');

    const modalSucesso = document.getElementById('modal-sucesso');
    const mensagemModalSucesso = document.getElementById('msm-sucesso');
    const closeModalSucesso = document.getElementById('close-modal-sucesso');

    const modalErro = document.getElementById('modal-error');
    const mensagemModalErro = document.getElementById('erro-text');
    const closeModalErro = document.getElementById('close-modal-erro');

    const modalLoading = document.getElementById('modal-loading');

    let acaoModalConfirmar = null;
    let categoriaParaAlterarStatus = null;
    let categoriaParaEditar = null;

    // --- Funções para controle de modais ---
    function openModalLoading() { if (modalLoading) modalLoading.showModal(); }
    function closeModalLoading() { if (modalLoading) modalLoading.close(); }
    function exibirModalErro(mensagem) {
        if (mensagemModalErro) mensagemModalErro.textContent = mensagem;
        if (modalErro) modalErro.showModal();
    }
    
    carregarCategorias();

    // Evento de busca/filtro
    formBusca?.addEventListener('submit', function (e) {
        e.preventDefault();
        const termo = inputBusca?.value.trim().toLowerCase();
        filtrarTabela(termo);
    });

    async function carregarCategorias() {
        try {
            const response = await fetch('../../../actions/action-listar-categoria.php');
            if (!response.ok) throw new Error('Erro na requisição da listagem');

            const data = await response.json();

            if (data.status === 'success') {
                renderizarTabela(data.dados);
                aplicarEventosBotoes();
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

    function renderizarTabela(categorias) {
        tabelaCategoria.innerHTML = '';

        if (categorias.length === 0) {
            tabelaCategoria.innerHTML = `<tr><td colspan="4">Nenhuma categoria encontrada</td></tr>`;
            return;
        }

        const categoriasAtivas = categorias.filter(cat => (cat.status_cat || '').trim().toLowerCase() === 'ativo');
        const categoriasInativas = categorias.filter(cat => (cat.status_cat || '').trim().toLowerCase() !== 'ativo');
        const categoriasOrdenadas = [...categoriasAtivas, ...categoriasInativas];

        categoriasOrdenadas.forEach(cat => {
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
                        data-id="${cat.id_categoria}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
            `;
            tabelaCategoria.appendChild(tr);
        });
    }

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

    function sanitizeHTML(str) {
        const temp = document.createElement('div');
        temp.textContent = str;
        return temp.innerHTML;
    }

    function aplicarEventosBotoes() {
        tabelaCategoria.addEventListener('click', async (e) => {
            if (e.target.closest('.status')) {
                const buttonStatus = e.target.closest('.status');
                const id = buttonStatus.dataset.id;
                const statusAtual = buttonStatus.dataset.status;

                categoriaParaAlterarStatus = { button: buttonStatus, id, statusAtual };
                acaoModalConfirmar = 'status';

                tituloModalConfirmar.textContent = 'Alterar Status?';
                mensagemModalConfirmar.textContent = `Deseja mudar o status para "${statusAtual === 'ativo' ? 'INATIVO' : 'ATIVO'}"?`;
                modalConfirmar.showModal();
            }

            if (e.target.closest('.edit-icon')) {
                e.preventDefault();
                const id = e.target.closest('.edit-icon').dataset.id;

                if (!id) {
                    exibirModalErro('ID inválido para edição.');
                    return;
                }

                try {
                    const response = await fetch(`../../../actions/action-buscar-categoria.php?id=${id}`);
                    const data = await response.json();

                    if (data.status === 'success' && data.categoria) {
                        const categoria = data.categoria;
                        categoriaParaEditar = categoria;
                        
                        idCategoriaInput.value = categoria.id_categoria;
                        descricaoInput.value = categoria.descricao.slice(0, 30);
                        
                        corInput.value = categoria.cor;
                        selectedColorDiv.style.backgroundColor = categoria.cor;
                        selectedTextSpan.textContent = categoria.cor;

                        dialogEdicao.showModal();
                    } else {
                        exibirModalErro(data.message || 'Erro ao buscar dados da categoria para edição.');
                    }
                } catch (error) {
                    console.error('Erro na requisição de busca para edição:', error);
                    exibirModalErro('Erro de comunicação ao buscar os dados para edição.');
                }
            }
        });
    }

    // --- Lógica do Formulário de Edição ---
    if (descricaoInput) {
        descricaoInput.addEventListener('input', () => {
            if (descricaoInput.value.length > 30) {
                descricaoInput.value = descricaoInput.value.slice(0, 30);
            }
        });
    }

    selectedColorWrapper?.addEventListener("click", () => {
        if (itemsColorList) itemsColorList.style.display = itemsColorList.style.display === "block" ? "none" : "block";
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

    function validarFormularioCategoria() {
        const descricao = descricaoInput?.value.trim();
        const cor = corInput?.value;

        if (!descricao) { exibirModalErro('O nome da categoria é obrigatório.'); return false; }
        if (descricao.length > 30) { exibirModalErro('O nome deve ter no máximo 30 caracteres.'); return false; }
        if (!cor) { exibirModalErro('Por favor, selecione uma cor.'); return false; }
        
        return true;
    }

    btnSalvarEdicaoCompleta?.addEventListener('click', (e) => {
        e.preventDefault();
        if (validarFormularioCategoria()) {
            acaoModalConfirmar = 'edicaoCompleta';
            tituloModalConfirmar.textContent = 'Confirma a Edição?';
            mensagemModalConfirmar.textContent = 'Deseja realmente salvar as alterações desta categoria?';
            modalConfirmar?.showModal();
        }
    });

    // --- Evento Único para o Botão "Salvar" do Modal de Confirmação ---
    btnSalvarConfirmar?.addEventListener('click', async () => {
        modalConfirmar?.close();

        if (acaoModalConfirmar === 'status') {
            await salvarAlteracaoStatus();
        } else if (acaoModalConfirmar === 'edicaoCompleta') {
            await salvarEdicaoCompleta();
        }
        acaoModalConfirmar = null;
    });

    // --- Funções de requisição ---
    async function salvarAlteracaoStatus() {
        if (!categoriaParaAlterarStatus) return;

        const { button, id, statusAtual } = categoriaParaAlterarStatus;

        try {
            const formData = new FormData();
            formData.append('id_categoria', id);
            formData.append('status_atual', statusAtual);
            
            const tolkenInput = document.getElementById('tolken-csrf-input');
            if (tolkenInput) {
                formData.append('tolkenCsrf', tolkenInput.value);
            } else {
                exibirModalErro('Erro interno: Token de segurança não encontrado.');
                return;
            }
            
            openModalLoading();

            const response = await fetch('../../../actions/action-categoria.php', {
                method: 'POST',
                body: formData
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
                
                // CORREÇÃO AQUI: RECARREGA A TABELA APÓS ALTERAÇÃO DE STATUS
                carregarCategorias();

            } else {
                exibirModalErro(data.message || 'Erro desconhecido ao alterar status.');
            }
        } catch (error) {
            console.error('Erro na comunicação ao alterar status:', error);
            exibirModalErro('Erro de comunicação com o servidor ao alterar status. Tente novamente.');
        } finally {
            closeModalLoading();
            categoriaParaAlterarStatus = null;
        }
    }

    async function salvarEdicaoCompleta() {
        const formData = new FormData(formEdicaoCategoria);
        formData.append('acao', 'atualizar');

        const tolkenInput = document.getElementById('tolken-csrf-input');
        if (tolkenInput) {
            formData.append('tolkenCsrf', tolkenInput.value);
        } else {
            exibirModalErro('Erro interno: Token de segurança não encontrado.');
            return;
        }
        
        openModalLoading();

        try {
            const response = await fetch('../../../actions/action-editar-categoria.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

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
        } finally {
            closeModalLoading();
        }
    }

    // --- Eventos de Fechamento de Modais ---
    btnCancelarConfirmar?.addEventListener('click', () => { modalConfirmar.close(); acaoModalConfirmar = null; categoriaParaAlterarStatus = null; });
    if (closeModalConfirmarIcon) { closeModalConfirmarIcon.addEventListener('click', () => { modalConfirmar.close(); acaoModalConfirmar = null; categoriaParaAlterarStatus = null; }); }
    dialogEdicao.querySelectorAll('.close-modal, .cancelar').forEach(button => { button.addEventListener('click', (e) => { e.preventDefault(); dialogEdicao.close(); }); });
    if (closeModalSucesso) { closeModalSucesso.addEventListener('click', () => { modalSucesso.close(); }); }
    if (modalSucesso) { modalSucesso.addEventListener('click', (event) => { if (event.target === modalSucesso) modalSucesso.close(); }); }
    if (closeModalErro) { closeModalErro.addEventListener('click', () => { modalErro.close(); }); }
    if (modalErro) { modalErro.addEventListener('click', (event) => { if (event.target === modalErro) modalErro.close(); }); }
    
    // --- Lógica para o ícone e cor do formulário de edição ---
    const nomeInput = document.getElementById('descricao');
    const fileInput = document.getElementById('file');
    const previewContainer = document.getElementById('preview-container');
    const previewCircle = document.getElementById('preview-circle');
    const previewImg = document.getElementById('preview-img');
    const previewLabel = document.getElementById('preview-label');
    const colorOptions = document.querySelectorAll('#seletor-cor div[data-value]');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const btnCancelar = document.getElementById('btn_cancelar_categoria');

    function atualizarPreview() {
        const nome = nomeInput.value.trim();
        if (nome) previewLabel.textContent = nome;
    }

    nomeInput?.addEventListener('input', atualizarPreview);

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
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
                previewContainer.style.display = 'flex';
                uploadPlaceholder.style.display = 'none';
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

    btnCancelar?.addEventListener('click', () => {
        limparPreviewCategoria();
        if (dialogEdicao) dialogEdicao.close();
    });
});
