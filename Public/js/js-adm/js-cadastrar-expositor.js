
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


 function formatWhatsAppNumber(input) {
    let value = input.value.replace(/\D/g, '');
    let formattedValue = '';
    
    if (value.length > 0) {
        // Assume código do Brasil se não informado
        if (!value.startsWith('') && value.length <= 11) {
            value = '' + value;
        }
        
        // Formata: (dd) nnnnn-nnnn
        formattedValue = '(' + value.substring(0, 2) + ') ';
        
        if (value.length > 2) {
            formattedValue += value.substring(2, 7);
            if (value.length > 7) {
                formattedValue += '-' + value.substring(7, 11);
            }
        }
    }
    
    input.value = formattedValue;
}