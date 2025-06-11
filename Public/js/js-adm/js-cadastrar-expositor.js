
async function getCategorias(){

    let categorias = document.getElementById("categorias");
    
    let dados_php = await fetch('../../../actions/cadastrar_expositor.php?filtro=1');

    let response = await dados_php.json();

    console.log(response);

    html = '<option selected disabled>Selecione</option>';
    for(let i=0;i <response.length; i++){
        html += `<option value="${response[i].id_categoria}" > ${response[i].descricao} </option>`;
    }

    categorias.innerHTML = html;
}



let btn_salvar = document.getElementById("btn_salvar");
let modal = document.getElementById("modal_salvar");


btn_salvar.addEventListener('click', async function(event){ 
     
    event.preventDefault();
    let formulario = document.getElementById("fomulario_cad_expositor");



    let dadosForms =  new FormData(formulario);

    let dados_php = await fetch('../../../actions/cadastrar_expositor.php', {
        method:'POST',
        body: dadosForms
    });

    let response = await dados_php.json();

    ////////// abre modal ////////////
    

    console.log(response);

    if(response.status == 200){

        formulario.reset();
        modal.classList.remove("oculta");
        modal.classList.add("show_modal");

        /////////////// botao fechar ///////////////

        let fechar_modal = document.getElementById("fechar_modal");

        fechar_modal.addEventListener('click', function(event){
            modal.classList.remove("show_modal");
            modal.classList.add("oculta");
        })

    }else{
        alert("ERRROOOOOOO")
    }

    
 })