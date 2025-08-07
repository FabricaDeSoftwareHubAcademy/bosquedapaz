document.addEventListener("DOMContentLoaded", function () {
    const nomeInput = document.getElementById("nome-exp");
    const cpfInput = document.getElementById("cnpj-cpf");
    const idExpositorInput = document.getElementById("id_expositor");

    if (!nomeInput || !cpfInput || !idExpositorInput) {
        console.warn("Algum dos elementos de input não foi encontrado.");
        return;
    }

    // Máscara para CPF
    $(cpfInput).mask('000.000.000-00', { reverse: true });

    // Validação simples de CPF ao sair do campo
    cpfInput.addEventListener("blur", function () {
        const cpf = cpfInput.value.replace(/\D/g, '');
        if (cpf && !validarCPF(cpf)) {
            cpfInput.setCustomValidity("CPF inválido!");
            cpfInput.reportValidity();
        } else {
            cpfInput.setCustomValidity(""); // válido
        }
    });

    // Função de validação básica de CPF
    function validarCPF(cpf) {
        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

        let soma = 0;
        for (let i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        let resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(9))) return false;

        soma = 0;
        for (let i = 0; i < 10; i++) {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(10))) return false;

        return true;
    }

    // Exemplo de função para preenchimento via AJAX (chamada por outro JS)
    window.preencherDadosExpositor = function (dadosExpositor) {
        nomeInput.value = dadosExpositor.nome;
        cpfInput.value = dadosExpositor.cpf || '';
        idExpositorInput.value = dadosExpositor.id;
    };
});
