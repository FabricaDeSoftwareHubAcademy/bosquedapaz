const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function() {
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
})

document.getElementById('formLogin').addEventListener('submit', async (e) => {
    e.preventDefault()

    let form = document.getElementById('formLogin')

    const formData = new FormData(form)

    let dados = await fetch('../../../actions/fazer_login.php', {
        method: 'POST',
        body: formData
    })

    if (dados.status == 404){
        document.getElementById('erro-title').innerText = 'Os dados enviados são inválidos'
        document.getElementById('erro-text').innerText = 'Os dados enviados são inválidos'
        openModalError()
    }

    console.log(dados)

    let response = await dados.json()
    console.log(response)
    // if('location' in response){
    //     window.location.replace(response.location)
    // }else{
    //     alert(response.msg)
    // }
})