function sanitizeInput(input) {
    const div = document.createElement('div');
    div.innerText = input;
    return div.innerHTML;
}

function openModalConfirmar() {
    document.getElementById('modal-confirmar').showModal();
}

function closeModalConfirmar() {
    document.getElementById('modal-confirmar').close();
}

function openModalSucesso() {
    document.getElementById('modal-sucesso').showModal();
}

function closeModalSucesso() {
    document.getElementById('modal-sucesso').close();
}

function openModalErro(mensagem) {
    document.getElementById('erro-text').innerText = mensagem;
    document.getElementById('modal-error').showModal();
}

function closeModalErro() {
    document.getElementById('modal-error').close();
}

window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);
    function openModalSucesso() {
    const modal = document.getElementById('modal-sucesso');
    modal.showModal();

    const closeBtn = document.getElementById('close-modal-sucesso');
    if (closeBtn) {
        closeBtn.onclick = () => {
            modal.close();
            location.reload();
        };
    }
}

    const params = new URLSearchParams(window.location.search);

    const titulo = sanitizeInput(params.get('titulo') || '');
    const descricao = sanitizeInput(params.get('descricao') || '');
    const data_inicio = sanitizeInput(params.get('data_inicio') || '');
    const data_fim = sanitizeInput(params.get('data_fim') || '');
    const imagem = sanitizeInput(params.get('imagem') || '');

    document.querySelector('input[name="titulo"]').value = titulo;
    document.querySelector('textarea[name="descricao"]').value = descricao;
    document.querySelector('input[name="data_inicio"]').value = data_inicio;
    document.querySelector('input[name="data_fim"]').value = data_fim;
    document.querySelector('img[name="preview-image"]').src = `../../${imagem}`;

    const form = document.getElementById('form_editar_utilidade');
    if (form && params.get('id')) {
        let inputId = form.querySelector('input[name="id"]');
        if (!inputId) {
            inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            form.appendChild(inputId);
        }
        inputId.value = sanitizeInput(params.get('id'));
    }
});

document.getElementById('btn-salvar').addEventListener('click', function (event) {
    event.preventDefault();

    const titulo = document.getElementById("confirmar-title");
    const subtitulo = document.getElementById("msm-confimar");

    titulo.innerHTML = "<h2>Deseja editar esse registro?</h2>";
    subtitulo.innerHTML = "<p>Clique em salvar para confirmar a alteração</p>";

    openModalConfirmar();

    document.getElementById('close-modal-confirmar').onclick = closeModalConfirmar;
    document.getElementById('btn-modal-cancelar').onclick = closeModalConfirmar;

    const salvarBtn = document.getElementById('btn-modal-salvar');
    const novoSalvarBtn = salvarBtn.cloneNode(true);
    salvarBtn.parentNode.replaceChild(novoSalvarBtn, salvarBtn);

    novoSalvarBtn.addEventListener('click', async function () {
    closeModalConfirmar();

    const form = document.getElementById('form_editar_utilidade');
    if (!form) {
        openModalErro("Formulário não encontrado.");
        return;
    }

    // Pegando os valores
    const titulo = form.querySelector('input[name="titulo"]').value.trim();
    const descricao = form.querySelector('textarea[name="descricao"]').value.trim();
    const data_inicio = form.querySelector('input[name="data_inicio"]').value;
    const data_fim = form.querySelector('input[name="data_fim"]').value;

    // Validações campo por campo
    if (!titulo) {
        openModalErro("O campo Título é obrigatório.");
        return;
    }

    if (!descricao) {
        openModalErro("O campo Descrição é obrigatório.");
        return;
    }

    if (!data_inicio) {
        openModalErro("O campo Data de Início é obrigatório.");
        return;
    }

    if (!data_fim) {
        openModalErro("O campo Data Final é obrigatório.");
        return;
    }

    if (new Date(data_inicio) > new Date(data_fim)) {
        openModalErro("A data de início não pode ser maior que a data final.");
        return;
    }

    const formData = new FormData(form);

    try {
        const dados_php = await fetch('../../../actions/action-editar-utilidade-publica.php', {
            method: 'POST',
            body: formData
        });

        const response = await dados_php.json();

        if (response.status == 200) {
            openModalSucesso();
        } else {
            openModalErro(response.msg || "Erro ao editar.");
        }
    } catch (error) {
        console.error("Erro:", error);
        openModalErro("Erro na comunicação com o servidor.");
    }
});

});
