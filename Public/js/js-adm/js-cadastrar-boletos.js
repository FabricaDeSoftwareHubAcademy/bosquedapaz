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
                alert(res.mensagem || 'Expositor não encontrado.');
            }

        } catch (error) {
            alert('Erro ao buscar expositor.');
        }
    });

    const form = document.getElementById('form-cadastrar-boleto');
    const btnSalvar = document.getElementById('btn-salvar');

    // Modais
    const modalConfirmar = document.getElementById('modal-confirmar');
    const modalSucesso = document.getElementById('modal-sucesso');
    const modalErro = document.getElementById('modal-erro');

    const confirmarSim = document.getElementById('btn-modal-salvar');
    const confirmarNao = document.getElementById('btn-modal-cancelar');
    const fecharSucesso = document.getElementById('close-modal-sucesso');
    const fecharErro = document.getElementById('close-modal-erro');

    const textoErro = document.getElementById('texto-erro');

    const vencimentoInput = document.getElementById('val');
    const referenciaSelect = document.getElementById('referencia_select');
    // Abre modal de confirmação
    btnSalvar.addEventListener('click', (e) => {
        e.preventDefault();

        const data = new Date(vencimentoInput.value);
        if (!isNaN(data)) {
            const mesReferencia = data.toLocaleString('pt-BR', { month: 'long' });
            referenciaSelect.value = mesReferencia.charAt(0).toUpperCase() + mesReferencia.slice(1); // formata primeira letra maiúscula
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
        const mesReferencia = document.getElementById('referencia_select').value.trim();
        const vencimento = document.getElementById('val').value.trim();
        const valor = document.getElementById('valor').value.trim();
        const pdf = document.getElementById('arquivo').files[0];

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

        fetch('../../../actions/action-cadastrar-boletos.php', {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    modalSucesso.showModal();
                } else {
                    textoErro.innerText = res.message || 'Erro ao cadastrar.';
                    modalErro.showModal();
                }
            })
            .catch(() => {
                textoErro.innerText = 'Erro na comunicação com o servidor.';
                modalErro.showModal();
            });
    }
});
