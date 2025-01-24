const input = document.querySelector(".input-esco");

input.addEventListener('click', () => {
    const list = document.querySelector('.lista-cat');
    if (list.classList.contains('listOpen')) {
        list.classList.remove('listOpen')
    } else {
        list.classList.add('listOpen')
    }
})