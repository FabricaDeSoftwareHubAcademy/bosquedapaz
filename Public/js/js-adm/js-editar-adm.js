// Carrega os dados do ADM no formulário
async function carregarDadosADM() {
    try {
        const response = await fetch('../../../actions/action-colaborador.php?meu_perfil=1', {
            method: 'GET',
            credentials: 'include'
        });

        const text = await response.text();
        console.log('Resposta bruta do servidor:', text);

        try {
            const data = JSON.parse(text);

            if (data.success && data.data) {
                const usuario = data.data;

                document.getElementById('id').value = usuario.id_colaborador;
                document.getElementById('nome').value = usuario.nome || '';
                document.getElementById('telefone').value = usuario.telefone || '';
                document.getElementById('email').value = usuario.email || '';
                document.getElementById('cargo').value = usuario.cargo || '';

                if (usuario.img_perfil) {
                    document.getElementById('previewFoto').src = '../../../' + usuario.img_perfil;
                }
            } else {
                alert('Erro ao carregar dados do ADM: ' + (data.message || 'Resposta inválida'));
            }
        } catch (err) {
            console.error('Erro ao parsear JSON:', err);
            console.log('Resposta recebida:', text);
            alert('Resposta do servidor não é JSON válido.');
        }
    } catch (error) {
        console.error('Erro no carregamento:', error);
        alert('Erro na requisição dos dados');
    }
}

carregarDadosADM();

// Função para mostrar preview da imagem ao selecionar
function previewImagem() {
    const input = document.getElementById('uploadFoto');
    const preview = document.getElementById('previewFoto');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Referências para modais e mensagens
const formulario = document.getElementById("formulario");

const modalConfirmar = document.getElementById("modal-confirmar");
const modalErro = document.getElementById("modal-mensagem");
const modalSucesso = document.getElementById("modal-sucesso");

const msmErro = document.getElementById("modal-message");

const btnCancelar = document.getElementById("btn-modal-cancelar") || document.getElementById("btn-cancelar"); // em caso de nomes diferentes
const btnConfirmar = document.getElementById("btn-modal-salvar") || document.getElementById("btn-confirmar");
const btnFecharErro = document.getElementById("btn-modal-fechar");
const fecharModalConfirmar = document.getElementById("close-modal-confirmar");
const fecharModalErro = document.getElementById("close-modal-mensagem");
const fecharModalSucesso = document.getElementById("close-modal-sucesso");

// Função para fechar qualquer modal
function fecharModal(modal) {
    if (modal && modal.close) {
        modal.close();
    }
}

// Função para validar os campos do formulário, retorna mensagem de erro ou null se ok
function validarCampos() {
    const nome = formulario.nome.value.trim();
    const telefone = formulario.tel.value.trim();
    const cargo = formulario.cargo.value.trim();
    const regexNome = /^[\p{L} ]+$/u;
    const regexTelefone = /^\d{10,11}$/;

    if (!nome) return "O nome é obrigatório.";
    if (!regexNome.test(nome)) return "Nome inválido. Apenas letras e espaços são permitidos.";
    if (!telefone) return "O telefone é obrigatório.";
    if (!regexTelefone.test(telefone)) return "Telefone inválido. Informe apenas números com DDD.";
    if (!cargo) return "O cargo é obrigatório.";
    if (!regexNome.test(cargo)) return "Cargo inválido. Apenas letras e espaços são permitidos.";
    return null;
}

formulario.addEventListener("submit", (e) => {
    e.preventDefault();

    const erro = validarCampos();

    if (erro) {
        msmErro.textContent = erro;
        modalErro.showModal();
        return;
    }

    // Se chegou aqui, abre o modal de confirmação
    modalConfirmar.showModal();
});

// Cancelar confirmação
btnCancelar.addEventListener("click", () => fecharModal(modalConfirmar));
fecharModalConfirmar.addEventListener("click", () => fecharModal(modalConfirmar));

// Fechar modal erro
btnFecharErro.addEventListener("click", () => fecharModal(modalErro));
fecharModalErro.addEventListener("click", () => fecharModal(modalErro));

// Fechar modal sucesso
fecharModalSucesso.addEventListener("click", () => fecharModal(modalSucesso));

// Confirmar salvar formulário
btnConfirmar.addEventListener("click", async () => {
    fecharModal(modalConfirmar);

    try {
        const formData = new FormData(formulario);
        formData.append("atualizar", "true");

        const response = await fetch("../../../actions/action-colaborador.php", {
            method: "POST",
            body: formData,
        });

        const data = await response.json();
        console.log("Resposta do servidor:", data);

        if (data.success) {
            modalSucesso.showModal();

            // Atualiza os campos com os dados retornados
            document.getElementById('nome').value = data.data.nome;
            document.getElementById('telefone').value = data.data.telefone;
            document.getElementById('email').value = data.data.email;
            document.getElementById('cargo').value = data.data.cargo;

            if (data.data.img_perfil) {
                document.getElementById("previewFoto").src = '../../../' + data.data.img_perfil;
            }
        } else {
            // Tratamento específico para erro de upload de imagem e outros
            let mensagemErro = data.message || "Erro ao salvar dados.";
            if (mensagemErro.toLowerCase().includes("upload da imagem")) {
                mensagemErro = "Erro na foto: " + mensagemErro;
            }
            msmErro.textContent = mensagemErro;
            modalErro.showModal();
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        msmErro.textContent = "Erro na comunicação com o servidor.";
        modalErro.showModal();
    }
});
