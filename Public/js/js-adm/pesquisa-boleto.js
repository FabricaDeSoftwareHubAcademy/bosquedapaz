const searchInput = document.getElementById('filtro_expositor');
const tableBody = document.querySelector('#dataTable tbody');

// função para carregar via AJAX
function carregarResultados(searchTerm = '') {
    fetch('../../../app/adm/Controller/Boleto.php?pesquisa=' + encodeURIComponent(searchTerm))
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = ''; // limpa

            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="3">Nenhum resultado</td></tr>';
                return;
            }

            data.forEach(item => {
                const row = `
                            <tr>
                                <td>${item.nome_expositor}</td>
                                <td>${item.vencimento}</td>
                                <td>${item.referencia}</td>
                                <td>${item.valor}</td>
                                <td>${item.situacao}</td>
                            </tr>
                        `;
                tableBody.innerHTML += row;
            });
        });
}

// adiciona listener no input
searchInput.addEventListener('input', () => {
    const valor = searchInput.value;
    carregarResultados(valor); // busca ao digitar
});