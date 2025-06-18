document.querySelector('.formulario-filtragem-de-data').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const resposta = await fetch('../../../actions/actions-boletos/action-filtrar-data.php', {
        method: 'POST',
        body: formData
    });

    const data = await resposta.json();
    const tbody = document.querySelector('.tbody-tabela-de-dados');
    tbody.innerHTML = ''; // limpa antes de inserir novos

    if (data.length > 0) {
        data.forEach(boleto => {
            const row = `
                <tr class="tr-tabela-de-dados">
                    <td class="td-tabela-de-dados">${boleto.nome}</td>
                    <td class="td-tabela-de-dados">${boleto.vencimento}</td>
                    <td class="td-tabela-de-dados">${boleto.mes_referencia}</td>
                    <td class="td-tabela-de-dados">R$ ${parseFloat(boleto.valor).toFixed(2)}</td>
                    <td class="td-tabela-de-dados">${boleto.status_exp}</td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    } else {
        tbody.innerHTML = `
            <tr class="tr-tabela-de-dados">
                <td class="td-tabela-de-dados" colspan="5">Nenhum boleto encontrado.</td>
            </tr>
        `;
    }
});