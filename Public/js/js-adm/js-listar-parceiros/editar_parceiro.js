document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const idParceiro = urlParams.get("id");

  if (!idParceiro) {
    abrirModalErro("ID do parceiro não encontrado.");
    return;
  }

  // Buscar dados do parceiro
  fetch(`../../../actions/action-buscar-parceiro.php?id=${idParceiro}`)
    .then(res => res.json())
    .then(data => {
      if (data.erro) {
        abrirModalErro(data.erro);
        return;
      }

      document.getElementById("nome_parceiro").value = data.nome_parceiro || "";
      document.getElementById("telefone").value = data.telefone || "";
      mascaraTelefone(document.getElementById("telefone"), {});

      document.getElementById("cpf_cnpj").value = data.cpf_cnpj || "";
      mascaraCpfCnpj(document.getElementById("cpf_cnpj"), {});

      document.getElementById("cep").value = data.cep || "";
      mascaraCep(document.getElementById("cep"), {});

      document.getElementById("email").value = data.email || "";
      document.getElementById("nome_contato").value = data.nome_contato || "";
      document.getElementById("tipo").value = data.tipo || "";
      document.getElementById("complemento").value = data.complemento || "";
      document.getElementById("num_residencia").value = data.num_residencia || "";
      document.getElementById("logradouro").value = data.logradouro || "";
      document.getElementById("estado").value = data.estado || "";
      document.getElementById("bairro").value = data.bairro || "";
      document.getElementById("cidade").value = data.cidade || "";

      if (data.logo) {
        const previewLogo = document.getElementById("preview-logo");
        previewLogo.src = `../../../Public/uploads/uploads-parceiros/${data.logo}`;
        previewLogo.style.display = "block";
      }
    })
    .catch(err => {
      console.error("Erro ao carregar:", err);
      abrirModalErro("Erro ao carregar os dados do parceiro.");
    });

  // Aplica máscaras reativas
  document.getElementById("telefone").addEventListener("input", function (e) {
    mascaraTelefone(this, e);
  });

  document.getElementById("cep").addEventListener("input", function (e) {
    mascaraCep(this, e);
  });

  document.getElementById("cpf_cnpj").addEventListener("input", function (e) {
    mascaraCpfCnpj(this, e);
  });

  // ** NOVO: Atualiza endereço ao mudar CEP **
  document.getElementById("cep").addEventListener("blur", function () {
    const cep = this.value.replace(/\D/g, "");
    if (cep.length === 8) {
      fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(res => res.json())
        .then(data => {
          if (!data.erro) {
            document.getElementById("logradouro").value = data.logradouro || "";
            document.getElementById("bairro").value = data.bairro || "";
            document.getElementById("cidade").value = data.localidade || "";
            document.getElementById("estado").value = data.uf || "";
          } else {
            abrirModalErro("CEP não encontrado.");
            document.getElementById("logradouro").value = "";
            document.getElementById("bairro").value = "";
            document.getElementById("cidade").value = "";
            document.getElementById("estado").value = "";
          }
        })
        .catch(() => {
          abrirModalErro("Erro ao consultar o CEP.");
        });
    }
  });

  // Botão salvar
  document.getElementById("btn-salvar").addEventListener("click", e => {
    e.preventDefault();
    if (!idParceiro) {
      abrirModalErro("ID do parceiro não encontrado.");
      return;
    }

    if (!document.getElementById("nome_parceiro").value.trim()) {
      abrirModalErro("O nome do parceiro é obrigatório.");
      return;
    }

    const formData = new FormData();
    formData.append("salvar", true);
    formData.append("nome_parceiro", document.getElementById("nome_parceiro").value);
    formData.append("telefone", document.getElementById("telefone").value.replace(/\D/g, ""));
    formData.append("cpf_cnpj", document.getElementById("cpf_cnpj").value.replace(/\D/g, ""));
    formData.append("cep", document.getElementById("cep").value.replace(/\D/g, ""));
    formData.append("tolkenCsrf", document.getElementById("tolkenCsrf"));

    const logoInput = document.getElementById("logo");
    if (logoInput && logoInput.files.length > 0) {
      formData.append("logo", logoInput.files[0]);
    }

    const outrosCampos = [
      "email", "nome_contato", "tipo", "complemento", "num_residencia",
      "logradouro", "estado", "bairro", "cidade"
    ];

    outrosCampos.forEach(id => {
      formData.append(id, document.getElementById(id).value);
    });

    fetch(`../../../actions/action-editar-parceiro.php?id=${idParceiro}`, {
      method: "POST",
      body: formData
    })
      .then(res => res.json())
      .then(result => {
        if (result.sucesso) {
          abrirModalSucesso(result.sucesso);

          setTimeout(() => {
            window.location.href = '../../../app/Views/Adm/listar-parceiros.php';
          }, 2000);

        } else {
          abrirModalErro(result.erro || "Erro ao atualizar o parceiro.");
        }
      })
      .catch(err => {
        console.error("Erro no envio:", err);
        abrirModalErro("Erro ao enviar os dados.");
      });
  });
});

// Máscaras iguais cadastro

function mascaraTelefone(input, e) {
  if (e && e.inputType === "deleteContentBackward") return;
  let v = input.value.replace(/\D/g, "").substring(0, 11);
  if (v.length > 10) {
    input.value = `(${v.substring(0, 2)}) ${v.substring(2, 7)}-${v.substring(7, 11)}`;
  } else if (v.length > 5) {
    input.value = `(${v.substring(0, 2)}) ${v.substring(2, 6)}-${v.substring(6, 10)}`;
  } else if (v.length > 2) {
    input.value = `(${v.substring(0, 2)}) ${v.substring(2)}`;
  } else {
    input.value = v;
  }
}

function mascaraCep(input, e) {
  if (e && e.inputType === "deleteContentBackward") return;
  let v = input.value.replace(/\D/g, "").substring(0, 8);
  if (v.length > 5) {
    input.value = v.substring(0, 5) + "-" + v.substring(5);
  } else {
    input.value = v;
  }
}

function mascaraCpfCnpj(input, e) {
  if (e && e.inputType === "deleteContentBackward") return;
  let v = input.value.replace(/\D/g, "").substring(0, 14);
  if (v.length <= 11) {
    if (v.length > 9) {
      input.value = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6, 9)}-${v.substring(9, 11)}`;
    } else if (v.length > 6) {
      input.value = `${v.substring(0, 3)}.${v.substring(3, 6)}.${v.substring(6)}`;
    } else if (v.length > 3) {
      input.value = `${v.substring(0, 3)}.${v.substring(3)}`;
    } else {
      input.value = v;
    }
  } else {
    input.value = `${v.substring(0, 2)}.${v.substring(2, 5)}.${v.substring(5, 8)}/${v.substring(8, 12)}-${v.substring(12, 14)}`;
  }
}

// Preview da logo ao selecionar nova imagem
document.getElementById('logo').addEventListener('change', function () {
  const file = this.files[0];
  const preview = document.getElementById('preview-logo');

  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    preview.src = '#';
    preview.style.display = 'none';
  }
});

// Funções de modais

function abrirModalErro(mensagem = "Ocorreu um erro", titulo = "Erro") {
  const modal = document.getElementById("modal-error");
  const tituloEl = document.getElementById("erro-title");
  const textoEl = document.getElementById("erro-text");

  if (tituloEl && textoEl && modal) {
    tituloEl.textContent = titulo;
    textoEl.textContent = mensagem;
    modal.showModal();
  } else {
    console.error("Elementos do modal de erro não encontrados");
  }
}

function abrirModalSucesso(mensagem = "Ação realizada com sucesso", titulo = "Sucesso!") {
  const modal = document.getElementById("modal-sucesso");
  const tituloEl = document.getElementById("sucesso-title");
  const textoEl = document.getElementById("msm-sucesso");

  if (tituloEl && textoEl && modal) {
    tituloEl.textContent = titulo;
    textoEl.textContent = mensagem;
    modal.showModal();
  } else {
    console.error("Elementos do modal de sucesso não encontrados");
  }
}

function abrirModalConfirmar(mensagem = "Deseja confirmar esta ação?", titulo = "Confirmação") {
  const modal = document.getElementById("modal-confirmar");
  const tituloEl = document.getElementById("confirmar-title");
  const textoEl = document.getElementById("msm-confimar");

  if (tituloEl && textoEl && modal) {
    tituloEl.textContent = titulo;
    textoEl.textContent = mensagem;
    modal.showModal();
  } else {
    console.error("Elementos do modal de confirmação não encontrados");
  }
}

// Botões de fechar modais
document.getElementById("close-modal-erro")?.addEventListener("click", () => {
  document.getElementById("modal-error")?.close();
});

document.getElementById("close-modal-sucesso")?.addEventListener("click", () => {
  document.getElementById("modal-sucesso")?.close();
});

document.getElementById("close-modal-confirmar")?.addEventListener("click", () => {
  document.getElementById("modal-confirmar")?.close();
});

// Botão "Cancelar" do modal de confirmação
document.getElementById("btn-modal-cancelar")?.addEventListener("click", () => {
  document.getElementById("modal-confirmar")?.close();
});
