document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("form-artista");
  const btnSalvar = document.getElementById("btn-salvar");
  const modalConfirmar = document.getElementById("modal-confirmar");
  const modalSucesso = document.getElementById("modal-sucesso");
  const modalErro = document.getElementById("modal-error");

  const btnModalCancelar = document.getElementById("btn-modal-cancelar");
  const btnModalSalvar = document.getElementById("btn-modal-salvar");

  const telefoneInput = form.querySelector('[name="whats"]');

  telefoneInput.addEventListener("input", (e) => {
    // Guarda posição do cursor antes da formatação
    let cursorPosition = telefoneInput.selectionStart;
    // Guarda valor antes da formatação
    const oldValue = telefoneInput.value;

    // Remove tudo que não for número
    let rawValue = oldValue.replace(/\D/g, "");

    // Formata conforme quantidade de dígitos
    if (rawValue.length > 10) {
      // (xx) xxxxx-xxxx para 11 dígitos
      rawValue = rawValue.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (rawValue.length > 5) {
      // (xx) xxxx-xxxx para 10 dígitos
      rawValue = rawValue.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (rawValue.length > 2) {
      // (xx) xxxx para menos dígitos
      rawValue = rawValue.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
    } else if (rawValue.length > 0) {
      // (xx
      rawValue = rawValue.replace(/^(\d{0,2})/, "($1");
    }

    // Atualiza valor formatado
    telefoneInput.value = rawValue;

    // Ajusta cursor para o final do texto formatado
    // Isso evita o cursor "travando" no meio da máscara ao apagar
    telefoneInput.selectionStart = telefoneInput.selectionEnd = rawValue.length;
  });

  btnSalvar.addEventListener("click", (e) => {
    e.preventDefault();

    const nome = form.querySelector('[name="nome"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();
    const telefone = form.querySelector('[name="whats"]').value.trim();
    const nomeArtistico = form.querySelector('[name="nome_artistico"]').value.trim();
    const linguagemArtistica = form.querySelector('[name="linguagem_artistica"]').value.trim();
    const valorCache = form.querySelector('[name="valor_cache"]').value.trim();
    const publicoAlvo = form.querySelector('[name="publico_alvo"]').value.trim();

    if (!nome || !email || !telefone || !nomeArtistico || !linguagemArtistica || !valorCache || !publicoAlvo) {
      alert("Por favor, preencha todos os campos obrigatórios.");
      return;
    }

    modalConfirmar.showModal();
  });

  btnModalCancelar.addEventListener("click", () => {
    modalConfirmar.close();
  });

  btnModalSalvar.addEventListener("click", async () => {
    modalConfirmar.close();

    // Remove a máscara do telefone antes de enviar
    const telefoneLimpo = telefoneInput.value.replace(/\D/g, "");
    // Cria um novo FormData para evitar alterar diretamente o form original
    const formData = new FormData(form);
    formData.set("whats", telefoneLimpo);

    try {
      const resposta = await fetch("../../../actions/actions-cadastrar-artista.php", {
        method: "POST",
        body: formData
      });

      const resultado = await resposta.json();
      console.log("Resultado:", resultado);

      if (resultado.status === 200 || resultado.status === "sucesso") {
        form.reset();
        modalSucesso.showModal();
      } else {
        modalErro.showModal();
      }
    } catch (erro) {
      console.error("Erro na requisição:", erro);
      modalErro.showModal();
    }
  });

  const fecharModais = document.querySelectorAll(".fechar-modal-loading");
  fecharModais.forEach(btn => {
    btn.addEventListener("click", () => {
      const modal = btn.closest("dialog");
      if (modal) modal.close();
    });
  });
});
