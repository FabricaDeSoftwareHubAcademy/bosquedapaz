const headElement  = document.getElementsByTagName('head')[0];
const link  = document.createElement('link');
link.rel  = 'stylesheet';
link.type = 'text/css';
link.href = '../../../Public/css/css-modais/style-modal-deletar.css';
headElement.appendChild(link);


const linkBootstrap = document.createElement('link')
linkBootstrap.rel = 'stylesheet'
linkBootstrap.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css'
headElement.appendChild(linkBootstrap)

function openModalDelete() {
    let modal = document.getElementById('modal-delete')
    modal.showModal()
}

function closeModalDelete() {
    let modal = document.getElementById('modal-delete')
    modal.close()
}
function openModalError() {
    let modal = document.getElementById('modal-error')
    modal.showModal()
}

function closeModalError() {
    let modal = document.getElementById('modal-error')
    modal.close()
}
