document.addEventListener("DOMContentLoaded", async () => {
    let tabela = document.getElementById("corpo_table");
    let html = '';

    let dados_php = await fetch('../../../actions/listar-utilidades.php');
    let response = await dados_php.json();

    for (let x = 0; x < response.length; x++) {
        html += `
        <tr>
            <td class="usuario-col">${response[x].titulo}</td>
            <td class="usuario-col">${response[x].data_inicio}</td>
            <td class="usuario-col">${response[x].data_fim}</td>
            <td>
                <button class="status ${response[x].status_utilidade == 1 ? 'active' : 'inactive'}" data-id="${response[x].id_utilidade_publica}">
                    ${response[x].status_utilidade == 1 ? 'Ativo' : 'Inativo'}
                </button>
            </td>
            <td>
                <a class="edit-icon" href="./editar-utilidades.php?titulo=${encodeURIComponent(response[x].titulo)}&descricao=${encodeURIComponent(response[x].descricao)}&data_inicio=${encodeURIComponent(response[x].data_inicio)}&data_fim=${encodeURIComponent(response[x].data_fim)}&imagem=${encodeURIComponent(response[x].imagem)}&id=${encodeURIComponent(response[x].id_utilidade_publica)}">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>    
                </a>
            </td>
        </tr>
        `;
    }

    tabela.innerHTML = html;


    tabela.addEventListener("click", function (event) {
        const btn = event.target.closest('button.status');
        if (btn) {
            const idClicado = btn.dataset.id;
            const item = response.find(obj => obj.id_utilidade_publica == idClicado);

            if (item) {

                item.status_utilidade = item.status_utilidade == 1 ? 0 : 1;


                btn.textContent = item.status_utilidade == 1 ? 'Ativo' : 'Inativo';

                btn.classList.toggle('active', item.status_utilidade == 1);
                btn.classList.toggle('inactive', item.status_utilidade == 0);

                console.log(`ID: ${idClicado}, status atualizado para: ${item.status_utilidade}`);
            }
        }
    });

});
