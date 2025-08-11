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
      data.forEach(boleto => {
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
let filtroNomeAtual = '';
let filtroStatusAtual = '';
let filtroDataInicialAtual = '';
let filtroDataFinalAtual = '';

// filtragem por nome com validação de input
inputNome.addEventListener('input', (e) => {
  let valorDigitado = e.target.value.trim();

  const regexNome = /^[\p{L}\s]+$/u;
  if (valorDigitado !== '' && !regexNome.test(valorDigitado)) {
    console.warn("Nome inválido. Use apenas letras e espaços.");
    return;
  }

  filtroNomeAtual = valorDigitado;

  carregarBoletos({
    nome: filtroNomeAtual,
    status: filtroStatusAtual,
    data_inicial: filtroDataInicialAtual,
    data_final: filtroDataFinalAtual
  });
});

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

// filtragem por data inicial e final via submit
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

// carregando a lista sem filtros inicialmente
carregarBoletos({});
