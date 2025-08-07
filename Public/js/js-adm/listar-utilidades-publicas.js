document.addEventListener("DOMContentLoaded", async () => {
    // --- Elementos da Tabela ---
    const corpoTabela = document.getElementById("corpo_table");

    // --- Elementos dos Modais ---
    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title');
    const mensagemModalConfirmar = document.getElementById('msm-confimar');
    const btnSalvarConfirmar = document.getElementById('btn-modal-salvar');
    const btnCancelarConfirmar = document.getElementById('btn-modal-cancelar');
    const closeModalConfirmarIcon = document.getElementById('close-modal-confirmar');
    
    const modalSucesso = document.getElementById('modal-sucesso');
    const mensagemModalSucesso = document.getElementById('msm-sucesso');
    const modalErro = document.getElementById('modal-error');
    const mensagemModalErro = document.getElementById('erro-text');

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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00000" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </td>
        </tr>        
        `;
    }

//     inputPesquisa.addEventListener('input', () => {
//     const termo = inputPesquisa.value.toLowerCase();
//     const filtrados = artistas.filter(artista =>
//       artista.nome.toLowerCase().includes(termo) ||
//       (artista.email && artista.email.toLowerCase().includes(termo)) ||
//       artista.linguagem_artistica.toLowerCase().includes(termo)
//     );
//     renderizarTabela(filtrados);
//   });

    tabela.innerHTML = html;

                html += `
                <tr>
                    <td class="usuario-col">${utilidades[x].titulo}</td>
                    <td class="usuario-col">${utilidades[x].data_inicio}</td>
                    <td class="usuario-col">${utilidades[x].data_fim}</td>
                    <td>
                        <form method="POST">
                            <button id="ativoInativo" class="status ${statusClass}" data-id="${utilidades[x].id_utilidade_publica}" data-status="${statusValue}">
                                ${status}
                            </button>
                        </form>
                    </td>
                    <td>
                        <a class="edit-icon" href="./editar-utilidades.php?titulo=${encodeURIComponent(utilidades[x].titulo)}&descricao=${encodeURIComponent(utilidades[x].descricao)}&data_inicio=${encodeURIComponent(utilidades[x].data_inicio)}&data_fim=${encodeURIComponent(utilidades[x].data_fim)}&imagem=${encodeURIComponent(utilidades[x].imagem)}&id=${encodeURIComponent(utilidades[x].id_utilidade_publica)}">
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
            corpoTabela.innerHTML = html;
        } else {
            corpoTabela.innerHTML = '<tr><td colspan="5">Nenhuma utilidade pública encontrada.</td></tr>';
        }
    } catch (error) {
        console.error("Erro ao carregar utilidades públicas:", error);
        abrirModalErro("Erro de comunicação", "Não foi possível carregar a lista de utilidades públicas.");
    }
    
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
                formData.append("tolkenCsrf", document.getElementById('tolkenCsrf'))
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
    
    // --- Evento ÚNICO para o Botão "Salvar" do Modal de Confirmação ---
    btnSalvarConfirmar.addEventListener('click', async () => {
        if (!utilidadeSelecionadaParaStatus) {
            modalConfirmar.close();
            return;
        }
        
        modalConfirmar.close();
        const { btn, id, statusAtual } = utilidadeSelecionadaParaStatus;

        try {
            const formData = new FormData();
            formData.append("id_utilidade_publica", id);
            const novoStatus = statusAtual == 1 ? 0 : 1;
            formData.append("status_utilidade", novoStatus);

            const response = await fetch('../../../actions/action-editar-status-utilidade-publica.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.status === 'success') {
                const novoTexto = novoStatus == 1 ? 'Ativo' : 'Inativo';
                const novaClasse = novoStatus == 1 ? 'active' : 'inactive';

                btn.classList.remove('active', 'inactive');
                btn.classList.add(novaClasse);
                btn.textContent = novoTexto;
                btn.setAttribute('data-status', novoStatus);
                
                console.log(`Botão atualizado! Novo status: ${novoTexto}, Novo data-status: ${btn.getAttribute('data-status')}`);
                
                abrirModalSucesso(data.message || 'Status alterado com sucesso!');
                
                window.location.reload(); 
            } else {
                abrirModalErro(data.message || 'Erro ao alterar o status.');
            }
        } catch (error) {
            console.error('Erro na comunicação com o servidor:', error);
            abrirModalErro("Erro de comunicação", "Não foi possível enviar a requisição de alteração de status.");
        } finally {
            utilidadeSelecionadaParaStatus = null;
        }
    });

    // --- Eventos para fechar o Modal de Confirmação ---
    btnCancelarConfirmar?.addEventListener('click', () => {
        modalConfirmar.close();
        utilidadeSelecionadaParaStatus = null;
    });

    closeModalConfirmarIcon?.addEventListener('click', () => {
        modalConfirmar.close();
        utilidadeSelecionadaParaStatus = null;
    });
    
    // --- Lógica para fechar os modais de sucesso e erro ---
    document.getElementById('close-modal-sucesso')?.addEventListener('click', () => {
        modalSucesso.close();
    });

    document.getElementById('close-modal-erro')?.addEventListener('click', () => {
        modalErro.close();
    });

    // --- Recarregamento da página ao voltar no histórico ---
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

});
