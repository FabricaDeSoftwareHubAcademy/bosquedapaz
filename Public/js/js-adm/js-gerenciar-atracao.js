document.addEventListener('DOMContentLoaded', async () => {
    const tabelaAtracoes = document.getElementById('lista-atrações');
    const params = new URLSearchParams(window.location.search);
    const id_evento = params.get('id_evento');
    const nome_evento = params.get('nome_evento');


    if (nome_evento) {
        const titulo = document.getElementById('titulo-atracoes');
        titulo.textContent = `Gerenciar Atrações - ${nome_evento}`;
    }

    if (!id_evento) {
        tabelaAtracoes.innerHTML = '<tr><td colspan="4">ID do evento não encontrado.</td></tr>';
        return;
    }

    try {
        const response = await fetch(`../../../actions/action-listar-atracao.php?id_evento=${id_evento}`);

        if (!response.ok) {
            throw new Error(`Erro HTTP: ${response.status}`);
        }

        const data = await response.json();

        if (data.status === 'success') {
            const atracoes = data.dados;

            if (atracoes.length === 0) {
                tabelaAtracoes.innerHTML = '<tr><td colspan="4">Nenhuma atração cadastrada ainda.</td></tr>';
                return;
            }

            tabelaAtracoes.innerHTML = ''; // Limpa o conteúdo anterior

            atracoes.forEach(atracao => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <td>${sanitize(atracao.nome_atracao)}</td>
                    <td>
                        <a href="editar-atracao.php?id_atracao=${atracao.id_atracao}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        ${atracao.foto
                            ? `<img src="../../../uploads/atracoes/${atracao.foto}" alt="Foto da atração" style="width: 50px; height: 50px; object-fit: cover;">`
                            : 'Sem imagem'}
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

    function sanitize(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    const botaoNovaAtracao = document.getElementById('nova-atracao');
    
    if (botaoNovaAtracao) {
        botaoNovaAtracao.addEventListener('click', () => {
            if (id_evento && nome_evento) {
                window.location.href = `cadastrar-atracao.php?id_evento=${id_evento}&nome_evento=${encodeURIComponent(nome_evento)}`;
            } else {
                alert("Não foi possível identificar o evento. Volte e selecione novamente.");
            }
        });
    }
});