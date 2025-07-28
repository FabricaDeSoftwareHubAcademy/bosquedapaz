document.addEventListener('DOMContentLoaded', async () => {
  const tbody = document.getElementById('tbody-artistas');
  const inputPesquisa = document.getElementById('status');
  const modalConfirmar = document.getElementById("modal-confirmar-status");
  const mensagemConfirmar = document.getElementById("mensagem-confirmar-status");
  const btnConfirmar = document.getElementById("btn-confirmar-status");
  const btnCancelar = document.getElementById("btn-cancelar-status");

  let artistas = [];
  let artistaSelecionadoId = null;
  let artistaNovoStatus = null;

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

  function ordenarArtistasPorStatus(lista) {
    return lista.slice().sort((a, b) => {
      if (a.status === b.status) return 0;
      return a.status === 'ativo' ? -1 : 1;
    });
  }

  function renderizarTabela(lista) {
    const listaOrdenada = ordenarArtistasPorStatus(lista);
    let html = '';
    if (Array.isArray(listaOrdenada) && listaOrdenada.length > 0) {
      listaOrdenada.forEach(artista => {
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

  try {
    const response = await fetch('../../../actions/action-listar-artista.php');
    artistas = await response.json();
    renderizarTabela(artistas);
  } catch (error) {
    console.error('Erro ao carregar artistas:', error);
    tbody.innerHTML = `<tr><td colspan="7">Erro ao carregar artistas.</td></tr>`;
  }

  inputPesquisa.addEventListener('input', () => {
    const termo = inputPesquisa.value.toLowerCase();
    const filtrados = artistas.filter(artista =>
      artista.nome.toLowerCase().includes(termo) ||
      (artista.email && artista.email.toLowerCase().includes(termo)) ||
      artista.linguagem_artistica.toLowerCase().includes(termo)
    );
    renderizarTabela(filtrados);
  });

  tbody.addEventListener('click', (e) => {
    if (e.target.classList.contains('status')) {
      const botao = e.target;
      const id = botao.getAttribute('data-id');
      const statusAtual = botao.classList.contains('active') ? 'ativo' : 'inativo';
      const novoStatus = statusAtual === 'ativo' ? 'inativo' : 'ativo';

      artistaSelecionadoId = id;
      artistaNovoStatus = novoStatus;

      mensagemConfirmar.textContent = `Deseja ${novoStatus === 'ativo' ? 'ativar' : 'inativar'} este artista?`;
      modalConfirmar.showModal();
    }
  });

  btnConfirmar.addEventListener('click', async () => {
    if (!artistaSelecionadoId || !artistaNovoStatus) return;

    try {
      const response = await fetch('../../../actions/action-listar-artista.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          id_artista: artistaSelecionadoId,
          novo_status: artistaNovoStatus
        })
      });

      const resultado = await response.json();

      if (resultado.success) {
        const artistaEditado = artistas.find(a => a.id_artista == artistaSelecionadoId);
        if (artistaEditado) artistaEditado.status = resultado.novo_status;
        renderizarTabela(artistas);
      } else {
        console.error('Erro ao atualizar status:', resultado.error);
      }

      modalConfirmar.close();
    } catch (err) {
      console.error('Erro na requisição:', err);
      modalConfirmar.close();
    }
  });

  btnCancelar.addEventListener('click', () => {
    modalConfirmar.close();
  });
});
