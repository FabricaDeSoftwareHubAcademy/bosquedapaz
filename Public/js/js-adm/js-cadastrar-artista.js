// cadastro artista

let btnSalvar = document.getElementById("btn-modal-salvar");
let modalConfirmar = document.getElementById("modal-confirmar");
let modalSucesso = document.getElementById("modal-sucesso");
let modalErro = document.getElementById("modal-erro");

btnSalvar.addEventListener('click', async function(event) {
    event.preventDefault();

    let formulario = document.getElementById("form-artista");
    let dadosForms = new FormData(formulario);

    try {
        let dadosPhp = await fetch("../../../actions/actions-cadastrar-artista.php", {
            method: 'POST',
            body: dadosForms
        });

        let response = await dadosPhp.json();
        console.log(response);

        modalConfirmar.close();

        if (response.status == 200) {
            formulario.reset();

            // mostra modal sucesso
            modalSucesso.classList.remove("oculta");
            modalSucesso.classList.add("show_modal");

            // fechar modal sucesso
            let fecharSucesso = document.getElementById("close-modal-sucesso");
            fecharSucesso.addEventListener('click', function() {
                modalSucesso.classList.remove("show_modal");
                modalSucesso.classList.add("oculta");
            });

        } else {
            // mostra modal erro
            modalErro.classList.remove("oculta");
            modalErro.classList.add("show_modal");

            let fecharErro = document.getElementById("close-modal-erro");
            fecharErro.addEventListener('click', function() {
                modalErro.classList.remove("show_modal");
                modalErro.classList.add("oculta");
            });
        }

    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro na comunicação com o servidor.");
    }
});
