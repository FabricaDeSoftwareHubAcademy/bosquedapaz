let form = document.getElementById('form')

form.addEventListener('submit',async function email (e){
    e.preventDefault()

    const formData = new FormData(form)

    let dados_php = await fetch('../../../actions/actions_email.php', {
        method: 'POST',
        body: formData
    });

    let response = await dados_php.json()

})