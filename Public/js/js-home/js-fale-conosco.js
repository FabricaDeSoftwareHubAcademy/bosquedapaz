let form = document.getElementById('form')

form.addEventListener('submit',async function email (e){
    e.preventDefault()

    openModalLoading()
    document.getElementById('content-close').style.display = 'none'
    document.getElementById('msm-modal').innerText = 'A sua mensagem está sendo enviada para a feira bosque da paz.'

    const formData = new FormData(form)

    let dados_php = await fetch('../../../actions/actions-fale-conosco.php', {
        method: 'POST',
        body: formData
    });

    let response = await dados_php.json()
    console.log(response)

    if (response.status == 200){
        closeModalLoading()
        openModalSucesso()
        document.getElementById('sucesso-title').innerText = 'A sua mensagem foi enviada para a feira bosque da paz.'
        document.getElementById('msm-sucesso').innerText = 'Agradacemos a sua colaboração'
        document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso)
    }else{
        closeModalLoading()
        openModalError()
        document.getElementById('erro-title').innerText = 'Ocorreu um erro ao enviar o E-mail'
        document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
    }
})

