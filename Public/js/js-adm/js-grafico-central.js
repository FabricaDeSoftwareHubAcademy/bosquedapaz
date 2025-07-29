document.addEventListener('DOMContentLoaded', async () => {

    try {
        const response = await fetch('../../../actions/action-grafico-central.php');

        if (!response.ok) throw new Error('Erro na requisição');

        const data = await response.json();

        // console.log(data);

        let qtdExpositor = data.qtdExpositor;

        let card = document.getElementById("dadosQtdExpositores");
        let html = '';

        html += `
            <p id="qtdExpositores" class="numeros">${qtdExpositor}</p>
            <p class="feirantes">Quantidade de Expositores</p>
        `;

        card.innerHTML = html;

        let qtdExpositorEspera = data.qtdExpositorEspera;
        
        let card2 = document.getElementById("QtdExpositoresEspera");
        let html2 = '';

        html2 += `
            <p id="QtdExpositoresEspera" class="numeros">${qtdExpositorEspera}</p>
            <p class="feirantes">Expositores na fila de espera</p>
        `;

        card2.innerHTML = html2;


        // if (data.status === 'success') {
        //     renderizarTabela(data.dados);
        //     aplicarEventosBotoes(); // Aplica eventos depois de gerar a tabela
        // } else {
        //     tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro ao carregar categorias</td></tr>`;
        // }
    } catch (error) {
        console.error('Erro:', error);
        // tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro ao carregar categorias</td></tr>`;
    }
})

