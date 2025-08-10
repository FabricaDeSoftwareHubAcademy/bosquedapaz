let contentCards = document.getElementById('content-cards')

async function chamarModalExpositor(id){
    
    let dados = await fetch(`../../../actions/actions-expositor.php?id=${id}`)
    
    let response = await dados.json()
    
    let contentModal = document.getElementById('conteiner__box')
    
    let modal = document.getElementById('m-per-expo')
    if (response.status == 200) {
        modal.showModal()

        let imgs_car_expositor = '';
        response.expositor.imagens.forEach(imagem => {
            imgs_car_expositor += `
                <div class="div__img"><img class="img_produto_expositor" src="../../${imagem.caminho}" alt="imagem do expositor"></div>
            `
        });

        contentModal.innerHTML = `
        <div class="left__side">
            <div class="container__logo">
                <div class="div__logo"><img class="img_logo_expositor" src="../../../Public/assets/MOCA.png" alt="image perfil "></div>
                <!--${response.expositor.img_perfil}-->
            </div>  
            <div class="container__h1"><h1>Produtos</h1></div>
            <div class="container__imgs">
                ${imgs_car_expositor}
            </div>
        </div>
        <div class="decorative_line"></div>

        <!-- Lado Direito -->
        <div class="right__side">
            <div class="container__sobre">
                <h2 class="nome_marca_expositor">${response.expositor.nome_marca}</h2>
                <h3 class="title_sobre_expositor">Sobre</h3>
                <div class="area__text">
                    <p class="descricao_expositor">
                        ${response.expositor.descricao_exp}
                    </p>
                </div>
            </div>

            <div class="container__infs">
                <div class="div__categoria">
                    <h3 class="title_informacoes">Categoria</h3>
                    <p>${response.expositor.descricao}</p>
                </div>

                <div class="div__categoria div__num">
                    <h3 class="title_informacoes">Número</h3>
                    <p>${response.expositor.num_barraca}</p>
                </div>
            </div>

            <div class="container__infs container__contacts">
                <div class="div__categoria div__contacts">
                    <h3 class="title_informacoes">Contacts</h3>

                    <div class="conteiner_links">
                        <div class="content_link_expositor link_expositor1">
                            <a class="link_btns_expositor" href="${response.expositor.link_instagram}" target="_blank" class="icons" id="insta">
                                <i class="bi bi-instagram icon_link_expositor"></i>
                            </a>
                        </div>

                        <div class="content_link_expositor link_expositor2">
                            <a class="link_btns_expositor" href="${response.expositor.whats}" target="_blank" class="icons" id="zap">
                                <i class="bi bi-whatsapp icon_link_expositor"></i>
                            </a>
                        </div>

                        <div class="content_link_expositor link_expositor3">
                            <a class="link_btns_expositor" href="${response.expositor.link_facebook}" target="_blank" class="icons" id="face">
                                <i class="bi bi-facebook icon_link_expositor"></i>
                            </a>
                        </div>
                    </div>


                </div>

                <div class="div__categoria div__cor__rua">
                    <h3 class="title_informacoes">Cor da Rua</h3>
                    <div class="div__cor ${response.expositor.cor_rua}"><p>${response.expositor.cor_rua}</p></div>
                </div>
            </div>
                
        </div>`
    }else {
        modal.showModal()
        contentModal.innerHTML = 'Expositor nâo encontrado'
    }

}

///////////////////  FUNCAO QUE CARREGA OS EXPOSITORES \\\\\\\\\\\\\\\

async function getExpositores(){
    let dados_expositores = await fetch('../../../actions/actions-expositor.php?home=1');

    let content_cards = document.getElementById('content_cards')

    let response = await dados_expositores.json();

    if (response.status == 200) {
        content_cards.innerHTML = ''
        response.expositor.forEach(element => {
            content_cards.innerHTML += `
                <div class="sobre_card">
                     <div class="content-card-expo" id="card">
                         <div class="card-per-expo">
                             <div class="head-card">
                                 <img src="../../${element.img_perfil}" alt="imagem perfil" class="img-perfil-expo">
                             </div>
                             <div class="body-card">
                                 <h3 class="nome-expo">${element.nome_marca}</h3>
                                 <div class="detalhes-expo">
                                     <p class="para-cate">
                                         Categoria:
                                         <span class="span-cate">
                                             ${element.descricao}
                                         </span>
                                     </p>
                                     <p class="para-color">
                                         Rua:
                                         <span class="span-color ${element.cor_rua}">
                                            ${element.cor_rua}
                                         </span>
                                     </p>
                                 </div>
                                 <button class="btn-ver-info" data-modal="m-per-expo" id="saiba-mais" onClick="chamarModalExpositor(${element.id_expositor})">Ver Mais</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 `
            
        });
        
    }else {
        content_cards.innerHTML = '<p>Nenhum expositor encontrado</p>'

    }
}

document.addEventListener('DOMContentLoaded', getExpositores)




///////////// FILTROS EXPOSITOR \\\\\\\\\\\\\\\

let inputFiltro = document.getElementById('input_pesquisa')

inputFiltro.addEventListener('keyup', async () => {
    if(inputFiltro.value.length > 2){
        let dados_expositores = await fetch(`../../../actions/actions-expositor.php?filtrarHome=${inputFiltro.value}`);
    
        let content_cards = document.getElementById('content_cards')
    
        let response = await dados_expositores.json();
    
        if (response.status == 200) {
            content_cards.innerHTML = ''
            response.expositor.forEach(element => {
                content_cards.innerHTML += `
                    <div class="sobre_card">
                         <div class="content-card-expo" id="card">
                             <div class="card-per-expo">
                                 <div class="head-card">
                                     <img src="../../${element.img_perfil}" alt="imagem perfil" class="img-perfil-expo">
                                 </div>
                                 <div class="body-card">
                                     <h3 class="nome-expo">${element.nome_marca}</h3>
                                     <div class="detalhes-expo">
                                         <p class="para-cate">
                                             Categoria:
                                             <span class="span-cate">
                                                 ${element.descricao}
                                             </span>
                                         </p>
                                         <p class="para-color">
                                             Rua:
                                             <span class="span-color ${element.cor_rua}">
                                                ${element.cor_rua}
                                             </span>
                                         </p>
                                     </div>
                                     <button class="btn-ver-info" data-modal="m-per-expo" id="saiba-mais" onClick="chamarModalExpositor(${element.id_expositor})">Ver Mais</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                     `
                
            });
            
        }else {
            content_cards.innerHTML = '<p>Nenhum expositor encontrado</p>'
    
        }
    }else {
        getExpositores()
    }
})



////////////// GARREGANDO CATEGORIA \\\\\\\\\\\\\\\\

async function getCategoria(){
    let dados_categoria = await fetch('../../../actions/action-listar-categoria.php')

    let response = await dados_categoria.json();

    let selectCat = document.getElementById('select-cat')

    selectCat.innerHTML = '<option value="inicio" class="opcoes-cat" id="opcoes_categoria">Todas as Categorias</option>'
    

    response.dados.forEach(categoria => {
        selectCat.innerHTML += `<option value="${categoria.descricao}" class="opcoes-cat" id="opcoes_categoria">${categoria.descricao}</option>`
    });

}

document.addEventListener('DOMContentLoaded', getCategoria)



////////////// FILTRANDO EXPOSITOR PELA CATAGORIA \\\\\\\\\\\\\


let selectFiltro = document.getElementById('select-cat')

selectFiltro.addEventListener('change', async () => {
    if(selectFiltro.value == 'inicio'){
        getExpositores()
    }

    let dados_expositores = await fetch(`../../../actions/actions-expositor.php?categoriaHome=${selectFiltro.value}`);

    let content_cards = document.getElementById('content_cards')

    let response = await dados_expositores.json();

    if (response.status == 200) {
        content_cards.innerHTML = ''
        response.expositor.forEach(element => {
            content_cards.innerHTML += `
                <div class="sobre_card">
                     <div class="content-card-expo" id="card">
                         <div class="card-per-expo">
                             <div class="head-card">
                                 <img src="../../${element.img_perfil}" alt="imagem perfil" class="img-perfil-expo">
                             </div>
                             <div class="body-card">
                                 <h3 class="nome-expo">${element.nome_marca}</h3>
                                 <div class="detalhes-expo">
                                     <p class="para-cate">
                                         Categoria:
                                         <span class="span-cate">
                                             ${element.descricao}
                                         </span>
                                     </p>
                                     <p class="para-color">
                                         Rua:
                                         <span class="span-color ${element.cor_rua}">
                                            ${element.cor_rua}
                                         </span>
                                     </p>
                                 </div>
                                 <button class="btn-ver-info" data-modal="m-per-expo" id="saiba-mais" onClick="chamarModalExpositor(${element.id_expositor})">Ver Mais</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 `
            
        });
    }else {
        content_cards.innerHTML = '<p>Nenhum expositor encontrado</p>'

    }
})
