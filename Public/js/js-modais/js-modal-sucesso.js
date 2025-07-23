const linkSuscess  = document.createElement('link');
linkSuscess.rel  = 'stylesheet';
linkSuscess.type = 'text/css';
linkSuscess.href = '../../../Public/css/css-modais/style-modal-sucesso.css';
document.getElementsByTagName('head')[0].appendChild(linkSuscess);


function openModalSucesso() {
    let modal = document.getElementById('modal-sucesso')
    modal.showModal()
}

function closeModalSucesso() {
    let modal = document.getElementById('modal-sucesso')
    modal.close()
}