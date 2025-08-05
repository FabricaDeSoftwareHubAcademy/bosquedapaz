document.addEventListener('DOMContentLoaded', () => {
    const btnLupa = document.getElementById('lupa');
    const inputNome = document.getElementById('pesquisar-nome');
    const campoNome = document.getElementById('nome-exp');
    const campoCpf = document.getElementById('cnpj-cpf');

    if (btnLupa) {
        btnLupa.addEventListener('click', async () => {
            const nome = inputNome.value.trim();

            if (nome === '') {
                abrirModalErro("Digite um nome para pesquisar.");
                return;
            }

            try {
                const resposta = await fetch("../../../actions/action-procurar-expositor-boleto.php", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ "pesquisar-nome": nome })
                });

                const dados = await resposta.json();

                if (dados.status === 'ok') {
                    campoNome.value = dados.expositor.nome || '';
                    campoCpf.value = dados.expositor.cpf || '';
                    console.log("Expositor encontrado:", dados.expositor);
                } else {
                    abrirModalErro(dados.mensagem || "Expositor não encontrado.");
                }

            } catch (erro) {
                console.error("Erro ao buscar expositor:", erro);
                abrirModalErro("Erro ao buscar expositor.");
            }
        });
    } else {
        console.error("Botão de busca não encontrado.");
    }
});
