window.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);

    // Pegando os dados da URL
    const id = params.get("id");
    const nome = params.get("nome");
    const email = params.get("email");

    // Preenchendo os campos do formulário
    // if (id) document.getElementById("input-id").value = id;
    if (nome) document.getElementById("nome").value = nome;
    if (email) document.getElementById("descricao").value = email;

    // Se quiser setar o ID na propriedade "data" do form, mesmo que você não possa usar "dataset":
    document.getElementById("perfilEdit-form-id").setAttribute("data-editar-id", id);
});

document.getElementById("perfilEdit-form-id").addEventListener("submit", async function (e){
    e.preventDefault();

    const FormData = new FormData(this);

    if (this.dataset.editarId) {
        FormData.set("id", this.dataset.editarId);
        try {
            const sult = await fetch("../../../actions/action-editar-expositor.php", {
                method: "POST",
                body: FormData
            });

            const dados = await sult.json();
        } catch (error) {
            console.error(error);
        }
    } else {
        try {
            const sult = await fetch("../../../", {
                method: "POST",
                body: FormData
            });

            const dados = await sult.json();
            console.log(dados);
        } catch (error) {
            console.error(error);
        }
    }
});