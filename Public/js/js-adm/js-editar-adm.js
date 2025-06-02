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

let formulario = document.getElementById("formulario");

formulario.addEventListener("submit", async (e) => {
    e.preventDefault();
    
    let atualizar = document.querySelector("button[value=atualizar]")
    const formData = new FormData(formulario, atualizar);

    let dados = await fetch("../../../actions/action-colaborador.php", {
        method: "POST",
        body: formData,
    });

    console.log(formulario);

    let response = await dados.json();
    console.log(response);
    
})