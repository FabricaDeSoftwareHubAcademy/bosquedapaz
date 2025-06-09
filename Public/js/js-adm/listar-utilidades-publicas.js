
document.addEventListener("DOMContentLoaded", async (event) => {

    let tabela = document.getElementById("corpo_table");
    let html = '';

    let dados_php = await fetch('../../../actions/listar-utilidades.php');

    let response = await dados_php.json();

    for(let x = 0; x < response.length; x++){

            html += `
        <tr>
            <td class="usuario-col"> ${response[x].titulo} </td>
            <td class="usuario-col">  ${response[x].data_inicio}  </td>
            <td class="usuario-col">  ${response[x].data_fim}  </td>
            <td><button class="status  ${response[x].status_utilidade == 1 ? 'active' : 'inactive'}"> ${response[x].status_utilidade == 1 ? 'Ativo' : 'Inativo'} </button></td>
            <td>
                <a href="./editar-utilidades.php" class="edit-icon">
                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                </a>
                <a href="#modal-recusar" class="delete-icon">
                    <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                </a>
            </td>
        </tr>
    `;

    }

    tabela.innerHTML = html;

  });