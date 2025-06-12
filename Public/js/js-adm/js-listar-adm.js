// -------------------------------------------------- 
// Script Para Listar os Colaboradores:
async function listar(){
    try{
        const resposta = await fetch("../../../actions/action-colaborador.php");
        const json = await resposta.json();

        console.log(json);

        if (!json.data || json.data.length === 0) {
            document.getElementById('tbody-colaboradores').innerHTML = '<tr><td colspan="6">Nenhum ADM encontrado.</td></tr>';
            return;
        }

        let linhas = '';
        json.data.forEach(colab => {
            linhas += `<tr>
                <td class="usuario-col">${colab['id_colaborador']}</td>
                <td>${colab['nome']}</td>
                <td class="email-col">${colab['email']}</td>
                <td class="fone-col">${colab['telefone']}</td>
                <td class="cargo-col">${colab['cargo']}</td>
                <td>
                    <button 
                        type="button" 
                        class="status ${colab['status_col'] === 'ativo' ? 'active' : 'inactive'}" 
                        data-id="${colab['id_colaborador']}" 
                        data-status="${colab['status_col']}">
                        ${colab['status_col'] === 'ativo' ? 'Ativo' : 'Inativo'}
                    </button>
                </td>
            </tr>`;
        }); 
    
        document.getElementById('tbody-colaboradores').innerHTML = linhas;

    } catch (e){
        console.error("Erro ao listar colaboradores:", e);
    } 
}
listar();


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

  // Delegação de evento para qualquer botão de status dentro do tbody
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
        // Atualiza botão com novo status e classes CSS
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
// -------------------------------------------------- 
// Script Para Buscar Colaborador: No Arquivo (js-buscar-adm.js)
