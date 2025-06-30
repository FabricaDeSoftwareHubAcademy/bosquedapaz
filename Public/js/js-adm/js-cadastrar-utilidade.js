let btn_cadastrar =  document.getElementById("botao_cadastrar_utilidade");

btn_cadastrar.addEventListener('click', async function(event){

    event.preventDefault();
    let formulario = document.getElementById("form_cadastrar_utilidade");

    let formData = new FormData(formulario);

    console.log(formData);

    let dados_php = await fetch('../../../actions/action-cadastrar-utilidade-publica.php',{
        method:'POST',
        body: formData
    });
    
    let response = await dados_php.json();

    if(response.status == 200){
        console.log(response.msg);
        alert("Cadastrado com sucesso!!!!") /// SUBSTITUIR PELO MODAL mostraModal()
    }else{
        console.log(response.msg);
        alert("Cadastrado com sucesso!!!!") /// SUBSTITUIR PELO MODAL mostraModal()
    }
})

