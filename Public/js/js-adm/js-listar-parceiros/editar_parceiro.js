document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const idParceiro = urlParams.get("id");

  // --- Referências aos elementos do DOM ---
  const nomeParceiroInput = document.getElementById("nome_parceiro");
  const telefoneInput = document.getElementById("telefone");
  const cpfCnpjInput = document.getElementById("cpf_cnpj");
  const cepInput = document.getElementById("cep");
  const emailInput = document.getElementById("email");
  const nomeContatoInput = document.getElementById("nome_contato");
  const tipoInput = document.getElementById("tipo");
  const complementoInput = document.getElementById("complemento");
  const numResidenciaInput = document.getElementById("num_residencia");
  const logradouroInput = document.getElementById("logradouro");
  const estadoInput = document.getElementById("estado");
  const bairroInput = document.getElementById("bairro");
  const cidadeInput = document.getElementById("cidade");
  const logoInput = document.getElementById("logo");
  const btnSalvar = document.getElementById("btn-salvar");

  // --- Referências aos Modais ---
  const modalErro = document.getElementById("modal-error");
  const tituloModalErro = document.getElementById("erro-title");
  const textoModalErro = document.getElementById("erro-text");

  const modalSucesso = document.getElementById("modal-sucesso");
  const tituloModalSucesso = document.getElementById("sucesso-title");
  const textoModalSucesso = document.getElementById("msm-sucesso");

  const modalConfirmar = document.getElementById("modal-confirmar");
  const tituloModalConfirmar = document.getElementById("confirmar-title");
  const textoModalConfirmar = document.getElementById("msm-confimar");
  const btnConfirmarModal = document.getElementById("btn-modal-salvar"); // Botão "Salvar" do modal de confirmação
  const btnCancelarModal = document.getElementById("btn-modal-cancelar"); // Botão "Cancelar" do modal de confirmação

  // Variável para controlar a ação pendente do modal de confirmação
  let acaoPendente = null;

  // --- Funções de Modal ---
  function abrirModalErro(mensagemTitulo, mensagemTexto) {
    if (tituloModalErro && textoModalErro && modalErro) {
      tituloModalErro.textContent = mensagemTitulo;
      textoModalErro.textContent = mensagemTexto;
      modalErro.showModal();
    } else {
      console.error("Elementos do modal de erro não encontrados.");
    }
  }

  function abrirModalSucesso(mensagemTitulo, mensagemTexto) {
    if (tituloModalSucesso && textoModalSucesso && modalSucesso) {
      tituloModalSucesso.textContent = mensagemTitulo;
      textoModalSucesso.textContent = mensagemTexto;
      modalSucesso.showModal();
    } else {
      console.error("Elementos do modal de sucesso não encontrados.");
    }
  }

  function abrirModalConfirmar(titulo, mensagem) {
    if (tituloModalConfirmar && textoModalConfirmar && modalConfirmar) {
      tituloModalConfirmar.textContent = titulo;
      textoModalConfirmar.textContent = mensagem;
      modalConfirmar.showModal();
    } else {
      console.error("Elementos do modal de confirmação não encontrados.");
    }
  }

  // --- Fechar Modais (centralizado) ---
  document.getElementById("close-modal-erro")?.addEventListener("click", () => modalErro?.close());
  document.getElementById("close-modal-sucesso")?.addEventListener("click", () => modalSucesso?.close());
  document.getElementById("close-modal-confirmar")?.addEventListener("click", () => modalConfirmar?.close());
  btnCancelarModal?.addEventListener("click", () => modalConfirmar?.close());


  // --- Início do fluxo de edição do parceiro ---
  if (!idParceiro) {
    abrirModalErro("ID do parceiro não encontrado.", "Não foi possível carregar os dados para edição.");
    return;
  }

  // --- Buscar dados do parceiro ao carregar a página ---
  fetch(`../../../actions/action-buscar-parceiro.php?id=${idParceiro}`)
    .then(res => res.json())
    .then(data => {
      if (data.erro) {
        abrirModalErro("Erro ao carregar os dados:", data.erro);
        return;
      }

      // Preenche os campos do formulário com os dados do parceiro
      nomeParceiroInput.value = data.nome_parceiro || "";
      telefoneInput.value = data.telefone || "";
      // Chama a máscara após preencher para formatar o valor já existente
      mascaraTelefone(telefoneInput); 

      cpfCnpjInput.value = data.cpf_cnpj || "";
      mascaraCpfCnpj(cpfCnpjInput); // Chama a máscara após preencher

      cepInput.value = data.cep || "";
      mascaraCep(cepInput); // Chama a máscara após preencher

      emailInput.value = data.email || "";
      nomeContatoInput.value = data.nome_contato || "";
      tipoInput.value = data.tipo || "";
      complementoInput.value = data.complemento || "";
      numResidenciaInput.value = data.num_residencia || "";
      logradouroInput.value = data.logradouro || "";
      estadoInput.value = data.estado || "";
      bairroInput.value = data.bairro || "";
      cidadeInput.value = data.cidade || "";

      // Exibe a logo existente, se houver
      const previewLogo = document.getElementById('preview-logo');
      if (data.logo_url && previewLogo) { // Assumindo que 'logo_url' é o caminho da logo retornado pelo PHP
        previewLogo.src = `../../../${data.logo_url}`; // Ajuste o caminho conforme necessário
        previewLogo.style.display = 'block';
      }

    })
    .catch(err => {
      console.error("Erro ao carregar dados do parceiro:", err);
      abrirModalErro("Erro de comunicação", "Não foi possível carregar os dados do parceiro.");
    });


  // --- Aplica máscaras reativas aos campos ---
  telefoneInput.addEventListener("input", function () {
    mascaraTelefone(this);
  });

  cepInput.addEventListener("input", function () {
    mascaraCep(this);
  });

  cpfCnpjInput.addEventListener("input", function () {
    mascaraCpfCnpj(this);
  });

  // --- Evento de clique para o botão "Salvar" (AGORA ABRE O MODAL DE CONFIRMAÇÃO) ---
  btnSalvar.addEventListener("click", e => {
    e.preventDefault();

    if (!idParceiro) {
      abrirModalErro("ID do parceiro não encontrado.", "Não é possível salvar sem um ID.");
      return;
    }

    if (!nomeParceiroInput.value.trim()) {
      abrirModalErro("Validação", "O nome do parceiro é obrigatório.");
      return;
    }

    // Se a validação básica passar, define a ação pendente e abre o modal de confirmação
    acaoPendente = 'salvarEdicaoParceiro';
    abrirModalConfirmar("Confirmar Edição", "Deseja realmente salvar as alterações deste parceiro?");
  });

  // --- Evento de clique para o botão "Salvar" DENTRO DO MODAL DE CONFIRMAÇÃO ---
  btnConfirmarModal.addEventListener("click", async () => {
    modalConfirmar.close(); // Fecha o modal de confirmação

    if (acaoPendente === 'salvarEdicaoParceiro') {
      await enviarDadosParceiro(); // Chama a função para enviar os dados
    }
    acaoPendente = null; // Limpa a ação pendente
  });

  // --- Função para ENVIAR OS DADOS DO PARCEIRO (antes era direto no btnSalvar) ---
  async function enviarDadosParceiro() {
    const formData = new FormData();
    formData.append("salvar", true); // Indica ao PHP que é uma ação de salvar
    formData.append("id", idParceiro); // Garante que o ID do parceiro está no FormData

    formData.append("nome_parceiro", nomeParceiroInput.value);
    formData.append("telefone", telefoneInput.value.replace(/\D/g, "")); // Remove não-dígitos para envio
    formData.append("cpf_cnpj", cpfCnpjInput.value.replace(/\D/g, ""));   // Remove não-dígitos para envio
    formData.append("cep", cepInput.value.replace(/\D/g, ""));             // Remove não-dígitos para envio

    // Adiciona a logo apenas se um novo arquivo foi selecionado
    if (logoInput && logoInput.files.length > 0) {
      formData.append("logo", logoInput.files[0]);
    }

    // Adiciona os outros campos
    const outrosCampos = [
      emailInput, nomeContatoInput, tipoInput, complementoInput, numResidenciaInput,
      logradouroInput, estadoInput, bairroInput, cidadeInput
    ];

    outrosCampos.forEach(input => {
      if (input) { // Garante que o input existe
        formData.append(input.id, input.value);
      }
    });

    try {
      const response = await fetch(`../../../actions/action-editar-parceiro.php?id=${idParceiro}`, {
        method: "POST",
        body: formData
      });

      const result = await response.json();

      if (result.sucesso) {
        abrirModalSucesso("Sucesso!", result.sucesso);
        // window.location.reload();
      } else {
        abrirModalErro("Erro na atualização", result.erro || "Erro ao atualizar o parceiro.");
      }
    } catch (err) {
      console.error("Erro no envio dos dados do parceiro:", err);
      abrirModalErro("Erro de comunicação", "Erro ao enviar os dados do parceiro. Verifique sua conexão.");
    }
  }

  // --- Atualiza o preview da imagem ao selecionar nova logo ---
  logoInput?.addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('preview-logo');

    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        if (preview) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        }
      };
      reader.readAsDataURL(file);
    } else {
      if (preview) {
        preview.src = '#';
        preview.style.display = 'none';
      }
    }
  });


  function mascaraTelefone(input) {
    let value = input.value.replace(/\D/g, ""); // Remove tudo que não é dígito
    let formattedValue = "";

    if (value.length > 11) {
      value = value.substring(0, 11); // Limita a 11 dígitos
    }

    if (value.length > 10) {
      // (XX) XXXXX-XXXX
      formattedValue = `(${value.substring(0, 2)}) ${value.substring(2, 7)}-${value.substring(7, 11)}`;
    } else if (value.length > 5) {
      // (XX) XXXX-XXXX
      formattedValue = `(${value.substring(0, 2)}) ${value.substring(2, 6)}-${value.substring(6, 10)}`;
    } else if (value.length > 2) {
      // (XX) XXXX
      formattedValue = `(${value.substring(0, 2)}) ${value.substring(2, 5)}`;
    } else if (value.length > 0) {
      // (XX
      formattedValue = `(${value.substring(0, 2)}`;
    }

    input.value = formattedValue;
  }

  function mascaraCep(input) {
    let value = input.value.replace(/\D/g, ""); // Remove tudo que não é dígito
    let formattedValue = "";

    if (value.length > 8) {
      value = value.substring(0, 8); // Limita a 8 dígitos
    }

    if (value.length > 5) {
      // XXXXX-XXX
      formattedValue = `${value.substring(0, 5)}-${value.substring(5, 8)}`;
    } else if (value.length > 0) {
      // XXXXX
      formattedValue = value;
    }

    input.value = formattedValue;
  }

  function mascaraCpfCnpj(input) {
    let value = input.value.replace(/\D/g, ""); // Remove tudo que não é dígito
    let formattedValue = "";

    if (value.length <= 11) { // CPF
      if (value.length > 9) {
        formattedValue = `${value.substring(0, 3)}.${value.substring(3, 6)}.${value.substring(6, 9)}-${value.substring(9, 11)}`;
      } else if (value.length > 6) {
        formattedValue = `${value.substring(0, 3)}.${value.substring(3, 6)}.${value.substring(6, 9)}`;
      } else if (value.length > 3) {
        formattedValue = `${value.substring(0, 3)}.${value.substring(3, 6)}`;
      } else {
        formattedValue = value;
      }
    } else { // CNPJ
      if (value.length > 12) {
        formattedValue = `${value.substring(0, 2)}.${value.substring(2, 5)}.${value.substring(5, 8)}/${value.substring(8, 12)}-${value.substring(12, 14)}`;
      } else if (value.length > 8) {
        formattedValue = `${value.substring(0, 2)}.${value.substring(2, 5)}.${value.substring(5, 8)}/${value.substring(8, 12)}`;
      } else if (value.length > 5) {
        formattedValue = `${value.substring(0, 2)}.${value.substring(2, 5)}.${value.substring(5, 8)}`;
      } else if (value.length > 2) {
        formattedValue = `${value.substring(0, 2)}.${value.substring(2, 5)}`;
      } else {
        formattedValue = value;
      }
    }
    input.value = formattedValue;
  }

}); // Fim do DOMContentLoaded