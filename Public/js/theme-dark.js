let cabecalho = document.querySelector('header')
let body = document.querySelector('body')
let nav = document.getElementById('nav-list')
let conteiner = document.querySelectorAll('section')
let title = document.getElementById('title-intro')
let dark = document.querySelectorAll('.dark')
let white = document.querySelectorAll('.white')
let theme = 0
let botaoTema = document.getElementById('toggle-theme')

// Pega a logo
let logo = document.querySelector('.img-logo')

// Verifica tema salvo no localStorage
if (localStorage.getItem('theme') === 'dark') {
    aplicarTemaEscuro()
    theme = 1
    botaoTema.textContent = '🌙'
} else {
    aplicarTemaClaro()
    theme = 0
    botaoTema.textContent = '🌞'
    body.classList.add('light')
}

// Adiciona o clique no botão
botaoTema.addEventListener('click', alternarTema)

// Alterna entre claro e escuro
function alternarTema() {
    if (theme === 0) {
        aplicarTemaEscuro()
        theme = 1
        localStorage.setItem('theme', 'dark')
        botaoTema.textContent = '🌙'
        body.classList.remove('light')
    } else {
        aplicarTemaClaro()
        theme = 0
        localStorage.setItem('theme', 'light')
        botaoTema.textContent = '🌞'
        body.classList.add('light')
    }
}

function aplicarTemaEscuro() {
    cabecalho.style.setProperty('background-color', '#23262D')
    body.style.setProperty('background-color', '#23262D')
    nav.style.setProperty('background-color', '#23262D')

    dark.forEach(element => {
        element.style.setProperty('color', 'white', 'important')
    });

    // Troca a imagem para o tema escuro usando data-attribute
    if (logo && logo.hasAttribute('data-img-dark')) {
        logo.src = logo.getAttribute('data-img-dark')
    }
}

function aplicarTemaClaro() {
    cabecalho.style.setProperty('background-color', 'white')
    body.style.setProperty('background-color', 'white')
    nav.style.setProperty('background-color', 'white')

    dark.forEach(element => {
        element.style.setProperty('color', 'black', 'important')
    });

    // Troca a imagem para o tema claro usando data-attribute
    if (logo && logo.hasAttribute('data-img-light')) {
        logo.src = logo.getAttribute('data-img-light')
    }
}
