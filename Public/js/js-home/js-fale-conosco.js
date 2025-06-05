let form = document.getElementById('form')

form.addEventListener('submit',async function email (e){
    e.preventDefault()

    let enviar = document.getElementById('enviar')

    const formData = new FormData(form, enviar)

    let dados_php = await fetch('../../../actions/actions_email.php', {
        method: 'POST',
        body: formData
    });

    let response = await dados_php.json()

    alert(response.mensage)

})