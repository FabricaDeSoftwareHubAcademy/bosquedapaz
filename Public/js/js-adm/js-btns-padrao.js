const headElement  = document.getElementsByTagName('head')[0];
const linkBTNS  = document.createElement('link');
linkBTNS.rel  = 'stylesheet';
linkBTNS.type = 'text/css';
linkBTNS.href = '../../../Public/css/btn-padrao.css';
headElement.appendChild(linkBTNS);

let btnVoltar = document.getElementById('btn-voltar')
btnVoltar.addEventListener('mouseover', () => {
    let seta = document.getElementById('seta')
    seta.classList.remove('bi-arrow-left-short')
    seta.classList.add('bi-arrow-left')
    seta.style.transition = 'all .2s ease-in'
})

btnVoltar.addEventListener('mouseout', () => {
    let seta = document.getElementById('seta')
    seta.classList.remove('bi-arrow-left')
    seta.classList.add('bi-arrow-left-short')
})

document.getElementById('btn-reset').addEventListener('click', () => {
    window.location.reload()
})