document.addEventListener('DOMContentLoaded', async () => {
  const tbody = document.getElementById('tbody-artistas');
  const inputPesquisa = document.getElementById('status');
  let artistas = [];

  // Função para formatar telefone
  function formatarTelefone(numero) {
    if (!numero) return '';
    const cleaned = numero.replace(/\D/g, '');
    if (cleaned.length === 11) {
      return `(${cleaned.slice(0, 2)}) ${cleaned.slice(2, 7)}-${cleaned.slice(7)}`;
    } else if (cleaned.length === 10) {
      return `(${cleaned.slice(0, 2)}) ${cleaned.slice(2, 6)}-${cleaned.slice(6)}`;
    }
    return numero;
  }

  // Função para montar a tabela
  function renderizarTabela(lista) {
    let html = '';
    if (Array.isArray(lista) && lista.length > 0) {
      lista.forEach(artista => {
        const statusClasse = artista.status === 'ativo' ? 'active' : 'inactive';
        const statusTexto = artista.status === 'ativo' ? 'Ativo' : 'Inativo';

        html += `
          <tr>
            <td>${artista.nome}</td>
            <td class="email-col">${artista.email || ''}</td>
            <td class="fone-col">${formatarTelefone(artista.telefone)}</td>
            <td class="barraca-col">${artista.linguagem_artistica}</td>
            <td class="barraca-col">R$ ${parseFloat(artista.valor_cache).toFixed(2)}</td>
            <td>${artista.tempo_apresentacao || ''}</td>
            <td>
              <button class="status ${statusClasse}" data-id="${artista.id_artista}">
                ${statusTexto}
              </button>
            </td>
          </tr>
        `;
      });
    } else {
      html = `<tr><td colspan="7">Nenhum artista encontrado.</td></tr>`;
    }
    tbody.innerHTML = html;
  }

  // Requisição inicial para listar artistas
  try {
    const response = await fetch('../../../actions/action-listar-artista.php');
    artistas = await response.json();
    renderizarTabela(artistas);
  } catch (error) {
    console.error('Erro ao carregar artistas:', error);
    tbody.innerHTML = `<tr><td colspan="7">Erro ao carregar artistas.</td></tr>`;
  }

  // Filtro ao digitar
  inputPesquisa.addEventListener('input', () => {
    const termo = inputPesquisa.value.toLowerCase();
    const filtrados = artistas.filter(artista =>
      artista.nome.toLowerCase().includes(termo) ||
      (artista.email && artista.email.toLowerCase().includes(termo)) ||
      artista.linguagem_artistica.toLowerCase().includes(termo)
    );
    renderizarTabela(filtrados);
  });

  // Atualizar status (ativar/inativar)
  tbody.addEventListener('click', async (e) => {
    if (e.target.classList.contains('status')) {
      const botao = e.target;
      const id = botao.getAttribute('data-id');
      const statusAtual = botao.classList.contains('active') ? 'ativo' : 'inativo';
      const novoStatus = statusAtual === 'ativo' ? 'inativo' : 'ativo';

      try {
        const response = await fetch('../../../actions/action-listar-artista.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            id_artista: id,
            novo_status: novoStatus
          })
        });

        const resultado = await response.json();

        if (resultado.success) {
          const artistaEditado = artistas.find(a => a.id_artista == id);
          if (artistaEditado) artistaEditado.status = resultado.novo_status;
          renderizarTabela(artistas);
        } else {
          console.error('Erro ao atualizar status:', resultado.error);
        }
      } catch (err) {
        console.error('Erro na requisição:', err);
      }
    }
  });
});
