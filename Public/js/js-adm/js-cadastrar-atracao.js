document.addEventListener('DOMContentLoaded', () => {
    const descricaoInput = document.getElementById('descricao_atracao');
    const contador = document.getElementById('contador-caracteres');
    const form = document.getElementById('form-atracao');
    const btnEditar = document.getElementById('btn-salvar');
    const idEvento = document.getElementById('id_evento').value;
    const nomeEvento = document.getElementById('nome_evento').value;

    const atualizarContador = () => {
        const restante = 250 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    };

    descricaoInput.addEventListener('input', atualizarContador);
    setTimeout(atualizarContador, 100);

    btnEditar.addEventListener('click', (event) => {
        event.preventDefault();
    
        openModalAtualizar();
    
        document.getElementById('confirmar-title').innerText = 'Deseja confirmar este cadastro?';
        document.getElementById('msm-confimar').innerText = 'Clique em salvar para confirmar o cadastro.';
    
        document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
        document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);
    
        document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
            closeModalAtualizar();

            const nome = document.getElementById('nome_atracao').value.trim();
            const descricao = descricaoInput.value.trim();
            const imagem = document.getElementById('file').files[0];

            if (!nome || !descricao || !imagem || !idEvento) {
                document.getElementById('erro-title').innerText = 'Informações incompletas';
                document.getElementById('erro-text').innerText = 'Todos os campos devem ser preenchidos antes de continuar.';
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
                return;
            }

            const formData = new FormData();

            formData.append('nome_atracao', nome);
            formData.append('descricao_atracao', descricao);
            formData.append('id_evento', idEvento);
            formData.append('file', imagem);


            const tokenElem = document.getElementById('tolkenCsrf') || document.querySelector('input[name="tolkenCsrf"]');
            if (tokenElem) {
                formData.append('tolkenCsrf', tokenElem.value);
            }

            try {
                const resposta = await fetch('../../../actions/action-cadastrar-atracao.php', {
                    method: 'POST',
                    body: formData
                });

                const texto = await resposta.text();
                const resultado = JSON.parse(texto);


                if (resultado.status === 'sucesso') {
                    document.getElementById('msm-sucesso').innerText = resultado.mensagem || 'Atração cadastrada com sucesso!';
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);

                    setTimeout(() => {
                        window.location.href = `./gerenciar-atracao.php?id_evento=${idEvento}&nome_evento=${encodeURIComponent(nomeEvento)}`;
                    }, 5000);

                } else {
                    document.getElementById('erro-title').innerText = 'Erro ao cadastrar atração';
                    document.getElementById('erro-text').innerText = resultado.mensagem || 'Ocorreu um erro inesperado ao processar os dados.';
                    openModalError();
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
                }


            } catch (error) {
                console.error('Erro na requisição:', error);
                document.getElementById('erro-title').innerText = 'Falha de comunicação';
                document.getElementById('erro-text').innerText = 'Não foi possível conectar ao servidor. Verifique sua conexão e tente novamente.';
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
            }
        });
    });
});