document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const nomeInput = document.getElementById("nomedoevento");
    const descricaoInput = document.getElementById("descricaodoevento");
    const dataInput = document.getElementById("dataevento");
    const fileInput = document.getElementById("file");

    function sanitizeText(text) {
        const div = document.createElement("div");
        div.textContent = text.trim();
        return div.innerHTML;
    }

    function isValidDate(dateStr) {
        const regex = /^\d{4}-\d{2}-\d{2}$/;
        return regex.test(dateStr);
    }

    form.addEventListener("submit", function (e) {
        let nome = sanitizeText(nomeInput.value);
        let descricao = sanitizeText(descricaoInput.value);
        let data = dataInput.value;
        let file = fileInput.value;

        if (!nome || !descricao || !data || !file) {
            e.preventDefault();
            alert("Todos os campos são obrigatórios.");
            return;
        }

        if (!isValidDate(data)) {
            e.preventDefault();
            alert("Data inválida. Use o formato correto: YYYY-MM-DD.");
            return;
        }

        nomeInput.value = nome;
        descricaoInput.value = descricao;
    });
});