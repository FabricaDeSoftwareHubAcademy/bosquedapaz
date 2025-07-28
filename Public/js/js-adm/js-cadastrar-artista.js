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
    const input = telefoneInput;
    const inputValue = input.value;
    const cursorPosition = input.selectionStart;

    // Remove tudo que não for número
    let digits = inputValue.replace(/\D/g, "");

    // Aplica a máscara baseada na quantidade de dígitos
    let formatted = "";
    if (digits.length > 10) {
      // (xx) xxxxx-xxxx
      formatted = digits.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (digits.length > 5) {
      // (xx) xxxx-xxxx
      formatted = digits.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (digits.length > 2) {
      // (xx) xxxx
      formatted = digits.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
    } else if (digits.length > 0) {
      // (xx
      formatted = digits.replace(/^(\d{0,2})/, "($1");
    } else {
      formatted = "";
    }

    // Função para contar caracteres não numéricos antes do cursor
    const countNonDigitsBeforeCursor = (str, pos) => {
      let count = 0;
      for (let i = 0; i < pos; i++) {
        if (/\D/.test(str[i])) count++;
      }
      return count;
    };

    // Conta caracteres não numéricos antes do cursor na string antiga
    const oldNonDigitsBefore = countNonDigitsBeforeCursor(inputValue, cursorPosition);

    // Tentativa de cálculo da nova posição do cursor
    // A posição do cursor pode variar; aqui fazemos uma aproximação:
    let newCursorPos = cursorPosition;

    // Atualiza o valor formatado
    input.value = formatted;

    // Ajusta a posição do cursor para que fique na posição correta depois da formatação
    // Como a máscara adiciona caracteres, precisamos ajustar
    let nonDigitsInFormattedBefore = 0;
    let digitsCounted = 0;
    for (let i = 0; i < formatted.length; i++) {
      if (/\d/.test(formatted[i])) digitsCounted++;
      if (digitsCounted >= (cursorPosition - oldNonDigitsBefore)) {
        newCursorPos = i + 1;
        break;
      }
    }

    if (newCursorPos > formatted.length) newCursorPos = formatted.length;

    input.setSelectionRange(newCursorPos, newCursorPos);
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
