document.addEventListener('DOMContentLoaded', async () => {

    try {
        const response = await fetch('../../../actions/action-grafico-central.php');

        if (!response.ok) throw new Error('Erro na requisição');

        const data = await response.json();

        let qtdExpositor = data.qtdExpositor;

        let card = document.getElementById("dadosQtdExpositores");
        let html = '';

        html += `
            <p id="qtdExpositores" class="numeros">${qtdExpositor}</p>
            <p class="feirantes">Quantidade de Expositores</p>
        `;

        card.innerHTML = html;


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

    // try {
    //     const response = await fetch('../../../actions/action-grafico-central.php');

    //     if (!response.ok) throw new Error('Erro na requisição');

    //     const data = await response.json();

    //     let qtdExpositorEspera = data.qtdExpositorEspera;

    //     let card = document.getElementById("QtdExpositoresEspera");
    //     let html = '';

    //     html += `
    //         <p id="qtdExpositores" class="numeros">${qtdExpositorEspera}</p>
    //         <p class="feirantes">Quantidade de Expositores</p>
    //     `;

    //     card.innerHTML = html;
    //     } catch (error) {
    //         console.error('Erro:', error);
    //         // tabelaCategoria.innerHTML = `<tr><td colspan="4">Erro ao carregar categorias</td></tr>`;
    //     }

    
})

