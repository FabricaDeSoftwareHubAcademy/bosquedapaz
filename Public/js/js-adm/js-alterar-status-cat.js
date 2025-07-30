document.addEventListener('DOMContentLoaded', () => {
    const tabelaCategoria = document.getElementById('tabela-categoria');

    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title');
    const mensagemModalConfirmar = document.getElementById('msm-confimar');
    const btnCancelar = document.getElementById('btn-modal-cancelar');
    const btnSalvar = document.getElementById('btn-modal-salvar'); // Este é o botão de "Salvar" do modal de confirmação

    // Referências para o modal de SUCESSO
    const modalSucesso = document.getElementById('modal-sucesso');
    const tituloModalSucesso = document.getElementById('sucesso-title'); // Título do modal de sucesso
    const mensagemModalSucesso = document.getElementById('msm-sucesso'); // Mensagem do modal de sucesso
    const closeModalSucesso = document.getElementById('close-modal-sucesso'); // Botão de fechar do modal de sucesso

    // Variável para armazenar a categoria que será alterada (usada no fluxo do modal de confirmação)
    let categoriaSelecionada = null;

    // --- Event Listener para Cliques na Tabela (Delegation) ---
    // Detecta cliques nos botões de status dentro da tabela
    tabelaCategoria.addEventListener('click', (e) => {
        // Verifica se o elemento clicado tem a classe 'status'
        if (e.target.classList.contains('status')) {
            const button = e.target;
            const linha = button.closest('tr'); // Encontra a linha da tabela (<tr>) mais próxima
            // Pega o ID da categoria que está na coluna com a classe 'usuario-col'
            const id = linha.querySelector('.usuario-col').textContent.trim();
            // Pega o status atual do texto do botão e converte para minúsculas
            const statusAtual = button.textContent.trim().toLowerCase();
            // Determina o novo status (ativo -> inativo, inativo -> ativo)
            const novoStatus = statusAtual === 'ativo' ? 'inativo' : 'ativo';

            // Armazena as informações da categoria e do novo status
            // Isso será usado quando o usuário clicar em "Salvar" no modal de confirmação
            categoriaSelecionada = { button, id, novoStatus };

            // Atualiza o conteúdo do modal de confirmação antes de abri-lo
            tituloModalConfirmar.textContent = 'Deseja alterar o status?';
            mensagemModalConfirmar.textContent = `Clique em salvar para alterar para "${novoStatus.toUpperCase()}".`;

            // Abre o modal de confirmação
            modalConfirmar.showModal();
        }
    });

    // --- Event Listener para o Botão "Salvar" do Modal de Confirmação ---
    btnSalvar.addEventListener('click', async () => {
        // Se nenhuma categoria foi selecionada (o que não deve acontecer se o modal abriu corretamente), sai.
        if (!categoriaSelecionada) return;

        // Desestrutura os dados da categoria selecionada para facilitar o uso
        const { button, id, novoStatus } = categoriaSelecionada;

        try {
            // Realiza a requisição Fetch para o backend PHP
            const response = await fetch('../../../actions/action-categoria.php?acao=alterarStatus', {
                method: 'POST', // Método POST para enviar dados
                headers: {
                    'Content-Type': 'application/json' // Indica que o corpo da requisição é JSON
                },
                body: JSON.stringify({ // Converte os dados para JSON
                    id_categoria: id,
                    status_cat: novoStatus
                })
            });

            // Converte a resposta do servidor para JSON
            const data = await response.json();

            // Verifica o status retornado pelo servidor
            if (data.status === 'success') {
                // --- AÇÃO DE SUCESSO ---
                // Atualiza o texto do botão na tabela (ex: "Ativo" para "Inativo")
                button.textContent = novoStatus.charAt(0).toUpperCase() + novoStatus.slice(1);
                // Remove as classes de status antigas e adiciona a nova classe
                button.classList.remove('active', 'inactive');
                button.classList.add(novoStatus === 'ativo' ? 'active' : 'inactive');
                // IMPORTANTE: Atualiza o data-status do botão para a próxima interação
                button.dataset.status = novoStatus;

                // Preenche o título e a mensagem do modal de sucesso (opcionalmente dinâmico)
                // O seu HTML já tem 'Salvo com sucesso!' como título fixo, então podemos focar na mensagem
                // tituloModalSucesso.textContent = 'Sucesso!'; // Se quiser sobrescrever o título fixo
                mensagemModalSucesso.textContent = data.message || 'Status alterado com sucesso!'; // Usa a mensagem do PHP ou uma padrão
                modalSucesso.showModal(); // Abre o modal de sucesso

            } else {
                // --- AÇÃO DE ERRO (retornada pelo PHP) ---
                // Exibe um alerta com a mensagem de erro vinda do servidor ou uma padrão
                alert('❌ ' + (data.message || 'Erro desconhecido ao alterar status.'));
            }
        } catch (error) {
            // --- ERRO DE COMUNICAÇÃO (rede, servidor fora do ar, etc.) ---
            console.error('Erro na comunicação com o servidor:', error);
            // Exibe um alerta de erro de comunicação
            alert('❌ Erro na comunicação com o servidor. Por favor, tente novamente.');
        } finally {
            // --- AÇÕES FINAIS (executadas sempre, independentemente do sucesso ou erro) ---
            modalConfirmar.close(); // Garante que o modal de confirmação seja fechado
            categoriaSelecionada = null; // Limpa a variável de seleção para evitar dados antigos
        }
    });

    // --- Event Listener para o Botão "Cancelar" do Modal de Confirmação ---
    btnCancelar.addEventListener('click', () => {
        modalConfirmar.close(); // Fecha o modal de confirmação
        categoriaSelecionada = null; // Limpa a seleção
    });

    // --- Event Listener para o Ícone "X" de Fechar do Modal de Confirmação ---
    const closeModalConfirmar = document.getElementById('close-modal-confirmar');
    if (closeModalConfirmar) { // Verifica se o elemento existe antes de adicionar o listener
        closeModalConfirmar.addEventListener('click', () => {
            modalConfirmar.close(); // Fecha o modal de confirmação
            categoriaSelecionada = null; // Limpa a seleção
        });
    }


    // --- Lógica para fechar o Modal de SUCESSO ---

    // Event Listener para o botão de fechar (X) dentro do modal de sucesso
    closeModalSucesso.addEventListener('click', () => {
        modalSucesso.close(); // Fecha o modal de sucesso
    });

    // Event Listener para fechar o modal de sucesso ao clicar fora dele
    modalSucesso.addEventListener('click', (e) => {
        if (e.target === modalSucesso) { // Verifica se o clique foi no fundo (backdrop) do modal
            modalSucesso.close(); // Fecha o modal
        }
    });
});