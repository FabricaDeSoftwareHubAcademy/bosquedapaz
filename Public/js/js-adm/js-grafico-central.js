let currentDate = new Date();
let currentMonth = currentDate.getMonth(); // 0 a 11
let currentYear = currentDate.getFullYear();

document.addEventListener('DOMContentLoaded', function() {

    const API_BASE_PATH = '../../../actions/dashboard-controller.php';
    
    const charts = {};

    async function fetchDataAndRenderChart(chartId, action, chartConfig, dataTransformer) {
        const ctx = document.getElementById(chartId);
        if (!ctx) {
            console.error(`Elemento do gráfico com ID '${chartId}' não foi encontrado no DOM.`);
            return;
        }

        try {
            const response = await fetch(`${API_BASE_PATH}?action=${action}`);
            if (!response.ok) {
                throw new Error(`Erro de rede (${response.status}) ao buscar dados para a ação: ${action}`);
            }
            const dataFromApi = await response.json();

            if (dataFromApi.error) {
                throw new Error(`Erro retornado pela API para '${action}': ${dataFromApi.error}`);
            }

            const transformedData = dataTransformer(dataFromApi);
            chartConfig.data = transformedData;
            charts[chartId] = new Chart(ctx, chartConfig);

        } catch (error) {
            console.error(`Falha ao buscar ou renderizar o gráfico '${chartId}':`, error);
            ctx.getContext('2d').fillText('Não foi possível carregar os dados.', 10, 50);
        }
    }

    // Gráfico 1: Expositores por Status (Doughnut)
    const labelsStatus = ['Aguardando', 'Validado', 'Recusado'];
    const chartConfigStatus = {
        type: 'doughnut',
        data: {},
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
                title: { display: false }
            }
        }
    };
    fetchDataAndRenderChart('expositorStatusChart', 'expositorStatus', chartConfigStatus, (apiData) => {
        const chartData = { 'Aguardando': 0, 'Validado': 0, 'Recusado': 0 };
        apiData.forEach(item => {
let status;
switch(item.validacao.toLowerCase()) {
    case 'validado':
        status = 'Validado';
        break;
    case 'aguardando':
        status = 'Aguardando';
        break;
    case 'recusado':
        status = 'Recusado';
        break;
    default:
        status = 'Recusado'; // fallback seguro
}
            chartData[status] = parseInt(item.total_expositores || 0);
        });
        return {
            labels: labelsStatus,
            datasets: [{
                label: 'Expositores por Status',
                data: labelsStatus.map(label => chartData[label]),
                backgroundColor: ['rgba(255, 205, 86, 0.8)', 'rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)'],
                // borderColor: ['rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1,
                hoverOffset: 4
            }]
        };
    });

    // Gráfico 2: Expositores por Categoria (Barras Horizontais)
    const chartConfigCategoria = {
        type: 'bar',
        data: {},
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { x: { beginAtZero: true } }
        }
    };
    fetchDataAndRenderChart('expositorCategoriaChart', 'expositorCategoria', chartConfigCategoria, (apiData) => ({
        labels: apiData.map(item => item.categoria),
        datasets: [{
            label: 'Número de Expositores',
            data: apiData.map(item => item.total_expositores || 0),
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            // borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    }));

    // Gráfico 3: Boleto por Status (Doughnut)
    const chartConfigBoleto = {
        type: 'doughnut',
        data: {},
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    };
    fetchDataAndRenderChart('boletoPorStatusChart', 'boletoStatus', chartConfigBoleto, (apiData) => ({
        labels: apiData.map(item => item.status),
        datasets: [{
            label: 'Boletos por Status',
            data: apiData.map(item => item.total_boletos || 0),
            backgroundColor: ['rgba(99, 202, 2, 1)', 'rgba(255, 166, 0, 0.91)', 'rgba(255, 99, 132, 0.8)'],
            // borderColor: ['rgba(255, 159, 64, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1,
            hoverOffset: 4
        }]
    }));

    // Gráfico 4: Parceiro por Status (Barras Verticais)
    const chartConfigParceiro = {
        type: 'bar',
        data: {},
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    };
    fetchDataAndRenderChart('parceiroPorStatusChart', 'parceiroStatus', chartConfigParceiro, (apiData) => ({
        labels: apiData.map(item => item.status),
        datasets: [{
            label: 'Número de Parceiros',
            data: apiData.map(item => item.total_parceiros || 0),
            backgroundColor: ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)'],
            // borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    }));

    // Gráfico 5: Cidades de Origem (Barras Verticais)
    const chartConfigCidades = {
        type: 'bar',
        data: {},
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    };
    fetchDataAndRenderChart('cidadesOrigemChart', 'cidadesOrigem', chartConfigCidades, (apiData) => ({
        labels: apiData.map(item => item.cidade),
        datasets: [{
            label: 'Número de Expositores',
            data: apiData.map(item => item.total_expositores || 0),
            backgroundColor: 'rgba(153, 102, 255, 0.8)',
            // borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    }));

    // Gráfico 6: Número de Atrações por Evento (Barras Verticais)
    const chartConfigAtracoes = {
        type: 'bar',
        data: {},
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    };
    fetchDataAndRenderChart('atracoesPorEventoChart', 'atracoesPorEvento', chartConfigAtracoes, (apiData) => ({
        labels: apiData.map(item => item.nome_evento),
        datasets: [{
            label: 'Número de Atrações',
            data: apiData.map(item => item.total_atracoes || 0),
            backgroundColor: 'rgba(255, 99, 132, 0.8)',
            // borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    }));
});
document.addEventListener('DOMContentLoaded', async () => {
  try {
    const response = await fetch('../../../actions/dashboard-controller.php?action=dadosGerais');
    if (!response.ok) throw new Error('Erro ao buscar dados gerais');
    const data = await response.json();

    document.querySelector('.spnValorVisitantes').textContent = data.total_pago || 0;
    document.querySelector('.spnValorExpositores').textContent = data.expositores || 0;
    document.querySelector('.spnValorArtistas').textContent = data.artistas || 0;
    document.querySelector('.spnValorEventosAtivos').textContent = data.eventos_ativos || 0;
  } catch (error) {
    console.error('Erro ao atualizar dados gerais:', error);
  }
});

const nomesMeses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                    'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

async function atualizarDadosMensais(mes, ano) {
  try {
    const response = await fetch(`../../../actions/dashboard-controller.php?action=dadosGerais&mes=${mes + 1}&ano=${ano}`);
    if (!response.ok) throw new Error('Erro ao buscar dados mensais');

    const data = await response.json();

    document.querySelector('.spnValorVisitantes').textContent = data.total_pago || '0,00';
    document.querySelector('.spnVisitantes').textContent = `${nomesMeses[mes]} ${ano}`;
  } catch (error) {
    console.error('Erro ao atualizar dados mensais:', error);
  }
}

// Inicializa com o mês atual
atualizarDadosMensais(currentMonth, currentYear);

// Navegação com setas
document.querySelector('.btnMes.tras').addEventListener('click', () => {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  atualizarDadosMensais(currentMonth, currentYear);
});

document.querySelector('.btnMes.frente').addEventListener('click', () => {
  const hoje = new Date();
  const mesAtual = hoje.getMonth();
  const anoAtual = hoje.getFullYear();

  if (currentYear === anoAtual && currentMonth === mesAtual) {
    // Bloqueia o clique, não faz nada
    return;
  }

  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  atualizarDadosMensais(currentMonth, currentYear);
});