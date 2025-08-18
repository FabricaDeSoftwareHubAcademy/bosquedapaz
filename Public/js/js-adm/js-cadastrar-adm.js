var senha = document.getElementById("senha");

senha.addEventListener('keyup', () => {
  console.log(senha.value)
  if (senha.value.match(/[A-Z]/g) != null) {
    document.getElementById('maiuscula').style.color = 'green'
  }else {
    document.getElementById('maiuscula').style.color = '#FF3877'
  }
  
  if (senha.value.match(/[\W|_]/g) != null) {
    document.getElementById('simbolo').style.color = 'green'
  }else {
    document.getElementById('simbolo').style.color = '#FF3877'
  }
  
  if(senha.value.length > 8){
    document.getElementById('digitos').style.color = 'green'
  }else{
    document.getElementById('digitos').style.color = '#FF3877'
  }

  if(senha.value.match(/[0-9]/g)  == null){
    document.getElementById('numero').style.color = '#FF3877'
  }else {
    document.getElementById('numero').style.color = 'green'
  }


})

const form = document.getElementById("formCadastro");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const senha = form.querySelector("#senha").value;
  const confSenha = form.querySelector("#confSenha").value;

  let r = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/;

  if(!r.test(senha)){
    openModalMensagem({
      tipo: "erro",
      titulo: "Senha não é segura",
      mensagem: "Insira uma senha forte",
    });
    return;
  }

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
    openModalMensagem({
      tipo: "erro",
      titulo: "Erro inesperado",
      mensagem: "Colaborador não pode ser cadastro"
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

document.getElementById('cancelar_cadastro').addEventListener('click',() => {document.location.reload()})

function readImage() {
  if (this.files && this.files[0]) {
      var file = new FileReader();
      file.onload = function (e) {
          document.getElementById("img_preview").src = e.target.result;
      };
      file.readAsDataURL(this.files[0]);
  }
}

let inputimg = document.getElementById("imagem")

inputimg.addEventListener("change", readImage, false);

let togglePassword = document.getElementById('togglePassword')

let inputPass1 = document.getElementById('senha')
let inputPass2 = document.getElementById('confSenha')

togglePassword.addEventListener('click', () => {  
  if(togglePassword.classList.contains('fa-eye')){
    togglePassword.classList.remove('fa-eye')
    togglePassword.classList.add('fa-eye-slash')
  }else{
    togglePassword.classList.remove('fa-eye-slash')
    togglePassword.classList.add('fa-eye')
  }

  if(inputPass1.type == 'password'){
    inputPass1.type = 'text'
    inputPass2.type = 'text'
  }else{
    inputPass1.type = 'password'
    inputPass2.type = 'password'
  }

})


// Matheus Manja
