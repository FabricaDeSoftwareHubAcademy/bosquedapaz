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
          classeStatus = 'listb-btn-pago';
        } else if (boleto.status_boleto === 'Pendente') {
          classeStatus = 'listb-btn-pendente';
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
              <button class="listb-link btn-boleto" data-id="${boleto.id_boleto}">
                <i class="fa-solid fa-print"></i>
              </button>
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

document.addEventListener('click', function(e) {
  if (e.target.closest('.btn-boleto')) {
    const idBoleto = e.target.closest('.btn-boleto').dataset.id;

    const formData = new FormData();
    formData.append('id_boleto', idBoleto);

    fetch('../../../actions/action-gerar-boleto.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) throw new Error('Erro ao gerar boleto.');
      return response.blob();
    })
    .then(blob => {
      const url = window.URL.createObjectURL(blob);
      window.open(url, '_blank');
    })
    .catch(err => {
      alert('Erro ao gerar boleto.');
      console.error(err);
    });
  }
});

carregarMeusBoletos();
