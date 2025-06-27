let idExpositorSelecionado = null;
let statusAtualSelecionado = null;
let botaoClicado = null;

// Delegação de evento para botões de status
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('botao-status')) {
        
        botaoClicado = e.target;
        statusAtualSelecionado = botaoClicado.textContent.trim();
        
        const tr = botaoClicado.closest('tr');
        idExpositorSelecionado = tr.getAttribute('data-id-expositor'); 

        if (!idExpositorSelecionado) {
            console.error('ID do expositor não encontrado na linha.');
            return;
        }

        document.getElementById('modalConfirmacao').style.display = 'flex';
    }
});

document.getElementById('cancelarAlteracao').addEventListener('click', () => {
    document.getElementById('modalConfirmacao').style.display = 'none';
});

document.getElementById('confirmarAlteracao').addEventListener('click', () => {
    
    const novoStatus = (statusAtualSelecionado === 'Pago') ? 'Pendente' : 'Pago';

    fetch('../../../actions/actions-boletos/action-alterar-status.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${idExpositorSelecionado}&status=${novoStatus}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            botaoClicado.textContent = novoStatus;
            botaoClicado.classList.remove('status-pago', 'status-pendente');
            botaoClicado.classList.add(novoStatus === 'Pago' ? 'status-pago' : 'status-pendente');
        } else {
            alert('Erro ao alterar o status.');
        }
    })
    .catch(err => {
        console.error('Erro:', err);
        alert('Erro inesperado ao alterar o status.');
    });

    document.getElementById('modalConfirmacao').style.display = 'none';
});
