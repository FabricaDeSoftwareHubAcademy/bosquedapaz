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

try {
  const response = await fetch("../../../actions/action-colaborador.php", {
    method: "POST",
    body: formData,
  });

  const text = await response.text();
  console.log("Resposta bruta do servidor:", text);

  // Tente converter para JSON só se a resposta parecer JSON
  let data;
  try {
    data = JSON.parse(text);
  } catch (e) {
    throw new Error("Resposta não é JSON válida");
  }

  if (data.success) {
    alert("Cadastro realizado com sucesso!");
    form.reset();
  } else {
    alert("Erro: " + data.message);
  }
} catch (error) {
  console.error("Erro na requisição:", error);
}

});
