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

    let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);
    let response = await dados_php.json();

    console.log(response);

    // Configurar preview das imagens existentes
    for (let i = 1; i <= 6; i++) {
        const img = document.getElementById(`perfilEdit-img-${i}`);
        const label = document.getElementById(`prod-foto-${i}`);
        const input = document.getElementById(`foto_produto_${i}`);
        
        // Carregar imagem existente se houver
        const caminhoImagem = response.expositor?.imagens?.[i - 1]?.caminho;
        
        if (caminhoImagem) {
            img.src = `../../${caminhoImagem}`;
            img.style.display = 'block';
            label.style.display = 'none';
            
            // Permite clicar na imagem para trocar
            img.addEventListener('click', () => {
                input.click();
            });
        }
        
        // Evento para quando selecionar nova imagem
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validar tipo de arquivo
                const tiposPermitidos = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!tiposPermitidos.includes(file.type)) {
                    alert('Tipo de arquivo não permitido. Use apenas: JPG, JPEG, PNG ou GIF');
                    input.value = '';
                    return;
                }
                
                // Validar tamanho (5MB máximo)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Arquivo muito grande. Máximo: 5MB');
                    input.value = '';
                    return;
                }
                
                // Mostrar preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    img.style.display = 'block';
                    label.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Preencher campos com dados existentes
    if (response.status == 200) {
        input_id_expositor.value = response.expositor.id_expositor;
        input_nome.value = response.expositor.nome_marca;
        input_desc.value = response.expositor.descricao_exp;
        input_email.value = response.expositor.email;
        input_insta.value = response.expositor.link_instagram;
        input_whatsapp.value = response.expositor.whats;
        input_facebook.value = response.expositor.link_facebook;
    }

    // Evento do botão salvar
    btn_salvar.addEventListener('click', async function(event) {
        event.preventDefault();

        const editarperfil_form = document.getElementById("perfilEdit_form");
        let formdata = new FormData(editarperfil_form);

        // Debug: mostrar dados do formulário
        console.log("Dados enviados:");
        for (const [key, value] of formdata.entries()) {
            console.log(`${key}:`, value);
        }

        try {
            let response = await fetch('../../../actions/action-editar-expositor.php', {
                method: 'POST',
                body: formdata
            });

            if (response.ok) {
                let result = await response.json();
                console.log("Resposta:", result);
                
                if (result.status === 200) {
                    openModalSucesso();
                } else {
                    alert("Erro ao salvar: " + result.msg);
                }
            } else {
                alert("Erro na requisição: " + response.status);
            }
        } catch (error) {
            console.error("Erro:", error);
            alert("Erro ao processar requisição");
        }
    });

    let button_close_perfilEdit = document.getElementById("close-modal-sucesso");
    if (button_close_perfilEdit) {
        button_close_perfilEdit.addEventListener('click', closeModalSucesso);
    }
});