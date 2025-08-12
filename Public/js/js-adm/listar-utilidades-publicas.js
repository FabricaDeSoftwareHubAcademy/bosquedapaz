document.addEventListener("DOMContentLoaded", async () => {
    let tabela = document.getElementById("corpo_table");
    let html = '';

    let dados_php = await fetch('../../../actions/listar-utilidades.php');
    let response = await dados_php.json();

    for (let x = 0; x < response.length; x++) {
        html += `
        <tr>
        <td class="collaborators-table" data-label="Nome">${response[x].titulo}</td>
        <td class="collaborators-table" data-label="Data Início">${formatarDataBR(response[x].data_inicio)}</td>
        <td class="collaborators-table" data-label="Data Fim">${formatarDataBR(response[x].data_fim)}</td>
        <td class="collaborators-table" data-label="Status">
            <form method="POST">
            <button name="REQUEST_METHOD" id="ativoInativo" class="status ${response[x].status_utilidade == 1 ? 'active' : 'inactive'}" data-id="${response[x].id_utilidade_publica}">
                ${response[x].status_utilidade == 1 ? 'Ativo' : 'Inativo'}
            </button>
            </form>
        </td>
        <td class="collaborators-table" data-label="Ações">
            <a class="edit-icon" href="./editar-utilidades.php?titulo=${encodeURIComponent(response[x].titulo)}&descricao=${encodeURIComponent(response[x].descricao)}&data_inicio=${encodeURIComponent(response[x].data_inicio)}&data_fim=${encodeURIComponent(response[x].data_fim)}&imagem=${encodeURIComponent(response[x].imagem)}&id=${encodeURIComponent(response[x].id_utilidade_publica)}">
            
            <i class="fa-solid fa-pen-to-square" width="16" height="16" fill="#00000"></i>
            </a>
        </td>
        </tr>
        `;

    }

    tabela.innerHTML = html;

    btnAtivoInativo = document.querySelectorAll('#ativoInativo');
    
    btnAtivoInativo.forEach((btn) => {
        btn.addEventListener('click', async function (event) {
            event.preventDefault();
    
            const id = this.getAttribute('data-id');
            const isActive = this.classList.contains('active');
    
            titulo = document.getElementById("confirmar-title");
            subtitulo = document.getElementById("msm-confimar");
    
            titulo.innerHTML = "<h2>Deseja editar o status desse registro?</h2>";
            subtitulo.innerHTML = "<p>Clique em salvar para confirmar a alteração</p>";
    
            openModalConfirmar();
            document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
            document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);
    
            const salvarBtn = document.getElementById('btn-modal-salvar');
            const novoSalvarBtn = salvarBtn.cloneNode(true);
            salvarBtn.parentNode.replaceChild(novoSalvarBtn, salvarBtn);
    
            novoSalvarBtn.addEventListener('click', async () => {
                let formData = new FormData();
                formData.append("id_utilidade_publica", id);
                formData.append("tolkenCsrf", document.getElementById('tolkenCsrf'))
                formData.append("status_utilidade", isActive ? 0 : 1);
    
                await fetch('../../../actions/action-editar-status-utilidade-publica.php', {
                    method: 'POST',
                    body: formData
                });
    
                closeModalConfirmar();
                window.location.reload();
            });
        });
    });

    function formatarDataBR(dataString) {
        if (!dataString) return ''; 
      
        const dataISO = dataString.split(' ')[0];
      
        const partes = dataISO.split('-'); 
        if (partes.length !== 3) return dataString;
      
        return `${partes[2]}/${partes[1]}/${partes[0]}`;
    }
      

    buscar_utilidade.addEventListener('keyup', async function(e) {
        try {
            if(buscar_utilidade.value.length > 2){
                let response = await fetch(`../../../actions/actions-expositor.php?filtrar=${buscar_expositor.value}&aguardando=1`);
                response = await response.json();
        
                if (response.status == 400) {
                    tbody.innerHTML = `<td colspan="5" style="text-align: center;">${response.msg}</td>`
        
                } else {
                    tbody.innerHTML = ''
                    response.expositor.forEach(expositor => {
                        let status = expositor.status_pes == 'ativo' ? 'active' : 'inactive';
                        tbody.innerHTML += `
                            <tr>
                            <td class="usuario-col">${expositor.id_expositor}</td>
                            <td>${expositor.nome}</td>
                            <td class="email-col">${expositor.email}</td>
                            <td class="fone-col">${expositor.telefone}</td>
                            <td class="barraca-col">${expositor.num_barraca}</td>
                            <td><button id="ativarInavitar" class="status ${status}" onclick="mudarStatus(${expositor.id_login}, '${expositor.status_pes}')">${expositor.status_pes}</button></td>
                            <td>
                                <a class="edit-icon" href="editar-perfil-expositor.php?id=${expositor.id_expositor}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            
                            </td>
                            </tr>
                            `
                    });
        
                }
            }
            else {
                tbody.innerHTML = ''
                getExpositor()
            }
            
        } catch (error) {
            tbody.innerHTML = '<td colspan="5" style="text-align: center; padding: .5rem 0rem;">Nenhum expositor encontrado.</td>'
        }
    })
    

});



if (window.performance && window.performance.navigation.type == 2) {
    window.location.reload();
}