document.addEventListener("DOMContentLoaded", () => {
  const tbody = document.getElementById("tbody-colaboradores");

  const modalConfirm = document.getElementById("modal-confirmacao");
  const modalSuccess = document.getElementById("modal-sucesso");
  const modalError = document.getElementById("modal-erro");

  const confirmText = modalConfirm.querySelector(".deletar-text");
  const successText = modalSuccess.querySelector(".deletar-text");
  const errorText = modalError.querySelector(".deletar-text");

  const btnNao = modalConfirm.querySelector(".deletar-modal-cancelar");
  const btnSim = modalConfirm.querySelector(".deletar-modal-salvar");
  const btnOk = modalSuccess.querySelector(".deletar-modal-salvar");
  const btnFecharErro = modalError.querySelector(".deletar-modal-cancelar");

  let currentButton = null;
  let novoStatus = "";
  let idColaborador = null;

  tbody.addEventListener("click", (e) => {
    if (e.target && e.target.matches("button.status")) {
      currentButton = e.target;
      idColaborador = currentButton.getAttribute("data-id");
      const statusAtual = currentButton.getAttribute("data-status");
      novoStatus = statusAtual === "ativo" ? "inativo" : "ativo";

      confirmText.textContent = `Deseja realmente ${novoStatus === "ativo" ? "ativar" : "inativar"} este ADM?`;
      modalConfirm.showModal();
    }
  });

  btnNao.onclick = () => {
    modalConfirm.close();
    currentButton = null;
  };

  btnSim.onclick = async () => {
    if (!currentButton || !idColaborador) {
      modalConfirm.close();
      return;
    }

    try {
      const response = await fetch("../../../actions/action-colaborador.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          acao: "alternarStatus",
          id_colaborador: idColaborador,
          status_atual: currentButton.getAttribute("data-status"),
        }),
      });

      const text = await response.text();
      const data = JSON.parse(text);

      if (response.ok && data.success) {
        // Atualiza botão status
        currentButton.textContent = data.novoStatusTexto;
        currentButton.setAttribute("data-status", data.novoStatus);
        if (data.novoStatus === "ativo") {
          currentButton.classList.remove("inactive");
          currentButton.classList.add("active");
        } else {
          currentButton.classList.remove("active");
          currentButton.classList.add("inactive");
        }

        modalConfirm.close();

        successText.textContent = data.message || "Status alterado com sucesso!";
        modalSuccess.showModal();
      } else {
        modalConfirm.close();

        errorText.textContent = data.message || "Erro ao tentar mudar o status.";
        modalError.showModal();
      }
    } catch (error) {
      modalConfirm.close();

      errorText.textContent = "Erro na comunicação com o servidor.";
      modalError.showModal();

      console.error("Erro no fetch/parse JSON:", error);
    }
  };

  btnOk.onclick = () => {
    modalSuccess.close();
    currentButton = null;
  };

  btnFecharErro.onclick = () => {
    modalError.close();
  };
});
