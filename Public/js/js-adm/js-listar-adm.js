async function listar(){

    let dados = await fetch("../../../actions/action-colaborador.php");

    let response = await dados.json();
    console.log(response);

    let linha = '';
    response[0].forEach(element => {
        linha += `<tr>
        <td class="usuario-col">${element['id_colaborador']}</td>
        <td>${element['nome']}</td>
        <td class="email-col">${element['email']}</td>
        <td class="fone-col">${element['telefone']}</td>
        <td class="cargo-col">${element['cargo']}</td>
        <td>
        <button type="button" class="status active">Ativo</button>
        </td>
        </tr> `;
    }); 
    console.log(linha);

    let tbody = document.getElementById('tbody-colaboradores');
    tbody.innerHTML = linha;
}

listar();



