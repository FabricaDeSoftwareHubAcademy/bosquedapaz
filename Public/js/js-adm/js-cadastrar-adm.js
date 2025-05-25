document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formCadastro');

    if (!form) {
        console.error('formCadastro não encontrado');
        return;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch('/bosquedapaz/actions/actions-cadastrar-listar-adm/Cadastro-adm-json.php', {
                method: 'POST',
                body: formData
            });


            // Obtém o conteúdo bruto da resposta
            const text = await response.text();
            console.log('Resposta bruta:', text);

            let result;
            try {
                // Tenta converter para JSON
                result = JSON.parse(text);
            } catch (error) {
                console.error('Erro ao parsear JSON:', error);
                alert('Resposta inválida do servidor. Veja o console para detalhes.');
                return;
            }

            // Verifica se o cadastro foi bem-sucedido
            if (result.success) {
                alert(result.message);
                form.reset();
            } else {
                alert('Erro: ' + result.message);
            }

        } catch (error) {
            console.error('Erro na requisição:', error);
            alert('Erro ao enviar dados. Verifique sua conexão ou o servidor.');
        }
    });
});
