let btnsPadrao = document.getElementById('btns-forms-padrao')
btnsPadrao.style.width = '100%'
btnsPadrao.style.padding = '2rem 2rem'
btnsPadrao.style.display = 'flex'
btnsPadrao.style.alignItems = 'center'
btnsPadrao.style.justifyContent = 'space-between'
btnsPadrao.style.backgroundColor = 'aqua'

let btnVoltar = document.getElementById('btn-voltar')
btnVoltar.style.backgroundColor = 'transparent'
btnVoltar.style.width = '40px'
btnVoltar.style.height = '40px'
btnVoltar.style.borderRadius = '50%'
btnVoltar.style.position = 'relative'
btnVoltar.style.overflow = 'hidden'
btnVoltar.style.cursor = 'pointer'

let linhaCima = document.getElementById('linha1')
linhaCima.style.width = '.9rem'
linhaCima.style.height = '.1rem'
linhaCima.style.borderRadius = '.2rem'
linhaCima.style.margin = 'auto'
linhaCima.style.transform = 'rotate(-40deg)'
linhaCima.style.position = 'relative'
linhaCima.style.top = '-.15rem'
linhaCima.style.left = '-.1rem'
linhaCima.style.backgroundColor = 'black'

let linhaBaixo = document.getElementById('linha2')
linhaBaixo.style.width = '.9rem'
linhaBaixo.style.height = '.1rem'
linhaBaixo.style.borderRadius = '.2rem'
linhaBaixo.style.margin = 'auto'
linhaBaixo.style.transform = 'rotate(40deg)'
linhaBaixo.style.position = 'relative'
linhaBaixo.style.top = '.25rem'
linhaBaixo.style.left = '-.1rem'
linhaBaixo.style.backgroundColor = 'black'

let linhaCima2 = document.getElementById('linha3')
linhaCima2.style.display = 'none'
linhaCima2.style.width = '.9rem'
linhaCima2.style.height = '.1rem'
linhaCima2.style.borderRadius = '.2rem'
linhaCima2.style.margin = 'auto'
linhaCima2.style.transform = 'rotate(-40deg)'
linhaCima2.style.position = 'relative'
linhaCima2.style.top = '-.35rem'
linhaCima2.style.left = '.3rem'
linhaCima2.style.backgroundColor = 'black'

let linhaBaixo2 = document.getElementById('linha4')
linhaBaixo2.style.display = 'none'
linhaBaixo2.style.width = '.9rem'
linhaBaixo2.style.height = '.1rem'
linhaBaixo2.style.borderRadius = '.2rem'
linhaBaixo2.style.margin = 'auto'
linhaBaixo2.style.transform = 'rotate(40deg)'
linhaBaixo2.style.position = 'relative'
linhaBaixo2.style.top = '.0rem'
linhaBaixo2.style.left = '.3rem'
linhaBaixo2.style.backgroundColor = 'black'

btnVoltar.addEventListener('mouseover', () => {
    linhaCima2.style.display = 'block'
    linhaBaixo2.style.display = 'block'
    linhaBaixo2.style.transition = 'all .2s ease-in'
    linhaCima2.style.transition = 'all .2s ease-in'
    linhaCima.style.left = `-.3rem`
    linhaBaixo.style.left = `-.3rem`
    linhaBaixo.style.transition = 'all .2s ease-in'
    linhaCima.style.transition = 'all .2s ease-in'
})
btnVoltar.addEventListener('mouseout', () => {
    linhaCima2.style.display = 'none'
    linhaBaixo2.style.display = 'none'
    linhaBaixo2.style.transition = 'all .2s ease-in'
    linhaCima2.style.transition = 'all .2s ease-in'
    linhaCima.style.left = '-.1rem'
    linhaBaixo.style.left = '-.1rem'
    linhaBaixo.style.transition = 'all .2s ease-in'
    linhaCima.style.transition = 'all .2s ease-in'
})

let btnsSalvarCancelar = document.getElementById('btns-salvar-cancelar')
btnsSalvarCancelar.style.display = 'flex'
btnsSalvarCancelar.style.alignItems = 'center'
btnsSalvarCancelar.style.justifyContent = 'center'
btnsSalvarCancelar.style.gap = '1rem'

let btnReset = document.getElementById('btn-reset')
btnReset.style.padding = '.5rem 1rem'
btnReset.style.fontSize = '1.2rem'
btnReset.style.fontWeight = '600'
btnReset.style.border = 'none'
btnReset.style.borderRadius = '.5rem'
btnReset.style.backgroundColor = '#FF3877'
btnReset.style.color = 'white'

btnReset.addEventListener('mouseover', () => {
    btnReset.style.boxShadow = '0px 0px 5px black'
    btnReset.style.transition = 'all .2s ease-in'
})
btnReset.addEventListener('mouseout', () => {
    btnReset.style.boxShadow = 'none'
    btnReset.style.transition = 'all .2s ease-in'
})

let btnSalvar = document.getElementById('btn-salvar')
btnSalvar.style.padding = '.5rem 1rem'
btnSalvar.style.fontSize = '1.2rem'
btnSalvar.style.fontWeight = '600'
btnSalvar.style.border = 'none'
btnSalvar.style.borderRadius = '.5rem'
btnSalvar.style.backgroundColor = '#007E70'
btnSalvar.style.color = 'white'

btnSalvar.addEventListener('mouseover', () => {
    btnSalvar.style.boxShadow = '0px 0px 5px black'
    btnSalvar.style.transition = 'all .2s ease-in'
})
btnSalvar.addEventListener('mouseout', () => {
    btnSalvar.style.boxShadow = 'none'
    btnSalvar.style.transition = 'all .2s ease-in'
})