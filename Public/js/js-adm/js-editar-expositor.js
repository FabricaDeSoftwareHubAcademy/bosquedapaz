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
    let img_expo_1 = document.getElementById("perfilEdit-img-1");
    let img_expo_2 = document.getElementById("perfilEdit-img-2");
    let img_expo_3 = document.getElementById("perfilEdit-img-3");
    let img_expo_4 = document.getElementById("perfilEdit-img-4");
    let img_expo_5 = document.getElementById("perfilEdit-img-5");
    let img_expo_6 = document.getElementById("perfilEdit-img-6");
    // let input_logo = document.getElementById("foto");

    // Pegando os dados da URL
    const id_expositor = params.get("id");

    let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);

    let response = await dados_php.json();

    console.log(response.expositor["imagens"][0]["caminho"]);

    // img_expo_1.src = `../../${response.expositor["imagens"][0]["caminho"]}`;
    // img_expo_2.src = `../../${response.expositor["imagens"][1]["caminho"]}`;
    // img_expo_3.src = `../../${response.expositor["imagens"][2]["caminho"]}`;
    // img_expo_4.src = `../../${response.expositor["imagens"][3]["caminho"]}`;
    // img_expo_5.src = `../../${response.expositor["imagens"][4]["caminho"]}`;
    // img_expo_6.src = `../../${response.expositor["imagens"][5]["caminho"]}`;

    for (let i = 1; i <= 6; i++) {
        const img = document.getElementById(`perfilEdit-img-${i}`);
        const label = document.getElementById(`prod-foto-${i}`);
        const input = label.previousElementSibling;
    
        const caminhoImagem = response.expositor.imagens[i - 1]?.caminho;
    
        if (caminhoImagem) {
            img.src = `../../${caminhoImagem}`;
    
            img.addEventListener('load', () => {
                label.style.display = 'none';
            });
    
            // Permite clicar na imagem para abrir o seletor de arquivos
            img.addEventListener('click', () => {
                input.click();
            });
        }
    
        // Atualiza a imagem assim que o usuário selecionar uma nova
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    img.src = e.target.result;
                    label.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    
    response.expositor["imagens"][0]["caminho"];

    if (response.status == 200) {
        input_id_expositor.value = response.expositor.id_expositor;
        input_nome.value = response.expositor.nome_marca;
        input_desc.value = response.expositor.descricao_exp;
        input_email.value = response.expositor.email;
        input_insta.value = response.expositor.link_instagram;
        input_whatsapp.value = response.expositor.whats;
        input_facebook.value = response.expositor.link_facebook;
        img_expo_1.value = response.expositor.imagens;
        img_expo_2.value = response.expositor.imagens;
        img_expo_3.value = response.expositor.imagens;
        img_expo_4.value = response.expositor.imagens;
        img_expo_5.value = response.expositor.imagens;
        img_expo_6.value = response.expositor.imagens;
        // input_logo.value = response.expositor['0'].foto;
    }

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