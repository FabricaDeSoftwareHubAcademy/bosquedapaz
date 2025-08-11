let idBoletoSelecionado = null;
let statusAtualSelecionado = null;
let botaoClicado = null;

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('botao-status')) {

        botaoClicado = e.target;
        statusAtualSelecionado = botaoClicado.textContent.trim();

        const tr = botaoClicado.closest('tr');
        idBoletoSelecionado = tr.getAttribute('data-id-boleto');

        if (!idBoletoSelecionado) {
            console.error('ID do boleto não encontrado na linha.');
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
    const tolkenCsrf = document.getElementById('tolkenCsrf').value;

    fetch('../../../actions/action-alterar-status-boleto.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${encodeURIComponent(idBoletoSelecionado)}&status=${encodeURIComponent(novoStatus)}&tolkenCsrf=${encodeURIComponent(tolkenCsrf)}`
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('modalConfirmacao').style.display = 'none';

        if (data.sucesso) {
            botaoClicado.textContent = novoStatus;
            botaoClicado.classList.remove('status-pago', 'status-pendente');
            botaoClicado.classList.add(novoStatus === 'Pago' ? 'status-pago' : 'status-pendente');

            abrirModalStatusAlterado();
        } else {
            alert('Erro ao alterar o status: ' + (data.mensagem || ''));
        }
    })
    .catch(err => {
        document.getElementById('modalConfirmacao').style.display = 'none';
        console.error('Erro:', err);
        alert('Erro inesperado ao alterar o status.');
    });
});

function abrirModalStatusAlterado() {
    const modal = document.getElementById('modalStatusAlterado');
    modal.style.display = 'flex';

    const btnOk = document.getElementById('btnOkStatus');
    btnOk.focus();

    btnOk.onclick = () => {
        modal.style.display = 'none';
    };

    modal.onclick = (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    };
}
