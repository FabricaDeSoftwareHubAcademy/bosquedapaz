document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.nav.prev');
    const nextBtn = document.querySelector('.nav.next');
    let current = 0;
    const total = items.length;

    function updateActive() {
        // Remove todas as classes
        items.forEach(item => {
            item.classList.remove('active', 'prev', 'next', 'hidden');
        });

        // Calcula índices prev e next circulares
        const prevIndex = (current - 1 + total) % total;
        const nextIndex = (current + 1) % total;

        // Aplica classes para os três slides visíveis
        items[prevIndex].classList.add('prev');
        items[current].classList.add('active');
        items[nextIndex].classList.add('next');

        // Outros ficam “invisíveis” mas presentes para animação suave
        items.forEach((item, index) => {
            if (index !== prevIndex && index !== current && index !== nextIndex) {
                item.classList.add('hidden');
            }
        });
    }

    prevBtn.addEventListener('click', () => {
        current = (current - 1 + total) % total;
        updateActive();
    });

    nextBtn.addEventListener('click', () => {
        current = (current + 1) % total;
        updateActive();
    });

    // Inicializa o carrossel
    updateActive();
});
