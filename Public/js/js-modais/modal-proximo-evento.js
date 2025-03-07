const openButtons = document.querySelectorAll('.open-modal');
const closeButtons = document.querySelectorAll('.close-modal');
const overlay = document.getElementById('overlay'); 
const overlaay = document.getElementById('overlaay');

openButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        
        modal.showModal();
        overlay.style.display = 'block';
        overlaay.style.display = 'block';
        overlayy.style.display = 'block';

        // Impede o scroll
        document.body.style.overflow = 'hidden';
    });
});

closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        
        modal.close();
        overlay.style.display = 'none';
        overlaay.style.display = 'none';
        overlayy.style.display = 'none';

        // Restaura o scroll
        document.body.style.overflow = '';
    });
});
