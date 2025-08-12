document.addEventListener('DOMContentLoaded', () => {
    const descricaoInput = document.getElementById('descricaodoevento');
    const contador = document.getElementById('contador-caracteres');
    const btnSalvar = document.getElementById('btn-salvar');

    descricaoInput.addEventListener('input', () => {
        const restante = 500 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    });

    btnSalvar.addEventListener('click', (event) => {
        event.preventDefault();

        document.getElementById('confirmar-title').innerText = 'Deseja confirmar este cadastro?';
        document.getElementById('msm-confimar').innerText = 'Clique em salvar para confirmar o cadastro.';

        openModalConfirmar();

        document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
        document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);

        document.getElementById('btn-modal-salvar').addEventListener('click', async () => {

            closeModalConfirmar();

            const nome = document.getElementById('nomedoevento').value.trim();
            const subtitulo = document.getElementById('subtitulo').value.trim();
            const descricao = document.getElementById('descricaodoevento').value.trim();
            const data = document.getElementById('dataevento').value;
            const hora_inicio = document.getElementById('hora_inicio').value;
            const hora_fim = document.getElementById('hora_fim').value;
            const endereco = document.getElementById('select-endereco').value.trim();
            const imagem = document.getElementById('file').files[0];

            if (!nome || !descricao || !data || !imagem || !subtitulo || !hora_inicio || !hora_fim || !endereco) {
                document.getElementById('erro-title').innerText = 'Informações incompletas';
                document.getElementById('erro-text').innerText = 'Todos os campos devem ser preenchidos antes de continuar.';
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
                return;
            }

            const formData = new FormData();
            formData.append('nomedoevento', nome);
            formData.append('subtitulo', subtitulo);
            formData.append('descricaodoevento', descricao);
            formData.append('dataevento', data);
            formData.append('hora_inicio', hora_inicio);
            formData.append('hora_fim', hora_fim);
            formData.append('endereco', endereco);
            formData.append('file', imagem);

            // ⚠️ Corrigi aqui: pegue o VALUE do input hidden do token; ajuste o seletor se necessário.
            const tokenElem = document.getElementById('tolkenCsrf') || document.querySelector('input[name="tolkenCsrf"]');
            if (tokenElem) {
                formData.append('tolkenCsrf', tokenElem.value);
            }

            try {
                const resposta = await fetch('../../../actions/action-cadastrar-evento.php', {
                    method: 'POST',
                    body: formData
                });

                const resultado = await resposta.json();
                console.log('Resposta JSON:', resultado);

                if (resultado.status === 'sucesso') {
                    document.getElementById('msm-sucesso').innerText = resultado.mensagem || 'Evento cadastrado com sucesso!';
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);

                    setTimeout(() => {
                        window.location.href = './gerenciar-eventos.php';
                    }, 6000);

                } else {
                    document.getElementById('erro-title').innerText = 'Erro ao cadastrar evento';
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
        }, { once: true });
    });
});