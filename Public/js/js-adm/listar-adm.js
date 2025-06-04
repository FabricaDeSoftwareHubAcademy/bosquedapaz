async function listarColaboradores(busca = "") {
    const tbody = document.getElementById("tbody-colaboradores");
    tbody.innerHTML = "<tr><td colspan='7'>Carregando...</td></tr>";

    try {
        const response = await fetch("../../../actions/cadastrar-listar-adm.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ action: "listar", busca: busca }),
        });

        const data = await response.json();

        if (!data.success || !Array.isArray(data.dados)) {
            tbody.innerHTML = "<tr><td colspan='7'>Erro ao carregar os colaboradores.</td></tr>";
            return;
        }

        const colaboradores = data.dados;

        if (colaboradores.length === 0) {
            tbody.innerHTML = "<tr><td colspan='7'>Nenhum colaborador encontrado.</td></tr>";
            return;
        }

        tbody.innerHTML = "";

        colaboradores.forEach((colaborador) => {
            const tr = document.createElement("tr");

            tr.innerHTML = `
                <td class="usuario-col">${colaborador.id_colaborador}</td>
                <td>${colaborador.nome}</td>
                <td class="email-col">${colaborador.email}</td>
                <td class="fone-col">${colaborador.telefone}</td>
                <td class="cargo-col">${colaborador.cargo}</td>
                <td><button type="button" class="status active">Ativo</button></td>
            `;

            tbody.appendChild(tr);
        });
    } catch (error) {
        console.error("Erro ao buscar colaboradores:", error);
        tbody.innerHTML = "<tr><td colspan='7'>Erro ao carregar os dados.</td></tr>";
    }
}

// Pesquisa:
// const formPesquisa = document.getElementById('formBusca');

// if (formPesquisa){
//     formPesquisa.addEventListener("submit", async (e) => {
//         e.preventDefault();

//         const formData = new FormData(formPesquisa);

//         const busca = await fetch('../../../actions/action-colaborador.php', {
//             method: "POST",
//             body: dadosForm
//         });

//         const resposta = await dadosPesq.json();
//         console.log(resposta);

//     });
// }


