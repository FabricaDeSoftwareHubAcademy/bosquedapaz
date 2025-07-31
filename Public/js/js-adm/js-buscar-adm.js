let buscar_adm = document.getElementById('busca');
let tBody = document.getElementById('tbody-colaboradores')




buscar_adm.addEventListener('keyup', async function (e) {
    try {
        if (buscar_adm.value.length > 2) {
            const formData = new FormData();
    
            formData.append('palavra', buscar_adm.value);
            formData.append('tolkenCsrf', document.getElementById('tolkenCsrf'));
    
    
    
            const resposta = await fetch('../../../actions/action-colaborador.php', {
                method: 'POST',
                body: formData
            });
    
            
    
            if (!resposta.ok) {
                tBody.innerHTML = `<td colspan="5" style="text-align: center;">Nenhum colaborador encontrado.</td>`
    
            } else {
                var response = await resposta.json();
                tBody.innerHTML = ''
                response.data.forEach(colab => {
                    tBody.innerHTML += `<tr>
                        <td class="usuario-col">${colab['id_colaborador']}</td>
                        <td>${colab['nome']}</td>
                        <td class="email-col">${colab['email']}</td>
                        <td class="fone-col">${colab['telefone']}</td>
                        <td class="cargo-col">${colab['cargo']}</td>
                        <td>
                            <button 
                                type="button" 
                                class="status ${colab['status_pes'] === 'ativo' ? 'active' : 'inactive'}" 
                                onclick="mudarStatus(${colab['id_login']}, '${colab['status_pes']}')">
                                ${colab['status_pes'] === 'ativo' ? 'Ativo' : 'Inativo'}
                            </button>
                        </td>
                    </tr>`;
                })
            }
        }
        else {
            tBody.innerHTML = ''
            listar()
        }

    } catch (error) {
        tBody.innerHTML = '<td colspan="5" style="text-align: center; padding: .5rem 0rem;">Nenhum colaborador encontrado000000.</td>'
    }
})

// Matheus Manja

async function mudarStatus(id, status) {
    //////////////// Modal de mudar status /////
    openModalDelete()
    document.getElementById('loading-text').innerText = `Tem certeza que deseja ${status == 'ativo' ? 'Inativar' : 'Ativar'}?`
    document.getElementById('msm-modal').innerText = `Clique em  ${status == 'ativo' ? 'Inativar' : 'Ativar'} para confirmar.`
    document.getElementById('btn-modal-deletar').innerText = `${status == 'ativo' ? 'Inativar' : 'Ativar'}`
    document.getElementById('fechar-modal-deletar').addEventListener('click', closeModalDelete)
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalDelete)




    document.getElementById('btn-modal-deletar').addEventListener('click', async () => {
        closeModalDelete()
        let dadosForms = new FormData();
        dadosForms.append('alternarStatus', 'alternarStatus');
        dadosForms.append('tolkenCsrf', document.getElementById('tolkenCsrf'));
        dadosForms.append('id_login', id);
        dadosForms.append('status_atual', status);

        let dados_php = await fetch('../../../actions/action-colaborador.php', {
            method: 'POST',
            body: dadosForms
        });

        let response = await dados_php.json()



        if (response.success) {
            openModalSucesso()
            document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso)
            document.getElementById('msm-sucesso').innerHTML = 'Cadastro realizado com sucesso'
            document.getElementById('close-modal-sucesso').addEventListener('click', () => {
                closeModalSucesso
                window.location.reload()
            })
        }
        else {
            openModalError()
            document.getElementById('erro-title').innerHTML = response.message
            document.getElementById('erro-text').style.display = 'none'
            document.getElementById('close-modal-erro').addEventListener('click', () => {
                closeModalError
                window.location.reload()
            })
        }
    })
}

