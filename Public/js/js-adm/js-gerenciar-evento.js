document.addEventListener('DOMContentLoaded', function () {
    const tabelaEventos = document.getElementById('lista-eventos');

    fetch('../../../actions/action-listar-evento.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const eventos = data.dados;

                // Limpa o conteúdo atual da tabela
                tabelaEventos.innerHTML = '';

                eventos.forEach(event => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <td class="nome-evento">${sanitize(event.nome_evento)}</td>
                        <td>${sanitize(event.data_evento)}</td>
                        <td>
                            <span class="${event.status == 1 ? 'status-ativo' : 'status-inativo'}">
                                ${event.status == 1 ? 'Ativo' : 'Inativo'}
                            </span>
                        </td>
                        <td class="fone-col">
                            <a href="editar-evento.php?id=${event.id_evento}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="mais">
                            <a href="cadastrar-atracao.php?id_evento=${event.id_evento}">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </td>
                        <td class="mais">
                            <button class="open-modal" data-modal="modal-fotos">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </td>
                    `;

                    tabelaEventos.appendChild(tr);
                });

            } else {
                tabelaEventos.innerHTML = '<tr><td colspan="6">Erro ao carregar eventos.</td></tr>';
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            tabelaEventos.innerHTML = '<tr><td colspan="6">Erro na requisição dos dados.</td></tr>';
        });

    // Sanitize para evitar XSS
    function sanitize(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
});