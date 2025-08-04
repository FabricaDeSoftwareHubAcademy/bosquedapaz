// Função que executa a requisição de alteração de status
    async function salvarAlteracaoStatus() {
        if (!categoriaParaAlterarStatus) return; // Garante que há uma categoria selecionada

        const { button, id, statusAtual } = categoriaParaAlterarStatus;

        try {
            // Prepara os dados para enviar como application/x-www-form-urlencoded
            const params = new URLSearchParams();
            params.append('acao', 'alterarStatus'); // Ação que seu PHP espera
            params.append('id_categoria', id);
            params.append('status_atual', statusAtual); // Envia o status ATUAL, o PHP irá alternar

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
                // Determine o NOVO status (baseado no que o PHP deveria ter feito)
                const novoStatus = statusAtual === 'ativo' ? 'inativo' : 'ativo';

                // Atualiza o DOM para refletir o novo status
                button.textContent = novoStatus.charAt(0).toUpperCase() + novoStatus.slice(1);
                button.classList.remove('active', 'inactive');
                button.classList.add(novoStatus === 'ativo' ? 'active' : 'inactive');
                button.dataset.status = novoStatus; // Atualiza o data-status para futuras interações

                mensagemModalSucesso.textContent = data.message || 'Status alterado com sucesso!';
                modalSucesso.showModal(); // Abre o modal de sucesso

            } else {
                mensagemModalErro.textContent = data.message || 'Erro desconhecido ao alterar status.';
                modalErro.showModal(); // Abre o modal de erro
            }
        } catch (error) {
            console.error('Erro na comunicação ao alterar status:', error);
            mensagemModalErro.textContent = 'Erro de comunicação com o servidor ao alterar status. Tente novamente.';
            modalErro.showModal(); // Abre o modal de erro para erros de rede
        } finally {
            categoriaParaAlterarStatus = null; // Limpa a referência após a operação
        }
    }