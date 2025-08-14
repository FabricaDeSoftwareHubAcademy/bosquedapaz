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

    let utilidadeSelecionadaParaStatus = null;
    let utilidadesCompletas = [];

    // --- Elementos da Busca ---
    const formBusca = document.getElementById('search-form');
    const inputBusca = document.getElementById('search-term');
    
    // --- Funções dos Modais ---
    function abrirModalConfirmar(titulo, mensagem) {
        if (tituloModalConfirmar && mensagemModalConfirmar && modalConfirmar) {
            tituloModalConfirmar.textContent = titulo;
            mensagemModalConfirmar.textContent = mensagem;
            modalConfirmar.showModal();
        }
    }

    function abrirModalSucesso(mensagem) {
        if (mensagemModalSucesso && modalSucesso) {
            mensagemModalSucesso.textContent = mensagem;
            modalSucesso.showModal();
        }
    }

    function abrirModalErro(mensagem) {
        if (mensagemModalErro && modalErro) {
            mensagemModalErro.textContent = mensagem;
            modalErro.showModal();
        }
    }

        function formatarDataBR(dataString) {
        if (!dataString) return '';
    
        const dataISO = dataString.split(' ')[0];
    
        const partes = dataISO.split('-');
        if (partes.length !== 3) return dataString;
    
        return `${partes[2]}/${partes[1]}/${partes[0]}`;
    }

    // --- Função para Renderizar a Tabela ---
    function renderizarTabela(utilidades) {
        if (!corpoTabela) return;

        if (utilidades && utilidades.length > 0) {
            let html = '';

            const utilidadesAtivas = utilidades.filter(util => util.status_utilidade == 1);
            const utilidadesInativas = utilidades.filter(util => util.status_utilidade != 1);
            const utilidadesOrdenadas = [...utilidadesAtivas, ...utilidadesInativas];

            for (const utilidade of utilidadesOrdenadas) {
                const status = utilidade.status_utilidade == 1 ? 'Ativo' : 'Inativo';
                const statusClass = utilidade.status_utilidade == 1 ? 'active' : 'inactive';
                const statusValue = utilidade.status_utilidade;
                
                const dataInicioFormatada = formatarDataBR(utilidade.data_inicio);
                const dataFimFormatada = formatarDataBR(utilidade.data_fim);

                html += `
                    <tr>
                        <td class="usuario-col">${utilidade.titulo}</td>
                        <td class="usuario-col">${dataInicioFormatada}</td>
                        <td class="usuario-col">${dataFimFormatada}</td>
                        <td>
                            <form method="POST">
                                <button id="ativoInativo" class="status ${statusClass}" data-id="${utilidade.id_utilidade_publica}" data-status="${statusValue}">
                                    ${status}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a class="edit-icon" href="./editar-utilidades.php?titulo=${encodeURIComponent(utilidade.titulo)}&descricao=${encodeURIComponent(utilidade.descricao)}&data_inicio=${encodeURIComponent(utilidade.data_inicio)}&data_fim=${encodeURIComponent(utilidade.data_fim)}&imagem=${encodeURIComponent(utilidade.imagem)}&id=${encodeURIComponent(utilidade.id_utilidade_publica)}">
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
    }

    // --- Função para carregar dados do servidor (chamada apenas uma vez) ---
    async function carregarUtilidades() {
        try {
            const dadosPhp = await fetch('../../../actions/listar-utilidades.php');
            const response = await dadosPhp.json();

            if (response.status === 'success' && Array.isArray(response.dados)) {
                utilidadesCompletas = response.dados;
                renderizarTabela(utilidadesCompletas);
            } else {
                corpoTabela.innerHTML = '<tr><td colspan="5">Nenhuma utilidade pública encontrada.</td></tr>';
            }
        } catch (error) {
            console.error("Erro ao carregar utilidades públicas:", error);
            abrirModalErro("Erro de comunicação", "Não foi possível carregar a lista de utilidades públicas.");
        }
    }

    // --- Lógica de Filtro da Tabela ---
    function filtrarTabela(termo) {
        if (termo === '') {
            renderizarTabela(utilidadesCompletas);
        } else {
            const utilidadesFiltradas = utilidadesCompletas.filter(utilidade => {
                return utilidade.titulo.toLowerCase().includes(termo);
            });
            renderizarTabela(utilidadesFiltradas);
        }
    }

    formBusca?.addEventListener('submit', function (e) {
        e.preventDefault();
        const termo = inputBusca?.value.trim().toLowerCase();
        if (termo !== undefined) {
             filtrarTabela(termo);
        }
    });

    // --- Lógica para Alterar Status ---
    corpoTabela.addEventListener('click', async (e) => {
        const btn = e.target.closest('.status');
        if (btn) {
            e.preventDefault();

            const id = btn.getAttribute('data-id');
            const statusAtual = btn.getAttribute('data-status');

            utilidadeSelecionadaParaStatus = { btn, id, statusAtual };

            abrirModalConfirmar(
                'Alterar Status?',
                `Deseja mudar o status para "${statusAtual == 1 ? 'Inativo' : 'Ativo'}"?`
            );
        }
    });

    // --- Evento ÚNICO para o Botão "Salvar" do Modal de Confirmação ---
    btnSalvarConfirmar.addEventListener('click', async () => {
        if (!utilidadeSelecionadaParaStatus) {
            modalConfirmar.close();
            return;
        }

        modalConfirmar.close();
        const { id, statusAtual } = utilidadeSelecionadaParaStatus;

        try {
            const formData = new FormData();
            formData.append("id_utilidade_publica", id);
            const novoStatus = statusAtual == 1 ? 0 : 1;
            formData.append("status_utilidade", novoStatus);

            const tolkenInput = document.getElementById('tolken-csrf-input');
            if (tolkenInput) {
                formData.append('tolkenCsrf', tolkenInput.value);
            } else {
                abrirModalErro("Erro de segurança", "Token CSRF não encontrado.");
                return;
            }

            const response = await fetch('../../../actions/action-editar-status-utilidade-publica.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 'success') {
                abrirModalSucesso(data.message || 'Status alterado com sucesso!');
                await carregarUtilidades();
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

    // --- Eventos dos Botões e Ícones de Fechar dos Modais ---
    btnCancelarConfirmar?.addEventListener('click', () => {
        modalConfirmar.close();
        utilidadeSelecionadaParaStatus = null;
    });

    closeModalConfirmarIcon?.addEventListener('click', () => {
        modalConfirmar.close();
        utilidadeSelecionadaParaStatus = null;
    });

    document.getElementById('close-modal-sucesso')?.addEventListener('click', () => {
        modalSucesso.close();
    });

    document.getElementById('close-modal-erro')?.addEventListener('click', () => {
        modalErro.close();
    });

    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    await carregarUtilidades();
});

document.getElementById('btns-salvar-cancelar').style.display = 'none';