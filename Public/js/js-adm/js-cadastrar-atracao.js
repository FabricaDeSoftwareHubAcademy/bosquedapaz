document.addEventListener('DOMContentLoaded', () => {
    const descricaoInput = document.getElementById('descricao_atracao');
    const contador = document.getElementById('contador-caracteres');
    const form = document.getElementById('form-atracao');
    const btnEditar = document.getElementById('btn-salvar');
    const idEvento = document.getElementById('id_evento').value;

    const atualizarContador = () => {
        const restante = 250 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    };

    descricaoInput.addEventListener('input', atualizarContador);
    setTimeout(atualizarContador, 100);

    btnEditar.addEventListener('click', (event) => {
        event.preventDefault();

        openModalAtualizar();    
        document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
        document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);
    
        document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
            closeModalAtualizar();

            const nome = document.getElementById('nome_atracao').value.trim();
            const descricao = descricaoInput.value.trim();
            const imagem = document.getElementById('file').files[0];

            if (!nome || !descricao || !imagem || !idEvento) {
                alert('Preencha todos os campos obrigatórios e selecione uma imagem.');
                return;
            }

            const formData = new FormData();

            formData.append('nome_atracao', nome);
            formData.append('descricao_atracao', descricao);
            formData.append('id_evento', idEvento);
            formData.append('file', imagem);

            try {
                const resposta = await fetch('../../../actions/action-cadastrar-atracao.php', {
                    method: 'POST',
                    body: formData
                });

                const texto = await resposta.text();
                const resultado = JSON.parse(texto);
                console.log('Resposta JSON:', resultado);

                if (resultado.status === 'sucesso') {
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);
                    document.getElementById('msm-sucesso').innerHTML = 'Atração cadastrada com sucesso!';
                    
                    setTimeout(() => {
                        window.location.href = `./gerenciar-atracao.php?id_evento=${idEvento}`;
                    }, 6000);

                } else {
                    openModalError();
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
                }


            } catch (error) {
                console.error('Erro na requisição:', error);
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
            }
        });
    });
});