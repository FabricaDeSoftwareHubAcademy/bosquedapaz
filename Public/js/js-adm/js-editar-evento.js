document.addEventListener('DOMContentLoaded', async () => {
    const descricaoInput = document.getElementById('descricaodoevento');
    const contador = document.getElementById('contador-caracteres');
    const btnEditar = document.getElementById('btn-salvar');
    const form = document.getElementById('form-editar-evento');

    const atualizarContador = () => {
        const restante = 500 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    };

    descricaoInput.addEventListener('input', atualizarContador);
    setTimeout(atualizarContador, 100);

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');

    if (!id) {
        alert('ID do evento não fornecido.');
        return;
    }

    try {
        const response = await fetch(`../../../actions/action-buscar-evento.php?id=${id}`);
        const data = await response.json();

        if (data.status === 'success') {
            const evento = data.evento;

            document.getElementById('id_evento').value = evento.id_evento;
            document.getElementById('nomedoevento').value = evento.nome_evento;
            document.getElementById('subtitulo').value = evento.subtitulo_evento;
            document.getElementById('descricaodoevento').value = evento.descricao_evento;
            document.getElementById('dataevento').value = evento.data_evento;
            document.getElementById('hora_inicio').value = evento.hora_inicio;
            document.getElementById('hora_fim').value = evento.hora_fim;
            document.getElementById('endereco').value = evento.endereco_evento;
            document.getElementById('status').value = evento.status;

            const banner = document.getElementById('preview-image');
            if (evento.banner_evento) {
                banner.src = `../../../Public/${evento.banner_evento}`;
                banner.alt = evento.nome_evento ?? 'Imagem do evento';
            }
        } else {
            alert('Evento não encontrado.');
            return;
        }

    } catch (error) {
        console.error('Erro ao buscar evento:', error);
        alert('Erro ao buscar evento.');
        return;
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
                const response = await fetch('../../../Actions/action-editar-evento.php', {
                    method: 'POST',
                    body: formData
                });

                const text = await response.text();
                console.log('Resposta bruta do servidor:', text);

                const data = JSON.parse(text);

                if (data.status === 'success') {
                    openModalSucesso();
                    document.getElementById('msm-sucesso').innerText = resultado.mensagem || 'Evento atualizado com sucesso!';
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);

                    setTimeout(() => {
                        window.location.href = './gerenciar-eventos.php';
                    }, 6000);
                } else {
                    openModalError();
                    document.getElementById('erro-title').innerText = 'Erro ao atualizar evento';
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