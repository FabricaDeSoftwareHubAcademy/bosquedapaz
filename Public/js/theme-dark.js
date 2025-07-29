let cabecalho = document.querySelector('header')
let body = document.querySelector('body')
let nav = document.querySelectorAll('a')
let conteiner = document.querySelectorAll('section')
let title = document.getElementById('title-intro')
let dark = document.querySelectorAll('.dark')
let white = document.querySelectorAll('.white')
let theme = 0
let botaoTema = document.getElementById('toggle-theme')

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

    dark.forEach(element => {
        element.style.setProperty('color', 'white', 'important')
    });
}

function aplicarTemaClaro() {
    cabecalho.style.setProperty('background-color', 'white')
    body.style.setProperty('background-color', 'white')

    dark.forEach(element => {
        element.style.setProperty('color', 'black', 'important')
    });
}
