let lastScrollTop = 0; // Armazena a posição do scroll anterior
const header = document.querySelector(".header-matheus");

window.addEventListener("scroll", function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Rolou para baixo
        header.style.top = "-100px"; // Ajuste para a altura do seu cabeçalho
    } else {
        // Rolou para cima
        header.style.top = "0"; // Mostra o cabeçalho novamente
    }

    lastScrollTop = scrollTop; // Atualiza a última posição do scroll
});


