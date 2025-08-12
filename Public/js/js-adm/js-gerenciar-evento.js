document.addEventListener('DOMContentLoaded', async function () {
    const tabelaEventos = document.getElementById('lista-eventos');
    const inputBuscar = document.getElementById('buscar');

    function sanitize(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function formatarDataBR(dataISO) {
        if (!dataISO) return '';
        const [ano, mes, dia] = dataISO.split('-');
        return `${dia}/${mes}/${ano}`;
    }

    async function carregarEventos(termo = '') {
        try {
            const response = await fetch(`../../../actions/action-listar-evento.php?termo=${encodeURIComponent(termo)}`);
            const data = await response.json();

            tabelaEventos.innerHTML = '';

            if (data.status === 'success') {
                if (data.dados.length === 0) {
                    tabelaEventos.innerHTML = '<tr><td colspan="6">Nenhum evento encontrado.</td></tr>';
                    return;
                }

                data.dados.forEach(evento => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <td class="nome-evento">${evento.nome_evento}</td>
                        <td>${sanitize(formatarDataBR(evento.data_evento))}</td>
                        <td>
                            <span class="${evento.status == 1 ? 'status-ativo' : 'status-inativo'}">
                                ${evento.status == 1 ? 'Em Curso' : 'Finalizado'}
                            </span>
                        </td>
                        <td class="fone-col">
                            <a href="editar-evento.php?id=${evento.id_evento}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td class="mais">
                            <a href="gerenciar-atracao.php?id_evento=${evento.id_evento}&nome_evento=${encodeURIComponent(evento.nome_evento)}">
                                <i class="fa-solid fa-list"></i>
                            </a>
                        </td>
                        <td class="mais">
                            <a href="cadastrar-fotos-evento.php?id=${evento.id_evento}">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </td>
                    `;

                    tabelaEventos.appendChild(tr);
                });

            } else {
                tabelaEventos.innerHTML = '<tr><td colspan="6">Erro ao carregar eventos.</td></tr>';
            }

        } catch (error) {
            console.error('Erro na requisição:', error);
            tabelaEventos.innerHTML = '<tr><td colspan="6">Erro na requisição dos dados.</td></tr>';
        }
    }

    // Input de busca (ao digitar)
    inputBuscar.addEventListener('keyup', async function () {
        const termo = this.value.trim();
        await carregarEventos(termo);
    });

    await carregarEventos(); // chamada inicial
});

document.getElementById('btns-salvar-cancelar').style.display = 'none'