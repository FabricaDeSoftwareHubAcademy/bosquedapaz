let idBoletoSelecionado = null;
let statusAtualSelecionado = null;
let botaoClicado = null;

// Referência ao modal de confirmação
const modalConfirmacao = document.getElementById('modal-confirmar');
const tituloConfirmacao = document.getElementById('confirmar-title');
const mensagemConfirmacao = document.getElementById('msm-confimar');

// Referências a outros modais (sucesso e erro)
const modalSucesso = document.getElementById('modal-sucesso');
const modalErro = document.getElementById('modal-error');
const mensagemModalSucesso = document.getElementById('msm-sucesso');
const mensagemModalErro = document.getElementById('erro-text');

// Evento principal de delegação para os botões de status
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('botao-status')) {
        e.preventDefault();
        
        botaoClicado = e.target;
        statusAtualSelecionado = botaoClicado.textContent.trim();
        
        const tr = botaoClicado.closest('tr');
        idBoletoSelecionado = tr.getAttribute('data-id-boleto'); 

        if (!idBoletoSelecionado) {
            console.error('ID do boleto não encontrado na linha.');
            mensagemModalErro.textContent = 'ID do boleto não encontrado na linha.';
            modalErro.showModal();
            return;
        }

        // Preenche o modal de confirmação com a mensagem correta
        const novoStatus = (statusAtualSelecionado === 'Pago') ? 'Pendente' : 'Pago';
        if (tituloConfirmacao && mensagemConfirmacao) {
            tituloConfirmacao.textContent = 'Alterar Status?';
            mensagemConfirmacao.textContent = `Deseja alterar o status para "${novoStatus}"?`;
        }
        
        // Exibe o modal de confirmação
        if (modalConfirmacao) {
            modalConfirmacao.showModal();
        }
    }
});

document.getElementById('close-modal-confirmar').addEventListener('click', () => {
    if (modalConfirmacao) modalConfirmacao.close();
    // Limpa as variáveis para a próxima interação
    idBoletoSelecionado = null;
    statusAtualSelecionado = null;
    botaoClicado = null;
});

document.getElementById('btn-modal-cancelar').addEventListener('click', () => {
    if (modalConfirmacao) modalConfirmacao.close();
    // Limpa as variáveis para a próxima interação
    idBoletoSelecionado = null;
    statusAtualSelecionado = null;
    botaoClicado = null;
});

document.getElementById('btn-modal-salvar').addEventListener('click', () => {
    if (modalConfirmacao) modalConfirmacao.close();
    
    const novoStatus = (statusAtualSelecionado === 'Pago') ? 'Pendente' : 'Pago';

    const tolkenInput = document.getElementById('tolken-csrf-input');
    const tolkenCsrf = tolkenInput ? tolkenInput.value : '';

    if (!tolkenCsrf) {
        console.error('Campo do token CSRF não encontrado!');
        if (mensagemModalErro && modalErro) {
            mensagemModalErro.textContent = 'Erro interno: Token de segurança não encontrado.';
            modalErro.showModal();
        }
        return;
    }

    const body = `id=${idBoletoSelecionado}&status=${novoStatus}&tolkenCsrf=${tolkenCsrf}`;

    fetch('../../../actions/action-alterar-status-boleto.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: body
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            // Se o status foi alterado com sucesso, recarrega a lista de boletos
            carregarBoletos({});

            if (botaoClicado) {
                botaoClicado.textContent = novoStatus;
                botaoClicado.classList.remove('status-pago', 'status-pendente');
                botaoClicado.classList.add(novoStatus === 'Pago' ? 'status-pago' : 'status-pendente');
            }
             // Exibe o modal de sucesso
            if (mensagemModalSucesso && modalSucesso) {
                mensagemModalSucesso.textContent = 'Status alterado com sucesso.';
                modalSucesso.showModal();
            }
        } else {
            if (mensagemModalErro && modalErro) {
                mensagemModalErro.textContent = 'Erro ao alterar o status.';
                modalErro.showModal();
            }
        }
    })
    .catch(err => {
        console.error('Erro:', err);
        if (mensagemModalErro && modalErro) {
            mensagemModalErro.textContent = 'Erro inesperado ao alterar o status.';
            modalErro.showModal();
        }
    })
    .finally(() => {
        // Limpa as variáveis após a requisição
        idBoletoSelecionado = null;
        statusAtualSelecionado = null;
        botaoClicado = null;
    });
});

const tbody = document.querySelector('.tbody-tabela-de-dados');
const inputNome = document.querySelector('.filtrar-por-nome');
const selectStatus = document.querySelector('.filtrar-por-status');
const formDataFiltro = document.querySelector('.formulario-filtragem-de-data');

async function carregarBoletos(filtros) {
  try {
    const formData = new FormData();

    if (filtros.nome) formData.append('nome', filtros.nome);
    if (filtros.status) formData.append('status', filtros.status);
    if (filtros.data_inicial) formData.append('data_inicial', filtros.data_inicial);
    if (filtros.data_final) formData.append('data_final', filtros.data_final);

    const resposta = await fetch('../../../actions/action-listar-boletos.php', {
      method: 'POST',
      body: formData
    });

    if (!resposta.ok) throw new Error('Erro na requisição: ' + resposta.status);

    const data = await resposta.json();
    tbody.innerHTML = '';

    if (data.length > 0) {
      const boletosPagos = data.filter(boleto => boleto.status_boleto === 'Pago');
      const boletosPendentes = data.filter(boleto => boleto.status_boleto === 'Pendente');
      const boletosOrdenados = [...boletosPagos, ...boletosPendentes];

      boletosOrdenados.forEach(boleto => {

        let classeStatus = '';
        if (boleto.status_boleto === 'Pago') {
          classeStatus = 'status-pago';
        } else if (boleto.status_boleto === 'Pendente') {
          classeStatus = 'status-pendente';
        }


        const row = `
          <tr class="tr-tabela-de-dados" data-id-boleto="${boleto.id_boleto}">
            <td class="td-tabela-de-dados">${boleto.nome}</td>
            <td class="td-tabela-de-dados">${boleto.vencimento}</td>
            <td class="td-tabela-de-dados">${boleto.mes_referencia}</td>
            <td class="td-tabela-de-dados">R$ ${parseFloat(boleto.valor).toFixed(2)}</td>
            <td class="td-tabela-de-dados">
              <button class="botao-status ${classeStatus}">${boleto.status_boleto}</button>
            </td>
          </tr>
        `;
        tbody.innerHTML += row;
      });
    } else {
      tbody.innerHTML = `
        <tr class="tr-tabela-de-dados">
          <td class="td-tabela-de-dados" colspan="5">Nenhum boleto encontrado.</td>
        </tr>
      `;
    }
  } catch (error) {
    console.error('Erro ao carregar boletos:', error);
  }
}

// armazenando o estado atual dos filtros
// para realizar a ação de filtragem
let filtroNomeAtual = '';
let filtroStatusAtual = '';
let filtroDataInicialAtual = '';
let filtroDataFinalAtual = '';

// bloco da estrutura da função de
// filtragem por nome (em tempo real)
inputNome.addEventListener('input', (e) => {
  filtroNomeAtual = e.target.value.trim();
  carregarBoletos({
    nome: filtroNomeAtual,
    status: filtroStatusAtual,
    data_inicial: filtroDataInicialAtual,
    data_final: filtroDataFinalAtual
  });
});

// bloco da estrutura da função de
// filtragem por status (em tempo real)
selectStatus.addEventListener('change', (e) => {
  filtroStatusAtual = e.target.value;
  carregarBoletos({
    nome: filtroNomeAtual,
    status: filtroStatusAtual,
    data_inicial: filtroDataInicialAtual,
    data_final: filtroDataFinalAtual
  });
});

// bloco da estrutura da função de filtragem por
// data inicial e final esperando um submit
formDataFiltro.addEventListener('submit', (e) => {
  e.preventDefault();

  filtroDataInicialAtual = formDataFiltro.querySelector('input[name="data_inicial"]').value;
  filtroDataFinalAtual = formDataFiltro.querySelector('input[name="data_final"]').value;

  carregarBoletos({
    nome: filtroNomeAtual,
    status: filtroStatusAtual,
    data_inicial: filtroDataInicialAtual,
    data_final: filtroDataFinalAtual
  });
});

// carregando a lista sem nenhum tipo de filtro
// apenas para exibição de dados
carregarBoletos({});
