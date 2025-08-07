const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
})

document.getElementById('formLogin').addEventListener('submit', async (e) => {
    try {
        e.preventDefault()

        let form = document.getElementById('formLogin')

        const formData = new FormData(form)

        let dados = await fetch('../../../actions/action-login.php', {
            method: 'POST',
            body: formData
        })  

        let response = await dados.json()

        if (dados.status == 404) {
            document.getElementById('erro-title').innerText = 'Os dados enviados são inválidos'
            document.getElementById('erro-text').innerText = response.msg
            openModalError()
        }
        if ('location' in response) {
            window.location.replace(response.location)
        } else {
            console.log(response)
            document.getElementById('erro-title').innerText = 'Login inválido'
            openModalError()
        }
    } catch (error) {
        document.getElementById('erro-title').innerText = 'Login inválido'
        openModalError()
    }
})