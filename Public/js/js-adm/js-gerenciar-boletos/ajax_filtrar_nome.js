document.addEventListener("DOMContentLoaded", () => {
    const inputNome = document.getElementById("input-filtragem-de-nome");
    const tbody = document.querySelector(".tbody-tabela-de-dados");

    function buscarBoletos(nome = "") {
        fetch("../../../actions/actions-boletos/action-filtrar-nome.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `nome=${encodeURIComponent(nome)}`
        })
        .then(res => {
            if (!res.ok) throw new Error(`deu erro ai. status: ${res.status}`);
            return res.json();
        })
        .then(data => {
            tbody.innerHTML = "";
            if (!Array.isArray(data) || data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5">Nenhum boleto encontrado.</td></tr>`;
                return;
            }

            data.forEach(boleto => {
                const row = `
                    <tr class = "tr-tabela-de-dados">
                        <td class = "td-tabela-de-dados">${boleto.nome}</td>
                        <td class = "td-tabela-de-dados">${boleto.vencimento}</td>
                        <td class = "td-tabela-de-dados">${boleto.mes_referencia}</td>
                        <td class = "td-tabela-de-dados">R$ ${parseFloat(boleto.valor).toFixed(2)}</td>
                        <td class = "td-tabela-de-dados">${boleto.status_exp}</td>
                    </tr class = "tr-tabela-de-dados">
                `;
                tbody.innerHTML += row;
            });
        })
        .catch(error => {
            console.error("Erro ao buscar boletos:", error);
            tbody.innerHTML = `<tr><td colspan="5">Erro ao carregar dados.</td></tr>`;
        });
    }

    inputNome.addEventListener("input", () => {
        const nome = inputNome.value.trim();
        buscarBoletos(nome);
    });

    buscarBoletos();
});
