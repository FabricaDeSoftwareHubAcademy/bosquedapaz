// O uso do 'defer' no HTML já garante que o DOM está carregado antes da execução.
document.addEventListener('DOMContentLoaded', function() {

    // Caminho para o arquivo PHP que funciona como controlador e retorna os dados da API
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
            const status = item.validacao === "1" ? 'Validado' : (item.validacao === "0" ? 'Aguardando' : 'Recusado');
            chartData[status] = parseInt(item.total_expositores || 0);
        });
        return {
            labels: labelsStatus,
            datasets: [{
                label: 'Expositores por Status',
                data: labelsStatus.map(label => chartData[label]),
                backgroundColor: ['rgba(255, 205, 86, 0.8)', 'rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)'],
                borderColor: ['rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
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
            borderColor: 'rgba(54, 162, 235, 1)',
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
            backgroundColor: ['rgba(255, 159, 64, 0.8)', 'rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)'],
            borderColor: ['rgba(255, 159, 64, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
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
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
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
            borderColor: 'rgba(153, 102, 255, 1)',
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
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    }));
});
document.addEventListener('DOMContentLoaded', async () => {
  try {
    const response = await fetch('../../../actions/dashboard-controller.php?action=dadosGerais');
    if (!response.ok) throw new Error('Erro ao buscar dados gerais');
    const data = await response.json();

    document.querySelector('.spnValorVisitantes').textContent = data.visitantes || 0;
    document.querySelector('.spnValorExpositores').textContent = data.expositores || 0;
    document.querySelector('.spnValorArtistas').textContent = data.artistas || 0;
    document.querySelector('.spnValorEventosAtivos').textContent = data.eventos_ativos || 0;
  } catch (error) {
    console.error('Erro ao atualizar dados gerais:', error);
  }
});