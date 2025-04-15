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

function menuShowHome() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open')
    } else {
        menuMobile.classList.add('open')
    }
}

// pegando elementos do carrossel
const arrowLeft = document.getElementById('arrow-left');
const arrowRight = document.getElementById('arrow-right');
const sliders = document.querySelectorAll('#slider-content')
const balls = document.querySelectorAll('#ball')
//iniciando valores padrao
let count_carrossel = 0;
let slider = sliders[0];
let bola_carrossel = balls[0]
const color_carrossel = '#0D592E';

slider.style.zIndex = 1;
bola_carrossel.style.backgroundColor = color_carrossel;

// function de trocar imagem
function trocaImagem (n){
    slider.style.zIndex = 0;
    bola_carrossel.style.backgroundColor = 'white';
    slider = sliders[n];
    bola_carrossel = balls[n]
    slider.style.zIndex = 1
    bola_carrossel.style.backgroundColor = color_carrossel;
    count_carrossel = n
}

// intervalo de troca de imagem
const interval = setInterval(() => {
    if (count_carrossel == 0){
        trocaImagem(1)
    clearInterval()
    }
    else if (count_carrossel == 1){
        trocaImagem(2)
    clearInterval()
    }
    else if (count_carrossel == 2){
        trocaImagem(0)
    clearInterval()
    }
}, 3000)

// ao clicar na seta esquerca volta para a imagem anterior
arrowLeft.addEventListener('click', () => {
    if (count_carrossel == 0){
        trocaImagem(2)
    }
    else if (count_carrossel == 2){
        trocaImagem(1)
    }
    else if (count_carrossel == 1){
        trocaImagem(0)
    }
})

// ao clicar na seta direita passa de imagem
arrowRight.addEventListener('click', () => {
    if (count_carrossel == 0){
        trocaImagem(1)
    }
    else if (count_carrossel == 1){
        trocaImagem(2)
    }
    else if (count_carrossel == 2){
        trocaImagem(0)
    }
})

// informações
const titleIntro = document.getElementById('title-intro')
let textIntro = 'bem vindo á feira bosque da paz'
let textSemIntro = ''
console.log(textIntro.length)


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

// let textInfo = document.getElementById('text-info')
// console.log(textInfo)

document.addEventListener("load", setTimeout( n = () => {
    const ncs = document.querySelectorAll('.text-info');
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

        var elements = document.querySelector('#text-info');
        elements.addEventListener('mousehover', updateCount());
        // updateCount();
    });
}, 3000)
)