document.addEventListener('DOMContentLoaded', () => {
    const tbody = document.getElementById('tbody-colaboradores');
    const formBusca = document.getElementById('formBusca');
    const inputBusca = document.getElementById('busca');

    function criarLinha(colaborador){
        const tr = document.createElement('tr');

        tr.innerHTML = `
            <td class="usuario-col">${colaborador.id_colaborador}</td>
            <td>${colaborador.nome}</td>
            <td class="email-col">${colaborador.email}</td>
            <td class="fone-col">${colaborador.telefone}</td>
            <td class="cargo-col">${colaborador.cargo}</td>
            <td>
                <button type="button" class"buscar active">Ativo</button>
            </td>
                <a class"edit-icon" href="editar-adm.php?id=${colaborador.id_colaborador}>
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <button class="open-modal" data-modal="modal-deleta" data-id="${colaborador.id_colaborador}>
                    <i class="fa-solid fa-trash"></i>
                </button>    
            </td>    
        `;

        return tr;
    }

    
    function carregarColaboradores(busca = ''){
        tbody.innerHTML = `<tr><td colspan="7"Carregando...</td></tr>`;

        fetch(`listar-adm-json.php?busca=${encodeURIComponent(busca)}`)
            .then(res => {
                if (!res.ok) throw new Error('Erro ao buscar dados');
                return res.json();
            })
            .then(data => {
                if(data.length === 0){
                    tbody.innerHTML = `<tr><td colapsan="7">Nenhum colaborador encontrado.</td></tr>`;
                    return;
                }

                tbody.innerHTML = '';

                data.forEach(colaborador => {
                    const linha = criarLinha(colaborador);
                    tbody.appendChild(linha);
                });
            })
            .catch(err => {
                tbody.innerHTML = `<tr><td colspan="7">Erro ao carregar colaboradores.</td></tr>`;
                console.error(err);
            });
    }

    formBusca.addEventListener('submit', e => {
        e.preventDefault();
        const busca = inputBusca.value.trim();
        carregarColaboradores(busca);
    });

    carregarColaboradores();
});