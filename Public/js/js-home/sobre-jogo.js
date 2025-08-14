function mostrarCards(inicio, qtd) {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => card.style.display = 'none');
    for (let i = inicio; i < inicio + qtd && i < cards.length; i++) {
        cards[i].style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    mostrarCards(0, 2); // mostra os primeiros 2 cards

    const botoes = document.querySelectorAll('.buttons_container button');
    botoes[0].addEventListener('click', () => mostrarCards(0, 2)); // 1º botão
    botoes[1].addEventListener('click', () => mostrarCards(2, 3)); // 2º botão
    botoes[2].addEventListener('click', () => mostrarCards(5, 5)); // 3º botão (últimos 5 cards)
});
