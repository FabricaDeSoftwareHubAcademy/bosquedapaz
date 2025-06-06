
async function getCategorias(){

    let categorias = document.getElementById("categorias");
    
    let dados_php = await fetch('../../../actions/cadastrar_expositor.php?listar=1');

    let response = await dados_php.json();

    html = '<option selected disabled>Selecione</option>';
    for(let i=0;i <response.length; i++){
        console.log(response[i])
        html += `<option value="${response[i].id_categoria}" > ${response[i].descricao} </option>`;
    }

    categorias.innerHTML = html;
}


let btn_salvar = document.getElementById("btn_salvar");



btn_salvar.addEventListener('click', async function(event){ 
     
    event.preventDefault();
    let formulario = document.getElementById("fomulario_cad_expositor");

    let dadosForms =  new FormData(formulario);

    let dados_php = await fetch('../../../actions/cadastrar_expositor.php', {
        method:'POST',
        body: dadosForms
    });

    
    let response = await dados_php.json();

    if(response.status == "ok"){
        alert('cadatsrado com sucesso');
    }
 })