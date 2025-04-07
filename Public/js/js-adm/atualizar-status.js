function toggleSituacao(button, idExpositor) {
    // Detecta a situação atual diretamente do botão
    const situacaoAtual = button.textContent.trim().toLowerCase(); // 'pago' ou 'pendente'

    // Mostra o modal de confirmação
    const modal = document.getElementById('modal-confirmacao');
    modal.style.display = 'flex';

    // Botão SIM
    document.getElementById('btn-sim').onclick = () => {
        fetch('../../../app/adm/Models/atualizar-status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id_expositor=${idExpositor}&situacao=${situacaoAtual}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Atualiza o botão com a nova situação
                button.textContent = data.novaSituacao.charAt(0).toUpperCase() + data.novaSituacao.slice(1);
                button.classList.remove('boleto-botao-pago', 'boleto-botao-pendente');
                button.classList.add(data.novaSituacao === 'pago' ? 'boleto-botao-pago' : 'boleto-botao-pendente');
            } else {
                alert('Erro ao atualizar status: ' + (data.erro || 'Desconhecido'));
            }
        })
        .catch(error => {
            alert('Erro de conexão com o servidor: ' + error.message);
        })
        .finally(() => {
            modal.style.display = 'none';
        });
    };

    // Botão NÃO
    document.getElementById('btn-nao').onclick = () => {
        modal.style.display = 'none';
    };
}
