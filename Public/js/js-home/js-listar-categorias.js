async function carregarCategorias() {
    try {
      const response = await fetch('../../../actions/action-listar-categoria.php');
      const categorias = await response.json();
      const container = document.getElementById('categorias');
      container.innerHTML = ''; // limpa antes de inserir
  
      categorias.dados.forEach(categoria => {
        const caminhoIcone = `../../../Public/${categoria.icone}`;
  
        const itemHTML = `
          <a href="todos-expositores.php#${categoria.descricao.toLowerCase()}" class="link-cat-expo">
            <div class="item">
              <div class="img-fundo ${categoria.descricao.toLowerCase()}">
                <img src="${caminhoIcone}" alt="Ícone ${categoria.descricao}" class="img-categoria"></img>
              </div>
              <p class="name-categoria">${categoria.descricao.toUpperCase()}</p>
            </div>
          </a>
        `;
  
        container.insertAdjacentHTML('beforeend', itemHTML);
      });
    } catch (error) {
      console.error('Erro ao carregar categorias:', error);
    }
  }
  
  carregarCategorias();