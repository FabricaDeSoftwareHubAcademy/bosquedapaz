document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get("status");

  const mensagens = {
    "101": "Cadastro realizado com sucesso!",
    "102": "Edição concluída com sucesso!",
    "103": "Item excluído com sucesso.",
    "104": "Erro ao realizar cadastro.",
    "105": "Permissão negada.",
    "106": "Sessão expirada.",
    "107": "Dados atualizados com sucesso.",
    "108": "Arquivo enviado com sucesso.",
    "109": "Falha ao enviar arquivo.",
    "110": "Ação concluída com sucesso."
  };

  // Se não houver status ou não estiver na lista, não exibe modal
  if (!status || !mensagens[status]) return;

  // Adiciona classe ao body para evitar scroll de fundo
  document.body.classList.add("modal-aberto");

  // Cria o HTML do modal com seu esqueleto
  const modalHtml = `
    <div class="modal-background">
      <div class="modal-container" id="modal-de-confirmacao">
        <div class="modal-content">
          <h1 class="modal-text">${mensagens[status]}</h1>
        </div>
        <div class="botoes-container">
          <button class="botao-modal botao-recusar">Recusar</button>
          <button class="botao-modal botao-confirmar">Confirmar</button>
        </div>
      </div>
    </div>
  `;

  const wrapper = document.createElement("div");
  wrapper.innerHTML = modalHtml;
  document.body.appendChild(wrapper);

  // Eventos para fechar o modal
  const fecharModal = () => {
    document.body.classList.remove("modal-aberto");
    wrapper.remove();
  };

  wrapper.querySelector(".botao-recusar").addEventListener("click", fecharModal);
  wrapper.querySelector(".botao-confirmar").addEventListener("click", fecharModal);
});
