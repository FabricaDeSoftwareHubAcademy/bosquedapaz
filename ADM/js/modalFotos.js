
const openButtons = document.querySelectorAll('.open-modal');


const closeButtons = document.querySelectorAll('.close-modal');


openButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        modal.style.display = 'flex';
    });
});


closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        modal.style.display = 'none';
    });
});


window.addEventListener('click', (event) => {
    const modal = document.getElementById('modal-fotos');
    if (event.target === modal) {
        modal.style.display = 'none';
    }

});
const addPhotosButton = document.querySelector('.submit-fotos');
if (addPhotosButton) {
    addPhotosButton.addEventListener('click', () => {
        const modal = document.getElementById('modal-fotos');
        modal.style.display = 'none';
    });
}

