// -------------------------------------------------- 
// Script Para Listar os Colaboradores:
async function listar(){
    try{
        const resposta = await fetch("../../../actions/action-colaborador.php");
        const json = await resposta.json();

        console.log(json.data);

        if (!json.data || json.data.length === 0) {
            document.getElementById('tbody-colaboradores').innerHTML = '<tr><td colspan="6">Nenhum ADM encontrado.</td></tr>';
            return;
        }

        let linhas = '';
        json.data.forEach(colab => {
            const statusRaw = colab['status_col'] ?? colab['status_pes'] ?? '';
            const statusLower = statusRaw.toLowerCase();

            linhas += `<tr>
                <td class="usuario-col">${colab['id_colaborador']}</td>
                <td>${colab['nome']}</td>
                <td class="email-col">${colab['email']}</td>
                <td class="fone-col">${colab['telefone']}</td>
                <td class="cargo-col">${colab['cargo']}</td>
                <td>
                    <button 
                        type="button" 
                        class="status ${statusLower === 'ativo' ? 'active' : 'inactive'}" 
                        data-id="${colab['id_colaborador']}" 
                        data-status="${statusLower}">
                        ${statusLower === 'ativo' ? 'Ativo' : 'Inativo'}
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
// Script para Mudar Status: No Arquivo (status-colaborador.js)

// -------------------------------------------------- 
// Script Para Buscar Colaborador: No Arquivo (js-buscar-adm.js)

// Matheus Manja