document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.nav.prev');
    const nextBtn = document.querySelector('.nav.next');
    let current = 0;

    function updateActive() {
        const total = items.length;

        // Limpa todas as classes
        items.forEach(item => {
            item.classList.remove('active', 'prev', 'next', 'hidden');
        });

        // Calcula os índices de prev, active e next
        const prevIndex = (current - 1 + total) % total;
        const nextIndex = (current + 1) % total;

        // Aplica as classes
        items[prevIndex].classList.add('prev');
        items[current].classList.add('active');
        items[nextIndex].classList.add('next');

        // Esconde os demais
        items.forEach((item, index) => {
            if (index !== prevIndex && index !== current && index !== nextIndex) {
                item.classList.add('hidden');
            }
        });

        updateDescricaoEAtracoes();
    }

    prevBtn.addEventListener('click', () => {
        current = (current - 1 + items.length) % items.length;
        updateActive();
    });

    nextBtn.addEventListener('click', () => {
        current = (current + 1) % items.length;
        updateActive();
    });

    // Inicializa com a distribuição certa
    updateActive();
});
