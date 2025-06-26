const headElementDel  = document.getElementsByTagName('head')[0];
const linkDel  = document.createElement('link');
linkDel.rel  = 'stylesheet';
linkDel.type = 'text/css';
linkDel.href = '../../../Public/css/css-modais/style-modal-deletar.css';
headElementDel.appendChild(linkDel);

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
