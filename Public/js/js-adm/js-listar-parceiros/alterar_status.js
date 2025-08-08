document.addEventListener('DOMContentLoaded', function () { // Use DOMContentLoaded para garantir que todos os elementos estejam carregados
    // --- Variáveis de Contexto Global ---
    let idParceiroSelecionado = null;
    let statusAtualSelecionado = null;
    let botaoClicado = null;
    let acaoModalConfirmar = null; // Para distinguir a ação no modal de confirmação

    // --- Referências aos Elementos do Modal de Confirmação (o compartilhado) ---
    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title');
    const mensagemModalConfirmar = document.getElementById('msm-confimar');
    const btnSalvarConfirmar = document.getElementById('btn-modal-salvar'); // Botão "Salvar" do modal de confirmação
    const btnCancelarConfirmar = document.getElementById('btn-modal-cancelar'); // Botão "Cancelar" do modal de confirmação
    const closeModalConfirmarIcon = document.getElementById('close-modal-confirmar'); // Ícone 'X' para fechar

    // --- Referências aos Modais de Sucesso e Erro (assumindo que existem no HTML) ---
    const modalSucesso = document.getElementById("modal-sucesso");
    const tituloModalSucesso = document.getElementById("sucesso-title");
    const textoModalSucesso = document.getElementById("msm-sucesso");

    const modalErro = document.getElementById("modal-error");
    const tituloModalErro = document.getElementById("erro-title");
    const textoModalErro = document.getElementById("erro-text");

    // --- Funções de Modal (para garantir que funcionem neste script) ---
    function abrirModalErro(mensagemTitulo, mensagemTexto) {
        if (tituloModalErro && textoModalErro && modalErro) {
            tituloModalErro.textContent = mensagemTitulo;
            textoModalErro.textContent = mensagemTexto;
            modalErro.showModal();
        } else {
            console.error("Elementos do modal de erro não encontrados.");
        }
    }

    function abrirModalSucesso(mensagemTitulo, mensagemTexto) {
        if (tituloModalSucesso && textoModalSucesso && modalSucesso) {
            tituloModalSucesso.textContent = mensagemTitulo;
            textoModalSucesso.textContent = mensagemTexto;
            modalSucesso.showModal();
        } else {
            console.error("Elementos do modal de sucesso não encontrados.");
        }
    }

    // --- Event Listener para Cliques na Tabela (Delegação de Eventos) ---
    // Este listener deve estar em um elemento pai que contém os botões de status,
    // como a tabela ou o document.body, para capturar cliques em botões dinâmicos.
    document.addEventListener('click', function (e) {
        // Verifica se o clique foi em um botão com a classe 'status'
        if (e.target.classList.contains('status')) {
            e.preventDefault(); // Previne o comportamento padrão do botão/link

            botaoClicado = e.target;
            statusAtualSelecionado = botaoClicado.textContent.trim(); // Pega "Ativo" ou "Inativo"
            
            const tr = botaoClicado.closest('tr');
            idParceiroSelecionado = tr.getAttribute('data-id-parceiro'); 

            if (!idParceiroSelecionado) {
                console.error('ID do parceiro não encontrado na linha.');
                abrirModalErro("Erro", "ID do parceiro não encontrado para alteração de status.");
                return;
            }

            // Define o contexto para a ação de alteração de status do parceiro
            acaoModalConfirmar = 'alterarStatusParceiro';

            // Preenche e abre o modal de confirmação compartilhado
            tituloModalConfirmar.textContent = 'Alterar Status?';
            mensagemModalConfirmar.textContent = `Deseja mudar o status para "${statusAtualSelecionado === 'Ativo'? 'Inativo' : 'Ativo'}"?`;
            modalConfirmar.showModal();
        }
    });

    // --- Event Listener para o Botão "Salvar" do Modal de Confirmação (o compartilhado) ---
    btnSalvarConfirmar.addEventListener('click', async () => {
        modalConfirmar.close(); // Fecha o modal de confirmação

        if (acaoModalConfirmar === 'alterarStatusParceiro') {
            await salvarAlteracaoStatusParceiro();
        }
        // Limpa o contexto após a execução
        acaoModalConfirmar = null;
    });

    // --- Função para Salvar a Alteração de Status do Parceiro ---
    async function salvarAlteracaoStatusParceiro() {
        if (!idParceiroSelecionado ||!botaoClicado) {
            abrirModalErro("Erro", "Dados do parceiro não disponíveis para alteração de status.");
            return;
        }

        const novoStatus = (statusAtualSelecionado === 'Ativo')? 'Inativo' : 'Ativo';
        const statusNumerico = (novoStatus === 'Ativo')? 1 : 0; // Se o backend espera 0 ou 1

        // Prepara os dados para enviar via POST
        const params = new URLSearchParams();
        params.append('id', idParceiroSelecionado);
        params.append('status', novoStatus); // Envia o status numérico

        try {
            const response = await fetch('../../../actions/action-alterar-status-parceiro.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params // Envia os parâmetros
            });

            const data = await response.json();

            if (data.sucesso) { // Assumindo que o PHP retorna 'sucesso: true'
                // Atualiza o botão na interface
                botaoClicado.textContent = novoStatus;
                botaoClicado.classList.remove('active', 'inactive');
                botaoClicado.classList.add(novoStatus === 'Ativo'? 'active' : 'inactive');
                // IMPORTANTE: Atualiza o data-status se você o usa para pegar o status atual
                // botaoClicado.setAttribute('data-status', novoStatus); // Se o data-status for string
                // botaoClicado.setAttribute('data-status', statusNumerico); // Se o data-status for numérico

                abrirModalSucesso("Sucesso!", data.sucesso); // Exibe modal de sucesso
                // Opcional: Recarregar a página após o sucesso
                // window.location.reload(); 
            } else {
                abrirModalErro("Erro", data.erro || 'Erro ao alterar o status do parceiro.');
            }
        } catch (err) {
            console.error('Erro na comunicação:', err);
            abrirModalErro("Erro de Comunicação", 'Erro inesperado ao alterar o status do parceiro.');
        } finally {
            // Limpa as variáveis de contexto
            idParceiroSelecionado = null;
            statusAtualSelecionado = null;
            botaoClicado = null;
        }
    }

    // --- Event Listeners para Fechar o Modal de Confirmação (o compartilhado) ---
    btnCancelarConfirmar.addEventListener('click', () => {
        modalConfirmar.close();
        acaoModalConfirmar = null;
        idParceiroSelecionado = null;
        statusAtualSelecionado = null;
        botaoClicado = null;
    });

    closeModalConfirmarIcon.addEventListener('click', () => {
        modalConfirmar.close();
        acaoModalConfirmar = null;
        idParceiroSelecionado = null;
        statusAtualSelecionado = null;
        botaoClicado = null;
    });

    // --- Event Listeners para Fechar Modais de Sucesso e Erro (se existirem) ---
    document.getElementById("close-modal-erro")?.addEventListener("click", () => {
        modalErro?.close();
    });

    document.getElementById("close-modal-sucesso")?.addEventListener("click", () => {
        modalSucesso?.close();
    });

});