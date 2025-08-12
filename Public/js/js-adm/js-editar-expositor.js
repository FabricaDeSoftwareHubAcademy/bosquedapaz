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

//     // Labels dos produtos
//     let label_prod1 = document.getElementById("prod-foto-1");
//     let label_prod2 = document.getElementById("prod-foto-2");
//     let label_prod3 = document.getElementById("prod-foto-3");
//     let label_prod4 = document.getElementById("prod-foto-4");
//     let label_prod5 = document.getElementById("prod-foto-5");
//     let label_prod6 = document.getElementById("prod-foto-6");

//     // Inputs de arquivo
//     let input_foto1 = document.getElementById("foto_produto_1");
//     let input_foto2 = document.getElementById("foto_produto_2");
//     let input_foto3 = document.getElementById("foto_produto_3");
//     let input_foto4 = document.getElementById("foto_produto_4");
//     let input_foto5 = document.getElementById("foto_produto_5");
//     let input_foto6 = document.getElementById("foto_produto_6");

//     // Array para facilitar o manuseio
//     const imagensData = [
//         { img: foto_prod1, label: label_prod1, input: input_foto1 },
//         { img: foto_prod2, label: label_prod2, input: input_foto2 },
//         { img: foto_prod3, label: label_prod3, input: input_foto3 },
//         { img: foto_prod4, label: label_prod4, input: input_foto4 },
//         { img: foto_prod5, label: label_prod5, input: input_foto5 },
//         { img: foto_prod6, label: label_prod6, input: input_foto6 }
//     ];

//     // Função para mostrar/esconder elementos baseado na imagem
//     function toggleImageDisplay(imgElement, labelElement, hasImage) {
//         if (hasImage) {
//             imgElement.style.display = 'block';
//             labelElement.style.display = 'none';
//             // Adiciona cursor pointer para indicar que é clicável
//             imgElement.style.cursor = 'pointer';
//         } else {
//             imgElement.style.display = 'none';
//             labelElement.style.display = 'flex';
//         }
//     }

//     // Função para configurar eventos de clique nas imagens
//     function setupImageClick(imgElement, inputElement) {
//         imgElement.addEventListener('click', function() {
//             inputElement.click();
//         });
//     }

//     // Função para preview de nova imagem selecionada
//     function setupImagePreview(inputElement, imgElement, labelElement) {
//         inputElement.addEventListener('change', function(event) {
//             const file = event.target.files[0];
//             if (file) {
//                 const reader = new FileReader();
//                 reader.onload = function(e) {
//                     imgElement.src = e.target.result;
//                     toggleImageDisplay(imgElement, labelElement, true);
//                 };
//                 reader.readAsDataURL(file);
//             }
//         });
//     }

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

//         // Configurar as imagens dos produtos
//         imagensData.forEach((item, index) => {
//             if (response.expositor.imagens[index] && response.expositor.imagens[index].caminho) {
//                 // Se existe imagem, mostrar ela e esconder o label
//                 item.img.src = `../../${response.expositor.imagens[index].caminho}`;
//                 toggleImageDisplay(item.img, item.label, true);
//             } else {
//                 // Se não existe imagem, mostrar o label e esconder a imagem
//                 toggleImageDisplay(item.img, item.label, false);
//             }

//             // Configurar eventos para cada imagem
//             setupImageClick(item.img, item.input);
//             setupImagePreview(item.input, item.img, item.label);
//         });
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
    
//     // Elementos do logo da empresa
//     let icone_perfil = document.getElementById("icone-perfil");
//     let input_foto_perfil = document.getElementById("foto");
//     let label_logo = document.getElementById("logo");

//     // Elementos das imagens dos produtos
//     let foto_prod1 = document.getElementById("perfilEdit-img-1");
//     let foto_prod2 = document.getElementById("perfilEdit-img-2");
//     let foto_prod3 = document.getElementById("perfilEdit-img-3");
//     let foto_prod4 = document.getElementById("perfilEdit-img-4");
//     let foto_prod5 = document.getElementById("perfilEdit-img-5");
//     let foto_prod6 = document.getElementById("perfilEdit-img-6");

//     // Labels dos produtos
//     let label_prod1 = document.getElementById("prod-foto-1");
//     let label_prod2 = document.getElementById("prod-foto-2");
//     let label_prod3 = document.getElementById("prod-foto-3");
//     let label_prod4 = document.getElementById("prod-foto-4");
//     let label_prod5 = document.getElementById("prod-foto-5");
//     let label_prod6 = document.getElementById("prod-foto-6");

//     // Inputs de arquivo
//     let input_foto1 = document.getElementById("foto_produto_1");
//     let input_foto2 = document.getElementById("foto_produto_2");
//     let input_foto3 = document.getElementById("foto_produto_3");
//     let input_foto4 = document.getElementById("foto_produto_4");
//     let input_foto5 = document.getElementById("foto_produto_5");
//     let input_foto6 = document.getElementById("foto_produto_6");

//     // Array para facilitar o manuseio das imagens dos produtos
//     const imagensData = [
//         { img: foto_prod1, label: label_prod1, input: input_foto1 },
//         { img: foto_prod2, label: label_prod2, input: input_foto2 },
//         { img: foto_prod3, label: label_prod3, input: input_foto3 },
//         { img: foto_prod4, label: label_prod4, input: input_foto4 },
//         { img: foto_prod5, label: label_prod5, input: input_foto5 },
//         { img: foto_prod6, label: label_prod6, input: input_foto6 }
//     ];

//     // Função para controlar exibição da imagem do logo
//     function setupLogoDisplay(imagePath) {
//         if (imagePath && imagePath.trim() !== '') {
//             // Mostrar a imagem do logo
//             icone_perfil.src = imagePath;
//             icone_perfil.style.display = 'inline-block';
            
//             // Modificar texto do label para indicar que é editável
//             label_logo.childNodes[0].textContent = 'Clique na imagem para alterar ';
            
//             // Adicionar evento de clique na imagem do logo para editar
//             icone_perfil.onclick = function() {
//                 input_foto_perfil.click();
//             };
//         } else {
//             // Esconder a imagem se não há caminho
//             icone_perfil.style.display = 'none';
//             label_logo.childNodes[0].textContent = 'Selecione sua logo ';
//         }
//     }

//     // Função para mostrar/esconder elementos das imagens dos produtos
//     function toggleProductImageDisplay(imgElement, labelElement, hasImage) {
//         if (hasImage) {
//             imgElement.style.display = 'block';
//             labelElement.style.display = 'none';
//             imgElement.style.cursor = 'pointer';
//         } else {
//             imgElement.style.display = 'none';
//             labelElement.style.display = 'flex';
//         }
//     }

//     // Função para configurar eventos de clique nas imagens dos produtos
//     function setupImageClick(imgElement, inputElement) {
//         imgElement.addEventListener('click', function() {
//             inputElement.click();
//         });
//     }

//     // Função para preview de imagens dos produtos
//     function setupImagePreview(inputElement, imgElement, labelElement) {
//         inputElement.addEventListener('change', function(event) {
//             const file = event.target.files[0];
//             if (file) {
//                 const reader = new FileReader();
//                 reader.onload = function(e) {
//                     imgElement.src = e.target.result;
//                     toggleProductImageDisplay(imgElement, labelElement, true);
//                 };
//                 reader.readAsDataURL(file);
//             }
//         });
//     }

//     // Configurar preview do logo da empresa
//     input_foto_perfil.addEventListener('change', function(event) {
//         const file = event.target.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 setupLogoDisplay(e.target.result);
//             };
//             reader.readAsDataURL(file);
//         }
//     });

//     // Pegando os dados da URL
//     const id_expositor = params.get("id");

//     let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);
//     let response = await dados_php.json();

//     console.log('Response completa:', response);

//     if (response.status == 200) {
//         input_id_expositor.value = response.expositor.id_expositor;
//         input_nome.value = response.expositor.nome_marca;
//         input_desc.value = response.expositor.descricao_exp;
//         input_email.value = response.expositor.email;
//         input_insta.value = response.expositor.link_instagram;
//         input_whatsapp.value = response.expositor.whats;
//         input_facebook.value = response.expositor.link_facebook;
        
//         // Configurar logo da empresa
//         if (response.expositor.img_perfil) {
//             // Se tem imagem no banco, usar ela
//             setupLogoDisplay(response.expositor.img_perfil);
//         } else if (icone_perfil.src && icone_perfil.src !== window.location.href) {
//             // Se não tem no banco mas tem no HTML, usar a do HTML
//             setupLogoDisplay(icone_perfil.src);
//         } else {
//             // Se não tem nenhuma, deixar vazio
//             setupLogoDisplay('');
//         }

//         // Configurar as imagens dos produtos
//         imagensData.forEach((item, index) => {
//             let imagePath = '';
            
//             // Primeiro verificar se tem imagem no banco
//             if (response.expositor.imagens && response.expositor.imagens[index] && response.expositor.imagens[index].caminho) {
//                 imagePath = `../../${response.expositor.imagens[index].caminho}`;
//             } 
//             // Se não tem no banco, verificar se já tem src no HTML
//             else if (item.img.src && item.img.src !== window.location.href) {
//                 imagePath = item.img.src;
//             }
            
//             if (imagePath) {
//                 item.img.src = imagePath;
                
//                 // Aguardar carregamento da imagem
//                 item.img.onload = function() {
//                     toggleProductImageDisplay(item.img, item.label, true);
//                 };
                
//                 // Tratar erro de carregamento
//                 item.img.onerror = function() {
//                     console.log('Erro ao carregar imagem:', imagePath);
//                     toggleProductImageDisplay(item.img, item.label, false);
//                 };
//             } else {
//                 // Se não tem imagem, mostrar o label
//                 toggleProductImageDisplay(item.img, item.label, false);
//             }

//             // Configurar eventos para cada imagem
//             setupImageClick(item.img, item.input);
//             setupImagePreview(item.input, item.img, item.label);
//         });
//     }

//     btn_salvar.addEventListener('click', async function (event) {
//         event.preventDefault();

//         const editarperfil_form = document.getElementById("perfilEdit_form");
//         let formdata = new FormData(editarperfil_form);

//         // Adicionar informações sobre imagens existentes para o backend
//         if (response && response.expositor && response.expositor.imagens) {
//             response.expositor.imagens.forEach((imagem, index) => {
//                 if (imagem && imagem.caminho) {
//                     formdata.append(`imagem_existente_${index + 1}`, imagem.caminho);
//                     formdata.append(`id_imagem_${index + 1}`, imagem.id_imagem || '');
//                 }
//             });
//         }

//         for (const [key, value] of formdata.entries()) {
//             console.log(key, value);
//         }

//         try {
//             let response_update = await fetch('../../../actions/action-editar-expositor.php', {
//                 method: 'POST',
//                 body: formdata
//             });

//             if (response_update.status === 200) {
//                 openModalSucesso();
//             } else {
//                 console.error('Erro ao atualizar:', response_update.status);
//                 alert('Erro ao atualizar perfil!');
//             }
//         } catch (error) {
//             console.error('Erro na requisição:', error);
//             alert('Erro ao atualizar perfil!');
//         }
//     });

//     let button_close_perfilEdit = document.getElementById("close-modal-sucesso");
//     if (button_close_perfilEdit) {
//         button_close_perfilEdit.addEventListener('click', closeModalSucesso);
//     }
// });

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
    
//     // Elementos do logo da empresa
//     let icone_perfil = document.getElementById("icone-perfil");
//     let input_foto_perfil = document.getElementById("foto");
//     let label_logo = document.getElementById("logo");

//     // Elementos das imagens dos produtos
//     let foto_prod1 = document.getElementById("perfilEdit-img-1");
//     let foto_prod2 = document.getElementById("perfilEdit-img-2");
//     let foto_prod3 = document.getElementById("perfilEdit-img-3");
//     let foto_prod4 = document.getElementById("perfilEdit-img-4");
//     let foto_prod5 = document.getElementById("perfilEdit-img-5");
//     let foto_prod6 = document.getElementById("perfilEdit-img-6");

//     // Labels dos produtos
//     let label_prod1 = document.getElementById("prod-foto-1");
//     let label_prod2 = document.getElementById("prod-foto-2");
//     let label_prod3 = document.getElementById("prod-foto-3");
//     let label_prod4 = document.getElementById("prod-foto-4");
//     let label_prod5 = document.getElementById("prod-foto-5");
//     let label_prod6 = document.getElementById("prod-foto-6");

//     // Inputs de arquivo
//     let input_foto1 = document.getElementById("foto_produto_1");
//     let input_foto2 = document.getElementById("foto_produto_2");
//     let input_foto3 = document.getElementById("foto_produto_3");
//     let input_foto4 = document.getElementById("foto_produto_4");
//     let input_foto5 = document.getElementById("foto_produto_5");
//     let input_foto6 = document.getElementById("foto_produto_6");

//     // Array para facilitar o manuseio das imagens dos produtos
//     const imagensData = [
//         { img: foto_prod1, label: label_prod1, input: input_foto1 },
//         { img: foto_prod2, label: label_prod2, input: input_foto2 },
//         { img: foto_prod3, label: label_prod3, input: input_foto3 },
//         { img: foto_prod4, label: label_prod4, input: input_foto4 },
//         { img: foto_prod5, label: label_prod5, input: input_foto5 },
//         { img: foto_prod6, label: label_prod6, input: input_foto6 }
//     ];

//     // Função para controlar exibição da imagem do logo
//     function setupLogoDisplay(imagePath) {
//         if (imagePath && imagePath.trim() !== '') {
//             // Mostrar a imagem do logo
//             icone_perfil.src = imagePath;
//             icone_perfil.style.display = 'inline-block';
            
//             // Modificar texto do label para indicar que é editável
//             label_logo.childNodes[0].textContent = 'Clique na imagem para alterar ';
            
//             // Adicionar evento de clique na imagem do logo para editar
//             icone_perfil.onclick = function() {
//                 input_foto_perfil.click();
//             };
//         } else {
//             // Esconder a imagem se não há caminho
//             icone_perfil.style.display = 'none';
//             label_logo.childNodes[0].textContent = 'Selecione sua logo ';
//         }
//     }

//     // Função para mostrar/esconder elementos das imagens dos produtos
//     function toggleProductImageDisplay(imgElement, labelElement, hasImage) {
//         if (hasImage) {
//             imgElement.style.display = 'block';
//             labelElement.style.display = 'none';
//             imgElement.style.cursor = 'pointer';
//         } else {
//             imgElement.style.display = 'none';
//             labelElement.style.display = 'flex';
//         }
//     }

//     // Função para configurar eventos de clique nas imagens dos produtos
//     function setupImageClick(imgElement, inputElement) {
//         imgElement.addEventListener('click', function() {
//             inputElement.click();
//         });
//     }

//     // Função para preview de imagens dos produtos
//     function setupImagePreview(inputElement, imgElement, labelElement) {
//         inputElement.addEventListener('change', function(event) {
//             const file = event.target.files[0];
//             if (file) {
//                 const reader = new FileReader();
//                 reader.onload = function(e) {
//                     imgElement.src = e.target.result;
//                     toggleProductImageDisplay(imgElement, labelElement, true);
//                 };
//                 reader.readAsDataURL(file);
//             }
//         });
//     }

//     // Configurar preview do logo da empresa
//     input_foto_perfil.addEventListener('change', function(event) {
//         const file = event.target.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 setupLogoDisplay(e.target.result);
//             };
//             reader.readAsDataURL(file);
//         }
//     });

//     // Pegando os dados da URL
//     const id_expositor = params.get("id");

//     let dados_php = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);
//     let response = await dados_php.json();

//     console.log('Response completa:', response);

//     if (response.status == 200) {
//         input_id_expositor.value = response.expositor.id_expositor;
//         input_nome.value = response.expositor.nome_marca;
//         input_desc.value = response.expositor.descricao_exp;
//         input_email.value = response.expositor.email;
//         input_insta.value = response.expositor.link_instagram;
//         input_whatsapp.value = response.expositor.whats;
//         input_facebook.value = response.expositor.link_facebook;
        
//         // Configurar logo da empresa
//         if (response.expositor.img_perfil) {
//             // Se tem imagem no banco, usar ela
//             setupLogoDisplay(response.expositor.img_perfil);
//         } else if (icone_perfil.src && icone_perfil.src !== window.location.href) {
//             // Se não tem no banco mas tem no HTML, usar a do HTML
//             setupLogoDisplay(icone_perfil.src);
//         } else {
//             // Se não tem nenhuma, deixar vazio
//             setupLogoDisplay('');
//         }

//         // Configurar as imagens dos produtos
//         imagensData.forEach((item, index) => {
//             let imagePath = '';
            
//             // Primeiro verificar se tem imagem no banco
//             if (response.expositor.imagens && response.expositor.imagens[index] && response.expositor.imagens[index].caminho) {
//                 imagePath = `../../${response.expositor.imagens[index].caminho}`;
//             } 
//             // Se não tem no banco, verificar se já tem src no HTML
//             else if (item.img.src && item.img.src !== window.location.href) {
//                 imagePath = item.img.src;
//             }
            
//             if (imagePath) {
//                 item.img.src = imagePath;
                
//                 // Aguardar carregamento da imagem
//                 item.img.onload = function() {
//                     toggleProductImageDisplay(item.img, item.label, true);
//                 };
                
//                 // Tratar erro de carregamento
//                 item.img.onerror = function() {
//                     console.log('Erro ao carregar imagem:', imagePath);
//                     toggleProductImageDisplay(item.img, item.label, false);
//                 };
//             } else {
//                 // Se não tem imagem, mostrar o label
//                 toggleProductImageDisplay(item.img, item.label, false);
//             }

//             // Configurar eventos para cada imagem
//             setupImageClick(item.img, item.input);
//             setupImagePreview(item.input, item.img, item.label);
//         });
//     }

//     btn_salvar.addEventListener('click', async function (event) {
//         event.preventDefault();

//         const editarperfil_form = document.getElementById("perfilEdit_form");
//         let formdata = new FormData(editarperfil_form);

//         // Adicionar informações sobre imagens existentes para o backend
//         if (response && response.expositor && response.expositor.imagens) {
//             response.expositor.imagens.forEach((imagem, index) => {
//                 if (imagem && imagem.caminho) {
//                     formdata.append(`imagem_existente_${index + 1}`, imagem.caminho);
//                     formdata.append(`id_imagem_${index + 1}`, imagem.id_imagem || '');
//                 }
//             });
//         }

//         // Log para debug
//         console.log('Dados sendo enviados:');
//         for (const [key, value] of formdata.entries()) {
//             if (value instanceof File) {
//                 console.log(key, 'Arquivo:', value.name, value.size + ' bytes');
//             } else {
//                 console.log(key, value);
//             }
//         }

//         for (const [key, value] of formdata.entries()) {
//             console.log(key, value);
//         }

//         try {
//             let response_update = await fetch('../../../actions/action-editar-expositor.php', {
//                 method: 'POST',
//                 body: formdata
//             });

//             let result = await response_update.json();
//             console.log('Resposta do servidor:', result);

//             if (result.status === 200) {
//                 console.log('Sucesso:', result.msg);
//                 if (result.imagens_processadas && result.imagens_processadas.length > 0) {
//                     console.log('Imagens processadas:', result.imagens_processadas);
//                 }
//                 openModalSucesso();
//             } else {
//                 console.error('Erro do servidor:', result.msg);
//                 if (result.erros_imagens && result.erros_imagens.length > 0) {
//                     console.error('Erros de imagens:', result.erros_imagens);
//                 }
//                 alert('Erro ao atualizar perfil: ' + result.msg);
//             }
//         } catch (error) {
//             console.error('Erro na requisição:', error);
//             alert('Erro ao atualizar perfil!');
//         }
//     });

//     let button_close_perfilEdit = document.getElementById("close-modal-sucesso");
//     if (button_close_perfilEdit) {
//         button_close_perfilEdit.addEventListener('click', closeModalSucesso);
//     }
// });

window.addEventListener("DOMContentLoaded", async () => {
    let btn_salvar = document.getElementById("btn_salvar");
    const params = new URLSearchParams(window.location.search);

    // Elementos do formulário
    let input_nome = document.getElementById("nome");
    let input_desc = document.getElementById("descricao");
    let input_email = document.getElementById("email");
    let input_insta = document.getElementById("instagram");
    let input_whatsapp = document.getElementById("whatsapp");
    let input_facebook = document.getElementById("facebook");
    let input_id_expositor = document.getElementById("id_expositor");
    
    // Elementos do logo da empresa
    let icone_perfil = document.getElementById("icone-perfil");
    let input_foto_perfil = document.getElementById("foto");
    let label_logo = document.getElementById("logo");

    // Elementos das imagens dos produtos
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

    // Array para facilitar o manuseio das imagens dos produtos
    const imagensData = [
        { img: foto_prod1, label: label_prod1, input: input_foto1, index: 1 },
        { img: foto_prod2, label: label_prod2, input: input_foto2, index: 2 },
        { img: foto_prod3, label: label_prod3, input: input_foto3, index: 3 },
        { img: foto_prod4, label: label_prod4, input: input_foto4, index: 4 },
        { img: foto_prod5, label: label_prod5, input: input_foto5, index: 5 },
        { img: foto_prod6, label: label_prod6, input: input_foto6, index: 6 }
    ];

    // Variável global para armazenar dados do expositor
    let dadosExpositor = null;

    // Função para controlar exibição da imagem do logo
    function setupLogoDisplay(imagePath) {
        if (imagePath && imagePath.trim() !== '') {
            // Mostrar a imagem do logo
            icone_perfil.src = imagePath.startsWith('http') ? imagePath : `../../${imagePath}`;
            icone_perfil.style.display = 'inline-block';
            
            // Modificar texto do label para indicar que é editável
            label_logo.childNodes[0].textContent = 'Clique na imagem para alterar ';
            
            // Adicionar evento de clique na imagem do logo para editar
            icone_perfil.onclick = function() {
                input_foto_perfil.click();
            };
        } else {
            // Esconder a imagem se não há caminho
            icone_perfil.style.display = 'none';
            label_logo.childNodes[0].textContent = 'Selecione sua logo ';
        }
    }

    // Função para mostrar/esconder elementos das imagens dos produtos
    function toggleProductImageDisplay(imgElement, labelElement, hasImage) {
        if (hasImage) {
            imgElement.style.display = 'block';
            labelElement.style.display = 'none';
            imgElement.style.cursor = 'pointer';
        } else {
            imgElement.style.display = 'none';
            labelElement.style.display = 'flex';
        }
    }

    // Função para configurar eventos de clique nas imagens dos produtos
    function setupImageClick(imgElement, inputElement) {
        imgElement.addEventListener('click', function() {
            inputElement.click();
        });
    }

    // Função para preview de imagens dos produtos
    function setupImagePreview(inputElement, imgElement, labelElement) {
        inputElement.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Validar arquivo antes do preview
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Formato de arquivo inválido. Use JPG, PNG ou WebP.');
                    inputElement.value = '';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) { // 5MB
                    alert('Arquivo muito grande. Tamanho máximo: 5MB.');
                    inputElement.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                    toggleProductImageDisplay(imgElement, labelElement, true);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Configurar preview do logo da empresa
    input_foto_perfil.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // Validar arquivo antes do preview
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Formato de arquivo inválido. Use JPG, PNG ou WebP.');
                input_foto_perfil.value = '';
                return;
            }

            if (file.size > 5 * 1024 * 1024) { // 5MB
                alert('Arquivo muito grande. Tamanho máximo: 5MB.');
                input_foto_perfil.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                setupLogoDisplay(e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Função para carregar dados do expositor
    async function carregarDadosExpositor() {
        const id_expositor = params.get("id");
        
        if (!id_expositor) {
            alert('ID do expositor não encontrado!');
            return;
        }

        try {
            let response = await fetch('../../../actions/actions-expositor.php?id=' + id_expositor);
            let data = await response.json();

            console.log('Dados carregados:', data);

            if (data.status == 200 && data.expositor) {
                dadosExpositor = data.expositor;
                
                // Preencher campos básicos
                input_id_expositor.value = dadosExpositor.id_expositor;
                input_nome.value = dadosExpositor.nome_marca || '';
                input_desc.value = dadosExpositor.descricao_exp || '';
                input_email.value = dadosExpositor.email || '';
                input_insta.value = dadosExpositor.link_instagram || '';
                input_whatsapp.value = dadosExpositor.whats || '';
                input_facebook.value = dadosExpositor.link_facebook || '';
                
                // Configurar logo da empresa
                if (dadosExpositor.img_perfil) {
                    setupLogoDisplay(dadosExpositor.img_perfil);
                } else {
                    setupLogoDisplay('');
                }

                // Configurar as imagens dos produtos
                imagensData.forEach((item, index) => {
                    // Resetar estado inicial
                    item.img.src = '';
                    item.img.style.display = 'none';
                    item.label.style.display = 'flex';
                    
                    if (dadosExpositor.imagens && dadosExpositor.imagens[index]) {
                        const imagem = dadosExpositor.imagens[index];
                        const imagePath = `../../${imagem.caminho}`;
                        
                        // Criar nova imagem para testar se carrega
                        const testImg = new Image();
                        testImg.onload = function() {
                            item.img.src = imagePath;
                            toggleProductImageDisplay(item.img, item.label, true);
                        };
                        testImg.onerror = function() {
                            console.log('Erro ao carregar imagem:', imagePath);
                            toggleProductImageDisplay(item.img, item.label, false);
                        };
                        testImg.src = imagePath;
                    }

                    // Configurar eventos para cada imagem
                    setupImageClick(item.img, item.input);
                    setupImagePreview(item.input, item.img, item.label);
                });
            } else {
                alert('Erro ao carregar dados do expositor!');
            }
        } catch (error) {
            console.error('Erro ao carregar dados:', error);
            alert('Erro ao carregar dados do expositor!');
        }
    }

    // Função para salvar alterações
    async function salvarAlteracoes(event) {
        event.preventDefault();

        const editarperfil_form = document.getElementById("perfilEdit_form");
        let formdata = new FormData(editarperfil_form);

        // Adicionar informações sobre imagens existentes para o backend
        if (dadosExpositor && dadosExpositor.imagens) {
            dadosExpositor.imagens.forEach((imagem, index) => {
                if (imagem && imagem.caminho) {
                    formdata.append(`imagem_existente_${index + 1}`, imagem.caminho);
                    formdata.append(`id_imagem_${index + 1}`, imagem.id_imagem || '');
                }
            });
        }

        // Log para debug
        console.log('Dados sendo enviados:');
        for (const [key, value] of formdata.entries()) {
            if (value instanceof File) {
                console.log(key, 'Arquivo:', value.name, value.size + ' bytes');
            } else {
                console.log(key, value);
            }
        }

        try {
            // Mostrar loading
            btn_salvar.disabled = true;
            btn_salvar.textContent = 'Salvando...';

            let response = await fetch('../../../actions/action-editar-expositor.php', {
                method: 'POST',
                body: formdata
            });

            let result = await response.json();
            console.log('Resposta do servidor:', result);

            if (result.status === 200) {
                console.log('Sucesso:', result.msg);
                if (result.imagens_processadas && result.imagens_processadas.length > 0) {
                    console.log('Imagens processadas:', result.imagens_processadas);
                }
                
                // Recarregar dados para mostrar as novas imagens
                await carregarDadosExpositor();
                
                // Abrir modal de sucesso
                openModalSucesso();
            } else {
                console.error('Erro do servidor:', result.msg);
                if (result.erros_imagens && result.erros_imagens.length > 0) {
                    console.error('Erros de imagens:', result.erros_imagens);
                }
                alert('Erro ao atualizar perfil: ' + result.msg);
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            alert('Erro ao atualizar perfil!');
        } finally {
            // Restaurar botão
            btn_salvar.disabled = false;
            btn_salvar.textContent = 'Salvar';
        }
    }

    // Event listeners
    btn_salvar.addEventListener('click', salvarAlteracoes);

    let button_close_perfilEdit = document.getElementById("close-modal-sucesso");
    if (button_close_perfilEdit) {
        button_close_perfilEdit.addEventListener('click', closeModalSucesso);
    }

    // Carregar dados iniciais
    await carregarDadosExpositor();
});