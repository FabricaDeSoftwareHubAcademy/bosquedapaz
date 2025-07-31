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
            <form method="POST">
                    <button name="REQUEST_METHOD" id="ativoInativo" class="status ${response[x].status_utilidade == 1 ? 'active' : 'inactive'}" data-id="${response[x].id_utilidade_publica}">
                        ${response[x].status_utilidade == 1 ? 'Ativo' : 'Inativo'}
                    </button>
            </form>
                </td>
                <td>
                    <a class="edit-icon" href="./editar-utilidades.php?titulo=${encodeURIComponent(response[x].titulo)}&descricao=${encodeURIComponent(response[x].descricao)}&data_inicio=${encodeURIComponent(response[x].data_inicio)}&data_fim=${encodeURIComponent(response[x].data_fim)}&imagem=${encodeURIComponent(response[x].imagem)}&id=${encodeURIComponent(response[x].id_utilidade_publica)}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>    
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
    

});



if (window.performance && window.performance.navigation.type == 2) {
    window.location.reload();
}