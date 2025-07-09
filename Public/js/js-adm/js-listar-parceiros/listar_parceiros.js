document.addEventListener("DOMContentLoaded", function () {
const input = document.getElementById("status");
const botao = document.querySelector(".search-button");
const tbody = document.querySelector(".collaborators-table tbody");

function carregarParceiros(nome = "") {
fetch(`../../../actions/action-listar-parceiros.php?nome=${encodeURIComponent(nome)}`)
.then(res => res.json())
.then(parceiros => {
    tbody.innerHTML = ""; // limpa tabela

    if (parceiros.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6">Nenhum parceiro encontrado.</td></tr>`;
        return;
    }

    parceiros.forEach(parceiro => {
        const tr = document.createElement("tr");
        tr.innerHTML = ` 
        <td class="usuario-col">${parceiro.nome_parceiro}</td>
        <td >${parceiro.nome_contato}</td>
        <td>${parceiro.telefone}</td>
        <td>${parceiro.email}</td>
        <td>${parceiro.status_parceiro}</td>
        <td>
            <a href="editar-parceiro.php?id=${parceiro.id_parceiro}" class="edit-icon" data-id-parceiro="${parceiro.id_parceiro}">
                <i class="fa-solid fa-pen-to-square open-modal"></i>
            </a>
        </td>
        `;
        tbody.appendChild(tr);
    });
})
.catch(err => {
    console.error("Erro ao carregar parceiros:", err);
    tbody.innerHTML = `<tr><td colspan="6">Erro ao carregar dados.</td></tr>`;
});
}

// Evento ao clicar no botão
botao.addEventListener("click", function () {
const valorBusca = input.value.trim();
carregarParceiros(valorBusca);
});

// Enter também busca
input.addEventListener("keypress", function (e) {
if (e.key === "Enter") {
botao.click();
}
});

// Carregar todos inicialmente
carregarParceiros();
});

