// Seletores principais
let btnCadastrar = document.getElementById("btn-salvar");
let modalConfirmar = document.getElementById("modal-confirmar");
let btnModalSalvar = document.getElementById("btn-modal-salvar");
let btnModalCancelar = document.getElementById("btn-modal-cancelar");
let btnFecharConfirmar = document.getElementById("close-modal-confirmar");
let formulario = document.getElementById("form_cadastrar_utilidade");

let modalErro, modalErroText, btnFecharErro, modalSucesso;

document.addEventListener("DOMContentLoaded", () => {
    modalErro = document.getElementById('modal-error');
    modalErroText = document.getElementById('erro-text');
    btnFecharErro = document.getElementById('close-modal-erro');
    modalSucesso = document.getElementById('modal-sucesso');

    // Fechar modais
    btnFecharErro?.addEventListener("click", () => modalErro.close());
    modalErro?.addEventListener("click", (e) => { if (e.target === modalErro) modalErro.close(); });

    btnFecharConfirmar?.addEventListener("click", () => modalConfirmar.close());
    btnModalCancelar?.addEventListener("click", () => modalConfirmar.close());
    modalConfirmar?.addEventListener("click", (e) => { if (e.target === modalConfirmar) modalConfirmar.close(); });
});

// Abrir modal de confirmação com validações
btnCadastrar?.addEventListener("click", function (event) {
    event.preventDefault();

    // Validação
    const titulo = formulario.querySelector('input[name="titulo"]')?.value.trim();
    const descricao = formulario.querySelector('textarea[name="descricao"]')?.value.trim();
    const data_inicio = formulario.querySelector('input[name="data_inicio"]')?.value;
    const data_fim = formulario.querySelector('input[name="data_fim"]')?.value;
    const imagem = formulario.querySelector('input[name="imagem"]')?.files[0];

    if (!titulo) return openModalErro("O campo Título é obrigatório.");
    if (titulo.length > 100) return openModalErro("O Título deve ter no máximo 50 caracteres.");

    if (!descricao) return openModalErro("A Descrição é obrigatória.");
    if (descricao.length > 500) return openModalErro("A Descrição deve ter no máximo 500 caracteres.");

    if (!data_inicio) return openModalErro("A Data de Início é obrigatória.");
    if (!data_fim) return openModalErro("A Data de Fim é obrigatória.");
    if (data_inicio && data_fim && data_inicio > data_fim) {
        return openModalErro("A Data de Início não pode ser maior que a Data de Fim.");
    }

    if (!imagem) return openModalErro("Uma imagem é obrigatória.");
    const extensoesValidas = ['jpg', 'jpeg', 'png', 'jfif', 'svg'];
    const extensaoArquivo = imagem.name.split('.').pop().toLowerCase();
    if (!extensoesValidas.includes(extensaoArquivo)) {
        return openModalErro("Formato de imagem inválido. Use: jpg, jpeg, png, jfif ou svg.");
    }

    modalConfirmar?.showModal();
});

// Enviar cadastro ao confirmar
btnModalSalvar?.addEventListener("click", async function () {
    modalConfirmar.close();
    let formData = new FormData(formulario);

    try {
        let dados_php = await fetch('../../../actions/action-cadastrar-utilidade-publica.php', {
            method: 'POST',
            body: formData
        });

        let response = await dados_php.json();

        if (response.status == 200) {
            openModalSucesso();
            setTimeout(() => window.location.reload(), 2000);
        } else {
            openModalErro(response.message || 'Erro ao cadastrar utilidade.');
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        openModalErro('Erro inesperado ao cadastrar utilidade.');
    }
});

function openModalSucesso() {
    modalSucesso?.showModal();
}

function openModalErro(msg) {
    modalErroText.textContent = msg;
    modalErro?.showModal();
}
