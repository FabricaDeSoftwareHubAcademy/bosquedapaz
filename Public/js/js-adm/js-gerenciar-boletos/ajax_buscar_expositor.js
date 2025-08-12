document.addEventListener("DOMContentLoaded", () => {
    const inputNome = document.getElementById("pesquisar-nome");
    const botaoBuscar = document.querySelector("#lupa");

    if (!inputNome) {
        console.error("Campo de pesquisa 'pesquisar-nome' não encontrado no DOM.");
        return;
    }

    const sugestoesContainer = document.getElementById("sugestoes-expositor");
    if (!sugestoesContainer) {
        console.error("Container de sugestões 'sugestoes-expositor' não encontrado no DOM.");
        return;
    }

    inputNome.addEventListener("input", () => {
        const nome = inputNome.value.trim();

        if (nome.length < 2) {
            sugestoesContainer.style.display = "none";
            sugestoesContainer.innerHTML = "";
            return;
        }

        fetch("../../../actions/action-procurar-expositor-boleto.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ "pesquisar-nome": nome, "modo": "sugestoes" })
        })
            .then(res => res.json())
            .then(data => {
                sugestoesContainer.innerHTML = "";

                if (data.status === "ok" && Array.isArray(data.expositores) && data.expositores.length > 0) {
                    data.expositores.forEach(expositor => {
                        const item = document.createElement("div");
                        item.textContent = expositor.nome;
                        item.classList.add("sugestao-item");

                        item.addEventListener("click", () => {
                            inputNome.value = expositor.nome;
                            sugestoesContainer.style.display = "none";
                        });

                        sugestoesContainer.appendChild(item);
                    });
                    sugestoesContainer.style.display = "block";
                } else {
                    sugestoesContainer.style.display = "none";
                }
            })
            .catch(err => {
                console.error("Erro ao buscar sugestões:", err);
                sugestoesContainer.style.display = "none";
            });
    });

    botaoBuscar.addEventListener("click", (e) => {
        e.preventDefault();
        const nome = inputNome.value.trim();
        buscarExpositor(nome);
    });

    function buscarExpositor(nome) {
        fetch("../../../actions/action-procurar-expositor-boleto.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ "pesquisar-nome": nome })
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === "ok") {
                    preencherDadosExpositor(data.expositor);
                } else {
                    alert(data.mensagem);
                }
            })
            .catch(err => {
                console.error("Erro ao buscar expositor:", err);
                alert("Erro ao buscar expositor.");
            });
    }

    function preencherDadosExpositor(expositor) {
        document.getElementById("nome-exp").value = expositor.nome;
        document.getElementById("cnpj-cpf").value = expositor.cpf;

        const inputsHidden = document.querySelectorAll("input[name='id-expositor']");
        inputsHidden.forEach(input => {
            input.value = expositor.id;
        });
    }

    const vencimentoInput = document.getElementById("vencimento_input");
    const referenciaInput = document.getElementById("referencia_input");

    if (vencimentoInput && referenciaInput) {
        vencimentoInput.addEventListener("change", () => {
            const dataVenc = vencimentoInput.value;
            if (!dataVenc) {
                referenciaInput.value = "";
                return;
            }

            const meses = [
                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
            ];

            const mesNumero = new Date(dataVenc).getMonth();
            referenciaInput.value = meses[mesNumero];
        });
    }

});
