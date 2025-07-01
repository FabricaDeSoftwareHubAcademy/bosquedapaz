let btn_salvar = document.getElementById("btn_salvar");
let modal = document.getElementById("modal_salvar");

btn_salvar.addEventListener('click', async function(event) {
    event.preventDefault();

    let formulario = document.getElementById("form-artista");
    let dadosForms = new FormData(formulario);

    try {
        let dados_php = await fetch("../../../actions/cadastrar_artista.php", {
            method: "POST",
            body: dadosForms
        });

        let response = await dados_php.json();

        console.log(response);

        if (response.status === 200) {
            formulario.reset();
            modal.classList.remove("oculta");
            modal.classList.add("show_modal");

            let fechar_modal = document.getElementById("fechar_modal");
            fechar_modal.addEventListener('click', function(event) {
                modal.classList.remove("show_modal");
                modal.classList.add("oculta");
            });
        } else {
            alert("Erro ao cadastrar artista!");
        }

    } catch (error) {
        alert("Erro na requisição: " + error.message);
    }
});
