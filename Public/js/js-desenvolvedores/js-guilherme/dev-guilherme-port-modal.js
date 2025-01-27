// Obtém o modal e o botão de fechar
const modal = document.getElementById('modal-guilherme');
const imagemModal = document.getElementById('imagemModal-guilherme');
const closeModal = document.getElementById('closeModal-guilherme');

// Obtém todos os botões "Visualizar Projeto"
const btnsVisualizar = document.querySelectorAll('.btn-visualizar-guilherme');

// Adiciona um evento de clique em cada botão
btnsVisualizar.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.preventDefault(); // Impede o link de ser seguido
        const imagemSrc = btn.closest('.projeto-card-guilherme').querySelector('img').src;
        imagemModal.src = imagemSrc; // Define a imagem no modal
        modal.style.display = 'flex'; // Mostra o modal
        document.body.classList.add('modal-open-guilherme'); // Impede rolagem
    });
});

// Adiciona evento de clique para fechar o modal
closeModal.addEventListener('click', () => {
    modal.style.display = 'none'; // Esconde o modal
    document.body.classList.remove('modal-open-guilherme'); // Permite rolagem novamente
});

// Fecha o modal se o usuário clicar fora da imagem
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none'; // Esconde o modal
        document.body.classList.remove('modal-open-guilherme'); // Permite rolagem novamente
    }
});
