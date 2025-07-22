let btn_cadastrar = document.getElementById("btn-salvar");
let formulario = document.getElementById("form_cadastrar_parceiro");

// Evento botão principal
btn_cadastrar.addEventListener('click', function (event) {
    event.preventDefault();

    const camposObrigatorios = [
        'nome_parceiro', 'email', 'nome_contato', 'telefone', 'cpf_cnpj', 'tipo', 'logo',
        'num_residencia', 'cep', 'cidade', 'bairro', 'logradouro', 'estado'
    ];

    for (let id of camposObrigatorios) {
        const campo = document.getElementById(id);
        if (!campo || campo.value.trim() === '') {
            exibirErroModal(`Por favor, preencha o campo: ${campo?.placeholder || campo?.name || id}`);
            campo?.focus();
            return;
        }
    }


    let telefone = document.getElementById('telefone').value.trim();
    let email = document.getElementById('email').value.trim();
    let tipo = document.getElementById('tipo').value;
    let cpf_cnpj = document.getElementById('cpf_cnpj').value.trim();
    let cep = document.getElementById('cep').value.trim();

    const telefoneRegex = /^\(\d{2}\)\s?\d{4,5}-\d{4}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const cepRegex = /^\d{5}-\d{3}$/;

    if (!telefoneRegex.test(telefone)) {
        exibirErroModal("Telefone inválido! Formato esperado: (99) 99999-9999");
        return;
    }

    if (!emailRegex.test(email)) {
        exibirErroModal("E-mail inválido!");
        return;
    }

    if (!cepRegex.test(cep)) {
        exibirErroModal("CEP inválido! Formato esperado: 99999-999");
        return;
    }

    if (tipo !== "fisica" && tipo !== "juridica") {
        exibirErroModal("Selecione o tipo correto!");
        return;
    }

    if (!validarCpfCnpj(cpf_cnpj)) {
        exibirErroModal("CPF/CNPJ inválido!");
        return;
    }

    // Exibe modal após validações
    openModalConfirmar();
});
const modalErro = document.getElementById('modal-error');
const modalErroText = document.getElementById('erro-text');
const btnFecharErro = document.getElementById('close-modal-erro');

// Botão "Salvar" do modal
document.getElementById('btn-modal-salvar').addEventListener('click', async function () {
    let telefone = document.getElementById('telefone').value.trim();
    let cpf_cnpj = document.getElementById('cpf_cnpj').value.trim();
    let cep = document.getElementById('cep').value.trim();

    // Remove campos escondidos antigos
    document.getElementById('telefone_limpo')?.remove();
    document.getElementById('cpf_cnpj_limpo')?.remove();
    document.getElementById('cep_limpo')?.remove();

    // Campos escondidos com valores sem máscara
    let inputTel = document.createElement('input');
    inputTel.type = 'hidden';
    inputTel.name = 'telefone';
    inputTel.id = 'telefone_limpo';
    inputTel.value = telefone.replace(/\D/g, '');

    let inputCpfCnpj = document.createElement('input');
    inputCpfCnpj.type = 'hidden';
    inputCpfCnpj.name = 'cpf_cnpj';
    inputCpfCnpj.id = 'cpf_cnpj_limpo';
    inputCpfCnpj.value = cpf_cnpj.replace(/\D/g, '');

    let inputCep = document.createElement('input');
    inputCep.type = 'hidden';
    inputCep.name = 'cep';
    inputCep.id = 'cep_limpo';
    inputCep.value = cep.replace(/\D/g, '');

    formulario.appendChild(inputTel);
    formulario.appendChild(inputCpfCnpj);
    formulario.appendChild(inputCep);

    let formData = new FormData(formulario);

    try {
        let dados_php = await fetch('../../../actions/cadastrar-parceiro.php', {
            method: 'POST',
            body: formData
        });

        let response = await dados_php.json();

        if (response.status == 200) {
            closeModalConfirmar();
            openModalSucesso();
            formulario.reset();
        } else {
            closeModalConfirmar();
            document.getElementById('erro-title').textContent = "Erro ao cadastrar";
            document.getElementById('erro-text').textContent = response.msg || "Houve um problema ao salvar os dados. Tente novamente mais tarde.";
            openModalError();
        }


    } catch (error) {
        closeModalConfirmar();
        document.getElementById('erro-title').textContent = "Erro inesperado";
        document.getElementById('erro-text').textContent = "Erro ao enviar os dados. Verifique a conexão ou contate o suporte.";
        console.error(error);
        openModalError();
    }

});

// Botão "Cancelar" do modal
document.getElementById('btn-modal-cancelar').addEventListener('click', function () {
    closeModalConfirmar();
});

// Máscaras
document.getElementById('telefone').addEventListener('input', function (e) {
    mascaraTelefone(this, e);
});
document.getElementById('cep').addEventListener('input', function (e) {
    mascaraCep(this, e);
});
document.getElementById('cpf_cnpj').addEventListener('input', function (e) {
    mascaraCpfCnpj(this, e);
});

function mascaraTelefone(input, e) {
    if (e.inputType === 'deleteContentBackward') return;
    let v = input.value.replace(/\D/g, '').substring(0, 11);
    if (v.length > 10)
        input.value = `(${v.substring(0, 2)}) ${v.substring(2, 7)}-${v.substring(7, 11)}`;
    else if (v.length > 5)
        input.value = `(${v.substring(0, 2)}) ${v.substring(2, 6)}-${v.substring(6, 10)}`;
    else if (v.length > 2)
        input.value = `(${v.substring(0, 2)}) ${v.substring(2)}`;
    else
        input.value = v;
}

function mascaraCep(input, e) {
    if (e.inputType === 'deleteContentBackward') return;
    let v = input.value.replace(/\D/g, '').substring(0, 8);
    input.value = v.length > 5 ? v.substring(0, 5) + '-' + v.substring(5) : v;
}

function mascaraCpfCnpj(input, e) {
    if (e.inputType === 'deleteContentBackward') return;
    let v = input.value.replace(/\D/g, '').substring(0, 14);
    if (v.length <= 11) {
        if (v.length > 9)
            input.value = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6, 9)}-${v.substring(9, 11)}`;
        else if (v.length > 6)
            input.value = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6)}`;
        else if (v.length > 3)
            input.value = `${v.substring(0, 3)}.${v.substring(3)}`;
        else
            input.value = v;
    } else {
        input.value = `${v.substring(0, 2)}.${v.substring(2, 5)}.${v.substring(5, 8)}/${v.substring(8, 12)}-${v.substring(12, 14)}`;
    }
}

// Validação CPF/CNPJ
function validarCpfCnpj(valor) {
    valor = valor.replace(/[^\d]+/g, '');
    if (valor.length === 11) {
        if (/^(\d)\1+$/.test(valor)) return false;
        let soma = 0;
        for (let i = 0; i < 9; i++) soma += parseInt(valor.charAt(i)) * (10 - i);
        let resto = (soma * 10) % 11;
        if (resto === 10) resto = 0;
        if (resto !== parseInt(valor.charAt(9))) return false;
        soma = 0;
        for (let i = 0; i < 10; i++) soma += parseInt(valor.charAt(i)) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10) resto = 0;
        if (resto !== parseInt(valor.charAt(10))) return false;
        return true;
    } else if (valor.length === 14) {
        if (/^(\d)\1+$/.test(valor)) return false;
        let tamanho = valor.length - 2;
        let numeros = valor.substring(0, tamanho);
        let digitos = valor.substring(tamanho);
        let soma = 0;
        let pos = tamanho - 7;
        for (let i = tamanho; i >= 1; i--) {
            soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
            if (pos < 2) pos = 9;
        }
        let resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado !== parseInt(digitos.charAt(0))) return false;
        tamanho++;
        numeros = valor.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (let i = tamanho; i >= 1; i--) {
            soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
            if (pos < 2) pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        return resultado === parseInt(digitos.charAt(1));
    }
    return false;
}

// Auto preencher com ViaCEP
document.getElementById('cep').addEventListener('blur', async function () {
    const cep = this.value.replace(/\D/g, '');
    if (cep.length === 8) {
        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();
            if (!data.erro) {
                document.getElementById('logradouro').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;
            } else {
                exibirErroModal("CEP não encontrado!");
            }
        } catch (error) {
            exibirErroModal("Erro ao buscar o endereço. Tente novamente.");
            console.error(error);
        }
    }
});

function openModalSucesso() {
    let modal = document.getElementById('modal-sucesso');
    if (modal) modal.showModal();
}

function closeModalSucesso() {
    let modal = document.getElementById('modal-sucesso');
    if (modal) modal.close();
}

function exibirErroModal(mensagem) {
    document.getElementById('erro-title').textContent = "Erro de validação";
    document.getElementById('erro-text').textContent = mensagem;
    openModalError();
}

function openModalError() {
    let modal = document.getElementById('modal-error');
    if (modal) modal.showModal();
}

function closeModalError() {
    let modal = document.getElementById('modal-error');
    if (modal) modal.close();
}

// --- FECHAR MODAL SUCESSO PELO "X" ---
document.getElementById('close-modal-sucesso').addEventListener('click', () => {
    closeModalSucesso();
});

document.getElementById('close-modal-confirmar').addEventListener('click', () => {
    closeModalConfirmar();
});

document.getElementById('close-modal-erro').addEventListener('click', () => {
    closeModalError();
});

// Preview da logo ao selecionar imagem
document.getElementById('logo').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('preview-logo');

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}); 
