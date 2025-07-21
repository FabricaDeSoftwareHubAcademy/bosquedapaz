let cabecalho = document.querySelector('header')
let body = document.querySelector('body')
let nav = document.querySelectorAll('a')
let conteiner = document.querySelectorAll('section')
let title = document.getElementById('title-intro')
let dark = document.querySelectorAll('.dark')
let white = document.querySelectorAll('.white')
let theme = 0

let btn = document.getElementById('theme-toggle')

// Verifica tema salvo no localStorage
if(localStorage.getItem('theme') === 'dark') {
    aplicarTemaEscuro()
    theme = 1
    btn.checked = true // ativa o switch visualmente
}

// Escuta a mudança do switch
btn.addEventListener('change', () => {
    if (btn.checked) {
        aplicarTemaEscuro()
        theme = 1
        localStorage.setItem('theme', 'dark')
    } else {
        aplicarTemaClaro()
        theme = 0
        localStorage.setItem('theme', 'light')
    }
})

function aplicarTemaEscuro() {
    cabecalho.style.setProperty('background-color', 'black')
    body.style.setProperty('background-color', 'black')

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
