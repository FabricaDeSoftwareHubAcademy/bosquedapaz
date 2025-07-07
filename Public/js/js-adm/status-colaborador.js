// Script para Mudar Status: 
document.addEventListener("DOMContentLoaded", () => {
  const tbody = document.getElementById("tbody-colaboradores");
  const modalConfirm = document.getElementById("modal-confirm");
  const modalSuccess = document.getElementById("modal-success");
  const modalConfirmMsg = document.getElementById("modal-confirm-msg");
  const modalSuccessMsg = document.getElementById("modal-success-msg");
  const btnSim = document.getElementById("modal-confirm-sim");
  const btnNao = document.getElementById("modal-confirm-nao");
  const btnOk = document.getElementById("modal-success-ok");

  let currentButton = null;
  let novoStatus = "";
  let idColaborador = null;

  tbody.addEventListener("click", (e) => {
    if (e.target && e.target.matches("button.status")) {
      currentButton = e.target;
      idColaborador = currentButton.getAttribute("data-id");
      const statusAtual = currentButton.getAttribute("data-status");
      novoStatus = statusAtual === "ativo" ? "inativo" : "ativo";

      modalConfirmMsg.textContent = `Deseja realmente ${novoStatus === "ativo" ? "ativar" : "inativar"} este ADM?`;
      modalConfirm.style.display = "flex";
    }
  });

  btnNao.addEventListener("click", () => {
    modalConfirm.style.display = "none";
    currentButton = null;
  });

  btnSim.addEventListener("click", async () => {
    if (!currentButton || !idColaborador) {
      modalConfirm.style.display = "none";
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
      console.log("Resposta do servidor:", text);

      const data = JSON.parse(text);

      if (response.ok && data.success) {
        currentButton.textContent = data.novoStatusTexto;
        currentButton.setAttribute("data-status", data.novoStatus);
        if (data.novoStatus === "ativo") {
          currentButton.classList.remove("inactive");
          currentButton.classList.add("active");
        } else {
          currentButton.classList.remove("active");
          currentButton.classList.add("inactive");
        }

        modalConfirm.style.display = "none";

        modalSuccessMsg.textContent = data.message;
        modalSuccess.style.display = "flex";
      } else {
        alert(data.message || "Erro ao tentar mudar o status.");
        modalConfirm.style.display = "none";
      }
    } catch (error) {
      alert("Erro na comunicação com o servidor.");
      modalConfirm.style.display = "none";
      console.error("Erro no fetch/parse JSON:", error);
    }
  });

  btnOk.addEventListener("click", () => {
    modalSuccess.style.display = "none";
    currentButton = null;
  });
});

// Matheus Manja