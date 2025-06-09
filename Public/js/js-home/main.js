
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




////////////////////////////////////////////////////////////////
// soma numeros nas informacoes
document.addEventListener("DOMContentLoaded", () => setTimeout( n = () => {
    const ncs = document.querySelectorAll('.ncs');
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

        var elements = document.querySelector('#inc');
        elements.addEventListener('mousehover', updateCount());
    });
}, 1700))
