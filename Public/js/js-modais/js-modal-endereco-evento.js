const linkEndereco = document.createElement('link');
linkEndereco.rel = 'stylesheet';
linkEndereco.type = 'text/css';
linkEndereco.href = '../../../Public/css/css-modais/style-modal-cadastrar-endereco.css';
document.getElementsByTagName('head')[0].appendChild(linkEndereco);

document.getElementById('btn-novo-endereco').addEventListener('click', () => {
    document.getElementById('modal-cadastrar-endereco').showModal();
  });

document.getElementById('close-modal-endereco').addEventListener('click', () => {
  document.getElementById('modal-cadastrar-endereco').close();
});