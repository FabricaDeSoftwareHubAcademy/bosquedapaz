document.addEventListener("DOMContentLoaded", () => {
    const selectStatus = document.getElementById("campo-filtragem-de-status");
    const tbody = document.querySelector(".tbody-tabela-de-dados");

    function buscarBoletosPorStatus(status = "") {
        fetch("../../../actions/actions-boletos/action-filtrar-status.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `status=${encodeURIComponent(status)}`
        })
        .then(res => res.json())
        .then(data => {
            tbody.innerHTML = "";

            if (data.length === 0) {
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
            console.error("Erro ao buscar por status:", error);
            tbody.innerHTML = `<tr><td colspan="5">Erro ao carregar dados.</td></tr>`;
        });
    }

    selectStatus.addEventListener("change", () => {
        const status = selectStatus.value;
        buscarBoletosPorStatus(status);
    });

    buscarBoletosPorStatus(); 
});
