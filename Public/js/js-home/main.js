
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

