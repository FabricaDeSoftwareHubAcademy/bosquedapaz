let btn_cadastrar =  document.getElementById("btn-salvar");

btn_cadastrar.addEventListener('click', async function(event){

    // if (titulo == '') {
    //     alert("Preencha todos os camois")
    // }

    event.preventDefault();
    let formulario = document.getElementById("form_cadastrar_utilidade");
    
    let formData = new FormData(formulario);
    
    console.log(formData);

    verificarInput();

    if(verificarInput() === false) {
        alert("preencha todos os campos por favor")
    } else {
        let dados_php = await fetch('../../../actions/action-cadastrar-utilidade-publica.php',{
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
    }
})

function verificarInput() {
    const inputs = document.querySelectorAll("input");
    const qtdInput = inputs.length;

    for(let i = 0; i < qtdInput; i ++) {
        if(inputs[i].value === '') {

            return false;
            
            break;
        }
    }
}

// const formulario = document.getElementById('form_cadastrar_utilidade');
// const titleInput = document.getElementById('titulo');
// const titleErro = document.getElementById('titleErro');


