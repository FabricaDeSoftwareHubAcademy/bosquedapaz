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
    // let input_logo = document.getElementById("foto");

    // Pegando os dados da URL
    const id_expositor = params.get("id");


    let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);


    let response = await dados_php.json();

    if (response.status == 200) {
        input_id_expositor.value = response.expositor['0'].id_expositor;
        input_nome.value = response.expositor['0'].nome_marca;
        input_desc.value = response.expositor['0'].descricao_exp;
        input_email.value = response.expositor['0'].email;
        input_insta.value = response.expositor['0'].link_instagram;
        input_whatsapp.value = response.expositor['0'].whats;
        input_facebook.value = response.expositor['0'].link_facebook;
        // input_logo.value = response.expositor['0'].foto;
    }

    // console.log(response);

    btn_salvar.addEventListener('click', async function (event) {

        event.preventDefault();

        const editarperfil_form = document.getElementById("perfilEdit_form");

        let formdata = new FormData(editarperfil_form);

        for (const value of formdata.values()) {
            console.log(value);
        }
        let dados_php2 = await fetch('../../../actions/action-editar-expositor.php', {
            method: 'POST',
            body: formdata
        }).then((e) => { e.status == 200 ? openModalSucesso() : null });

        // let response2 = await dados_php2.json();
        // if (response2.status == 200) {
        //     console.log("ENTROU");
        //     // alert("atualiazado!!")
        //     // CHAMAR UM MODAL DE ATUALIZADO COM SUCESSO!!!
        //     openModalSucesso();
        // }

    })

    let button_close_perfilEdit = document.getElementById("close-modal-sucesso");

    button_close_perfilEdit.addEventListener('click', closeModalSucesso);

});