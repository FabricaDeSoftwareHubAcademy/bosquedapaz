const openButtons = document.querySelectorAll('.open-modal');
// console.log(openButtons)

openButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        console.log(modalId)
        const modal = document.getElementById(modalId);
        console.log(modal)
        modal.showModal();
    })
})


const closeButtons = document.querySelectorAll('.close-modal')

closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        modal.close();
    })
})