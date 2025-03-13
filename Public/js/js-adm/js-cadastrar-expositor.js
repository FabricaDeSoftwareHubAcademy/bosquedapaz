document.querySelectorAll(".custom-dropdown input").forEach(input => {
    input.addEventListener("focus", function() {
        let dropdown = this.nextElementSibling;
        dropdown.style.display = "block";
    });

    input.addEventListener("input", function() {
        let dropdown = this.nextElementSibling;
        let filtro = this.value.toLowerCase();
        let opcoes = dropdown.getElementsByTagName("li");
        for (let opcao of opcoes) {
            if (opcao.innerText.toLowerCase().includes(filtro)) {
                opcao.style.display = "block";
            } else {
                opcao.style.display = "none";
            }
        }
    });

    document.addEventListener("click", function(event) {
        if (!input.parentElement.contains(event.target)) {
            input.nextElementSibling.style.display = "none";
        }
    });
});

function selecionarOpcao(element, inputId) {
    document.getElementById(inputId).value = element.innerText;
    document.getElementById(inputId).nextElementSibling.style.display = "none";
}
