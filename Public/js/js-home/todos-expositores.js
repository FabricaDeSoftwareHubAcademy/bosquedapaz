let contentCards = document.getElementById('content-cards')

async function chamarModalExpositor(id){
    
    let dados = await fetch(`../../../actions/actions-listar-expositor.php?buscar=${id}`)
    
    let response = await dados.json()
    
    let contentModal = document.getElementById('conteiner__box')
    
    let modal = document.getElementById('m-per-expo')
    if (response.status == 200) {
        modal.showModal()

        let ConteudoModal = `
        <div class="left__side">
            <div class="decorative__img1">
                <img class="img-decoracao1" src="../../../Public/assets/img-decoracao1.png" alt="">
            </div>
            <div class="container__logo">
                <div class="div__logo"><img src="${response.expositores.img_perfil}" alt=""></div>
            </div>
            <div class="container__h1"><h1>Produtos</h1></div>
            <div class="container__imgs">
                <div class="div__img"><img src="" alt=""></div>
                <div class="div__img"><img src="${response.expositores.imagens[0].caminho}" alt=""></div>
                <div class="div__img"><img src="../../../Public/imgs/foto-produto-3.jpeg" alt=""></div>
                <div class="div__img"><img src="../../../Public/imgs/foto-produto-4.jpeg" alt=""></div>
                <div class="div__img"><img src="../../../Public/imgs/foto-produto-5.jpeg" alt=""></div>
                <div class="div__img"><img src="../../../Public/imgs/foto-produto-6.jpeg" alt=""></div>
            </div>
        </div>

        <!-- Lado Direito -->
        <div class="right__side">
            <div class="container__sobre">
                <h2>${response.expositores.nome_marca}</h2>
                <h3>Sobre</h3>
                <div class="area__text">
                    <p>
                        ${response.expositores.descricao_exp}
                    </p>
                </div>
            </div>

            <div class="container__infs">
                <div class="div__categoria">
                    <h3>Categoria</h3>
                    <p>${response.expositores.descricao}</p>
                </div>

                <div class="div__num">
                    <h3>Número</h3>
                    <p>${response.expositores.descricao}</p>
                </div>
            </div>

            <div class="container__contacts">
                <div class="div__contacts">
                    <h3>Contacts</h3>
                    <a href="${response.expositores.link_instagram}" target="_blank" class="icons" id="insta">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="${response.expositores.link_whats}" target="_blank" class="icons" id="zap">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="${response.expositores.link_facebook}" target="_blank" class="icons" id="face">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="${response.expositores.email}" class="icons" id="email">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>

                <div class="div__cor__rua">
                    <h3>Cor da Rua</h3>
                    <div class="div__cor"><p>${response.expositores.cor_rua}</p></div>
                </div>
            </div>

            <div class="decorative__img2">
                <img class="img-decoracao2" src="../../../Public/assets/img-decoracao2.png" alt="">
            </div>
        </div>`

        contentModal.innerHTML = ''
        contentModal.innerHTML = ConteudoModal
    }else {
        modal.showModal()
        contentModal.innerHTML = 'Expositor nâo encontrado'
    }

}

document.addEventListener('DOMContentLoaded', async () => {
    let dados_expositores = await fetch('../../../actions/actions-expositor.php');

    let content_cards = document.getElementById('content_cards')

    let response = await dados_expositores.json();
    console.log(response)
    if (response.status == 200) {
        
        content_cards.innerHTML += `
            <div class="sobre_card">
                 <div class="content-card-expo" id="card">
                     <div class="card-per-expo">
                         <div class="head-card">
                             <img src="" alt="" class="img-perfil-expo">
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
                                     <span class="span-color" style="background-color: ${element.cor_rua};">
                                     </span>
                                 </p>
                             </div>
                             <button class="btn-ver-info" data-modal="m-per-expo" id="saiba-mais" onClick="chamarModalExpositor(${element.id_expositor})">Ver Mais</button>
                         </div>
                     </div>
                 </div>
             </div>
             `
    }else {
        content_cards.innerHTML = '<p>Nenhum expositor encontrado</p>'

    }
})

// contentCards.innerHTML += `
//             <div class="sobre_card">
//                  <div class="content-card-expo" id="card">
//                      <div class="card-per-expo">
//                          <div class="head-card">
//                              <img src="" alt="" class="img-perfil-expo">
//                          </div>
//                          <div class="body-card">
//                              <h3 class="nome-expo">${element.nome_marca}</h3>
//                              <div class="detalhes-expo">
//                                  <p class="para-cate">
//                                      Categoria:
//                                      <span class="span-cate">
//                                          ${element.descricao}
//                                      </span>
//                                  </p>
//                                  <p class="para-color">
//                                      Rua:
//                                      <span class="span-color" style="background-color: ${element.cor_rua};">
//                                      </span>
//                                  </p>
//                              </div>
//                              <button class="btn-ver-info" data-modal="m-per-expo" id="saiba-mais" onClick="chamarModalExpositor(${element.id_expositor})">Ver Mais</button>
//                          </div>
//                      </div>
//                  </div>
//              </div>
//              `