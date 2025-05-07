const openButtons = document.querySelectorAll('.open-modal');
const overlay = document.getElementById('overlay'); // Selecione o elemento da sobreposição
const overlaay = document.getElementById('overlaay'); // Selecione o elemento da sobreposição

openButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        
        // Mostra o modal e a sobreposição
        modal.showModal();
        document.body.style.overflowY = 'hidden';
        overlay.style.display = 'block'; // Exibe a sobreposição
        overlaay.style.display = 'block'; // Exibe a sobreposição
    })
})

const closeButtons = document.querySelectorAll('.close-modal');

closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        
        // Fecha o modal e esconde a sobreposição
        modal.close();
        document.body.style.overflowY = 'scroll';
        overlay.style.display = 'none'; // Esconde a sobreposição
        overlaay.style.display = 'none'; // Esconde a sobreposição
    })
})
