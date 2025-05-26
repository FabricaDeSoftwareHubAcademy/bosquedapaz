// abre o menu da home
const sandwich = document.getElementById('sandwich')
const navMenu = document.getElementById('nav-list')
sandwich.addEventListener('click', function(){
    if (navMenu.classList.contains('open')) {
        navMenu.classList.remove('open')
        sandwich.classList.remove('bi-x')
        sandwich.classList.add('bi-list')
    } else {
        navMenu.classList.add('open')
        sandwich.classList.remove('bi-list')
        sandwich.classList.add('bi-x')
    }
})

////////////////////////////////////////////////
// informações
const titleIntro = document.getElementById('title-intro')
let textIntro = 'bem vindo á feira bosque da paz'
let textSemIntro = ''
console.log(textIntro.length)

// troca texto  bemvindo
let i = 0
const intervalText = setInterval(() => {
    if(i < textIntro.length){
        textSemIntro += textIntro[i]
        titleIntro.innerText = textSemIntro
        i++
    }
    else {
        clearInterval()
    }
}, 50)



//////////////////////////////////////////////////
// troca imagens carrossel

let sliders = document.querySelectorAll('.img-carrossel')
let balls = document.querySelectorAll('.ball')
balls[0].style.backgroundColor = 'green'

sliders[0].style.opacity = 100
function trocaImagem (n,y){
    sliders[n].style.opacity = 100
    balls[n].style.backgroundColor = 'green'
    balls[x].style.backgroundColor = 'white'
    sliders[x].style.opacity = 0
    x = n
}

let x = 0
const interval = setInterval(() => {
    if (x == 0){
        trocaImagem(1,0)
    clearInterval()
    }
    else if (x == 1){
        trocaImagem(2,1)
    clearInterval()
    }
    else if (x == 2){
        trocaImagem(0,2)
    clearInterval()
    }
}, 3000)




// busca imagens do banco de dados
async function getImage() {
    let imagens = await fetch("../../../actions/carrossel.php")

    let resposta = await imagens.json()

    var img1 = document.getElementById('img-carrossel1');
    var img2 = document.getElementById('img-carrossel2');
    var img3 = document.getElementById('img-carrossel3');

    if (resposta.imagens[0].posicao == 1){
        img1.src = `../../${resposta.imagens[0].caminho}`
    }
    if (resposta.imagens[1].posicao == 2){
        img2.src = `../../${resposta.imagens[1].caminho}`
    }
    if (resposta.imagens[2].posicao == 3){
        img3.src = `../../${resposta.imagens[2].caminho}`
    }
}

getImage()




////////////////////////////////////////////////////////////////
// soma numeros nas informacoes
document.addEventListener("DOMContentLoaded", setTimeout( n = () => {
    const ncs = document.querySelectorAll('.ncs');
    const speed = 200;

    ncs.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const currentCount = +counter.innerText;
            const increment = target / speed;

            if (currentCount < target) {
                counter.innerText = Math.ceil(currentCount + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };

        var elements = document.querySelector('#inc');
        elements.addEventListener('mousehover', updateCount());
    });
}, 1700))
