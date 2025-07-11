const headElementConfirm  = document.getElementsByTagName('head')[0];
const linkConfirm  = document.createElement('link');
linkConfirm.rel  = 'stylesheet';
linkConfirm.type = 'text/css';
linkConfirm.href = '../../../Public/css/css-modais/style-modal-confirmar.css';
headElementConfirm.appendChild(linkConfirm);

document.getElementById('btn-novo-endereco').addEventListener('click', () => {
    document.getElementById('modal-cadastrar-endereco').showModal();
  });