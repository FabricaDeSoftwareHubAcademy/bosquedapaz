const form = document.getElementById("formCadastro");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const senha = form.querySelector("#senha").value;
  const confSenha = form.querySelector("#confSenha").value;

  if (senha !== confSenha) {
    openModalMensagem({
      tipo: "erro",
      titulo: "Senhas não conferem",
      mensagem: "A senha e a confirmação devem ser iguais.",
    });
    return;
  }

  const formData = new FormData(form);
  formData.append("cadastrar", "1");

  try {
    const response = await fetch("../../../actions/action-colaborador.php", {
      method: "POST",
      body: formData,
    });

    const text = await response.text();

    const data = JSON.parse(text);

    if (data.success) {
      openModalMensagem({
        tipo: "sucesso",
        titulo: "Cadastrado com Sucesso",
        mensagem: "O ADM foi cadastrado corretamente."
      });
      form.reset();
    } else {
      openModalMensagem({
        tipo: "erro",
        titulo: "Erro no cadastro",
        mensagem: data.message
      });
    }
  } catch (error) {
    console.error("Erro na requisição:", error);
    openModalMensagem({
      tipo: "erro",
      titulo: "Erro inesperado",
      mensagem: "Ocorreu um erro ao tentar cadastrar. Verifique o console."
    });
  }
});

document.getElementById('tel').addEventListener('input', (e) => {
    e.target.value = maskNumTelefone(e.target.value)
})

function maskNumTelefone(num) {
  let valor = num;
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
  
  return valor;
}
// Matheus Manja
