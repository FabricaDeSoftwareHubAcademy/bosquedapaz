let cabecalho = document.querySelector('header')
let body = document.querySelector('body')
let nav = document.querySelectorAll('a')
let theme = 0

let btn = document.getElementById('theme-toggle')
btn.addEventListener('click', () => {
    if(theme == 0){
        cabecalho.style.setProperty('background-color', 'black')
        body.style.setProperty('background-color', 'black')
        theme = 1

        nav.forEach(e => {
            e.style.setProperty('color', 'white', 'important')
        });
    }
    else if(theme = 1){
        cabecalho.style.setProperty('background-color', 'white')
        body.style.setProperty('background-color', 'white')
        theme = 0
    }
})

