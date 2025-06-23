async function getExpositor() {
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
                        <span class="span-color" style="background-color: ${element.cor_rua};">
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
}

document.addEventListener('DOMContentLoaded', getExpositor())

let inputPesquiar = document.getElementById('input_pesquisa')

inputPesquiar.addEventListener('keyup', async function (e) {
    if(inputPesquiar.value.length > 1) {
        let dados = await fetch(`../../../actions/actions-listar-expositor.php?filtro=${inputPesquiar.value}`);

        let response = await dados.json()
        console.log(response)
    }
    else if (inputPesquiar.value.length < 2){
        getExpositor()
    }
})