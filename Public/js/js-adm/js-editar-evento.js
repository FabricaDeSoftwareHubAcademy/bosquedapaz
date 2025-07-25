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

            // Antes: select ainda vazio
            // document.getElementById('select-endereco').value = evento.endereco_evento;

            // Agora: carregar com seleção automática
            await carregarEnderecosSelecionando(evento.endereco_evento);

            document.getElementById('id_evento').value = evento.id_evento;
            document.getElementById('nomedoevento').value = evento.nome_evento;
            document.getElementById('subtitulo').value = evento.subtitulo_evento;
            document.getElementById('descricaodoevento').value = evento.descricao_evento;
            document.getElementById('dataevento').value = evento.data_evento;
            document.getElementById('hora_inicio').value = evento.hora_inicio;
            document.getElementById('hora_fim').value = evento.hora_fim;
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
                const resposta = await fetch('../../../actions/action-editar-evento.php', {
                    method: 'POST',
                    body: formData
                });

                const resultado = await resposta.json();
                console.log('Resposta JSON:', resultado);

                if (resultado.status === 'sucess') {
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
        });

    });    

});

const carregarEnderecosSelecionando = async (idSelecionado) => {
    try {
        const response = await fetch(`../../../actions/action-buscar-endereco.php?id=${idSelecionado}`);
        const endereco = await response.json();

        if (endereco.erro) {
            throw new Error(endereco.erro);
        }

        const select = document.getElementById('select-endereco');
        const options = select.options;

        for (let i = 0; i < options.length; i++) {
            if (parseInt(options[i].value) === parseInt(endereco.id_endereco_evento)) {
                options[i].selected = true;
                break;
            }
        }
    } catch (erro) {
        console.error('Erro ao carregar endereço por ID:', erro);
        alert('Erro ao carregar endereço do evento. Tente novamente.');
    }
};

// const preencherEnderecoSelecionado = async () => {
//     const idEvento = document.getElementById('id_evento').value;
//     const selectEndereco = document.getElementById('endereco_evento');

//     try {
//         const response = await fetch(`../../../actions/action-buscar-endereco.php?id=${idEvento}`);
//         const endereco = await response.json();

//         const enderecoId = endereco.id_endereco_evento.toString();

//         // Aguardar um pequeno tempo para garantir que o select já tenha sido populado (se for dinâmico)
//         setTimeout(() => {
//             const optionExistente = selectEndereco.querySelector(`option[value="${enderecoId}"]`);
//             if (optionExistente) {
//                 optionExistente.selected = true;
//             } else {
//                 throw new Error('Endereço não encontrado no select');
//             }
//         }, 200); // tempo ajustável conforme a origem das opções

//     } catch (error) {
//         console.error('Erro ao carregar endereço existente:', error);
//         const mensagemErro = document.createElement('p');
//         mensagemErro.classList.add('mensagem-erro');
//         mensagemErro.innerText = 'Erro ao carregar o endereço existente.';
//         document.getElementById('campo-endereco').appendChild(mensagemErro);
//     }
// };