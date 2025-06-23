const headElement  = document.getElementsByTagName('head')[0];
const link  = document.createElement('link');
link.rel  = 'stylesheet';
link.type = 'text/css';
link.href = '../../../Public/css/css-modais/style-modal-confirmar.css';
headElement.appendChild(link);


const linkBootstrap = document.createElement('link')
linkBootstrap.rel = 'stylesheet'
linkBootstrap.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css'
headElement.appendChild(linkBootstrap)

function openModalConfirmar() {
    let modal = document.getElementById('modal-confirmar')
    modal.showModal()
}

function closeModalConfirmar() {
    let modal = document.getElementById('modal-confirmar')
    modal.close()
}

function openModalAtualizar() {
    let modal = document.getElementById('modal-atualizar')
    modal.showModal()
}

function closeModalAtualizar() {
    let modal = document.getElementById('modal-atualizar')
    modal.close()
}
