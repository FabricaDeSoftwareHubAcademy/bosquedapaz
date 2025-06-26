const form = document.getElementById("formCadastro");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const senha = form.querySelector("#senha").value;
  const confSenha = form.querySelector("#confSenha").value;

  if (senha !== confSenha) {
    alert("Senha e confirmação de senha não conferem!");
    return;
  }

  const formData = new FormData(form);
  formData.append("cadastrar", "1");

  try {
    const response = await fetch("../../../actions/action-colaborador.php", {
      method: "POST",
      body: formData,
    });

    const text = await response.text(); // 👈 pega como texto primeiro
    console.log("Resposta bruta:", text);
  
    const data = JSON.parse(text);

    if (data.success) {
      alert("Cadastro realizado com sucesso!");
      form.reset();
    } else {
      alert("Erro: " + data.message);
    }
  } catch (error) {
    console.error("Erro na requisição:", error);
    alert("Ocorreu um erro ao tentar cadastrar. Verifique o console.");
  }
});
