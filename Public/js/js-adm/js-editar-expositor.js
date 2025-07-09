window.addEventListener("DOMContentLoaded", async () => {
    let btn_salvar = document.getElementById("btn_salvar");
    const params = new URLSearchParams(window.location.search);

    let input_nome = document.getElementById("nome");
    let input_desc = document.getElementById("descricao");
    let input_email = document.getElementById("email");
    let input_insta = document.getElementById("instagram");
    let input_whatsapp = document.getElementById("whatsapp");
    let input_facebook = document.getElementById("facebook");
    let input_id_expositor = document.getElementById("id_expositor");

    // Pegando os dados da URL
    const id_expositor = params.get("id");
  

    let dados_php = await fetch('../../../actions/action-editar-expositor.php?id_expo='+id_expositor);
 
    
    let response = await dados_php.json();
    

    if(response.status == 200){
        input_id_expositor.value = response.data.id_expositor;
        input_nome.value = response.data.nome_marca;
        input_desc.value = response.data.descricao_exp;
        input_email.value = response.data.email;
        input_insta.value = response.data.link_instagram;
        input_whatsapp.value = response.data.whats;
        input_facebook.value = response.data.link_facebook;
    }

    console.log(response);

    btn_salvar.addEventListener('click', async function(event){

        event.preventDefault();

        const editarperfil_form = document.getElementById("perfilEdit_form");

        let formdata = new FormData(editarperfil_form);
        let dados_php2 = await fetch('../../../actions/action-editar-expositor.php',{
            method: 'POST',
            body: formdata
        });

        let response2 = await dados_php2.json();
        if (response2.status == 200) {
            // alert("atualiazado!!")
            // CHAMAR UM MODAL DE ATUALIZADO COM SUCESSO!!!
            openModalSucesso();
        }

    })

    let button_close_perfilEdit = document.getElementById("close-modal-sucesso");

    button_close_perfilEdit.addEventListener('click', closeModalSucesso);

});