document.addEventListener('DOMContentLoaded', async () => {
    const descricaoInput = document.getElementById('descricao');
    const contador = document.getElementById('contador-caracteres');

    const atualizarContador = () => {
        const restante = 250 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    };

    descricaoInput.addEventListener('input', atualizarContador);
    setTimeout(atualizarContador, 100);

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');

    if (!id) {
        alert('ID da atração não fornecido.');
        return;
    }

    const form = document.getElementById('form-editar-atracao');

    try {
        const response = await fetch(`../../../actions/action-buscar-atracao.php?id=${id}`);
        const data = await response.json();

        if (data.status === 'success') {
            const atracao = data.atracao;

            document.getElementById('id_atracao').value = atracao.id_atracao;
            document.getElementById('id_evento').value = atracao.id_evento;
            document.getElementById('nomeatracao').value = atracao.nome_atracao;
            document.getElementById('descricao').value = atracao.descricao_atracao;
            document.getElementById('status').value = atracao.status;

            const imagem = document.getElementById('preview-image');
            if (atracao.foto_atracao) {
                imagem.src = `../../../uploads/atracoes/${atracao.foto_atracao}`;
                imagem.alt = atracao.nome_atracao ?? 'Imagem da atração';
            }
        } else {
            alert('Atração não encontrada.');
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                const response = await fetch('../../../Actions/action-editar-atracao.php', {
                    method: 'POST',
                    body: formData
                });

                const text = await response.text();
                console.log('Resposta bruta do servidor:', text);

                const data = JSON.parse(text);

                if (data.status === 'success') {
                    alert(data.mensagem);
                    window.location.href = `gerenciar-atracao.php?id_evento=${formData.get('id_evento')}`;
                } else {
                    alert('Erro ao atualizar atração: ' + data.mensagem);
                }

            } catch (error) {
                console.error('Erro no envio do formulário:', error);
            }
        });

    } catch (error) {
        console.error('Erro ao buscar atração:', error);
        alert('Erro ao buscar atração.');
    }
});