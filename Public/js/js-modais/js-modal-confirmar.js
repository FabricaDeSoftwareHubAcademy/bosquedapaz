const headElementConfirm  = document.getElementsByTagName('head')[0];
const linkConfirm  = document.createElement('link');
linkConfirm.rel  = 'stylesheet';
linkConfirm.type = 'text/css';
linkConfirm.href = '../../../Public/css/css-modais/style-modal-confirmar.css';
headElementConfirm.appendChild(linkConfirm);

function openModalConfirmar() {
    let modal = document.getElementById('modal-confirmar')
    modal.showModal()
}

function closeModalConfirmar() {
    let modal = document.getElementById('modal-confirmar')
    modal.close()
}
function openModalAtualizar() {
    let modal = document.getElementById('modal-confirmar')
    document.getElementById('confirmar-title').innerText = 'Deseja confirmar esta edição?'
    document.getElementById('msm-confimar').innerText = 'Clique em salvar para confirmar a edição.'
    modal.showModal()
}

function closeModalAtualizar() {
    let modal = document.getElementById('modal-confirmar')
    modal.close()
}
