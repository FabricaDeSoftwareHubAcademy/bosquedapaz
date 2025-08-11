async function salvarAlteracaoStatus() {
    if (!categoriaParaAlterarStatus) return;

    const { button, id, statusAtual } = categoriaParaAlterarStatus;

    try {
        const formData = new FormData();
        formData.append('acao', 'alterarStatus');
        formData.append('id_categoria', id);
        formData.append('status_atual', statusAtual);
        
        const tolkenInput = document.getElementById('tolkenCsrf');
        if (tolkenInput) {
            formData.append('tolkenCsrf', tolkenInput.value);
        } else {
            console.error('Campo do token CSRF não encontrado!');
            mensagemModalErro.textContent = 'Erro interno: Token de segurança não encontrado.';
            modalErro.showModal();
            return;
        }

        console.log('Parâmetros enviados para alterarStatus:');
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

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