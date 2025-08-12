let botaoNovaAtracao = document.getElementById('nova-atracao');

document.addEventListener('DOMContentLoaded', async function () {
    const tabelaAtracoes = document.getElementById('lista-atrações');
    const params = new URLSearchParams(window.location.search);
    const id_evento = params.get('id_evento');
    const nome_evento = params.get('nome_evento');
    const inputBuscar = document.getElementById('busca');

    if (nome_evento) {
        const titulo = document.getElementById('titulo-atracoes');
        titulo.textContent = `Gerenciar Atrações - Evento: ${nome_evento}`;
    }

    if (!id_evento) {
        tabelaAtracoes.innerHTML = '<tr><td colspan="4">ID do evento não encontrado.</td></tr>';
        return;
    }

    async function carregarEventos(termo = '') {
        try {
            const response = await fetch(`../../../actions/action-listar-atracao.php?termo=${encodeURIComponent(termo)}&id_evento=${encodeURIComponent(id_evento)}`);
            const data = await response.json();

            tabelaAtracoes.innerHTML = '';

            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }



            if (data.status === 'success') {
                const atracoes = data.dados;

                if (atracoes.length === 0) {
                    tabelaAtracoes.innerHTML = '<tr><td colspan="4">Nenhuma atração cadastrada ainda.</td></tr>';
                    return;
                }



                atracoes.forEach(atracao => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <td>${atracao.nome_atracao}</td>
                        <td class="fone-col">
                            <a href="editar-atracao.php?id_atracao=${atracao.id_atracao}&id_evento=${id_evento}&nome_evento=${encodeURIComponent(nome_evento)}" class="btn-editar">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <span class="${atracao.status == 1 ? 'status-ativo' : 'status-inativo'}">
                                ${atracao.status == 1 ? 'Ativo' : 'Inativo'}
                            </span>
                        </td>
                    `;

                    tabelaAtracoes.appendChild(tr);
                });

            } else {
                tabelaAtracoes.innerHTML = '<tr><td colspan="4">Erro ao carregar atrações.</td></tr>';
            }

        } catch (error) {
            console.error('Erro na requisição:', error);
            tabelaAtracoes.innerHTML = '<tr><td colspan="4">Erro ao buscar atrações.</td></tr>';
        }
    }
    inputBuscar.addEventListener('keyup', async function () {
        const termo = this.value.trim();
        await carregarEventos(termo);
    });

    await carregarEventos(); 
});

   
botaoNovaAtracao.addEventListener('click', async () => {
    const params = new URLSearchParams(window.location.search);
    let id_evento = params.get('id_evento');
    let nome_evento = params.get('nome_evento');
    console.log('clicked');

    if (id_evento) {
        window.location.href = `cadastrar-atracao.php?id_evento=${id_evento}&nome_evento=${encodeURIComponent(nome_evento)}`;
    } else {
        alert("Não foi possível identificar o evento. Volte e selecione novamente.");
    }
});