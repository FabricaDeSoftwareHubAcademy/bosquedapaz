const headElementSuscess  = document.getElementsByTagName('head')[0];
const linkSuscess  = document.createElement('link');
linkSuscess.rel  = 'stylesheet';
linkSuscess.type = 'text/css';
linkSuscess.href = '../../../Public/css/css-modais/style-modal-sucesso.css';
headElementSuscess.appendChild(linkSuscess);


function openModalSucesso() {
    let modal = document.getElementById('modal-sucesso')
    modal.showModal()
}

function closeModalSucesso() {
    let modal = document.getElementById('modal-sucesso')
    modal.close()
}