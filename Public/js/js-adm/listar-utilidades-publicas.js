document.addEventListener("DOMContentLoaded", async () => {
    let tabela = document.getElementById("corpo_table");
    let html = '';

    let dados_php = await fetch('../../../actions/listar-utilidades.php');
    let response = await dados_php.json();

    for (let x = 0; x < response.length; x++) {
        html += `
        <tr>
            <td class="usuario-col"> ${response[x].titulo} </td>
            <td class="usuario-col"> ${response[x].data_inicio} </td>
            <td class="usuario-col"> ${response[x].data_fim} </td>
            <td><button class="status ${response[x].status_utilidade == 1 ? 'active' : 'inactive'}"> ${response[x].status_utilidade == 1 ? 'Ativo' : 'Inativo'} </button></td>
            <td>
                <a class="edit-icon" href="./editar-utilidades.php?titulo=${encodeURIComponent(response[x].titulo)}&descricao=${encodeURIComponent(response[x].descricao)}&data_inicio=${encodeURIComponent(response[x].data_inicio)}&data_fim=${encodeURIComponent(response[x].data_fim)}&imagem=${encodeURIComponent(response[x].imagem)}&id=${response[x].id}">
                    Editar
                </a>
            </td>
        </tr>
        `;
    }

    tabela.innerHTML = html;

    // Não precisa adicionar event listeners aqui para o preenchimento!
});
