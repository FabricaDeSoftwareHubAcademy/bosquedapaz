document.addEventListener('DOMContentLoaded', () => {
    const tbody = document.getElementById('tbody-colaboradores');
    const formBusca = document.getElementById('formBusca');
    const inputBusca = document.getElementById('busca');

    function criarLinha(colaborador) {
        const tr = document.createElement('tr');

        tr.innerHTML = `
            <td class="usuario-col">${colaborador.id_colaborador}</td>
            <td class="email-col">${colaborador.email}</td>
            <td class="fone-col">${colaborador.telefone}</td>
            <td class="cargo-col">${colaborador.cargo}</td>
            <td><button type="button" class="status active">Ativo</button></td>
            <td>
                <a class="edit-icon" href="editar-adm.php?id=${colaborador.id_colaborador}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <button class="open-modal" data-modal="modal-deleta" data-id="${colaborador.id_colaborador}">    
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>        
        `;
        return tr;
    }

    async function carregarColaboradores(busca = ''){
        tbody.innerHTML  `<tr><td colspan="7">Carregando...</td></tr>`;

        try{
            const resposta = await fetch(`listar-adm-json.php?busca=${encodeURIComponent(busca)}`);
            if (!resposta.ok) throw new Error('Erro ao buscar dados do servidor');

            const dados = await resposta.json();

            if(dados.legth === 0) {
                tbody.innerHTML = `<tr><td colspan="7">Nenhum colaborador encontrado.</td></tr>`;
                return;
            }

            tbody.innerHTML = '';
            dados.forEach(colaborador => {
                const linha = criarLinha(colaborador);
                tbody.appendChild(linha);
            });
        } catch (erro) {
            console.error('Erro ao carregar colaboradores:', erro);
            tbody.innerHTML = `<tr><td colspan="7">Erro ao carregar colaboradores.</td></tr>`;
        }

    }

    formBusca.addEventListener('submit', e => {
        e.preventDefault();
        const busca = inputBusca.value.trim();
        carregarColaboradores(busca);
    });

    carregarColaboradores();
});