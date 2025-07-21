document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const idParceiro = urlParams.get("id");
  
    if (!idParceiro) {
      alert("ID do parceiro não encontrado.");
      return;
    }
  
    // Buscar dados do parceiro
    fetch(`../../../actions/action-buscar-parceiro.php?id=${idParceiro}`)
      .then(res => res.json())
      .then(data => {
        if (data.erro) {
          alert(data.erro);
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
      })
      .catch(err => {
        console.error("Erro ao carregar:", err);
        alert("Erro ao carregar os dados do parceiro.");
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
  
    // Botão salvar
    document.getElementById("btn-salvar").addEventListener("click", e => {
      e.preventDefault();
      if (!idParceiro) {
        alert("ID do parceiro não encontrado.");
        return;
      }
  
      const formData = new FormData();
      formData.append("salvar", true);
      formData.append("nome_parceiro", document.getElementById("nome_parceiro").value);
      formData.append("telefone", document.getElementById("telefone").value.replace(/\D/g, ""));
      formData.append("cpf_cnpj", document.getElementById("cpf_cnpj").value.replace(/\D/g, ""));
      formData.append("cep", document.getElementById("cep").value.replace(/\D/g, ""));
  
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
            alert(result.sucesso);
            window.location.href = "../../../app/Views/Adm/listar-parceiros.php";
          } else {
            alert(result.erro || "Erro ao atualizar o parceiro.");
          }
        })
        .catch(err => {
          console.error("Erro no envio:", err);
          alert("Erro ao enviar os dados.");
        });
    });
  });
  
  // --- Máscaras ---
  function mascaraTelefone(input, e) {
    if (e.inputType === "deleteContentBackward") return;
    const v = input.value.replace(/\D/g, "").slice(0, 11);
    if (v.length > 10) {
      input.value = `(${v.slice(0, 2)}) ${v.slice(2, 7)}-${v.slice(7)}`;
    } else if (v.length > 5) {
      input.value = `(${v.slice(0, 2)}) ${v.slice(2, 6)}-${v.slice(6)}`;
    } else if (v.length > 2) {
      input.value = `(${v.slice(0, 2)}) ${v.slice(2)}`;
    } else {
      input.value = v;
    }
  }
  
  function mascaraCep(input, e) {
    if (e.inputType === "deleteContentBackward") return;
    const v = input.value.replace(/\D/g, "").slice(0, 8);
    input.value = v.length > 5 ? `${v.slice(0, 5)}-${v.slice(5)}` : v;
  }
  
  function mascaraCpfCnpj(input, e) {
    if (e.inputType === "deleteContentBackward") return;
    const v = input.value.replace(/\D/g, "").slice(0, 14);
    if (v.length <= 11) {
      if (v.length > 9) {
        input.value = `${v.slice(0, 3)}.${v.slice(3, 6)}.${v.slice(6, 9)}-${v.slice(9)}`;
      } else if (v.length > 6) {
        input.value = `${v.slice(0, 3)}.${v.slice(3, 6)}.${v.slice(6)}`;
      } else if (v.length > 3) {
        input.value = `${v.slice(0, 3)}.${v.slice(3)}`;
      } else {
        input.value = v;
      }
    } else {
      input.value = `${v.slice(0, 2)}.${v.slice(2, 5)}.${v.slice(5, 8)}/${v.slice(8, 12)}-${v.slice(12)}`;
    }
  }
  
  // Atualiza o preview da imagem ao selecionar nova logo
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
