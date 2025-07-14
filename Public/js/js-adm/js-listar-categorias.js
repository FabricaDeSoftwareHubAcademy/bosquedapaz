document.addEventListener('DOMContentLoaded', () => {
    const tabelaCategoria = document.getElementById('tabela-categoria');
    const inputBusca = document.getElementById('input-busca');
    const formBusca = document.querySelector('form');
    const dialog = document.getElementById('cadastro-categoria');

    carregarCategorias();

    // 🔍 Filtrar categorias
    formBusca.addEventListener('submit', function (e) {
        e.preventDefault();
        const termo = inputBusca.value.trim().toLowerCase();
        filtrarTabela(termo);
    });

    async function carregarCategorias() {
        try {
            const response = await fetch('../../../actions/action-listar-categoria.php');
            if (!response.ok) throw new Error('Erro na requisição');

            const data = await response.json();

            if (data.status === 'success') {
                renderizarTabela(data.dados);
                aplicarEventosBotoes(); // Aplica eventos depois de gerar a tabela
            } else {
                tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro ao carregar categorias</td></tr>`;
            }
        } catch (error) {
            console.error('Erro:', error);
            tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro ao carregar categorias</td></tr>`;
        }
    }

function renderizarTabela(categorias) {
    tabelaCategoria.innerHTML = '';

    if (categorias.length === 0) {
        tabelaCategoria.innerHTML = `<tr><td colspan="4">Nenhuma categoria encontrada</td></tr>`;
        return;
    }

    categorias.forEach(cat => {
        const status = (cat.status_cat || '').trim().toLowerCase(); 
        const statusClass = status === 'ativo' ? 'active' : 'inactive';
        const statusLabel = status === 'ativo' ? 'Ativo' : 'Inativo';

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="usuario-col">${cat.id_categoria}</td>
            <td>${sanitize(cat.descricao)}</td>
            <td>
                <button class="status ${statusClass}">${statusLabel}</button>
            </td>
            <td>
                <a href="#"
                    class="edit-icon open-modal"
                    data-id="${cat.id_categoria}"
                    data-nome="${sanitize(cat.descricao)}"
                    data-cor="${sanitize(cat.cor)}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
        `;
        tabelaCategoria.appendChild(tr);
    });
}



    function filtrarTabela(termo) {
        const linhas = tabelaCategoria.querySelectorAll('tr');
        linhas.forEach(linha => {
            const nome = linha.children[1].textContent.toLowerCase();
            if (nome.includes(termo)) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    }

    function aplicarEventosBotoes() {
        const botoesEditar = document.querySelectorAll('.open-modal');

        botoesEditar.forEach(botao => {
            botao.addEventListener('click', (e) => {
                e.preventDefault();

                const id = botao.dataset.id;
                const nome = botao.dataset.nome;
                const cor = botao.dataset.cor;

                // Preenche os campos do dialog
                document.getElementById('id_categoria').value = id;
                document.getElementById('descricao').value = nome;
                document.getElementById('corInput').value = cor;
                document.getElementById('selectedColor').style.backgroundColor = cor;
                document.getElementById('selectedText').textContent = cor;

                // Abre o dialog
                dialog.showModal();
            });
        });

        // Botões de fechar modal
        document.querySelectorAll('.close-modal').forEach(botao => {
            botao.addEventListener('click', (e) => {
                e.preventDefault();
                dialog.close();
            });
        });
    }

    function sanitize(str) {
        const temp = document.createElement('div');
        temp.textContent = str;
        return temp.innerHTML;
    }
});
