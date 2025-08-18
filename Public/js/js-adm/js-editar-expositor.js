window.addEventListener("DOMContentLoaded", async () => {
    let btn_salvar = document.getElementById("btn-salvar");
    const params = new URLSearchParams(window.location.search);

    let input_nome = document.getElementById("nome");
    let input_desc = document.getElementById("descricao");
    let input_email = document.getElementById("email");
    let input_insta = document.getElementById("instagram");
    let input_whatsapp = document.getElementById("whatsapp");
    let input_facebook = document.getElementById("facebook");
    let input_id_expositor = document.getElementById("id_expositor");
    let icone_perfil = document.getElementById("icone-perfil");
    let label_logo = document.getElementById("logo");

    // Elementos das imagens de produtos
    const imagensProdutos = [];
    const labelsUpload = [];
    
    for (let i = 1; i <= 6; i++) {
        imagensProdutos[i] = document.getElementById(`perfilEdit-img-${i}`);
        labelsUpload[i] = document.getElementById(`prod-foto-${i}`);
    }

    await getCategorias();

    async function getCategorias() {

        let categorias = document.getElementById("categorias");
    
        let dados_php = await fetch('../../../actions/action-listar-categoria.php');
    
        let response = await dados_php.json();
    
    
        html = '<option selected disabled>Selecione</option>';
        for (let i = 0; i < response.dados.length; i++) {
            html += `<option value="${response.dados[i].id_categoria}" > ${response.dados[i].descricao} </option>`;
        }
    
        categorias.innerHTML = html;
    }

    // Função para configurar preview da logo
    function configurarPreviewLogo() {
        const inputFoto = document.getElementById("foto");
        
        inputFoto.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    icone_perfil.src = e.target.result;
                    icone_perfil.style.display = 'block';
                    
                    // Atualizar texto do label
                    const uploadText = label_logo.querySelector('.bi-upload');
                    if (uploadText) {
                        label_logo.innerHTML = 'Alterar logo <img src="' + e.target.result + '" alt="" id="icone-perfil" class="perfilEdit-icone"> <i class="bi bi-upload perfilEdit-upload-label"></i>';
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Função para configurar preview das imagens de produtos
    function configurarPreviewProdutos() {
        for (let i = 1; i <= 6; i++) {
            const input = document.getElementById(`foto_produto_${i}`);
            const img = imagensProdutos[i];
            const label = labelsUpload[i];
            const divContainer = label.closest('.perfilEdit-load-foto');
            
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                        img.style.display = 'block';
                        
                        // Esconder texto do upload quando há imagem
                        atualizarLabelProduto(label, true);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Adicionar evento de clique na imagem para permitir troca
            img.addEventListener('click', function() {
                input.click();
            });

            // Adicionar evento de clique na div inteira para permitir troca
            divContainer.addEventListener('click', function(e) {
                // Evitar duplo clique se já clicou na imagem
                if (e.target === img) return;
                input.click();
            });
        }
    }

    // Função para atualizar aparência do label de produto
    function atualizarLabelProduto(label, temImagem) {
        const divContainer = label.closest('.perfilEdit-load-foto');
        
        if (temImagem) {
            // Esconder completamente o label quando há imagem
            label.style.display = 'none';
            divContainer.classList.add('tem-imagem');
        } else {
            // Mostrar o label quando não há imagem
            const numeroFoto = label.id.split('-').pop();
            label.innerHTML = `Carregar Foto ${numeroFoto} <i class="bi bi-upload"></i>`;
            label.style.display = 'flex';
            divContainer.classList.remove('tem-imagem');
        }
    }

    // Função para verificar se uma imagem está carregada
    function imagemCarregada(imgElement) {
        return imgElement.src && 
               imgElement.src !== window.location.href && 
               imgElement.src !== '' &&
               !imgElement.src.includes('undefined') &&
               imgElement.style.display !== 'none';
    }

    // Pegando os dados da URL
    const id_expositor = params.get("id");

    let dados_php = await fetch('../../../actions/actions-expositor.php?idAdm=' + id_expositor);
    let response = await dados_php.json();

    // console.log('Dados recebidos:', response);

    if (response.status == 200) {
        input_id_expositor.value = response.expositor.id_expositor;
        input_nome.value = response.expositor.nome_marca;
        input_desc.value = response.expositor.descricao_exp;
        input_email.value = response.expositor.email;
        input_insta.value = response.expositor.link_instagram;
        input_facebook.value = response.expositor.link_facebook;

        let arrayWhats = response.expositor.whats.split('/');
        input_whatsapp.value = maskNumTelefone(arrayWhats[arrayWhats.length - 1].slice(2));

        let arrayInsta = response.expositor.link_instagram.split('/');
        input_insta.value = arrayInsta[arrayInsta.length - 1];

        let arrayFacebook = response.expositor.link_facebook.split('/');
        input_facebook.value = arrayFacebook[arrayFacebook.length - 1];

        input_whatsapp.addEventListener("input", ()=> {
            input_whatsapp.value = maskNumTelefone(input_whatsapp.value)
        });
        
        // Configurar logo se existir
        if (response.expositor.img_perfil) {
            icone_perfil.src = `${response.expositor.img_perfil}`;
            icone_perfil.style.display = 'block';
            label_logo.innerHTML = 'Alterar logo <img src="' + response.expositor.img_perfil + '" alt="" id="icone-perfil" class="perfilEdit-icone"> <i class="bi bi-upload perfilEdit-upload-label"></i>';
        }
        
        // Configurar imagens de produtos
        if (response.expositor.imagens && response.expositor.imagens.length > 0) {
            response.expositor.imagens.forEach((imagem, index) => {
                if (index < 6) {
                    const imgElement = imagensProdutos[index + 1];
                    const labelElement = labelsUpload[index + 1];
                    
                    imgElement.src = `../../${imagem.caminho}`;
                    imgElement.style.display = 'block';
                    
                    // Atualizar label para mostrar que há imagem
                    atualizarLabelProduto(labelElement, true);
                }
            });
        }
        
        // Para as posições que não têm imagem, garantir que o label esteja visível
        for (let i = 1; i <= 6; i++) {
            const imgElement = imagensProdutos[i];
            const labelElement = labelsUpload[i];
            
            if (!imagemCarregada(imgElement)) {
                atualizarLabelProduto(labelElement, false);
            }
        }
    }

    // Configurar eventos de preview
    configurarPreviewLogo();
    configurarPreviewProdutos();

    // Evento de salvar
    btn_salvar.addEventListener('click', async function (event) {
        event.preventDefault();

        const editarperfil_form = document.getElementById("perfilEdit_form");
        let formdata = new FormData(editarperfil_form);
        formdata.append('id_login', response.expositor.id_login)

        console.log('Dados sendo enviados:');
        for (const [key, value] of formdata.entries()) {
            console.log(key, value);
        }

        try {
            let response = await fetch('../../../actions/action-editar-expositor.php', {
                method: 'POST',
                body: formdata
            });

            let result = await response.json();
            console.log('Resposta do servidor:', result);

            if (response.status === 200) {
                openModalSucesso();

            } else if (response.status === 400) {
                openModalError();
                console.log(response)
                document.getElementById('erro-title').innerHTML = result.msg
                document.getElementById('erro-text').style.display = 'none'
                document.getElementById('close-modal-erro').addEventListener('click', closeModalError)
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            alert('Erro ao salvar as alterações');
        }
    });

    let button_close_perfilEdit = document.getElementById("close-modal-sucesso");
    if (button_close_perfilEdit) {
        button_close_perfilEdit.addEventListener('click', closeModalSucesso);
    }
});

function maskNumTelefone(num) {
    let valor = num;
    valor = valor.replace(/\D/g, '');
    valor = valor.substring(0, 11);
    if (valor.length > 0) {
        valor = '(' + valor;
    }
    if (valor.length > 3) {
        valor = valor.slice(0, 3) + ') ' + valor.slice(3);
    }
    if (valor.length > 10) {
        valor = valor.slice(0, 10) + '-' + valor.slice(10);
    }
    
    return valor;
}

