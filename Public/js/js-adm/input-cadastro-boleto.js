// Atualiza texto do nome do arquivo
    document.getElementById("arquivo").addEventListener("change", function () {
        let fileName = this.files.length > 0 ? this.files[0].name : "Selecionar Arquivo em PDF";
        document.getElementById("file-text").textContent = fileName;
    });

    // Formata automaticamente CPF
    document.getElementById('cnpj-cpf').addEventListener('input', function (e) {
        mascaraCpfCnpj(this, e);
    });

    function mascaraCpfCnpj(input, e) {
        if (e.inputType === 'deleteContentBackward') return;
        let v = input.value.replace(/\D/g, '').substring(0, 11); // só até 11 dígitos
        if (v.length > 9)
            input.value = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6, 9)}-${v.substring(9, 11)}`;
        else if (v.length > 6)
            input.value = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6)}`;
        else if (v.length > 3)
            input.value = `${v.substring(0, 3)}.${v.substring(3)}`;
        else
            input.value = v;
    }

    // Envia só os números no CPF
    document.querySelector('form.form').addEventListener('submit', function () {
        const cpfField = document.getElementById('cnpj-cpf');
        cpfField.value = cpfField.value.replace(/\D/g, '');
    });

    // Validação de CPF
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
        }
        return false;
    }