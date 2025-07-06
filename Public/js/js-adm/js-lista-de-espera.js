
///////////// LISTA EXPOSITORES AGUARDANDO A VÁLIDAÇÃO \\\\\\\\\\\\\\\
async function carrega_expositor() {
    let tbody = document.getElementById('tbody')
    try {
        let response = await fetch('../../../actions/actions-expositor.php?emespera=1');
        response = await response.json();
    
        if (response.status == 400) {
            tbody.innerHTML = `<td colspan="5" style="text-align: center;">${response.msg}</td>`
        } else {
            response.expositor.forEach(element => {
                tbody.innerHTML += `
                <tr>
                    <td>${element.nome}</td>
                    <td class="email">${element.email}</td>
                    <td>${element.descricao}</td>
                    <td>${element.telefone}</td>
                    <td class="perfil">
                        <a href="validar-expositor.php?expositor=${encodeURIComponent(element.id_expositor)}">
                            <i class="bi bi-person-badge"></i>
                        </a>
                    </td>
                </tr> `
            });
            
        }
    } catch (error) {
        tbody.innerHTML = '<td colspan="5" style="text-align: center;">Nenhum expositor encontrado.</td>'
    }


}


/////////// CARREGA OS EXPOSITORES NO LOAD DA PÁGINA
carrega_expositor()



let buscar_expositor = document.getElementById('buscar_expositor');


//////// FILTRA OS EXPOSITORES PELO OQUE É DIGITADO NA BARRA DE PESQUISA
buscar_expositor.addEventListener('keyup', async function(e) {
    try {
        let response = await fetch(`../../../actions/actions-expositor.php?filtrar=${buscar_expositor.value}&aguardando=1`);
        response = await response.json();
        if(buscar_expositor.value.length > 1){
            if (response.status == 400) {
                tbody.innerHTML = `<td colspan="5" style="text-align: center;">${response.msg}</td>`
            } else {
                tbody.innerHTML = ''
                response.expositor.forEach(element => {
                tbody.innerHTML += `
                    <tr>
                        <td>${element.nome}</td>
                        <td class="email">${element.email}</td>
                        <td>${element.descricao}</td>
                        <td>${element.telefone}</td>
                        <td class="perfil">
                            <a href="validar-expositor.php?expositor=${encodeURIComponent(element.id_expositor)}">
                                <i class="bi bi-person-badge"></i>
                            </a>
                        </td>
                    </tr> `
                });
            }
        }
        else {
            tbody.innerHTML = ''
            carrega_expositor()
        }
    } catch (error) {
        tbody.innerHTML = '<td colspan="5" style="text-align: center;">Nenhum expositor encontrado.</td>'
    }
})