document.addEventListener('DOMContentLoaded', () => {
    const descricaoInput = document.getElementById('descricao_atracao');
    const contador = document.getElementById('contador-caracteres');
    const form = document.getElementById('form-atracao');

    const idEvento = document.getElementById('id_evento').value;

    descricaoInput.addEventListener('input', () => {
        const restante = 250 - descricaoInput.value.length;
        contador.textContent = `${restante} caracteres restantes`;
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

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

            try {
                const resultado = JSON.parse(texto);
                console.log('Resposta JSON:', resultado);

                if (resultado.status === 'sucesso') {
                    alert(resultado.mensagem);
                    window.location.href = `./gerenciar-atracao.php?id_evento=${idEvento}`;
                } else {
                    alert(resultado.mensagem);
                }
            } catch (erroJson) {
                console.error('Resposta não é JSON válido:', texto);
                alert('Erro inesperado: resposta inválida do servidor.');
            }

        } catch (error) {
            console.error('Erro ao cadastrar atração:', error);
            alert('Erro inesperado. Tente novamente mais tarde.');
        }
    });
});