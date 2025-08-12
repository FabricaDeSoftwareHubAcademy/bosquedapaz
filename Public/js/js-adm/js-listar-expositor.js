
let tBody = document.getElementById('tbody')

async function getExpositor() {
    let dados = await fetch('../../../actions/actions-expositor.php');

    let expositores = await dados.json();

    if (expositores.status == 200){
        tBody.innerHTML = ''
    
        expositores.expositor.forEach(expositor => {
            let status = expositor.status_pes == 'ativo' ? 'active' : 'inactive';
    
            tBody.innerHTML += `
            <tr>
            <td class="usuario-col">${expositor.id_expositor}</td>
            <td>${expositor.nome}</td>
            <td>${expositor.nome_marca}</td>
            <td class="email-col" style="overflow-x: auto;">${expositor.email}</td>
            <td class="fone-col">${maskNumTelefone(expositor.telefone)}</td>
            <td class="barraca-col">${expositor.num_barraca}</td>
            <td><button id="ativarInavitar" class="status ${status}" onclick="mudarStatus(${expositor.id_login}, '${expositor.status_pes}')">${expositor.status_pes}</button></td>
            <td>
                <a class="edit-icon" href="editar-expositor.php?id=${expositor.id_expositor}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            
            </td>
            </tr> 
            `;
        });

    }else {
        tbody.innerHTML = '<td colspan="5" style="text-align: center; padding: .5rem 0rem;">Nenhum expositor encontrado.</td>'
    }


}

getExpositor()

let buscar_expositor = document.getElementById('buscar_expositor');


buscar_expositor.addEventListener('keyup', async function(e) {
    try {
        if(buscar_expositor.value.length > 2){
            let response = await fetch(`../../../actions/actions-expositor.php?filtrarAtivos=${buscar_expositor.value}&aguardando=1`);
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
                        <td>${expositor.nome_marca}</td>
                        <td class="email-col">${expositor.email}</td>
                        <td class="fone-col">${maskNumTelefone(expositor.telefone)}</td>
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

async function mudarStatus(id, status) {

    openModalDelete()
    document.getElementById('title-delete').innerText = `Tem certeza que deseja ${status == 'ativo' ? 'Inativar' : 'Ativar'}?`
    document.getElementById('msm-modal').innerText = `Clique em  ${status == 'ativo' ? 'Inativar' : 'Ativar'} para confirmar.`
    document.getElementById('btn-modal-deletar').innerText = `${status == 'ativo' ? 'Inativar' : 'Ativar'}`
    document.getElementById('fechar-modal-deletar').addEventListener('click', closeModalDelete)
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalDelete)

    if (status === 'ativo'){
        status = 'inativo'
    }else {
        status = 'ativo'
    }

    document.getElementById('btn-modal-deletar').addEventListener('click', async () => {
        closeModalDelete()
    
        let dadosForms =  new FormData();
        dadosForms.append('deletar', 1);
        dadosForms.append('id', id);
        dadosForms.append('status', status);
        dadosForms.append('tolkenCsrf', document.getElementById('tolkenCsrf').value);

        let dados_php = await fetch('../../../actions/actions-expositor.php', {
            method:'POST',
            body: dadosForms
        });
    
        let response = await dados_php.json()

        
        if(response.status == 200){
            openModalSucesso()
            document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso)
            document.getElementById('msm-sucesso').innerHTML = 'Status trocado com sucesso'
            document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                closeModalSucesso
                window.location.reload()
            })
        }

        else if(response.status != 200){
            openModalError()
            document.getElementById('erro-title').innerHTML = response.msg
            document.getElementById('erro-text').style.display = 'none'
            document.getElementById('close-modal-erro').addEventListener('click', () => {
                closeModalError
                window.location.reload()
            })
        }
    })
}

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