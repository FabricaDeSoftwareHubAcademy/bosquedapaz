let btn_cadastrar = document.getElementById("botao_cadastrar");

btn_cadastrar.addEventListener('click', async function(event){
    event.preventDefault();
    let formulario = document.getElementById("form_cadastrar_parceiro");

    let telefone = document.getElementById('telefone').value.trim();
    let email = document.getElementById('email').value.trim();
    let tipo = document.getElementById('tipo').value;
    let cpf_cnpj = document.getElementById('cpf_cnpj').value.trim();
    let cep = document.getElementById('cep').value.trim();

    const telefoneRegex = /^\(\d{2}\)\s?\d{4,5}-\d{4}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const cepRegex = /^\d{5}-\d{3}$/;

    if(!telefoneRegex.test(telefone)){
        alert("Telefone inválido! Formato esperado: (99) 99999-9999");
        return;
    }

    if(!emailRegex.test(email)){
        alert("E-mail inválido!");
        return;
    }

    if(!cepRegex.test(cep)){
        alert("CEP inválido! Formato esperado: 99999-999");
        return;
    }

    if(tipo !== "fisica" && tipo !== "juridica"){
        alert("Selecione o tipo correto!");
        return;
    }

    if(!validarCpfCnpj(cpf_cnpj)){
        alert("CPF/CNPJ inválido!");
        return;
    }

    // Criar campos escondidos só com os números (sem máscara)
    document.getElementById('telefone_limpo')?.remove();
    document.getElementById('cpf_cnpj_limpo')?.remove();
    document.getElementById('cep_limpo')?.remove();

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

    let dados_php = await fetch('../../../actions/cadastrar-parceiro.php', {
        method: 'POST',
        body: formData
    });

    let response = await dados_php.json();

    if(response.status == 200){
        alert("Cadastrado com sucesso!");
        formulario.reset();
    } else {
        alert("Erro ao cadastrar!");
    }
});

// Máscara Telefone
function mascaraTelefone(input, e) {
    let key = e.inputType;
    if (key === 'deleteContentBackward') return;

    let v = input.value.replace(/\D/g, '').substring(0, 11);
    if (v.length > 10) {
        input.value = `(${v.substring(0,2)}) ${v.substring(2,7)}-${v.substring(7,11)}`;
    } else if (v.length > 5) {
        input.value = `(${v.substring(0,2)}) ${v.substring(2,6)}-${v.substring(6,10)}`;
    } else if (v.length > 2) {
        input.value = `(${v.substring(0,2)}) ${v.substring(2)}`;
    } else {
        input.value = v;
    }
}

// Máscara CEP
function mascaraCep(input, e) {
    let key = e.inputType;
    if (key === 'deleteContentBackward') return;

    let v = input.value.replace(/\D/g, '').substring(0,8);
    if (v.length > 5) {
        input.value = v.substring(0,5) + '-' + v.substring(5);
    } else {
        input.value = v;
    }
}

// Máscara CPF/CNPJ
function mascaraCpfCnpj(input, e) {
    let key = e.inputType;
    if (key === 'deleteContentBackward') return;

    let v = input.value.replace(/\D/g, '').substring(0,14);
    if (v.length <= 11) {
        if (v.length > 9)
            input.value = v.substring(0,3) + '.' + v.substring(3,6) + '.' + v.substring(6,9) + '-' + v.substring(9,11);
        else if (v.length > 6)
            input.value = v.substring(0,3) + '.' + v.substring(3,6) + '.' + v.substring(6);
        else if (v.length > 3)
            input.value = v.substring(0,3) + '.' + v.substring(3);
        else
            input.value = v;
    } else {
        input.value = v.substring(0,2) + '.' + v.substring(2,5) + '.' + v.substring(5,8) + '/' + v.substring(8,12) + '-' + v.substring(12,14);
    }
}

// Eventos das máscaras
document.getElementById('telefone').addEventListener('input', function(e){
    mascaraTelefone(this, e);
});
document.getElementById('cep').addEventListener('input', function(e){
    mascaraCep(this, e);
});
document.getElementById('cpf_cnpj').addEventListener('input', function(e){
    mascaraCpfCnpj(this, e);
});

// Validador CPF/CNPJ
function validarCpfCnpj(valor) {
    valor = valor.replace(/[^\d]+/g,'');

    if(valor.length === 11){
        if (/^(\d)\1+$/.test(valor)) return false;
        let soma = 0;
        for(let i=0; i<9; i++) soma += parseInt(valor.charAt(i)) * (10 - i);
        let resto = (soma * 10) % 11;
        if(resto === 10) resto = 0;
        if(resto !== parseInt(valor.charAt(9))) return false;

        soma = 0;
        for(let i=0; i<10; i++) soma += parseInt(valor.charAt(i)) * (11 - i);
        resto = (soma * 10) % 11;
        if(resto === 10) resto = 0;
        if(resto !== parseInt(valor.charAt(10))) return false;

        return true;

    } else if (valor.length === 14){
        if (/^(\d)\1+$/.test(valor)) return false;

        let tamanho = valor.length - 2;
        let numeros = valor.substring(0, tamanho);
        let digitos = valor.substring(tamanho);
        let soma = 0;
        let pos = tamanho - 7;

        for(let i = tamanho; i >= 1; i--) {
            soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
            if(pos < 2) pos = 9;
        }
        let resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if(resultado !== parseInt(digitos.charAt(0))) return false;

        tamanho = tamanho + 1;
        numeros = valor.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for(let i = tamanho; i >= 1; i--) {
            soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
            if(pos < 2) pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if(resultado !== parseInt(digitos.charAt(1))) return false;

        return true;
    }
    return false;
}
