document.addEventListener('DOMContentLoaded', () => {
    // Referências para os elementos do modal e do formulário
    const dialog = document.getElementById('cadastro-categoria');
    const form = document.getElementById('form_categoria');

    if (!dialog || !form) {
        console.error('O dialog de edição ou o formulário não foram encontrados no HTML.');
        return;
    }

    // --- LÓGICA PARA ABRIR E PREENCHER O MODAL ---

    // Adiciona um 'ouvinte' de clique em todos os botões/ícones de edição
    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', async (e) => {
            e.preventDefault(); // Impede que o link navegue para href="#"

            // Pega o ID da categoria guardado no atributo data-id
            const id = button.dataset.id;
            if (!id) {
                alert('Não foi possível encontrar o ID da categoria.');
                return;
            }

            try {
                // Busca os dados da categoria específica no backend
                const response = await fetch(`../../../actions/action-buscar-categoria.php?id=${id}`);
                const data = await response.json();

                if (data.status === 'success' && data.categoria) {
                    const categoria = data.categoria;

                    // Preenche os campos do formulário DENTRO do dialog
                    form.querySelector('#id_categoria').value = categoria.id_categoria;
                    form.querySelector('#descricao').value = categoria.descricao;

                    // Preenche o campo de cor oculto e atualiza a pré-visualização
                    const corInput = form.querySelector('#corInput');
                    const selectedColorDiv = form.querySelector('#selectedColor');
                    const selectedTextSpan = form.querySelector('#selectedText');

                    corInput.value = categoria.cor;
                    selectedColorDiv.style.backgroundColor = categoria.cor;
                    selectedTextSpan.textContent = `Cor selecionada`; // Atualiza o texto

                    // Finalmente, abre o dialog
                    dialog.showModal();

                } else {
                    alert('Erro ao buscar os dados da categoria: ' + (data.mensagem || 'Categoria não encontrada.'));
                }

            } catch (error) {
                console.error('Erro na requisição para buscar categoria:', error);
                alert('Ocorreu um erro de comunicação ao buscar os dados.');
            }
        });
    });
    const selected = document.querySelector(".select-selected");
    const selectedText = document.getElementById("selectedText");
    const selectedColor = document.getElementById("selectedColor");
    const items = document.querySelector(".select-items");

    selected?.addEventListener("click", () => {
        if (items) {
            items.style.display = items.style.display === "block" ? "none" : "block";
        }
    });

    document.querySelectorAll(".select-items div").forEach(item => {
        item.addEventListener("click", function () {
            if (selectedText && selectedColor) {
                selectedText.textContent = this.textContent.trim();
                selectedColor.style.backgroundColor = this.dataset.value;
                document.getElementById("corInput").value = this.dataset.value;
            }
            if (items) {
                items.style.display = "none";
            }
        });
    });

    // --- LÓGICA PARA ENVIAR O FORMULÁRIO DE EDIÇÃO ---

    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Impede o envio padrão do formulário

        const formData = new FormData(form);

        try {
            // Envia os dados atualizados para o script de edição no backend
            const response = await fetch('../../../actions/action-editar-categoria.php', {
                method: 'POST',
                body: formData
            });

            // É sempre bom verificar a resposta como texto primeiro para depurar
            const responseText = await response.text();
            console.log('Resposta bruta do servidor:', responseText);

            const data = JSON.parse(responseText);

            if (data.status === 'success') {
                alert(data.message || 'Categoria atualizada com sucesso!');
                dialog.close(); // Fecha o modal
                window.location.reload(); // Recarrega a página para mostrar os dados atualizados
            } else {
                alert('Falha ao atualizar: ' + (data.message || 'Ocorreu um erro desconhecido.'));
            }

        } catch (error) {
            console.error('Erro ao enviar o formulário de edição:', error);
            alert('Ocorreu um erro de comunicação ao salvar as alterações.');
        }
    });

    // --- LÓGICA PARA FECHAR O MODAL ---

    // Adiciona evento para os botões de fechar/cancelar
    dialog.querySelectorAll('.close-modal, .cancelar').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            dialog.close();
        });
    });


    // CODIGO PARA BUSCAR CATEGORIA

    const INPUT_BUSCA = document.getElementById('input-busca');
    const TABELA_CATEGORIAS = document.getElementById('tabela-categoria');

    INPUT_BUSCA.addEventListener('keyup', () => {
        let expressao = INPUT_BUSCA.value.toLowerCase();

        if (expressao.length === 1) {
            return;
        }

        let linhas = TABELA_CATEGORIAS.getElementsByTagName('tr');

        for (let posicao in linhas) {
            if (true === isNaN(posicao)) {
                continue;
            }

            let conteudoDaLinha = linhas[posicao].innerHTML.toLowerCase();

            if (true === conteudoDaLinha.includes(expressao)) {
                linhas[posicao].style.display = '';
            } else {
                linhas[posicao].style.display = 'none';
            }
        }
    });
});