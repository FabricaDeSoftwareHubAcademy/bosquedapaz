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
