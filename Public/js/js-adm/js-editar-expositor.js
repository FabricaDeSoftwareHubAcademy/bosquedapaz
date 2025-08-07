// window.addEventListener("DOMContentLoaded", async () => {
//     let btn_salvar = document.getElementById("btn_salvar");
//     const params = new URLSearchParams(window.location.search);

//     let input_nome = document.getElementById("nome");
//     let input_desc = document.getElementById("descricao");
//     let input_email = document.getElementById("email");
//     let input_insta = document.getElementById("instagram");
//     let input_whatsapp = document.getElementById("whatsapp");
//     let input_facebook = document.getElementById("facebook");
//     let input_id_expositor = document.getElementById("id_expositor");
//     let icone_perfil = document.getElementById("icone-perfil");
//     let foto_prod1 = document.getElementById("perfilEdit-img-1");
//     let foto_prod2 = document.getElementById("perfilEdit-img-2");
//     let foto_prod3 = document.getElementById("perfilEdit-img-3");
//     let foto_prod4 = document.getElementById("perfilEdit-img-4");
//     let foto_prod5 = document.getElementById("perfilEdit-img-5");
//     let foto_prod6 = document.getElementById("perfilEdit-img-6");

//     // Pegando os dados da URL
//     const id_expositor = params.get("id");

//     let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);

//     let response = await dados_php.json();

//     console.log(`../../${response.expositor.imagens[0].caminho}`);

//     if (response.status == 200) {
//         input_id_expositor.value = response.expositor.id_expositor;
//         input_nome.value = response.expositor.nome_marca;
//         input_desc.value = response.expositor.descricao_exp;
//         input_email.value = response.expositor.email;
//         input_insta.value = response.expositor.link_instagram;
//         input_whatsapp.value = response.expositor.whats;
//         input_facebook.value = response.expositor.link_facebook;
//         icone_perfil.src = response.expositor.icone;
//         foto_prod1.src = `../../${response.expositor.imagens[0].caminho}`;
//         foto_prod2.src = `../../${response.expositor.imagens[1].caminho}`;
//         foto_prod3.src = `../../${response.expositor.imagens[2].caminho}`;
//         foto_prod4.src = `../../${response.expositor.imagens[3].caminho}`;
//         foto_prod5.src = `../../${response.expositor.imagens[4].caminho}`;
//         foto_prod6.src = `../../${response.expositor.imagens[5].caminho}`;
//         // input_logo.value = response.expositor['0'].foto;
//     }

//     btn_salvar.addEventListener('click', async function (event) {

//         event.preventDefault();

//         const editarperfil_form = document.getElementById("perfilEdit_form");

//         let formdata = new FormData(editarperfil_form);

//         for (const value of formdata.values()) {
//             console.log(value);
//         }
//         let dados_php2 = await fetch('../../../actions/action-editar-expositor.php', {
//             method: 'POST',
//             body: formdata
//         }).then((e) => { e.status == 200 ? openModalSucesso() : null });

//     })

//     let button_close_perfilEdit = document.getElementById("close-modal-sucesso");

//     button_close_perfilEdit.addEventListener('click', closeModalSucesso);

// });

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
    let icone_perfil = document.getElementById("icone-perfil");
    let foto_prod1 = document.getElementById("perfilEdit-img-1");
    let foto_prod2 = document.getElementById("perfilEdit-img-2");
    let foto_prod3 = document.getElementById("perfilEdit-img-3");
    let foto_prod4 = document.getElementById("perfilEdit-img-4");
    let foto_prod5 = document.getElementById("perfilEdit-img-5");
    let foto_prod6 = document.getElementById("perfilEdit-img-6");

    // Labels dos produtos
    let label_prod1 = document.getElementById("prod-foto-1");
    let label_prod2 = document.getElementById("prod-foto-2");
    let label_prod3 = document.getElementById("prod-foto-3");
    let label_prod4 = document.getElementById("prod-foto-4");
    let label_prod5 = document.getElementById("prod-foto-5");
    let label_prod6 = document.getElementById("prod-foto-6");

    // Inputs de arquivo
    let input_foto1 = document.getElementById("foto_produto_1");
    let input_foto2 = document.getElementById("foto_produto_2");
    let input_foto3 = document.getElementById("foto_produto_3");
    let input_foto4 = document.getElementById("foto_produto_4");
    let input_foto5 = document.getElementById("foto_produto_5");
    let input_foto6 = document.getElementById("foto_produto_6");

    // Array para facilitar o manuseio
    const imagensData = [
        { img: foto_prod1, label: label_prod1, input: input_foto1 },
        { img: foto_prod2, label: label_prod2, input: input_foto2 },
        { img: foto_prod3, label: label_prod3, input: input_foto3 },
        { img: foto_prod4, label: label_prod4, input: input_foto4 },
        { img: foto_prod5, label: label_prod5, input: input_foto5 },
        { img: foto_prod6, label: label_prod6, input: input_foto6 }
    ];

    // Função para mostrar/esconder elementos baseado na imagem
    function toggleImageDisplay(imgElement, labelElement, hasImage) {
        if (hasImage) {
            imgElement.style.display = 'block';
            labelElement.style.display = 'none';
            // Adiciona cursor pointer para indicar que é clicável
            imgElement.style.cursor = 'pointer';
        } else {
            imgElement.style.display = 'none';
            labelElement.style.display = 'flex';
        }
    }

    // Função para configurar eventos de clique nas imagens
    function setupImageClick(imgElement, inputElement) {
        imgElement.addEventListener('click', function() {
            inputElement.click();
        });
    }

    // Função para preview de nova imagem selecionada
    function setupImagePreview(inputElement, imgElement, labelElement) {
        inputElement.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                    toggleImageDisplay(imgElement, labelElement, true);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Pegando os dados da URL
    const id_expositor = params.get("id");

    let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);

    let response = await dados_php.json();

    console.log(`../../${response.expositor.imagens[0].caminho}`);

    if (response.status == 200) {
        input_id_expositor.value = response.expositor.id_expositor;
        input_nome.value = response.expositor.nome_marca;
        input_desc.value = response.expositor.descricao_exp;
        input_email.value = response.expositor.email;
        input_insta.value = response.expositor.link_instagram;
        input_whatsapp.value = response.expositor.whats;
        input_facebook.value = response.expositor.link_facebook;
        icone_perfil.src = response.expositor.icone;

        // Configurar as imagens dos produtos
        imagensData.forEach((item, index) => {
            if (response.expositor.imagens[index] && response.expositor.imagens[index].caminho) {
                // Se existe imagem, mostrar ela e esconder o label
                item.img.src = `../../${response.expositor.imagens[index].caminho}`;
                toggleImageDisplay(item.img, item.label, true);
            } else {
                // Se não existe imagem, mostrar o label e esconder a imagem
                toggleImageDisplay(item.img, item.label, false);
            }

            // Configurar eventos para cada imagem
            setupImageClick(item.img, item.input);
            setupImagePreview(item.input, item.img, item.label);
        });
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

    })

    let button_close_perfilEdit = document.getElementById("close-modal-sucesso");

    button_close_perfilEdit.addEventListener('click', closeModalSucesso);

});