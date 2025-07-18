let idParceiroSelecionado = null;
let statusAtualSelecionado = null;
let botaoClicado = null;

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('status')) {
        
        botaoClicado = e.target;
        statusAtualSelecionado = botaoClicado.textContent.trim();
        
        const tr = botaoClicado.closest('tr');
        idParceiroSelecionado = tr.getAttribute('data-id-parceiro'); 

        if (!idParceiroSelecionado) {
            console.error('ID do parceiro não encontrado na linha.');
            return;
        }

        document.getElementById('modalConfirmacao').style.display = 'flex';
    }
});

document.getElementById('cancelarAlteracao').addEventListener('click', () => {
    document.getElementById('modalConfirmacao').style.display = 'none';
});

document.getElementById('confirmarAlteracao').addEventListener('click', () => {
    
    const novoStatus = (statusAtualSelecionado === 'Ativo') ? 'Inativo' : 'Ativo';

    fetch('../../../actions/action-alterar-status-parceiro.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${idParceiroSelecionado}&status=${novoStatus}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            botaoClicado.textContent = novoStatus;
            botaoClicado.classList.remove('active', 'inactive');
            botaoClicado.classList.add(novoStatus === 'Ativo' ? 'active' : 'inactive');
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
