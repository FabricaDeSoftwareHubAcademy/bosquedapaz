document.addEventListener('DOMContentLoaded', async () => {
    const listaCategorias = document.getElementById('lista-categoria');

    await carregarCategorias();

    async function carregarCategorias() {
        try {
            const response = await fetch('../../../actions/action-listar-categoria.php');

            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }

            const data = await response.json();

            if (data.status === 'success') {
                const categorias = data.dados;

                listaCategorias.innerHTML = '';

                categorias.forEach(cat => {
                    const div = document.createElement('div');
                    div.classList.add('item');

                    div.innerHTML = `
                        <div style="background-color: ${sanitize(cat.cor)};" class="bolota">
                            <img src="../../../Public/${sanitize(cat.icone)}" alt="Ícone da categoria ${sanitize(cat.descricao)}" class="icon-item">
                        </div>
                        <p class="nome-cat">${sanitize(cat.descricao)}</p>
                    `;

                    listaCategorias.appendChild(div);
                });

                adicionarBotaoNovaCategoria();

            } else {
                listaCategorias.innerHTML = '<p>❌ Erro ao carregar categorias.</p>';
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            listaCategorias.innerHTML = '<p>❌ Erro ao buscar dados.</p>';
        }
    }

    function adicionarBotaoNovaCategoria() {
        const botaoNovaCategoria = document.createElement('div');
        botaoNovaCategoria.className = 'item open-modal';
        botaoNovaCategoria.dataset.modal = 'cadastro-categoria';
        botaoNovaCategoria.innerHTML = `
        <div class="bolota" id="b10">
            <img src="../../../Public/assets/icons/icones-categorias/Circulo-mais.png" alt="Adicionar nova categoria" class="icon-item">
        </div>
        <p class="nome-cat">Nova Categoria</p>
    `;
        listaCategorias.appendChild(botaoNovaCategoria);

        const modalCadastro = document.getElementById("cadastro-categoria");
        botaoNovaCategoria.addEventListener("click", function (event) {
            event.preventDefault();
            modalCadastro?.showModal();
        });
    }

    document.addEventListener("click", function (event) {
        if (event.target.closest(".open-modal")) {
            const modalCadastro = document.getElementById("cadastro-categoria");
            modalCadastro?.showModal();
        }
    });


    function sanitize(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
});