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
                <div class="div__img"><img src="../../${imagem.caminho}" alt="imagem do expositor"></div>
            `
        });

        contentModal.innerHTML = `
        <div class="left__side">
            <div class="decorative__img1">
                <img class="img-decoracao1" src="../../../Public/assets/img-decoracao1.png" alt="">
            </div>
            <div class="container__logo">
                <div class="div__logo"><img src="${response.expositor.img_perfil}" alt="image perfil "></div>
            </div>  
            <div class="container__h1"><h1>Produtos</h1></div>
            <div class="container__imgs">
                ${imgs_car_expositor}
            </div>
        </div>

        <!-- Lado Direito -->
        <div class="right__side">
            <div class="container__sobre">
                <h2>${response.expositor.nome_marca}</h2>
                <h3>Sobre</h3>
                <div class="area__text">
                    <p>
                        ${response.expositor.descricao_exp}
                    </p>
                </div>
            </div>

            <div class="container__infs">
                <div class="div__categoria">
                    <h3>Categoria</h3>
                    <p>${response.expositor.descricao}</p>
                </div>

                <div class="div__num">
                    <h3>Número</h3>
                    <p>${response.expositor.num_barraca}</p>
                </div>
            </div>

            <div class="container__contacts">
                <div class="div__contacts">
                    <h3>Contacts</h3>
                    <a href="${response.expositor.link_instagram}" target="_blank" class="icons" id="insta">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="${response.expositor.link_whats}" target="_blank" class="icons" id="zap">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="${response.expositor.link_facebook}" target="_blank" class="icons" id="face">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>

                <div class="div__cor__rua">
                    <h3>Cor da Rua</h3>
                    <div class="div__cor ${response.expositor.cor_rua}"><p>${response.expositor.cor_rua}</p></div>
                </div>
            </div>

            <div class="decorative__img2">
                <img class="img-decoracao2" src="../../../Public/assets/img-decoracao2.png" alt="">
            </div>
        </div>`
    }else {
        modal.showModal()
        contentModal.innerHTML = 'Expositor nâo encontrado'
    }

}

async function carregarExpositores() {
    try {
        const response = await fetch("../../../actions/actions-expositor.php?rand=0");
        const data = await response.json();
        console.log(data)

        const container = document.getElementById("expositores-container");

        data.expositor.forEach(expo => {
            console.log(`EXPO =====> ${JSON.stringify(expo)}`);
            const card = document.createElement("div");
            card.classList.add("content-card-expo");
            card.innerHTML = `
                <div class="card-per-expo">
                    <div class="head-card">
                        <img src="${expo.img_perfil}" alt="Imagem do expositor" class="img-perfil-expo">
                    </div>
                    <div class="body-card">
                        <h3 class="nome-expo">${expo.nome_marca}</h3>
                        <div class="detalhes-expo">
                            <p class="para-cate">Categoria: <span class="span-cate">${expo.descricao}</span></p>
                            <p class="para-color">Rua: <span class="span-color ${expo.cor_rua}">${expo.cor_rua}</span>
                        </p>
                        </div>
                        <button class="btn-ver-info open-modal" data-modal="m-per-expo" onclick="chamarModalExpositor(${expo.id_expositor})">Ver Mais</button>
                    </div>
                </div>
            `;
            container.appendChild(card);
        });

    } catch (error) {
        console.error("Erro ao carregar expositores:", error);
    }
}

// Executa a função assim que o script for carregado
carregarExpositores();
