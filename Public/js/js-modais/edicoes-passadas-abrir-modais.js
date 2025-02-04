document.addEventListener('DOMContentLoaded', () => {
    const btns = document.querySelectorAll('.btn-ver-mais-edpass');
    const modals = document.querySelectorAll('.modal-edpass');
    const closes = document.querySelectorAll('.close-edpass');
    const overlay = document.getElementById('overlay');

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
            overlay.classList.add('active');
        });
    });

    closes.forEach(close => {
        close.addEventListener('click', () => {
            const modalId = close.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            modal.style.display = 'none';
            overlay.classList.remove('active');
        });
    });

    overlay.addEventListener('click', (event) => {
        event.stopPropagation(); 
    });
});

