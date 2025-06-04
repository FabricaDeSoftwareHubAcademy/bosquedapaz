document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-evento');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const nome = document.getElementById('nomedoevento').value.trim();
        const descricao = document.getElementById('descricaodoevento').value.trim();
        const data = document.getElementById('dataevento').value;
        const imagem = document.getElementById('file').files[0];

        if (!nome || !descricao || !data || !imagem) {
            alert('Preencha todos os campos e selecione uma imagem.');
            return;
        }

        const formData = new FormData();
        formData.append('nomedoevento', nome);
        formData.append('descricaodoevento', descricao);
        formData.append('dataevento', data);
        formData.append('file', imagem);

        try {
            const resposta = await fetch('../../../actions/action-cadastrar-evento.php', {
                method: 'POST',
                body: formData
            });

            const resultado = await resposta.json();
            console.log('Resposta JSON:', resultado);

            if (resultado.status === 'sucesso') {
                alert(resultado.mensagem);
                window.location.href = './gerenciar-eventos.php';
            } else {
                alert(resultado.mensagem);
            }

        } catch (error) {
            console.error('Erro na requisição:', error);
            alert('Erro inesperado. Tente novamente mais tarde.');
        }
    });
});