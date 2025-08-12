document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("status");
  const botao = document.querySelector(".search-button");
  const tbody = document.querySelector(".collaborators-table tbody");

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
        tbody.innerHTML = "";

        if (parceiros.length === 0) {
          tbody.innerHTML = `<tr><td colspan="6">Nenhum parceiro encontrado.</td></tr>`;
          return;
        }

        parceiros.forEach(parceiro => {
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
                <button id="muda_status" class="status ${classeStatus}">
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
        tbody.innerHTML = `<tr><td colspan="6">Erro ao carregar dados.</td></tr>`;
      });
  }

  botao.addEventListener("click", function () {
    const valorBusca = input.value.trim();
    carregarParceiros(valorBusca);
  });

  input.addEventListener("keypress", function (e) {
    if (e.key === "Enter") {
      botao.click();
    }
  });

  carregarParceiros();
});
