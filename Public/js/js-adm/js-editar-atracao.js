document.addEventListener('DOMContentLoaded', async () => {
    const descricaoInput = document.getElementById('descricao_atracao');
    const contador = document.getElementById('contador-caracteres');
    const form = document.getElementById('form-editar-atracao');
    const btnEditar = document.getElementById('btn-salvar');
    const params = new URLSearchParams(window.location.search);
    const id = params.get('id_atracao');
    const idEvento = params.get('id_evento');
    const nomeEvento = params.get('nome_evento');
    const atualizarContador = () => {
        const restante = 250 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    };

    descricaoInput.addEventListener('input', atualizarContador);
    setTimeout(atualizarContador, 100);



    if (!id) {
        document.getElementById('erro-title').innerText = 'Erro ao cadastrar atração';
        document.getElementById('erro-text').innerText = resultado.mensagem || 'Ocorreu um erro inesperado ao processar os dados.';
        openModalError();
        document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
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
            document.getElementById('erro-title').innerText = 'Erro ao cadastrar atração';
            document.getElementById('erro-text').innerText = resultado.mensagem || 'Ocorreu um erro inesperado ao processar os dados.';
            openModalError();
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
        }

    } catch (error) {
        document.getElementById('erro-title').innerText = 'Erro ao cadastrar atração';
        document.getElementById('erro-text').innerText = resultado.mensagem || 'Ocorreu um erro inesperado ao processar os dados.';
        openModalError();
        document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
    }

    btnEditar.addEventListener('click', (event) => {
        event.preventDefault();
    
        // VALIDAÇÃO DOS CAMPOS
        if (!descricaoInput.value.trim()) {
            document.getElementById('erro-title').innerText = 'Erro de validação';
            document.getElementById('erro-text').innerText = 'O campo descrição não pode ficar vazio!';
            openModalError();
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
            return; // impede que continue
        }
    
        // Se passou pela validação, abre modal de confirmação
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
    
                const data = await response.json();
    
                if (data.status === 'success') {
                    openModalSucesso();
                    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);
                    document.getElementById('msm-sucesso').innerHTML = data.mensagem ?? 'Atração atualizada com sucesso!';
    
                    setTimeout(() => {
                        window.location.href = `./gerenciar-atracao.php?id_evento=${idEvento}&nome_evento=${encodeURIComponent(nomeEvento)}`;
                    }, 5000);
    
                } else {
                    document.getElementById('erro-title').innerText = 'Erro ao editar atração';
                    document.getElementById('erro-text').innerText = data.mensagem || 'Ocorreu um erro inesperado ao processar os dados.';
                    openModalError();
                    document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
                }
    
            } catch (error) {
                document.getElementById('erro-title').innerText = 'Erro ao editar atração';
                document.getElementById('erro-text').innerText = 'Ocorreu um erro inesperado ao processar os dados.';
                openModalError();
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
            }
        });
    });

});