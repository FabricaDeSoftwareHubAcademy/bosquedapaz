document.addEventListener('DOMContentLoaded', () => {
    const btnSalvarEndereco = document.getElementById('btn-salvar-endereco');

    btnSalvarEndereco.addEventListener('click', async (event) => {
        event.preventDefault();

        const local_evento = document.getElementById('local_evento').value.trim();
        const cep_evento = document.getElementById('cep_evento').value.trim();
        const logradouro_evento = document.getElementById('logradouro_evento').value.trim();
        const complemento_evento = document.getElementById('complemento_evento').value.trim();
        const numero_evento = document.getElementById('numero_evento').value.trim();
        const bairro_evento = document.getElementById('bairro_evento').value.trim();
        const cidade_evento = document.getElementById('cidade_evento').value.trim();

        if (!local_evento || !cep_evento || !logradouro_evento || !numero_evento || !bairro_evento || !cidade_evento) {
            console.warn('Campos obrigatórios faltando.');
            alert('Preencha todos os campos obrigatórios antes de continuar.');
            return;
        }

        const formData = new FormData();
        formData.append('local_evento', local_evento);
        formData.append('cep_evento', cep_evento);
        formData.append('logradouro_evento', logradouro_evento);
        formData.append('complemento_evento', complemento_evento);
        formData.append('numero_evento', numero_evento);
        formData.append('bairro_evento', bairro_evento);
        formData.append('cidade_evento', cidade_evento);
        formData.append("tolkenCsrf", document.getElementById("tolkenCsrf"));

        try {
            const resposta = await fetch('../../../actions/action-cadastrar-endereco-evento.php', {
                method: 'POST',
                body: formData
            });

            const resultado = await resposta.json();
            console.log('Resultado do cadastro:', resultado);

            if (resultado.status === 'sucesso') {
                // Fecha o modal diretamente
                document.getElementById('modal-cadastrar-endereco').close();

                carregarEnderecos();

                // (Opcional) Atualiza o select após cadastro, se quiser:
                // if (typeof atualizarSelectEndereco === 'function') {
                //     atualizarSelectEndereco();
                // }
            } else {
                alert('Erro ao cadastrar endereço: ' + (resultado.mensagem || 'Erro desconhecido.'));
            }

        } catch (error) {
            console.error('Erro na requisição:', error);
            alert('Erro de conexão com o servidor.');
        }
    });

    document.getElementById('cep_evento').addEventListener('blur', async function () {
        const cep = this.value.replace(/\D/g, '');
        if (cep.length === 8) {
            try {
                const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const data = await response.json();
                if (!data.erro) {
                    document.getElementById('logradouro_evento').value = data.logradouro;
                    document.getElementById('bairro_evento').value = data.bairro;
                    document.getElementById('cidade_evento').value = `${data.localidade} - ${data.uf}`;
                    // document.getElementById('estado').value = data.uf;
                } else {
                    alert("CEP não encontrado!");
                }
            } catch (error) {
                alert("Erro ao buscar o endereço. Tente novamente.");
                console.error(error);
            }
        }
    });
});