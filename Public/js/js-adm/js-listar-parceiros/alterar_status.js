document.addEventListener('DOMContentLoaded', function () {
    let idParceiroSelecionado = null;
    let statusAtualSelecionado = null;
    let botaoClicado = null;
    let acaoModalConfirmar = null;

    const modalConfirmar = document.getElementById('modal-confirmar');
    const tituloModalConfirmar = document.getElementById('confirmar-title');
    const mensagemModalConfirmar = document.getElementById('msm-confimar');
    const btnSalvarConfirmar = document.getElementById('btn-modal-salvar');
    const btnCancelarConfirmar = document.getElementById('btn-modal-cancelar');
    const closeModalConfirmarIcon = document.getElementById('close-modal-confirmar');

    const modalSucesso = document.getElementById("modal-sucesso");
    const tituloModalSucesso = document.getElementById("sucesso-title");
    const textoModalSucesso = document.getElementById("msm-sucesso");

    const modalErro = document.getElementById("modal-error");
    const tituloModalErro = document.getElementById("erro-title");
    const textoModalErro = document.getElementById("erro-text");

    const tbody = document.querySelector(".collaborators-table tbody");
    const input = document.getElementById("status");
    const botao = document.querySelector(".search-button");

    function abrirModalErro(mensagemTitulo, mensagemTexto) {
        if (tituloModalErro && textoModalErro && modalErro) {
            tituloModalErro.textContent = mensagemTitulo;
            textoModalErro.textContent = mensagemTexto;
            modalErro.showModal();
        } else {
            console.error("Elementos do modal de erro não encontrados.");
        }
    }

    function abrirModalSucesso(mensagemTitulo, mensagemTexto) {
        if (tituloModalSucesso && textoModalSucesso && modalSucesso) {
            tituloModalSucesso.textContent = mensagemTitulo;
            textoModalSucesso.textContent = mensagemTexto;
            modalSucesso.showModal();
        } else {
            console.error("Elementos do modal de sucesso não encontrados.");
        }
    }

    function carregarParceiros(nome = "") {
        fetch(`../../../actions/action-listar-parceiros.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `nome=${encodeURIComponent(nome)}`
        })
            .then(res => res.json())
            .then(parceiros => {
                if (!tbody) {
                    console.error("Elemento <tbody> não encontrado.");
                    return;
                }

                tbody.innerHTML = "";

                if (!parceiros || parceiros.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="6">Nenhum parceiro encontrado.</td></tr>`;
                    return;
                }

                const parceirosAtivos = parceiros.filter(p => p.status_parceiro === 'Ativo');
                const parceirosInativos = parceiros.filter(p => p.status_parceiro === 'Inativo');
                const parceirosOrdenados = [...parceirosAtivos, ...parceirosInativos];

                parceirosOrdenados.forEach(parceiro => {
                    let classeStatus = '';
                    if (parceiro.status_parceiro === 'Ativo') {
                        classeStatus = 'active';
                    } else if (parceiro.status_parceiro === 'Inativo') {
                        classeStatus = 'inactive';
                    }

                    const tr = `
                    <tr data-id-parceiro="${parceiro.id_parceiro}">
                      <td class="usuario-col">${parceiro.nome_parceiro}</td>
                      <td>${parceiro.nome_contato}</td>
                      <td>${parceiro.telefone}</td>
                      <td>${parceiro.email}</td>
                      <td>
                        <button id="muda_status" class="status ${classeStatus}">
                          ${parceiro.status_parceiro}
                        </button>
                      </td>
                      <td>
                        <a href="editar-parceiro.php?id=${parceiro.id_parceiro}" class="edit-icon" data-id-parceiro="${parceiro.id_parceiro}">
                          <i class="fa-solid fa-pen-to-square open-modal"></i>
                        </a>
                      </td>
                    </tr>
                  `;
                    tbody.innerHTML += tr;
                });
            })
            .catch(err => {
                console.error("Erro ao carregar parceiros:", err);
                if (tbody) {
                    tbody.innerHTML = `<tr><td colspan="6">Erro ao carregar dados.</td></tr>`;
                }
            });
    }


    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('status')) {
            e.preventDefault();

            botaoClicado = e.target;
            statusAtualSelecionado = botaoClicado.textContent.trim();

            const tr = botaoClicado.closest('tr');
            idParceiroSelecionado = tr.getAttribute('data-id-parceiro');

            if (!idParceiroSelecionado) {
                console.error('ID do parceiro não encontrado na linha.');
                abrirModalErro("Erro", "ID do parceiro não encontrado para alteração de status.");
                return;
            }

            acaoModalConfirmar = 'alterarStatusParceiro';

            tituloModalConfirmar.textContent = 'Alterar Status?';
            mensagemModalConfirmar.textContent = `Deseja mudar o status para "${statusAtualSelecionado === 'Ativo' ? 'Inativo' : 'Ativo'}"?`;
            modalConfirmar.showModal();
        }
    });

    btnSalvarConfirmar.addEventListener('click', async () => {
        modalConfirmar.close();

        if (acaoModalConfirmar === 'alterarStatusParceiro') {
            await salvarAlteracaoStatusParceiro();
        }
        acaoModalConfirmar = null;
    });

    // --- Função para Salvar a Alteração de Status do Parceiro ---
    async function salvarAlteracaoStatusParceiro() {
        if (!idParceiroSelecionado || !botaoClicado) {
            abrirModalErro("Erro", "Dados do parceiro não disponíveis para alteração de status.");
            return;
        }

        const novoStatus = (statusAtualSelecionado === 'Ativo') ? 'Inativo' : 'Ativo';
        const statusNumerico = (novoStatus === 'Ativo') ? 1 : 0;

        const formData = new FormData();
        formData.append('id', idParceiroSelecionado);
        formData.append('status', novoStatus);

        const tolkenInput = document.getElementById('tolken-csrf-input');
        if (tolkenInput) {
            formData.append('tolkenCsrf', tolkenInput.value);
        } else {
            console.error('Campo do token CSRF não encontrado!');
            abrirModalErro("Erro de Segurança", "Token de segurança não encontrado.");
            return;
        }

        try {
            const response = await fetch('../../../actions/action-alterar-status-parceiro.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.sucesso) {
                botaoClicado.textContent = novoStatus;
                botaoClicado.classList.remove('active', 'inactive');
                botaoClicado.classList.add(novoStatus === 'Ativo' ? 'active' : 'inactive');
                botaoClicado.setAttribute('data-status', statusNumerico);

                abrirModalSucesso("Sucesso!", data.sucesso);

                carregarParceiros(input.value.trim());

            } else {
                abrirModalErro("Erro", data.erro || 'Erro ao alterar o status do parceiro.');
            }
        } catch (err) {
            console.error('Erro na comunicação:', err);
            abrirModalErro("Erro de Comunicação", 'Erro inesperado ao alterar o status do parceiro.');
        } finally {
            idParceiroSelecionado = null;
            statusAtualSelecionado = null;
            botaoClicado = null;
        }
    }

    btnCancelarConfirmar.addEventListener('click', () => {
        modalConfirmar.close();
        acaoModalConfirmar = null;
        idParceiroSelecionado = null;
        statusAtualSelecionado = null;
        botaoClicado = null;
    });

    closeModalConfirmarIcon.addEventListener('click', () => {
        modalConfirmar.close();
        acaoModalConfirmar = null;
        idParceiroSelecionado = null;
        statusAtualSelecionado = null;
        botaoClicado = null;
    });

    document.getElementById("close-modal-erro")?.addEventListener("click", () => {
        modalErro?.close();
    });

    document.getElementById("close-modal-sucesso")?.addEventListener("click", () => {
        modalSucesso?.close();
    });

    if (botao) {
        botao.addEventListener("click", function () {
            const valorBusca = input?.value.trim();
            carregarParceiros(valorBusca);
        });
    }

    if (input) {
        input.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                if (botao) {
                    botao.click();
                }
            }
        });
    }

    carregarParceiros();
});

const input = document.getElementById("status");
const botao = document.querySelector(".search-button");
const tbody = document.querySelector(".collaborators-table tbody");

function carregarParceiros(nome = "") {
    fetch(`../../../actions/action-listar-parceiros.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `nome=${encodeURIComponent(nome)}`
    })
        .then(res => res.json())
        .then(parceiros => {
            tbody.innerHTML = "";


            if (parceiros.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6">Nenhum parceiro encontrado.</td></tr>`;
                return;
            }

            const parceirosAtivos = parceiros.filter(p => p.status_parceiro === 'Ativo');
            const parceirosInativos = parceiros.filter(p => p.status_parceiro === 'Inativo');
            const parceirosOrdenados = [...parceirosAtivos, ...parceirosInativos];

            parceirosOrdenados.forEach(parceiro => {
                let classeStatus = '';
                if (parceiro.status_parceiro === 'Ativo') {
                    classeStatus = 'active';
                } else if (parceiro.status_parceiro === 'Inativo') {
                    classeStatus = 'inactive';
                }

                const tr = `
                  <tr data-id-parceiro="${parceiro.id_parceiro}">
                    <td class="usuario-col">${parceiro.nome_parceiro}</td>
                    <td>${parceiro.nome_contato}</td>
                    <td>${parceiro.telefone}</td>
                    <td>${parceiro.email}</td>
                    <td>
                      <button id="muda_status" class="status ${classeStatus}">
                        ${parceiro.status_parceiro}
                      </button>
                    </td>
                    <td>
                      <a href="editar-parceiro.php?id=${parceiro.id_parceiro}" class="edit-icon" data-id-parceiro="${parceiro.id_parceiro}">
                        <i class="fa-solid fa-pen-to-square open-modal"></i>
                      </a>
                    </td>
                  </tr>
                  `;
                tbody.innerHTML += tr;
            });
        })
        .catch(err => {
            console.error("Erro ao carregar parceiros:", err);
            tbody.innerHTML = `<tr><td colspan="6">Erro ao carregar dados.</td></tr>`;
        });
}
