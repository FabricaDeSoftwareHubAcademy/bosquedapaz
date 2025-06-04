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

let slider = document.getElementById('slider')
let arrowLeft = document.getElementById('arrow-left')
let arrowRight = document.getElementById('arrow-right')
let balls = document.querySelectorAll('.ball')
balls[0].style.backgroundColor = 'green'


let x = 0
function trocaImagem (img, n){
    slider.style.backgroundImage = `url('../../${img}')`
    balls[n].style.backgroundColor = 'green'
    balls[x].style.backgroundColor = 'white'
    x = n
}


// busca imagens do banco de dados
async function getImage() {
    let imagens = await fetch("../../../actions/carrossel.php")

    let resposta = await imagens.json()


    const interval = setInterval(() => {
            if (x == 0){
                trocaImagem(resposta.imagens[1].caminho,1)
            }
            else if (x == 1){
                trocaImagem(resposta.imagens[2].caminho,2)
            }
            else if (x == 2){
                trocaImagem(resposta.imagens[0].caminho ,0)
        }
    }, 3000)


    arrowLeft.addEventListener('click', () => {
        if (x == 0){
            trocaImagem(resposta.imagens[2].caminho,2)
        }
        else if (x == 1){
            trocaImagem(resposta.imagens[0].caminho,0)
        }
        else if (x == 2){
            trocaImagem(resposta.imagens[1].caminho ,1)
        }
    })

    arrowRight.addEventListener('click', () => {
        if (x == 0){
            trocaImagem(resposta.imagens[1].caminho,1)
        }
        else if (x == 1){
            trocaImagem(resposta.imagens[2].caminho,2)
        }
        else if (x == 2){
            trocaImagem(resposta.imagens[0].caminho ,0)
        }
    })

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
