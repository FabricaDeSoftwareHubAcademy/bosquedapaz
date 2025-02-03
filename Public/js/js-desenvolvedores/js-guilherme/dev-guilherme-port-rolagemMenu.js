window.addEventListener("scroll", function() {
    var header = document.getElementById("header-menu-guilherme");
    if (window.scrollY > 5) { // Quando o usuário rolar 50px ou mais
        header.classList.add("header-scroll-guilherme");
    } else {
        header.classList.remove("header-scroll-guilherme");
    }
});