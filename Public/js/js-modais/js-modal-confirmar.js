const headElement  = document.getElementsByTagName('head')[0];
const link  = document.createElement('link');
link.rel  = 'stylesheet';
link.type = 'text/css';
link.href = 'http://localhost/bosquedapaz/Public/css/css-modais/style-modal-confirmar.css';
headElement.appendChild(link);


const linkBootstrap = document.createElement('link')
linkBootstrap.rel = 'stylesheet'
linkBootstrap.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css'
headElement.appendChild(linkBootstrap)

function openModalLoading() {
    let modal = document.getElementById('modal-loading')
    modal.showModal()
}

function closeModalLoading() {
    let modal = document.getElementById('modal-loading')
    modal.close()
}

document.addEventListener('DOMContentLoaded', openModalLoading)