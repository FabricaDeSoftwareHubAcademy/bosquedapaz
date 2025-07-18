document.addEventListener('DOMContentLoaded', async () => {
    const descricaoInput = document.getElementById('descricao_atracao');
    const contador = document.getElementById('contador-caracteres');
    const form = document.getElementById('form-editar-atracao');
    const btnEditar = document.getElementById('btn-salvar');

    const atualizarContador = () => {
        const restante = 250 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    };

    descricaoInput.addEventListener('input', atualizarContador);
    setTimeout(atualizarContador, 100);

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id_atracao');

    if (!id) {
        alert('ID da atração não fornecido.');
        return;
    }

    

    try {
        const response = await fetch(`../../../actions/action-buscar-atracao.php?id_atracao=${id}`);
        const data = await response.json();

        if (data.status === 'success') {
            const atracao = data.atracao;

            // console.log("id_atracao:", document.getElementById('id_atracao'));
            // console.log("id_evento:", document.getElementById('id_evento'));


            document.getElementById('id_atracao').value = atracao.id_atracao;
            document.getElementById('id_evento').value = atracao.id_evento;
            document.getElementById('nome_atracao').value = atracao.nome_atracao;
            document.getElementById('descricao_atracao').value = atracao.descricao_atracao;
            document.getElementById('status').value = atracao.status;

            const imagem = document.getElementById('preview-image');
            if (atracao.banner_atracao) {
                imagem.src = `../../../Public/${atracao.banner_atracao}`;
                imagem.alt = atracao.nome_atracao ?? 'Imagem da atração';
            }
        } else {
            alert('Atração não encontrada.');
        }

    } catch (error) {
        console.error('Erro ao buscar atração:', error);
        alert('Erro ao buscar atração.');
    }

    btnEditar.addEventListener('click', (event) => {
        event.preventDefault();

        openModalAtualizar();
        document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
        document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);

        document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
            closeModalAtualizar();

            const formData = new FormData(form);

            try {
                const response = await fetch('../../../actions/action-editar-atracao.php', {
                    method: 'POST',
                    body: formData
                });

                const text = await response.text();
                console.log('Resposta bruta do servidor:', text);

                const data = JSON.parse(text);

                if (data.status === 'success') {
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);
                    document.getElementById('msm-sucesso').innerHTML = data.mensagem ?? 'Atração atualizada com sucesso!';

                    setTimeout(() => {
                        window.location.href = `gerenciar-atracao.php?id_evento=${formData.get('id_evento')}`
                    }, 5000);

                } else {
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
                    console.error('Erro ao atualizar:', data.mensagem);
                }

            } catch (error) {
                console.error('Erro no envio do formulário:', error);
            }
        });
    });

});