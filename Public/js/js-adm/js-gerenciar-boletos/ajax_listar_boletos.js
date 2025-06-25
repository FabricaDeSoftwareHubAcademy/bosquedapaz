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

    const resposta = await fetch('../../../actions/actions-boletos/action-listar-boletos.php', {
      method: 'POST',
      body: formData
    });

    if (!resposta.ok) throw new Error('Erro na requisição: ' + resposta.status);

    const data = await resposta.json();
    tbody.innerHTML = '';

    if (data.length > 0) {
      data.forEach(boleto => {
        const row = `
          <tr class="tr-tabela-de-dados">
            <td class="td-tabela-de-dados">${boleto.nome || boleto.expositor}</td>
            <td class="td-tabela-de-dados">${boleto.vencimento}</td>
            <td class="td-tabela-de-dados">${boleto.mes_referencia || boleto.referencia}</td>
            <td class="td-tabela-de-dados">R$ ${parseFloat(boleto.valor).toFixed(2)}</td>
            <td class="td-tabela-de-dados">${boleto.status_exp || boleto.status}</td>
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