document.addEventListener('DOMContentLoaded', async function () {
    let dados = await fetch('../../../actions/actions-listar-expositor.php');

    let response = await dados.json()
    
    let contentCards = document.getElementById('content-cards')

    contentCards.innerHTML = ''

    response.expositores.forEach(element => {
        contentCards.innerHTML += `
        <div class="sobre_card">
        <div class="content-card-expo">
        <div class="card-per-expo">
            <div class="head-card">
                <img src="${element.img_perfil}" alt="" class="img-perfil-expo">
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
                        <span class="span-color" style="background-color: red;">
                        </span>
                    </p>
                </div>
                <button class="btn-ver-info open-modal" data-modal="m-per-expo">Ver Mais</button>
            </div>
        </div>
    </div>
    </div>
        `
    });
})