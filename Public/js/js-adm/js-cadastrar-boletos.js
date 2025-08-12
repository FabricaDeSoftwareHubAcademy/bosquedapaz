document.addEventListener('DOMContentLoaded', () => {

    const btnBuscar = document.getElementById('lupa');
    const inputNome = document.getElementById('pesquisar-nome');

    btnBuscar.addEventListener('click', async (e) => {
        e.preventDefault();

        const nome = inputNome.value.trim();
        if (!nome) {
            alert('Digite o nome do expositor.');
            return;
        }

        const dados = { "pesquisar-nome": nome };

        try {
            const resposta = await fetch('../../../actions/action-procurar-expositor-boleto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            });

            const res = await resposta.json();

            if (res.status === 'ok') {
                document.getElementById('id_expositor').value = res.expositor.id;
                document.getElementById('nome-exp').value = res.expositor.nome;
                document.getElementById('cnpj-cpf').value = res.expositor.cpf;
            } else {
                // SUBSTITUINDO O ALERT PELO MODAL DE ERRO
                textoErro.innerText = res.mensagem || 'Expositor não encontrado.';
                modalErro.showModal();
            }

        } catch (error) {
            textoErro.innerText = 'Erro ao buscar expositor.';
            modalErro.showModal();
        }
    });

    const form = document.getElementById('form-cadastrar-boleto');
    const btnSalvar = document.getElementById('btn-salvar');

    // Modais
    const modalConfirmar = document.getElementById('modal-confirmar');
    const modalSucesso = document.getElementById('modal-sucesso');
    const modalErro = document.getElementById('modal-error');
    const modalLoading = document.getElementById('modal-loading');

    const confirmarSim = document.getElementById('btn-modal-salvar');
    const confirmarNao = document.getElementById('btn-modal-cancelar');
    const fecharSucesso = document.getElementById('close-modal-sucesso');
    const fecharErro = document.getElementById('close-modal-erro');

    const textoErro = document.getElementById('erro-text');

    // OBTENDO REFERÊNCIAS DOS INPUTS
    const vencimentoInput = document.getElementById('vencimento_input');
    const referenciaSelect = document.getElementById('referencia_input');
    const valorInput = document.getElementById('valor_input');
    const arquivoInput = document.getElementById('arquivo');

    // FUNÇÕES DO MODAL DE CARREGAMENTO
    function openModalLoading() {
        modalLoading.showModal();
    }

    function closeModalLoading() {
        modalLoading.close();
    }

    // Abre modal de confirmação
    btnSalvar.addEventListener('click', (e) => {
        e.preventDefault();

        const data = new Date(vencimentoInput.value);
        if (!isNaN(data)) {
            const mesReferencia = data.toLocaleString('pt-BR', { month: 'long' });
            referenciaSelect.value = mesReferencia.toLowerCase();
        }

        if (validarCampos()) {
            modalConfirmar.showModal();
        }
    });

    // Cancelar envio
    confirmarNao.addEventListener('click', () => {
        modalConfirmar.close();
    });

    // Confirmar envio
    confirmarSim.addEventListener('click', () => {
        modalConfirmar.close();
        enviarFormulario();
    });

    // Fecha modal de sucesso e recarrega a página
    fecharSucesso.addEventListener('click', () => {
        modalSucesso.close();
        window.location.reload();
    });

    // Fecha modal de erro
    fecharErro.addEventListener('click', () => {
        modalErro.close();
    });

    // Validação dos campos obrigatórios
    function validarCampos() {
        const idExpositor = document.getElementById('id_expositor').value.trim();
        const mesReferencia = referenciaSelect.value.trim();
        const vencimento = vencimentoInput.value.trim();
        const valor = valorInput.value.trim();
        const pdf = arquivoInput.files[0];

        if (!idExpositor || !mesReferencia || !vencimento || !valor || !pdf) {
            textoErro.innerText = 'Preencha todos os campos obrigatórios.';
            modalErro.showModal();
            return false;
        }

        // Verifica extensão do arquivo
        const extensao = pdf.name.split('.').pop().toLowerCase();
        if (extensao !== 'pdf') {
            textoErro.innerText = 'Apenas arquivos PDF são permitidos.';
            modalErro.showModal();
            return false;
        }

        return true;
    }

    // Envia o formulário via fetch
    function enviarFormulario() {
        const formData = new FormData(form);

        openModalLoading();

        fetch('../../../actions/action-cadastrar-boletos.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                closeModalLoading();
                if (res.status === 'success') {
                    modalSucesso.showModal();
                } else {
                    textoErro.innerText = res.message || 'Erro ao cadastrar.';
                    modalErro.showModal();
                }
            })
            .catch(() => {
                closeModalLoading();
                textoErro.innerText = 'Erro na comunicação com o servidor.';
                modalErro.showModal();
            });
    }
});
