async function carrega_expositor() {
    let tbody = document.getElementById('tbody')
    let response = await fetch('../../../actions/actions-listar-expositor.php');
    response = await response.json();
    console.log(response)

    if (response.status == 201) {
        tbody.innerHTML = '<td colspan="5" style="text-align: center;">Nenhum expositor encontrado.</td>'
    } else {
        let expositores = '';
        response.expositores.forEach(element => {
            expositores += `<tr>
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
        
        tbody.innerHTML = expositores;
    }


}

carrega_expositor()


let buscar_expositor = document.getElementById('buscar_expositor');

buscar_expositor.addEventListener('keyup', async function(e) {
    let response = await fetch(`../../../actions/actions-listar-expositor.php?filtro=${buscar_expositor.value}`);
    response = await response.json();
    let busca = ''
    busca = buscar_expositor.value
    if(busca.length > 1){
        if (response.status == 201) {
            tbody.innerHTML = '<td colspan="5" style="text-align: center;">Nenhum expositor encontrado.</td>'
        } else {
            let expositores = '';
            response.expositores.forEach(element => {
                expositores += `<tr>
            <td>${element.nome}</td>
            <td class="email">${element.email}</td>
            <td>${element.descricao}</td>
            <td>${element.telefone}</td>
            <td class="perfil">
                <a href="validar-expositor.php?id=${element.id_expositor}">
                <i class="bi bi-person-badge"></i>
                </a>
            </td>
            </tr> `
            });
            
            tbody.innerHTML = expositores;
        }
    }
    else {
        carrega_expositor()
    }
})