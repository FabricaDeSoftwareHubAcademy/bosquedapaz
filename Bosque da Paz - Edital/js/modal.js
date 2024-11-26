const btnAceitarTermos = document.querySelector('.aceitar');
const modal = document.getElementById('modal');
const btnAceitarModal = document.getElementById('btnAceitarModal');
const btnRecusarModal = document.getElementById('btnRecusarModal');

btnAceitarTermos.addEventListener('click', function() {
    modal.style.display = 'flex';
});

btnAceitarModal.addEventListener('click', function() {
    modal.style.display = 'none';
});
btnRecusarModal.addEventListener('click', function() {
    modal.style.display = 'none';
});
