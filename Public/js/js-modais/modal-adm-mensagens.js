function openModalMensagem({ tipo = "info", titulo = "", mensagem = "" }) {
  const modal = document.getElementById("modal-mensagem");
  const icon = document.getElementById("modal-icon");
  const title = document.getElementById("modal-title");
  const msg = document.getElementById("modal-message");

  const tipos = {
    sucesso: { icon: "bi-check-circle-fill", color: "#007E70" },
    erro: { icon: "bi-x-circle-fill", color: "#FF3877" },
    alerta: { icon: "bi-exclamation-triangle-fill", color: "#ffc107" },
    info: { icon: "bi-info-circle", color: "#00628f" }
  };

  const { icon: iconClass, color } = tipos[tipo] || tipos.info;

  icon.className = `bi ${iconClass}`;
  icon.style.color = color;
  title.textContent = titulo;
  msg.textContent = mensagem;

  modal.showModal();
}

document.getElementById("btn-modal-fechar").onclick =
document.getElementById("close-modal-mensagem").onclick = () => {
  document.getElementById("modal-mensagem").close();
  document.location.reload()
};
