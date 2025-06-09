// Seleciona o input e o tbody da tabela
const inputNome = document.getElementById('input-filtragem-de-nome');
const tbody = document.querySelector('.tbody-tabela-de-dados');

function preencherTabela(dados) {
    tbody.innerHTML = '';

    if (!Array.isArray(dados) || dados.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="td-tabela-de-dados">Nenhum resultado encontrado</td></tr>';
        return;
    }

    dados.forEach(item => {
        const tr = document.createElement('tr');

        const status = item.status_exp || '';
        const statusClass = status.toLowerCase() === 'ativo' 
            ? 'status-pago' 
            : 'status-pendente';

        const statusBtn = `<button class="botao-status ${statusClass}">${status}</button>`;

        tr.innerHTML = `
            <td class="td-tabela-de-dados">${item.nome || ''}</td>
            <td class="td-tabela-de-dados">${item.vencimento || ''}</td>
            <td class="td-tabela-de-dados">${item.mes_referencia || ''}</td>
            <td class="td-tabela-de-dados">${item.valor || ''}</td>
            <td class="td-tabela-de-dados">${statusBtn}</td>
        `;

        tbody.appendChild(tr);
    });
}

function buscarDados(nome = '') {
    const url = `../../../actions/actions-boletos/action-filtrar-nome.php?nome=${encodeURIComponent(nome)}`;

    fetch(url)
        .then(response => response.json())
        .then(dados => {
            preencherTabela(dados);
        })
        .catch(error => {
            console.error('Erro na busca:', error);
            tbody.innerHTML = '<tr><td colspan="5" class="td-tabela-de-dados">Erro ao buscar dados</td></tr>';
        });
}

inputNome.addEventListener('input', () => {
    const nome = inputNome.value.trim();
    buscarDados(nome);
});

window.addEventListener('DOMContentLoaded', () => {
    buscarDados();
});
