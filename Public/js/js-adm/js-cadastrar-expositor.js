// categorias
async function getCategorias(){

    let categorias = document.getElementById("categorias");
    
    let dados_php = await fetch('../../../actions/action-listar-categoria.php');

    let response = await dados_php.json();


    html = '<option selected disabled>Selecione</option>';
    for(let i=0;i <response.dados.length; i++){
        html += `<option value="${response.dados[i].id_categoria}" > ${response.dados[i].descricao} </option>`;
    }

    categorias.innerHTML = html;
}

// cadastro

let btn_salvar = document.getElementById("btn-salvar");
let modal = document.getElementById("modal_salvar");


btn_salvar.addEventListener('click', async function(event){ 
    event.preventDefault();
    let formulario = document.getElementById("fomulario_cad_expositor");

    let dadosForms =  new FormData(formulario);
    dadosForms.append('modalidade', 'expositor');

    let dados_php = await fetch('../../../actions/actions-expositor.php', {
        method:'POST',
        body: dadosForms
    });

    let response = await dados_php.text()
    console.log(response)
    
 })




