const tbody = document.querySelector('.listb-body');

async function carregarMeusBoletos() {
  try {
    const resposta = await fetch('../../../actions/action-listar-boletos-pessoais.php', {
      method: 'POST'
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
          <tr class="listb-tr">
            <td class="listb-boleto-td">${boleto.id_boleto}</td>
            <td class="listb-boleto-td">${boleto.vencimento}</td>
            <td class="listb-boleto-td">${boleto.mes_referencia}</td>
            <td class="listb-boleto-td">R$ ${parseFloat(boleto.valor).toFixed(2)}</td>
            <td class="listb-boleto-td">
              <button class="listb-btn-pago ${classeStatus}" disabled>${boleto.status_boleto}</button>
            </td>
            <td class="listb-boleto-td">
              <a href="../../../actions/gerar-boleto.php?id=${boleto.id_boleto}" class="listb-link" target="_blank">
                <i class="fa-solid fa-print"></i>
              </a>
            </td>
          </tr>
        `;

        tbody.innerHTML += row;
      });
    } else {
      tbody.innerHTML = `
        <tr class="listb-tr">
          <td class="listb-boleto-td" colspan="6">Nenhum boleto encontrado.</td>
        </tr>
      `;
    }
  } catch (error) {
    console.error('Erro ao carregar boletos:', error);
  }
}

// Carrega os boletos automaticamente ao abrir a tela
carregarMeusBoletos();
