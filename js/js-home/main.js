function menuShow() {
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