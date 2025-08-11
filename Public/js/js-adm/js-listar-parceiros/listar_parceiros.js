document.addEventListener("DOMContentLoaded", function () {
  // --- Elementos da Tabela ---
  const tbody = document.querySelector(".collaborators-table tbody");

  // --- Elementos de Busca ---
  const input = document.getElementById("status");
  const botao = document.querySelector(".search-button");

  // --- Funções de Ordenação e Renderização ---
  // Função para formatar telefone brasileiro
  function formatarTelefone(numero) {
    const nums = numero.replace(/\D/g, '');
    if (nums.length === 11) {
      return `(${nums.slice(0,2)}) ${nums.slice(2,7)}-${nums.slice(7)}`;
    } else if (nums.length === 10) {
      return `(${nums.slice(0,2)}) ${nums.slice(2,6)}-${nums.slice(6)}`;
    } else {
      return numero;
    }
  }

  function carregarParceiros(nome = "") {
    fetch(`../../../actions/action-listar-parceiros.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `nome=${encodeURIComponent(nome)}`
    })
      .then(res => res.json())
      .then(parceiros => {
        if (!tbody) {
          console.error("Elemento <tbody> não encontrado.");
          return;
        }

        tbody.innerHTML = "";

        if (!parceiros || parceiros.length === 0) {
          tbody.innerHTML = `<tr><td colspan="6">Nenhum parceiro encontrado.</td></tr>`;
          return;
        }

        const parceirosAtivos = parceiros.filter(p => p.status_parceiro === 'Ativo');
        const parceirosInativos = parceiros.filter(p => p.status_parceiro === 'Inativo');
        const parceirosOrdenados = [...parceirosAtivos, ...parceirosInativos];

        parceirosOrdenados.forEach(parceiro => {
          let classeStatus = '';
          if (parceiro.status_parceiro === 'Ativo') {
            classeStatus = 'active';
          } else if (parceiro.status_parceiro === 'Inativo') {
            classeStatus = 'inactive';
          }

          const tr = `
            <tr data-id-parceiro="${parceiro.id_parceiro}">
              <td class="usuario-col">${parceiro.nome_parceiro}</td>
              <td>${parceiro.nome_contato}</td>
              <td>${formatarTelefone(parceiro.telefone)}</td>
              <td>${parceiro.email}</td>
              <td>
                <button id="muda_status" class="status ${classeStatus}" data-status="${parceiro.status_parceiro}">
                  ${parceiro.status_parceiro}
                </button>
              </td>
              <td>
                <a href="editar-parceiro.php?id=${parceiro.id_parceiro}" class="edit-icon" data-id-parceiro="${parceiro.id_parceiro}">
                  <i class="fa-solid fa-pen-to-square open-modal"></i>
                </a>
              </td>
            </tr>
          `;
          tbody.innerHTML += tr;
        });
      })
      .catch(err => {
        console.error("Erro ao carregar parceiros:", err);
        if (tbody) {
          tbody.innerHTML = `<tr><td colspan="6">Erro ao carregar dados.</td></tr>`;
        }
      });
  }

  // --- Event Listeners para a Busca ---
  if (botao) {
    botao.addEventListener("click", function () {
      const valorBusca = input?.value.trim();
      carregarParceiros(valorBusca);
    });
  }

  if (input) {
    input.addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        e.preventDefault();
        if (botao) {
          botao.click();
        }
      }
    });
  }

  carregarParceiros();
});
document.getElementById('btns-salvar-cancelar').style.display = 'none';
