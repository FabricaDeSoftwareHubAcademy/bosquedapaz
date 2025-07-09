document.addEventListener('DOMContentLoaded', () => {
    const tabelaCategoria = document.getElementById('tabela-categoria');

    tabelaCategoria.addEventListener('click', async (e) => {
        if (e.target.classList.contains('status')) {
            const button = e.target;
            const linha = button.closest('tr');
            const id = linha.querySelector('.usuario-col').textContent.trim();

            const statusAtual = button.textContent.trim().toLowerCase();
            const novoStatus = statusAtual === 'ativo' ? 'inativo' : 'ativo';

            try {
                const response = await fetch('../../../actions/action-categoria.php?acao=alterarStatus', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_categoria: id,
                        status_cat: novoStatus
                    })
                });

                const data = await response.json();

                if (data.status === 'success') {
                    button.textContent = novoStatus.charAt(0).toUpperCase() + novoStatus.slice(1);
                    button.classList.toggle('active');
                } else {
                    alert('❌ ' + data.message);
                }

            } catch (error) {
                console.error('Erro:', error);
                alert('❌ Erro na comunicação com o servidor');
            }
        }
    });
});
