linkDel.href = '../Public/css/css-modais/style-modal-deletar.css';

const urlCompleta = window.location.href;
console.log("URL completa:", urlCompleta); 


if (urlCompleta.includes("?erro=1")) {
    openModalError();
}

const btnClose = document.getElementById('close-modal-erro');
btnClose.addEventListener('click', function() {
    closeModalError();
    window.location.href = "./tela-login.php";
});