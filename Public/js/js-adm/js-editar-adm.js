function previewImagem() {
    const input = document.getElementById("uploadFoto");
    const preview = document.getElementById("previewFoto");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

const formulario = document.getElementById("formulario");

formulario.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(formulario);
    formData.append("atualizar", "true");

    try {
        const response = await fetch("../../../actions/action-colaborador.php", {
            method: "POST",
            body: formData,
        });

        const data = await response.json();
        console.log("Resposta do servidor:", data);

        if (data.success) {
            alert("Edição realizada com sucesso!");
            formulario.reset();
            document.getElementById("previewFoto").src = "";
        } else {
            alert("Erro: " + data.message);
        }
    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Ocorreu um erro ao tentar editar. Verifique o console.");
    }
});
