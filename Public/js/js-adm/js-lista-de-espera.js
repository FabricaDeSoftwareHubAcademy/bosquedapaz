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
            <a href="validar-expositor.php?id=${element.id_expositor}">
            <i class="bi bi-person-badge"></i>
            </a>
        </td>
        </tr> `
            // console.log(element);
        });
        
        tbody.innerHTML = expositores;
    }


}

carrega_expositor()