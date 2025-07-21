document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-artista");
    const btnSalvar = document.getElementById("btn-salvar");
    const modalSucesso = document.getElementById("modal-sucesso");
    const modalErro = document.getElementById("modal-error");
    const msmSucesso = document.getElementById("msm-sucesso");
    const msmErro = document.getElementById("msm-erro");
  
    btnSalvar.addEventListener("click", async (e) => {
      e.preventDefault();
  
      // Verificação básica dos campos obrigatórios
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
  
      const formData = new FormData(form);
  
      try {
        const resposta = await fetch("../../../actions/actions-cadastrar-artista.php", {
          method: "POST",
          body: formData
        });
  
        const resultado = await resposta.json();
        console.log("Resultado:", resultado);
  
        if (resultado.status === 200 || resultado.status === "sucesso") {
          msmSucesso.textContent = resultado.mensagem || "Cadastro realizado com sucesso.";
          form.reset();
          modalSucesso.showModal();
        } else {
          msmErro.textContent = resultado.mensagem || "Ocorreu um erro ao realizar o cadastro.";
          modalErro.showModal();
        }
      } catch (erro) {
        console.error("Erro na requisição:", erro);
        msmErro.textContent = "Erro na comunicação com o servidor.";
        modalErro.showModal();
      }
    });
  
    // Fecha o modal ao clicar no ícone fechar
    const fecharModais = document.querySelectorAll(".fechar-modal-loading");
    fecharModais.forEach(btn => {
      btn.addEventListener("click", () => {
        const modal = btn.closest("dialog");
        if (modal) modal.close();
      });
    });
  });
  
  // Máscara de telefone
  const telefoneInput = document.getElementById('whats');
  telefoneInput.addEventListener('input', function (e) {
    let valor = e.target.value;
    valor = valor.replace(/\D/g, '');
    valor = valor.substring(0, 11);
    if (valor.length > 0) {
      valor = '(' + valor;
    }
    if (valor.length > 3) {
      valor = valor.slice(0, 3) + ') ' + valor.slice(3);
    }
    if (valor.length > 10) {
      valor = valor.slice(0, 10) + '-' + valor.slice(10);
    }
    e.target.value = valor;
  });
  