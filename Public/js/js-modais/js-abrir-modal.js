const corpo = document.getElementById('corpo');
console.log(corpo)
const openButtons = document.querySelectorAll('.open-modal');
const overlay = document.getElementById('overlay');
console.log(overlay)


openButtons.forEach(button => {
    button.addEventListener('click', () => {
        corpo.classList.add('no-scroll')
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        modal.showModal();
        overlay.style.display = 'block'; 
    })
})



const closeButtons = document.querySelectorAll('.close-modal')

closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        corpo.classList.remove('no-scroll')
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        modal.close();
        overlay.style.display = 'none';
    })
})