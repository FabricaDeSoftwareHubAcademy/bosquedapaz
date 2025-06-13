const headElement  = document.getElementsByTagName('head')[0];
const link  = document.createElement('link');
link.rel  = 'stylesheet';
link.type = 'text/css';
link.href = 'http://localhost/bosquedapaz/Public/css/btn-padrao.css';
headElement.appendChild(link);

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