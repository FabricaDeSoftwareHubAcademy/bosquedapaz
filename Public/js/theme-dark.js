let cabecalho = document.querySelector('header')
let body = document.querySelector('body')
let nav = document.querySelectorAll('a')
let conteiner = document.querySelectorAll('section')
let title = document.getElementById('title-intro')
let elements = document.querySelectorAll('.theme')
// let botao = document.getElementById('btn-seja-expositor')
let theme = 0

if(localStorage.getItem('theme') === 'dark') {
    aplicarTemaEscuro()
    theme = 1
}

let btn = document.getElementById('theme-toggle')
btn.addEventListener('click', () => {
    if(theme === 0){
        aplicarTemaEscuro()
        theme = 1
        localStorage.setItem('theme', 'dark')
    }
    else {
        aplicarTemaClaro()
        theme = 0
        localStorage.setItem('theme', 'light')
    }
})

function aplicarTemaEscuro() {
    cabecalho.style.setProperty('background-color', 'black')
    body.style.setProperty('background-color', 'black')
    nav.forEach(e => {
        e.style.setProperty('color', 'white', 'important')
    })

    elements.forEach(e => {
        e.style.setProperty('color', 'white', 'important')
    })


    title.style.setProperty('color', 'white', 'important')
}

function aplicarTemaClaro() {
    cabecalho.style.setProperty('background-color', 'white')
    body.style.setProperty('background-color', 'white')
    nav.forEach(e => {
        e.style.setProperty('color', 'black', 'important')
    })

    elements.forEach(e => {
        e.style.setProperty('color', 'black', 'important')
    })

    title.style.setProperty('color', 'black', 'important')
}
