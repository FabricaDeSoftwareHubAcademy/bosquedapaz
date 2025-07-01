window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);

    // Preenche os campos com os parâmetros da URL
    document.querySelector('input[name="titulo"]').value = params.get('titulo') || '';
    document.querySelector('textarea[name="descricao"]').value = params.get('descricao') || '';
    document.querySelector('input[name="data_inicio"]').value = params.get('data_inicio') || '';
    document.querySelector('input[name="data_fim"]').value = params.get('data_fim') || '';

    // Não é possível setar valor de input file via JS por segurança, então removido
    // document.querySelector('input[type="file"]').value = params.get('imagem') || '';

    const form = document.getElementById('form_editar_utilidade');
    if (form && params.get('id')) {
        const id = params.get('id');
        form.dataset.id = id;

        // Adiciona ou atualiza input hidden para enviar o id ao backend
        let inputId = form.querySelector('input[name="id"]');
        if (!inputId) {
            inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            form.appendChild(inputId);
        }
        inputId.value = id;
    }
});

const botao_editar_utilidade = document.getElementById('botao_editar_utilidade');

if (botao_editar_utilidade) {
    botao_editar_utilidade.addEventListener('click', async function (event) {
        event.preventDefault();

        const formulario = document.getElementById('form_editar_utilidade');
        if (!formulario) {
            alert("Formulário não encontrado.");
            return;
        }

        const formData = new FormData(formulario);

        try {
            const dados_php = await fetch('../../../actions/action-editar-utilidade-publica.php', {
                method: 'POST',
                body: formData
            });

            const response = await dados_php.json();

            if (response.status == 200) {
                console.log(response.msg);
                alert("Editado com sucesso!"); // substituir pelo seu modal
            } else {
                console.error(response.msg);
                alert("Erro ao Editar!");
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
            alert("Erro na comunicação com o servidor.");
        }
    });
}
