document.addEventListener('DOMContentLoaded', () => {
    const btnSalvarEndereco = document.getElementById('btn-salvar-endereco');

    // Quando clicar no botão SALVAR no modal de endereço
    btnSalvarEndereco.addEventListener('click', (event) => {
        event.preventDefault();
        openModalConfirmar(); // abre o modal de confirmação

        // Botões de fechar/cancelar o modal de confirmação
        document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
        document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);

        // Ao clicar em "Salvar" no modal de confirmação
        document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
            closeModalConfirmar();

            // Captura dos campos
            const local_evento = document.getElementById('local_evento').value.trim();
            const cep_evento = document.getElementById('cep_evento').value.trim();
            const logradouro_evento = document.getElementById('logradouro_evento').value.trim();
            const complemento_evento = document.getElementById('complemento_evento').value.trim();
            const numero_evento = document.getElementById('numero_evento').value.trim();
            const bairro_evento = document.getElementById('bairro_evento').value.trim();
            const cidade_evento = document.getElementById('cidade_evento').value.trim();

            // Validação básica
            if (!local_evento || !cep_evento || !logradouro_evento || !numero_evento || !bairro_evento || !cidade_evento) {
                document.getElementById('erro-title').innerText = 'Campos obrigatórios não preenchidos';
                document.getElementById('erro-text').innerText = 'Todos os campos obrigatórios devem ser preenchidos.';
                openModalError();
                return;
            }

            // Envio via FormData
            const formData = new FormData();
            formData.append('local_evento', local_evento);
            formData.append('cep_evento', cep_evento);
            formData.append('logradouro_evento', logradouro_evento);
            formData.append('complemento_evento', complemento_evento);
            formData.append('numero_evento', numero_evento);
            formData.append('bairro_evento', bairro_evento);
            formData.append('cidade_evento', cidade_evento);

            try {
                const resposta = await fetch('../../../actions/action-cadastrar-endereco-evento.php', {
                    method: 'POST',
                    body: formData
                });

                const resultado = await resposta.json();
                console.log('Resposta do servidor:', resultado);

                if (resultado.status === 'sucesso') {
                    // Modal de sucesso
                    document.getElementById('msm-sucesso').innerText = resultado.mensagem || 'Endereço cadastrado com sucesso!';
                    openModalSucesso();

                    // Fecha modal de cadastro de endereço
                    document.getElementById('modal-cadastrar-endereco').close();

                    // Atualiza o select de endereços
                    if (typeof atualizarSelectEndereco === 'function') {
                        atualizarSelectEndereco();
                    }
                } else {
                    document.getElementById('erro-title').innerText = 'Erro ao cadastrar endereço';
                    document.getElementById('erro-text').innerText = resultado.mensagem || 'Erro inesperado.';
                    openModalError();
                }

            } catch (error) {
                console.error('Erro na requisição:', error);
                document.getElementById('erro-title').innerText = 'Erro de conexão';
                document.getElementById('erro-text').innerText = 'Não foi possível conectar ao servidor.';
                openModalError();
            }
        });
    });

    // Fechar modal de cadastro de endereço
    document.getElementById('btn-cancelar-endereco').addEventListener('click', () => {
        document.getElementById('modal-cadastrar-endereco').close();
    });

    document.getElementById('close-modal-endereco').addEventListener('click', () => {
        document.getElementById('modal-cadastrar-endereco').close();
    });
});