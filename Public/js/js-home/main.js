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
function inputShow() {
    let menuMobile = document.querySelector('.pequisa-mobile .pesquisa .input');
    if (menuMobile.classList.contains('inputOpen')) {
        menuMobile.classList.remove('inputOpen')
    } else {
        menuMobile.classList.add('inputOpen')
    }
}
function inputShow2() {
    let menuMobile = document.querySelector('.pesquisar-login .pesquisar .input');
    if (menuMobile.classList.contains('inputOpen')) {
        menuMobile.classList.remove('inputOpen')
    } else {
        menuMobile.classList.add('inputOpen')
    }
}
