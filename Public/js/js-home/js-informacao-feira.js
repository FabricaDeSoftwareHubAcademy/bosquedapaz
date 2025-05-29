let numVisitante = document.getElementById('num-visitante')
let numExpositor = document.getElementById('num-expositor')
let numArtista = document.getElementById('num-artista')

async function getDadosFeira (){
    let imagens = await fetch("../../../actions/dados-feira.php")

    let resposta = await imagens.json()

    numVisitante.dataset.target = resposta[0][0].qtd_visitantes
    numExpositor.dataset.target = resposta[0][0].qtd_expositores
    numArtista.dataset.target = resposta[0][0].qtd_artistas
}

getDadosFeira()