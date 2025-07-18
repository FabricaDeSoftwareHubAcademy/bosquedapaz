const linkLoading  = document.createElement('link');
linkLoading.rel  = 'stylesheet';
linkLoading.type = 'text/css';
linkLoading.href = '../../../Public/css/css-modais/style-modal-carregar.css';
document.getElementsByTagName('head')[0].appendChild(linkLoading);

function openModalLoading() {
    let modal = document.getElementById('modal-loading')
    modal.showModal()
}

function closeModalLoading() {
    let modal = document.getElementById('modal-loading')
    modal.close()
}
