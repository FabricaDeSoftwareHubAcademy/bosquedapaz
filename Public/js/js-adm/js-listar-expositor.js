
let tBody = document.getElementById('tbody')

async function getExpositor() {
    let dados = await fetch('../../../actions/actions-expositor.php');

    let expositores = await dados.json();

    console.log(expositores)


    tBody.innerHTML = ''

    expositores.expositor.forEach(expositor => {
        let status = expositor.status_pes == 'ativo' ? 'active' : 'inactive';

        tBody.innerHTML = `
        <tr>
        <td class="usuario-col">${expositor.id_expositor}</td>
        <td>${expositor.nome}</td>
        <td class="email-col">${expositor.email}</td>
        <td class="fone-col">${expositor.telefone}</td>
        <td class="barraca-col">${expositor.num_barraca}</td>
        <td><button class="status ${status}">${expositor.status_pes}</button></td>
        <td>
            <a class="edit-icon" href="editar-perfil-expositor.php?id=${expositor.id_expositor}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        
        </td>
        </tr> 
        `;
    });
}

getExpositor()

let buscar_expositor = document.getElementById('buscar_expositor');


buscar_expositor.addEventListener('keyup', async function(e) {
    try {
        if(buscar_expositor.value.length > 2){
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
                        <td><button class="status ${status}">${expositor.status_pes}</button></td>
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