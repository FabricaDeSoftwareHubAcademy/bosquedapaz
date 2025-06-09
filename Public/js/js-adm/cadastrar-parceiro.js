let btn_cadastrar =  document.getElementById("botao_cadastrar");

btn_cadastrar.addEventListener('click', async function(event){

    event.preventDefault();
    let formulario = document.getElementById("form_cadastrar_parceiro");

    let formData = new FormData(formulario);

    let dados_php = await fetch('../../../actions/cadastrar-parceiro.php',{
        method:'POST',
        body: formData
    });
    
    let response = await dados_php.json();

    if(response.status == 200){
        console.log(response.msg);
        alert("Cadastrado com sucesso!") /// SUBSTITUIR PELO MODAL mostraModal()
    }else{
        console.log(response.msg);
        alert("Cadastrado com sucesso!") /// SUBSTITUIR PELO MODAL mostraModal()
    }
})

