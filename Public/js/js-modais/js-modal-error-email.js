// Importa o CSS do modal-email
const linkEmail = document.createElement('link');
linkEmail.rel  = 'stylesheet';
linkEmail.type = 'text/css';
linkEmail.href = '../../../Public/css/css-modais/style-modal-error-email'; // Pode ajustar se tiver CSS específico para o modal-email
document.getElementsByTagName('head')[0].appendChild(linkEmail);

// Funções para abrir/fechar modal email
function openModalEmail() {
    let modal = document.getElementById('modal-email');
    if (modal) modal.showModal();
}

function closeModalEmail() {
    let modal = document.getElementById('modal-email');
    if (modal) modal.close();
}

// Fecha o modal ao clicar no ícone de fechar
document.getElementById('close-modal-email')?.addEventListener('click', closeModalEmail);

// Função para verificar email no backend
async function verificarEmail(email) {
    try {
        const response = await fetch(`../../../actions/actions-expositor.php?verificar_email=${encodeURIComponent(email)}`, {
            method: 'GET'
        });
        const data = await response.json();
        // Assume que se status 200 e data.emailExiste == true, email já cadastrado
        return data.emailExiste === true;
    } catch (error) {
        console.error('Erro na verificação do email:', error);
        return false; // Em caso de erro, deixa passar para evitar bloqueios indevidos
    }
}

// Ajuste no botão salvar para verificar email antes do modal confirmar
btn_salvar.addEventListener('click', async function (event) {
    event.preventDefault();

    const formulario = document.getElementById("fomulario_cad_expositor");
    const emailInput = formulario.querySelector('input[name="email"]');
    const email = emailInput?.value.trim();

    if (!email) {
        alert("Por favor, insira um email válido.");
        return;
    }

    // Verifica se email já existe
    const emailExiste = await verificarEmail(email);
    if (emailExiste) {
        // Abre modal informando email já cadastrado
        openModalEmail();
        return; // Para aqui para não continuar o cadastro
    }

    // Se email não existe, continua o fluxo normal de cadastro
    openModalConfirmar();

    document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);

    document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
        closeModalAtualizar();
        let dadosForms = new FormData(formulario);
        dadosForms.append('cadastrar', 1);

        let dados_php = await fetch('../../../actions/actions-expositor.php', {
            method: 'POST',
            body: dadosForms
        });

        let response = await dados_php.json();

        if (response.status == 200) {
            openModalSucesso();
            document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);
            document.getElementById('msm-sucesso').innerHTML = 'Cadastro realizado com sucesso';
            document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                closeModalSucesso();
                window.location.reload();
            });
        } else {
            openModalError();
            document.getElementById('erro-title').innerHTML = response.msg;
            document.getElementById('erro-text').style.display = 'none';
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
        }
    });
});
