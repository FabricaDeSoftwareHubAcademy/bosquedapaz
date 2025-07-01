document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-artista');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        console.log("Dados do formulário:");
        for (const [campo, valor] of formData.entries()) {
            console.log(`${campo}: ${valor}`);
        }

        // Se quiser, aqui você poderia liberar o envio real depois de testar:
        // form.submit();
    });
});
