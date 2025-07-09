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

    openModalConfirmar()
    document.getElementById('close-modal-confirmar').addEventListener('click', closeModalConfirmar)
    document.getElementById('btn-modal-cancelar').addEventListener('click', closeModalConfirmar)

    document.getElementById('btn-modal-salvar').addEventListener('click', async () => {
        closeModalAtualizar()
        let formulario = document.getElementById("fomulario_cad_expositor");
    
        let dadosForms =  new FormData(formulario);
        dadosForms.append('modalidade', 'expositor');
    
        let dados_php = await fetch('../../../actions/actions-expositor.php', {
            method:'POST',
            body: dadosForms
        });
    
        let response = await dados_php.json()

        console.log(response)
        return 0
        
        if(response.status == 200){
            openModalSucesso()
            document.getElementById('close-modal-sucesso').addEventListener('click', closeModalSucesso)
            document.getElementById('msm-sucesso').innerHTML = 'Cadastro realizado com sucesso'
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
        }

        else if(response.status != 200){
            openModalError()
            document.getElementById('erro-title').innerHTML = response.msg
            document.getElementById('erro-text').style.display = 'none'
            document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
        }

    })

    
 })




