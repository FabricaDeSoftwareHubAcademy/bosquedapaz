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
