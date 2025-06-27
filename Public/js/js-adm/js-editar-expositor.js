let btn_salvar = document.getElementById("btn_salvar");

window.addEventListener("DOMContentLoaded", async () => {
    const params = new URLSearchParams(window.location.search);

    let input_nome = document.getElementById("nome");
    let input_desc = document.getElementById("descricao");

    // Pegando os dados da URL
    const id_expositor = params.get("id");

    let dados_php = await fetch('../../../actions/action-editar-expositor.php?id_expo='+id_expositor);
    
    let response = await dados_php.json();

    console.log(response)

    input_nome.value = response.nome_marca;
    input_desc.value = response.descricao_exp;
});




btn_salvar.addEventListener('click', async function (e){
    e.preventDefault();

    const formulario = document.getElementById("perfilEdit_form");
    
    // console.log(formulario);

    let enviarForm = new FormData(formulario);

    // console.log(enviarForm)


    if (formulario.dataset.editarId) {
        formData.set("id", this.dataset.editarId);
        try {
            const sult = await fetch("../../../actions/action-editar-expositor.php", {
                method: "POST",
                body: enviarForm
            });

            const dados = await sult.json();
            console.log(dados)

        } catch (error) {
            console.error(error);
        }
    }
});