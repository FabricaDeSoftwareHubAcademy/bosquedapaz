// -------------------------------------------------- 
// Script Para Listar os Colaboradores:
async function listar(){
    try{
        const resposta = await fetch("../../../actions/action-colaborador.php");
        const json = await resposta.json();

        console.log(json);

        if (!json.data || json.data.length === 0) {
            document.getElementById('tbody-colaboradores').innerHTML = '<tr><td colspan="6">Nenhum ADM encontrado.</td></tr>';
            return;
        }

        let linhas = '';
        json.data.forEach(colab => {
            linhas += `<tr>
                <td class="usuario-col">${colab['id_colaborador']}</td>
                <td>${colab['nome']}</td>
                <td class="email-col">${colab['email']}</td>
                <td class="fone-col">${colab['telefone']}</td>
                <td class="cargo-col">${colab['cargo']}</td>
                <td>
                    <button 
                        type="button" 
                        class="status ${colab['status_col'] === 'ativo' ? 'active' : 'inactive'}" 
                        data-id="${colab['id_colaborador']}" 
                        data-status="${colab['status_col']}">
                        ${colab['status_col'] === 'ativo' ? 'Ativo' : 'Inativo'}
                    </button>
                </td>
            </tr>`;
        }); 
    
        document.getElementById('tbody-colaboradores').innerHTML = linhas;

    } catch (e){
        console.error("Erro ao listar colaboradores:", e);
    } 
}
listar();


// -------------------------------------------------- 
// Script Para Buscar Colaborador (Busca feita pelo Input):
document.addEventListener('DOMContentLoaded', () => {
    const inputBusca = document.getElementById('busca');
    const tbody = document.getElementById('tbody-colaboradores');

    if (!inputBusca || !tbody){
        console.error("Elementos HTML necessário não encontrados:  #busca ou #tbody-colaboradores");

    }

    inputBusca.addEventListener('input', () => {
        const termo = inputBusca.value.trim();
        buscarColaboradores(termo);
    });

    async function buscarColaboradores(termo) {
        const formData = new FormData();
        formData.append('palavra', termo);

        try {
            const resposta = await fetch('../../../actions/action-colaborador.php', {
                method: 'POST',
                body: formData
            });

            if (!resposta.ok) throw new Error('Erro na requisição.');

            const json = await resposta.json();
            
            if (!json || json.data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6">Nenhum colaborador encontrado.</td></tr>';
                return;
            }

            let linhas = '';
            json.data.forEach(colab => {
                linhas += `<tr>
                    <td class="usuario-col">${colab['id_colaborador']}</td>
                    <td>${colab['nome']}</td>
                    <td class="email-col">${colab['email']}</td>
                    <td class="fone-col">${colab['telefone']}</td>
                    <td class="cargo-col">${colab['cargo']}</td>
                    <td>
                        <button 
                            type="button" 
                            class="status ${colab['status_col'] === 'ativo' ? 'active' : 'inactive'}" 
                            data-id="${colab['id_colaborador']}" 
                            data-status="${colab['status_col']}">
                            ${colab['status_col'] === 'ativo' ? 'Ativo' : 'Inativo'}
                        </button>
                    </td>
                </tr>`;
            });

            tbody.innerHTML = linhas;

        } catch (erro) {
            console.error('Erro ao buscar colaboradores:', erro);
            tbody.innerHTML = '<tr><td colspan="6">Erro ao buscar dados.</td></tr>';
        }
    }   
});


// -------------------------------------------------- 
// Script Para Ativar/Inativar Status do Colaborador: No Arquivo (status-colaborador.js)
