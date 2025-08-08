// -------------------------------------------------- 
// Script Para Listar os Colaboradores:
async function listar(){
    try{
        const resposta = await fetch("../../../actions/action-colaborador.php");
        const json = await resposta.json();

        // console.log(json.data);

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
                <td class="fone-col">${maskNumTelefone(colab['telefone'])}</td>
                <td class="cargo-col">${colab['cargo']}</td>
                <td>
                    <button 
                        type="button" 
                        class="status ${colab['status_pes'] === 'ativo' ? 'active' : 'inactive'}" 
                        onclick="mudarStatus(${colab['id_login']}, '${colab['status_pes']}')">
                        ${colab['status_pes'] === 'ativo' ? 'Ativo' : 'Inativo'}
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

function maskNumTelefone(num) {
    let valor = num;
    valor = valor.replace(/\D/g, '');
    valor = valor.substring(0, 11);
    if (valor.length > 0) {
        valor = '(' + valor;
    }
    if (valor.length > 3) {
        valor = valor.slice(0, 3) + ') ' + valor.slice(3);
    }
    if (valor.length > 10) {
        valor = valor.slice(0, 10) + '-' + valor.slice(10);
    }
    
    return valor;
}

// -------------------------------------------------- 
// Script Para Buscar Colaborador: No Arquivo (js-buscar-adm.js)

// Matheus Manja