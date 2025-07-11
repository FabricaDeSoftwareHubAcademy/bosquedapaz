document.addEventListener('DOMContentLoaded', () => {
    const btnSalvar = document.getElementById('btn-salvar-endereco');
  
    btnSalvar.addEventListener('click', async (event) => {
      event.preventDefault();
      openModalConfirmar();
  
      document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar);
      document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar);
  
      document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
        closeModalConfirmar();
  
        const local_evento = document.getElementById('local_evento').value.trim();
        const cep_evento = document.getElementById('cep_evento').value.trim();
        const logradouro_evento = document.getElementById('logradouro_evento').value.trim();
        const complemento_evento = document.getElementById('complemento_evento').value.trim();
        const numero_evento = document.getElementById('numero_evento').value.trim();
        const bairro_evento = document.getElementById('bairro_evento').value.trim();
        const cidade_evento = document.getElementById('cidade_evento').value.trim();
  
        if (!local_evento || !cep_evento || !logradouro_evento || !numero_evento || !bairro_evento || !cidade_evento) {
          document.getElementById('erro-title').innerText = 'Campos obrigatórios incompletos';
          document.getElementById('erro-text').innerText = 'Preencha todos os campos obrigatórios antes de salvar.';
          openModalError();
          document.getElementById('close-modal-erro').addEventListener('click', closeModalError);
          return;
        }
  
        const formData = new FormData();
        formData.append('local_evento', local_evento);
        formData.append('cep_evento', cep_evento);
        formData.append('logradouro_evento', logradouro_evento);
        formData.append('complemento_evento', complemento_evento);
        formData.append('numero_evento', numero_evento);
        formData.append('bairro_evento', bairro_evento);
        formData.append('cidade_evento', cidade_evento);
  
        try {
          const resposta = await fetch('../../../actions/action-cadastrar-endereco-evento.php', {
            method: 'POST',
            body: formData
          });
  
          const resultado = await resposta.json();
          if (resultado.status === 'sucesso') {
            document.getElementById('msm-sucesso').innerText = resultado.mensagem;
            openModalSucesso();
            document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso);
  
            // Atualiza select de endereços, se necessário
            atualizarSelectEndereco();
            document.getElementById('modal-cadastrar-endereco').close();
  
          } else {
            document.getElementById('erro-title').innerText = 'Erro ao cadastrar endereço';
            document.getElementById('erro-text').innerText = resultado.mensagem;
            openModalError();
          }
  
        } catch (error) {
          console.error('Erro na requisição:', error);
          document.getElementById('erro-title').innerText = 'Erro de comunicação';
          document.getElementById('erro-text').innerText = 'Não foi possível se comunicar com o servidor.';
          openModalError();
        }
      });
    });
  
    // Cancelar botão
    document.getElementById('btn-cancelar-endereco').addEventListener('click', () => {
      document.getElementById('modal-cadastrar-endereco').close();
    });
  
    document.getElementById('close-modal-endereco').addEventListener('click', () => {
      document.getElementById('modal-cadastrar-endereco').close();
    });
  });